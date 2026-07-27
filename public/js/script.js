document.addEventListener('DOMContentLoaded', () => {
    // 1. Navbar scroll background & Active Section Link
    const navbar = document.querySelector('.navbar');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    // Mobile Menu Toggle
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('open');
            const isOpen = navMenu.classList.contains('open');
            menuToggle.innerHTML = isOpen ? '&#10005;' : '&#9776;'; // X or Hamburger
        });
    }

    // Close menu when clicking nav link
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu) navMenu.classList.remove('open');
            if (menuToggle) menuToggle.innerHTML = '&#9776;';
        });
    });

    // Window scroll functions
    window.addEventListener('scroll', () => {
        const scrollY = window.pageYOffset;

        // Navbar blur on scroll
        if (scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        // Active link highlighting
        sections.forEach(current => {
            const sectionHeight = current.offsetHeight;
            const sectionTop = current.offsetTop - 120;
            const sectionId = current.getAttribute('id');
            
            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                document.querySelector('.nav-link[href*=' + sectionId + ']').classList.add('active');
            } else {
                const navItem = document.querySelector('.nav-link[href*=' + sectionId + ']');
                if (navItem) navItem.classList.remove('active');
            }
        });
    });

    // 2. Stats Counter Animation
    const statsSection = document.querySelector('.stats');
    const statNums = document.querySelectorAll('.stat-num[data-target]');
    let started = false;

    const startCount = (el) => {
        const target = parseInt(el.getAttribute('data-target'), 10);
        const suffix = el.getAttribute('data-suffix') || '';
        let count = 0;
        const speed = target / 50; // speed factor

        const updateCount = () => {
            count += speed;
            if (count < target) {
                el.innerText = Math.floor(count) + suffix;
                setTimeout(updateCount, 25);
            } else {
                el.innerText = target + suffix;
            }
        };
        updateCount();
    };

    if (statsSection && statNums.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !started) {
                    statNums.forEach(num => startCount(num));
                    started = true;
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }

    // 3. Interactive Services Selection
    const serviceTabs = document.querySelectorAll('.service-tab');
    const displayTitle = document.querySelector('.services-display-title');
    const displayDesc = document.querySelector('.services-display-desc');
    const displayImg = document.querySelector('.services-display-img img');
    
    // Custom descriptions and assets for services (Indonesian translation)
    const servicesData = {
        'web-dev': {
            title: 'Pengembangan Web Aman',
            desc: 'Kami merancang situs web dan portal web mutakhir dengan fokus kuat pada ketangguhan kode, pengiriman berkecepatan tinggi, dan kesempurnaan estetika. Portofolio utama kami adalah website resmi Lembaga Adat Melayu Riau (LAMR) Kabupaten Bengkalis.',
            img: 'assets/lamr-mockup.png'
        },
        'uiux': {
            title: 'Desain UI/UX & Interaktif',
            desc: 'Kami memetakan pengalaman pengguna (user journey) dan merancang antarmuka yang memukau dengan tipografi kelas atas, efek glassmorphism, sistem warna HSL yang disesuaikan, serta panduan gaya modern untuk memaksimalkan interaksi pengguna.',
            img: 'assets/cta-character.png'
        },
        'network': {
            title: 'Pengerasan Jaringan & Basis Data',
            desc: 'Kami menerapkan jaringan server yang aman, mengonfigurasi basis data terenkripsi, menerapkan perlindungan terhadap SQL injection, dan mengelola lingkungan server Linux dengan pertahanan aktif untuk menjamin waktu aktif tanpa gangguan.',
            img: 'assets/hero-cyber.png'
        }
    };

    serviceTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active classes
            serviceTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Update display content with fade effect
            const serviceKey = tab.getAttribute('data-service');
            const data = servicesData[serviceKey];
            
            if (data && displayTitle && displayDesc && displayImg) {
                // Fade out animation
                const displayArea = document.querySelector('.services-display');
                displayArea.style.opacity = '0.3';
                displayArea.style.transform = 'translateY(10px)';
                displayArea.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                
                setTimeout(() => {
                    displayTitle.textContent = data.title;
                    displayDesc.textContent = data.desc;
                    displayImg.src = data.img;
                    
                    // Fade back in
                    displayArea.style.opacity = '1';
                    displayArea.style.transform = 'translateY(0)';
                }, 200);
            }
        });
    });

    // 4. Smooth Scrolling for Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerHeight = 100; // offsets fixed header
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 5. Consulting Form Submission (Indonesian alert)
    const contactForm = document.querySelector('.cta-form');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const emailInput = contactForm.querySelector('.cta-input');
            if (emailInput && emailInput.value.trim() !== '') {
                alert(`Terima kasih! Panca Artha akan segera menghubungi Anda di: ${emailInput.value}`);
                emailInput.value = '';
            }
        });
    }
});
