/* ═══════════════════════════════════════
   PANCA ARTHA — MAIN JAVASCRIPT
   ═══════════════════════════════════════ */

'use strict';

document.addEventListener('DOMContentLoaded', () => {

    /* ─── NAVBAR SCROLL EFFECT ─── */
    const navWrapper = document.querySelector('.nav-wrapper');
    if (navWrapper) {
        const handleScroll = () => {
            navWrapper.classList.toggle('scrolled', window.scrollY > 40);
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    }

    /* ─── MOBILE MENU TOGGLE ─── */
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu    = document.getElementById('nav-menu');
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
            menuToggle.classList.toggle('open');
            const isOpen = navMenu.classList.contains('open');
            menuToggle.setAttribute('aria-expanded', isOpen);
        });
        // Close menu when link clicked
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
                menuToggle.classList.remove('open');
            });
        });
        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!navWrapper.contains(e.target)) {
                navMenu.classList.remove('open');
                menuToggle.classList.remove('open');
            }
        });
    }

    /* ─── ACTIVE NAV LINK (scroll spy) ─── */
    const sections  = document.querySelectorAll('section[id]');
    const navLinks  = document.querySelectorAll('.nav-link');
    const observer  = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navLinks.forEach(l => l.classList.remove('active'));
                const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
                if (active) active.classList.add('active');
            }
        });
    }, { rootMargin: '-30% 0px -60% 0px' });
    sections.forEach(s => observer.observe(s));

    /* ─── ANIMATED STAT COUNTER ─── */
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');
    const easeOutQuart = t => 1 - Math.pow(1 - t, 4);

    const animateCounter = (el) => {
        const target  = parseInt(el.dataset.target, 10);
        const suffix  = el.dataset.suffix || '';
        const duration = 2000;
        const start   = performance.now();

        const tick = (now) => {
            const elapsed  = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased    = easeOutQuart(progress);
            el.textContent = Math.round(eased * target) + suffix;
            if (progress < 1) requestAnimationFrame(tick);
        };
        requestAnimationFrame(tick);
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    statNumbers.forEach(el => counterObserver.observe(el));

    /* ─── SCROLL REVEAL ─── */
    const revealItems = document.querySelectorAll(
        '.service-card, .portfolio-card, .team-card, .testimonial-card, ' +
        '.stat-item, .feature-item, .contact-item'
    );
    revealItems.forEach(el => el.classList.add('reveal'));

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                const delay = entry.target.dataset.revealDelay || 0;
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, delay);
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

    // Stagger children within grids
    document.querySelectorAll('.services-grid, .team-grid, .portfolio-grid, .testimonials-grid, .stats-grid').forEach(grid => {
        [...grid.children].forEach((child, i) => {
            child.dataset.revealDelay = i * 80;
        });
    });

    revealItems.forEach(el => revealObserver.observe(el));

    /* ─── CONTACT FORM (demo) ─── */
    const contactForm = document.getElementById('contact-form');
    const cfSuccess   = document.getElementById('cf-success');
    if (contactForm && cfSuccess) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = contactForm.querySelector('.cf-submit');
            btn.textContent = 'Mengirim...';
            btn.disabled = true;
            setTimeout(() => {
                cfSuccess.style.display = 'block';
                contactForm.reset();
                btn.innerHTML = 'Kirim Pesan <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>';
                btn.disabled = false;
                setTimeout(() => { cfSuccess.style.display = 'none'; }, 5000);
            }, 1200);
        });
    }

    /* ─── MENU TOGGLE ANIMATION ─── */
    if (menuToggle && navMenu) {
        const spans = menuToggle.querySelectorAll('span');
        const updateIcon = () => {
            const isOpen = navMenu.classList.contains('open');
            if (isOpen) {
                spans[0].style.cssText = 'transform: rotate(45deg) translate(5px, 5px)';
                spans[1].style.cssText = 'opacity: 0; transform: scaleX(0)';
                spans[2].style.cssText = 'transform: rotate(-45deg) translate(5px, -5px)';
            } else {
                spans.forEach(s => s.style.cssText = '');
            }
        };
        menuToggle.addEventListener('click', updateIcon);
        navMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', updateIcon));
    }

    /* ─── TEAM CARDS — MOBILE TAP TOGGLE ─── */
    const isTouchDevice = () => window.matchMedia('(max-width: 768px)').matches;

    const teamCards = document.querySelectorAll('.t-card');

    teamCards.forEach(card => {
        card.addEventListener('click', (e) => {
            // Only apply tap logic on mobile/touch breakpoint
            if (!isTouchDevice()) return;

            // Allow links (social icons) inside to work normally
            if (e.target.closest('a')) return;

            const isOpen = card.classList.contains('is-active');

            // Close all other cards
            teamCards.forEach(c => c.classList.remove('is-active'));

            // Toggle this card
            if (!isOpen) {
                card.classList.add('is-active');
            }
        });
    });

    // Close active cards when tapping outside
    document.addEventListener('click', (e) => {
        if (!isTouchDevice()) return;
        if (!e.target.closest('.t-card')) {
            teamCards.forEach(c => c.classList.remove('is-active'));
        }
    });

});
