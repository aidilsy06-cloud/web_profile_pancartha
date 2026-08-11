<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panca Artha — Tim IT profesional dari Keamanan Sistem Informasi Politeknik Negeri Bengkalis. Spesialis pengembangan web aman, UI/UX, dan keamanan database.">
    <title>Panca Artha | Solusi IT & Keamanan Sistem Informasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Ambient Background -->
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>
    <div class="noise-overlay"></div>

    <!-- Navigation -->
    <div class="nav-wrapper">
        <header class="navbar" id="navbar">
            <a href="#home" class="nav-logo">
                <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha Logo" class="logo-icon">
                Panca<span>Artha</span>
            </a>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
            <nav class="nav-menu" id="nav-menu">
                <a href="#home" class="nav-link active">Beranda</a>
                <a href="#about" class="nav-link">Tentang</a>
                <a href="#services" class="nav-link">Layanan</a>
                <a href="#portfolio" class="nav-link">Portofolio</a>
                <a href="#team" class="nav-link">Tim</a>
                <a href="#contact" class="nav-cta">Konsultasi</a>
            </nav>
        </header>
    </div>

    <main>

        <!-- ═══════════════ HERO ═══════════════ -->
        <section class="hero" id="home">
            <!-- RippleGrid WebGL Background (fixed) -->
            <div id="ripple-grid-bg"></div>

            <div class="container hero-inner hero-stacked">
                <!-- Top: Animated Laptop (logo inside screen) -->  
                <div class="hero-visual">
                    <div class="laptop">
                        <div class="laptop-screen">
                            <div class="laptop-header"></div>
                            <div class="laptop-content laptop-content-logo">
                                <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha Logo" class="laptop-logo">
                            </div>
                        </div>
                        <div class="laptop-keyboard"></div>
                        <!-- Caption below laptop -->
                        <div class="laptop-caption">
                            {!! str_replace(['&', 'Mewujudkan', 'Digital'], ['&amp;', '<span>Mewujudkan</span>', '<em>Digital</em>'], $settings['hero_title'] ?? 'Mengamankan & Mewujudkan Visi Digital Anda') !!}
                        </div>
                    </div>
                </div>

                <!-- Bottom: Text content -->
                <div class="hero-content hero-content-centered">
                    <div class="hero-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        {{ $settings['hero_subtitle'] ?? 'Spesialis Keamanan Sistem Informasi Polbeng' }}
                    </div>
                    <p class="hero-desc">
                        {{ $settings['hero_desc'] ?? 'Kami adalah Panca Artha — tim spesialis IT dari Politeknik Negeri Bengkalis.' }}
                    </p>
                    <div class="hero-actions justify-center">
                        <a href="#portfolio" class="btn-primary">
                            Lihat Portofolio
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </a>
                        <a href="#contact" class="btn-outline">Hubungi Kami</a>
                    </div>
                    <div class="hero-trust justify-center">
                        <div class="trust-stars">★★★★★</div>
                        <span>Standar kode aman &middot; 100% kepercayaan klien</span>
                    </div>
                </div>
            </div>

            <div class="hero-scroll-hint">
                <div class="scroll-line"></div>
                <span>Scroll</span>
            </div>
        </section>




        <!-- ═══════════════ STATS ═══════════════ -->
        <section class="stats-section" id="stats">
            <div class="container">
                <div class="stats-grid">
                    @foreach($stats as $stat)
                    <div class="stat-item {{ $stat->is_highlighted ? 'highlighted' : '' }}">
                        <div class="stat-number" data-target="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0{{ $stat->suffix }}</div>
                        <div class="stat-label">{{ $stat->label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ═══════════════ ABOUT ═══════════════ -->
        <section class="about-section" id="about">
            <div class="container">
                <div class="browser">
                    <div class="tabs-head">
                        <div class="tabs">
                            <div class="tab-open">
                                <div class="rounded-l"><div class="mask-round"></div></div>
                                <span>Panca Artha</span>
                                <div class="close-tab">✕</div>
                                <div class="rounded-r"><div class="mask-round"></div></div>
                            </div>
                        </div>

                        <div class="window-opt">
                            <button>-</button>
                            <button>□</button>
                            <button class="window-close">✕</button>
                        </div>
                    </div>

                    <div class="head-browser">
                        <button>←</button>
                        <button disabled="">→</button>

                        <input
                            type="text"
                            name=""
                            id=""
                            placeholder="Search Google or type URL"
                            value="pancaartha.com/tentang-kami"
                        />

                        <button>⋮</button>

                        <button class="star">✰</button>
                    </div>

                    <div class="body-browser">
                        <div class="about-content">
                            <span class="section-label">Siapa Kami</span>
                            <h2 class="section-title">{{ $settings['about_title'] ?? 'Mengubah Kompleksitas Menjadi Karya Digital yang Aman' }}</h2>
                            <p class="about-desc">{{ $settings['about_desc'] ?? '' }}</p>
                            <div class="about-features">
                                <div class="feature-item">
                                    <div class="feature-check"><i data-feather="check" style="width:16px;height:16px;"></i></div>
                                    <div>
                                        <h4>{{ $settings['about_feature_1_title'] ?? '' }}</h4>
                                        <p>{{ $settings['about_feature_1_desc'] ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-check"><i data-feather="check" style="width:16px;height:16px;"></i></div>
                                    <div>
                                        <h4>{{ $settings['about_feature_2_title'] ?? '' }}</h4>
                                        <p>{{ $settings['about_feature_2_desc'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════ SERVICES ═══════════════ -->
        <section class="services-section" id="services">
            <div class="container">
                <div class="section-header">
                    <span class="section-label">Keahlian Kami</span>
                    <h2 class="section-title">Layanan <span>Profesional</span> Kami</h2>
                    <p class="section-desc">Solusi IT menyeluruh yang dibangun di atas keahlian akademik dan eksekusi nyata</p>
                </div>
                <div class="services-grid">
                    @foreach($services as $i => $service)
                    <div class="service-card" style="--delay: {{ $i * 0.08 }}s">
                        <div class="service-number">{{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}</div>
                        <div class="service-icon"><i data-feather="{{ $service->icon }}" style="width: 32px; height: 32px;"></i></div>
                        <h3 class="service-title">{{ $service->title }}</h3>
                        <p class="service-desc">{{ $service->description }}</p>
                        <div class="service-arrow">→</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- ═══════════════ PORTFOLIO ═══════════════ -->
        <section class="portfolio-section" id="portfolio">
            <div class="container">
                <div class="section-header">
                    <span class="section-label">Karya Kami</span>
                    <h2 class="section-title">Portofolio & <span>Studi Kasus</span></h2>
                    <p class="section-desc">Proyek nyata yang telah kami selesaikan untuk klien dan institusi</p>
                </div>
                <div class="portfolio-grid">
                    @forelse($projects as $project)
                    <div class="portfolio-card">
                        <div class="portfolio-img">
                            @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->name }}">
                            @else
                                <img src="{{ asset('assets/lamr-mockup.png') }}" alt="{{ $project->name }}">
                            @endif
                            <div class="portfolio-img-overlay">
                                <div class="portfolio-links">
                                    @if($project->demo_url)
                                        <a href="{{ $project->demo_url }}" target="_blank" class="port-link"><i data-feather="external-link" style="width:14px;height:14px;margin-right:4px;"></i> Demo</a>
                                    @endif
                                    @if($project->repo_url)
                                        <a href="{{ $project->repo_url }}" target="_blank" class="port-link"><i data-feather="box" style="width:14px;height:14px;margin-right:4px;"></i> Repo</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-body">
                            <div class="portfolio-tags">
                                @foreach($project->tech_array as $tech)
                                    <span class="tech-tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <h3 class="portfolio-title">{{ $project->name }}</h3>
                            <div class="portfolio-timeline">
                                <div class="pt-item">
                                    <div class="pt-dot pt-dot-problem"></div>
                                    <div class="pt-content">
                                        <div class="pt-label">Masalah</div>
                                        <p>{{ $project->problem }}</p>
                                    </div>
                                </div>
                                <div class="pt-item">
                                    <div class="pt-dot pt-dot-solution"></div>
                                    <div class="pt-content">
                                        <div class="pt-label">Solusi</div>
                                        <p>{{ $project->solution }}</p>
                                    </div>
                                </div>
                                <div class="pt-item">
                                    <div class="pt-dot pt-dot-result"></div>
                                    <div class="pt-content">
                                        <div class="pt-label">Hasil</div>
                                        <p>{{ $project->result }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div style="text-align:center; color: var(--text-muted); padding: 60px 0; grid-column: 1/-1;">
                        Portofolio akan segera hadir.
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- ═══════════════ TEAM ═══════════════ -->
        <section class="team-section" id="team">
            <div class="container">
                <div class="section-header">
                    <span class="section-label">Pengurus Panca Artha</span>
                    <h2 class="section-title">Kenali <span>Tim Kami</span></h2>
                    <p class="section-desc">Temui para ahli di balik setiap proyek</p>
                </div>

                <div class="t-cards-row">
                    @foreach($team as $member)
                    <div class="t-card" tabindex="0">
                        {{-- Background photo layer --}}
                        @if($member->photo_url)
                        <div class="t-card-bg" style="background-image:url('{{ $member->photo_url }}')"></div>
                        @else
                        <div class="t-card-bg t-card-bg--placeholder"></div>
                        @endif

                        {{-- Gradient overlay --}}
                        <div class="t-card-gradient"></div>

                        {{-- Always visible: name tag --}}
                        <div class="t-card-default">
                            <span class="t-card-initials">{{ strtoupper(substr($member->name, 0, 2)) }}</span>
                            <span class="t-card-label">{{ $member->name }}</span>
                        </div>

                        {{-- Hover reveal --}}
                        <div class="t-card-reveal">
                            @if($member->photo_url)
                            <img class="t-avatar" src="{{ $member->photo_url }}" alt="{{ $member->name }}">
                            @else
                            <div class="t-avatar t-avatar-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="48" height="48"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            </div>
                            @endif

                            <div class="t-reveal-info">
                                <h3 class="t-reveal-name">{{ $member->name }}</h3>
                                <p class="t-reveal-role">{{ $member->role }}</p>

                                @if($member->bio)
                                <p class="t-reveal-bio">{{ Str::limit($member->bio, 80) }}</p>
                                @endif
                            </div>

                            <div class="t-reveal-socials">
                                @if($member->github_url)
                                <a href="{{ $member->github_url }}" target="_blank" rel="noopener" class="t-social-btn" title="GitHub">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                                @endif
                                @if($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener" class="t-social-btn" title="LinkedIn">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                </a>
                                @endif
                                @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="t-social-btn" title="Email">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                                </a>
                                @endif
                                @if($member->instagram_url ?? false)
                                <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener" class="t-social-btn" title="Instagram">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                                </a>
                                @endif
                            </div>
                        </div>

                        {{-- Shine effect --}}
                        <div class="t-card-shine"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

                <!-- ═══════════════ TECHNOLOGIES MARQUEE ═══════════════ -->
        @if($technologies->isNotEmpty())
        <section class="tech-section">
            <div class="section-header" style="margin-bottom: 32px;">
                <span class="section-label">Stack Kami</span>
                <h2 class="section-title" style="margin-top: 8px;">Tools & <span>Teknologi</span></h2>
            </div>
            <div class="ticker-outer">
                <div class="ticker-inner">
                    @foreach($technologies as $tech)
                    <div class="ticker-item">
                        @if($tech->logo)
                            <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="ticker-logo">
                        @else
                            <span class="ticker-dot">✦</span>
                        @endif
                        {{ $tech->name }}
                    </div>
                    @endforeach
                    {{-- Duplicate for seamless loop --}}
                    @foreach($technologies as $tech)
                    <div class="ticker-item">
                        @if($tech->logo)
                            <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" class="ticker-logo">
                        @else
                            <span class="ticker-dot">✦</span>
                        @endif
                        {{ $tech->name }}
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- ═══════════════ TESTIMONIALS ═══════════════ -->
        @if($testimonials->isNotEmpty())
        <section class="testimonials-section" id="testimonials">
            <div class="container">
                <div class="section-header">
                    <span class="section-label">Apa Kata Mereka</span>
                    <h2 class="section-title">Testimoni <span>Klien &amp; Dosen</span></h2>
                </div>
                <div class="testimonials-grid">
                    @foreach($testimonials as $t)
                    <div class="testimonial-card">
                        <!-- Top row: name & date -->
                        <div class="tc-top">
                            <div class="tc-top-left">
                                <div class="tc-author-name">{{ $t->author_name }}</div>
                                <div class="tc-author-role">{{ $t->author_role }}</div>
                            </div>
                            <div class="tc-verified">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            </div>
                        </div>

                        <!-- Stars -->
                        <div class="tc-stars">
                            @php $stars = $t->rating ?? 5; @endphp
                            @for($i = 1; $i <= 5; $i++)
                            <svg fill="currentColor" viewBox="0 0 20 20" class="tc-star {{ $i <= $stars ? 'tc-star-full' : 'tc-star-dim' }}" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.916 1.603-.916 1.902 0l1.286 3.953a1.5 1.5 0 001.421 1.033h4.171c.949 0 1.341 1.154.577 1.715l-3.38 2.458a1.5 1.5 0 00-.54 1.659l1.286 3.953c.3.916-.757 1.67-1.539 1.145l-3.38-2.458a1.5 1.5 0 00-1.76 0l-3.38 2.458c-.782.525-1.838-.229-1.539-1.145l1.286-3.953a1.5 1.5 0 00-.54-1.659l-3.38-2.458c-.764-.561-.372-1.715.577-1.715h4.171a1.5 1.5 0 001.421-1.033l1.286-3.953z"/>
                            </svg>
                            @endfor
                        </div>

                        <!-- Quote body -->
                        <p class="tc-quote">{{ $t->quote }}</p>

                        <!-- Avatar row -->
                        <div class="tc-footer">
                            @if($t->author_photo)
                                <img src="{{ $t->photo_url }}" alt="{{ $t->author_name }}" class="tc-avatar">
                            @else
                                <div class="tc-avatar-placeholder">{{ strtoupper(substr($t->author_name, 0, 1)) }}</div>
                            @endif
                            <div class="tc-tagline">Ulasan terverifikasi</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- ═══════════════ CONTACT / CTA ═══════════════ -->
        <section class="contact-section" id="contact">
            <div class="container">
                <div class="contact-grid">
                    <div class="contact-info">
                        <span class="section-label">Mulai Sekarang</span>
                        <h2 class="section-title">{{ $settings['contact_cta_title'] ?? 'Siap Memulai Proyek Bersama Kami?' }}</h2>
                        <p class="contact-desc">{{ $settings['contact_cta_desc'] ?? '' }}</p>
                        <div class="contact-items">
                            @if(!empty($settings['contact_email']))
                            <a href="mailto:{{ $settings['contact_email'] }}" class="contact-item">
                                <div class="contact-item-icon"><i data-feather="mail"></i></div>
                                <div>
                                    <div class="contact-item-label">Email</div>
                                    <div class="contact-item-value">{{ $settings['contact_email'] }}</div>
                                </div>
                            </a>
                            @endif
                            @if(!empty($settings['contact_whatsapp']))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_whatsapp']) }}" target="_blank" class="contact-item">
                                <div class="contact-item-icon"><i data-feather="smartphone"></i></div>
                                <div>
                                    <div class="contact-item-label">WhatsApp</div>
                                    <div class="contact-item-value">{{ $settings['contact_whatsapp'] }}</div>
                                </div>
                            </a>
                            @endif
                            @if(!empty($settings['contact_address']))
                            <div class="contact-item">
                                <div class="contact-item-icon"><i data-feather="map-pin"></i></div>
                                <div>
                                    <div class="contact-item-label">Lokasi</div>
                                    <div class="contact-item-value">{{ $settings['contact_address'] }}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="contact-form-wrap">
                        <form class="contact-form" id="contact-form">
                            <h3 class="form-title">Kirim Pesan</h3>
                            <div class="cf-row">
                                <div class="cf-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" placeholder="Nama Anda" required>
                                </div>
                                <div class="cf-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="email@anda.com" required>
                                </div>
                            </div>
                            <div class="cf-group">
                                <label>Subjek</label>
                                <input type="text" placeholder="Tentang proyek Anda">
                            </div>
                            <div class="cf-group">
                                <label>Pesan</label>
                                <textarea placeholder="Ceritakan kebutuhan proyek Anda..." rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn-primary cf-submit">
                                Kirim Pesan
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                            </button>
                            <div class="cf-success" id="cf-success" style="display:none;">
                                <i data-feather="check-circle" style="width:16px;height:16px;margin-right:4px;vertical-align:text-bottom;"></i> Pesan terkirim! Kami akan segera menghubungi Anda.
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-brand">
                    <div class="footer-logo">
                        <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha Logo" class="footer-logo-icon">
                        Panca<span>Artha</span>
                    </div>
                    <p class="footer-tagline">Mengamankan & Mewujudkan Visi Digital Anda</p>
                    <p class="footer-origin">Keamanan Sistem Informasi · Politeknik Negeri Bengkalis</p>
                </div>
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Menu</h4>
                        <a href="#home">Beranda</a>
                        <a href="#about">Tentang Kami</a>
                        <a href="#services">Layanan</a>
                        <a href="#portfolio">Portofolio</a>
                        <a href="#team">Tim Kami</a>
                        <a href="#contact">Kontak</a>
                    </div>
                    <div class="footer-col">
                        <h4>Kontak</h4>
                        @if(!empty($settings['contact_email']))
                            <a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>
                        @endif
                        @if(!empty($settings['contact_whatsapp']))
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_whatsapp']) }}">{{ $settings['contact_whatsapp'] }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} Panca Artha. Hak Cipta Dilindungi.</p>
                <a href="{{ route('admin.login') }}" class="footer-admin-link">Admin</a>
            </div>
        </div>
    </footer>

    <!-- OGL for RippleGrid WebGL -->
    <script type="module">
        import { Renderer, Program, Triangle, Mesh } from 'https://cdn.jsdelivr.net/npm/ogl@1.0.8/src/index.js';

        (function initRippleGrid() {
            const container = document.getElementById('ripple-grid-bg');
            if (!container) return;

            const hexToRgb = hex => {
                const r = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return r ? [parseInt(r[1],16)/255, parseInt(r[2],16)/255, parseInt(r[3],16)/255] : [1,1,1];
            };

            const renderer = new Renderer({ dpr: Math.min(window.devicePixelRatio, 2), alpha: true });
            const gl = renderer.gl;
            gl.enable(gl.BLEND);
            gl.blendFunc(gl.SRC_ALPHA, gl.ONE_MINUS_SRC_ALPHA);
            gl.canvas.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;';
            container.appendChild(gl.canvas);

            const vert = `attribute vec2 position;
varying vec2 vUv;
void main() { vUv = position * 0.5 + 0.5; gl_Position = vec4(position, 0.0, 1.0); }`;

            const frag = `precision highp float;
uniform float iTime;
uniform vec2 iResolution;
uniform vec3 gridColor;
uniform float rippleIntensity;
uniform float gridSize;
uniform float gridThickness;
uniform float fadeDistance;
uniform float vignetteStrength;
uniform float glowIntensity;
uniform float opacity;
uniform vec2 mousePosition;
uniform float mouseInfluence;
uniform float mouseInteractionRadius;
varying vec2 vUv;
float pi = 3.141592;
void main() {
    vec2 uv = vUv * 2.0 - 1.0;
    uv.x *= iResolution.x / iResolution.y;
    float dist = length(uv);
    float func = sin(pi * (iTime - dist));
    vec2 rippleUv = uv + uv * func * rippleIntensity;
    vec2 mouseUv = (mousePosition * 2.0 - 1.0);
    mouseUv.x *= iResolution.x / iResolution.y;
    float mouseDist = length(uv - mouseUv);
    float influence = mouseInfluence * exp(-mouseDist * mouseDist / (mouseInteractionRadius * mouseInteractionRadius));
    float mouseWave = sin(pi * (iTime * 2.0 - mouseDist * 3.0)) * influence;
    rippleUv += normalize(uv - mouseUv + vec2(0.001)) * mouseWave * rippleIntensity * 0.3;
    vec2 a = sin(gridSize * 0.5 * pi * rippleUv - pi / 2.0);
    vec2 b = abs(a);
    float aaWidth = 0.5;
    vec2 smoothB = vec2(smoothstep(0.0, aaWidth, b.x), smoothstep(0.0, aaWidth, b.y));
    vec3 color = vec3(0.0);
    color += exp(-gridThickness * smoothB.x * (0.8 + 0.5 * sin(pi * iTime)));
    color += exp(-gridThickness * smoothB.y);
    color += 0.5 * exp(-(gridThickness / 4.0) * sin(smoothB.x));
    color += 0.5 * exp(-(gridThickness / 3.0) * smoothB.y);
    color += glowIntensity * exp(-gridThickness * 0.5 * smoothB.x);
    color += glowIntensity * exp(-gridThickness * 0.5 * smoothB.y);
    float ddd = exp(-2.0 * clamp(pow(dist, fadeDistance), 0.0, 1.0));
    vec2 vc = vUv - 0.5;
    float vignette = clamp(1.0 - pow(length(vc) * 2.0, vignetteStrength), 0.0, 1.0);
    float finalFade = ddd * vignette;
    float alpha = length(color) * finalFade * opacity;
    gl_FragColor = vec4(color * gridColor * finalFade * opacity, alpha);
}`;

            const uniforms = {
                iTime: { value: 0 },
                iResolution: { value: [1, 1] },
                gridColor: { value: hexToRgb('#3E6DA8') },
                rippleIntensity: { value: 0.05 },
                gridSize: { value: 10.0 },
                gridThickness: { value: 15.0 },
                fadeDistance: { value: 1.5 },
                vignetteStrength: { value: 2.0 },
                glowIntensity: { value: 0.1 },
                opacity: { value: 1.0 },
                mousePosition: { value: [0.5, 0.5] },
                mouseInfluence: { value: 0 },
                mouseInteractionRadius: { value: 0.8 }
            };

            const geometry = new Triangle(gl);
            const program = new Program(gl, { vertex: vert, fragment: frag, uniforms });
            const mesh = new Mesh(gl, { geometry, program });

            const targetMouse = { x: 0.5, y: 0.5 };
            const currentMouse = { x: 0.5, y: 0.5 };
            let targetInfluence = 0, rafId;

            const resize = () => {
                const { clientWidth: w, clientHeight: h } = container;
                renderer.setSize(w, h);
                uniforms.iResolution.value = [w, h];
            };

            window.addEventListener('mousemove', e => {
                targetMouse.x = e.clientX / window.innerWidth;
                targetMouse.y = 1.0 - (e.clientY / window.innerHeight);
                targetInfluence = 1.0;
            });
            window.addEventListener('mouseleave', () => { targetInfluence = 0; });
            window.addEventListener('resize', resize);
            resize();

            const render = t => {
                rafId = requestAnimationFrame(render);
                uniforms.iTime.value = t * 0.001;
                currentMouse.x += (targetMouse.x - currentMouse.x) * 0.1;
                currentMouse.y += (targetMouse.y - currentMouse.y) * 0.1;
                uniforms.mouseInfluence.value += (targetInfluence - uniforms.mouseInfluence.value) * 0.05;
                uniforms.mousePosition.value = [currentMouse.x, currentMouse.y];
                renderer.render({ scene: mesh });
            };
            requestAnimationFrame(render);
        })();
    </script>

    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>feather.replace();</script>

    <!-- Team Detail Modal -->
    <div id="team-detail-modal" class="tmodal-overlay" aria-hidden="true">
        <div class="tmodal-box">
            <button class="tmodal-close" id="tmodal-close-btn" aria-label="Tutup">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>

            <div class="tmodal-profile-wrap">
                <!-- Circular orbit container -->
                <div class="profileCard_container">
                    <!-- Orbital items -->
                    <a href="#" class="porbit-btn orbit-pos-1" id="porbit-github" target="_blank" title="GitHub">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                        </span>
                    </a>
                    <a href="#" class="porbit-btn orbit-pos-2" id="porbit-linkedin" target="_blank" title="LinkedIn">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 24 24" fill="#0A66C2"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </span>
                    </a>
                    <a href="#" class="porbit-btn orbit-pos-3" id="porbit-email" title="Email">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#C9A227" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </span>
                    </a>
                    <!-- Decorative tech icons -->
                    <div class="porbit-btn orbit-pos-4" title="Laravel">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 128 128"><path fill="#FF2D20" d="M106.6 60.6c-1.1-.5-1.5-.8-2.2-1.3l-26.7-16.9c-.8-.5-1.8-.5-2.6 0l-26.7 16.9c-.7.4-1.1.7-2.2 1.3v.1l26.9 17 26.9-17-.4-.1z"/><path fill="#FF2D20" d="M46.3 94.3V61l-10.8-6.8V82l10.8 12.3zM81.6 94.3V61l10.8-6.8V82L81.6 94.3zM64 39.5l-10.8 6.8 10.8 6.8 10.8-6.8L64 39.5z"/></svg>
                        </span>
                    </div>
                    <div class="porbit-btn orbit-pos-5" title="MySQL">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#00618A" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                        </span>
                    </div>
                    <div class="porbit-btn orbit-pos-6" title="Security">
                        <span class="porbit-inner">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#C9A227" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </span>
                    </div>

                    <!-- Center avatar -->
                    <div class="profile-center-wrap">
                        <img id="modal-avatar-img" src="" alt="" class="profile-center-img">
                    </div>
                </div>

                <!-- Member info below circle -->
                <div class="tmodal-member-info">
                    <h3 id="modal-member-name"></h3>
                    <p id="modal-member-role"></p>
                    <p id="modal-member-bio"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
    (function() {
        const modal   = document.getElementById('team-detail-modal');
        const closeBtn = document.getElementById('tmodal-close-btn');

        document.querySelectorAll('.btn-detail-open').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const d = this.dataset;

                // Populate modal
                document.getElementById('modal-avatar-img').src  = d.photo  || '';
                document.getElementById('modal-avatar-img').alt  = d.name   || '';
                document.getElementById('modal-member-name').textContent = d.name  || '';
                document.getElementById('modal-member-role').textContent = d.role  || '';
                document.getElementById('modal-member-bio').textContent  = d.bio   || '';

                // Orbital social links
                const gh  = document.getElementById('porbit-github');
                const li  = document.getElementById('porbit-linkedin');
                const em  = document.getElementById('porbit-email');

                gh.href  = d.github   || '#';
                gh.style.display  = d.github   ? 'flex' : 'none';

                li.href  = d.linkedin || '#';
                li.style.display  = d.linkedin ? 'flex' : 'none';

                em.href  = d.email ? 'mailto:' + d.email : '#';
                em.style.display  = d.email    ? 'flex' : 'none';

                // Show modal
                modal.classList.add('is-open');
                modal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            });
        });

        function closeModal() {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closeModal();
        });
    })();
    </script>
</body>
</html>


