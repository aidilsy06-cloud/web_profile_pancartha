@extends('layouts.public')

@section('title', 'Panca Artha | Solusi IT & Keamanan Sistem Informasi')
@section('meta_description', 'Panca Artha — Tim IT profesional dari Keamanan Sistem Informasi Politeknik Negeri Bengkalis. Spesialis pengembangan web aman, UI/UX, dan keamanan database.')

@section('content')

    {{-- ═══════════════ HERO ═══════════════ --}}
    <section class="hero" id="home">
        <!-- RippleGrid WebGL Background (fixed) -->
        <div id="ripple-grid-bg"></div>

        <div class="container hero-inner hero-stacked">
            <!-- Top: Animated Laptop (logo inside screen) -->
            <div class="hero-visual">
                <!-- Outer: controls the space the laptop occupies in flow -->
                <div class="hero-laptop-outer">
                    <!-- Inner: the element we scale -->
                    <div class="hero-laptop-inner">
                        <!-- From Uiverse.io by Spacious74 -->
                        <div class="laptop">
                            <div class="screen">
                                <div class="header"></div>
                                <div class="text">
                                    <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha Logo" class="laptop-logo">
                                </div>
                            </div>
                            <div class="keyboard"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom: Text content -->
            <div class="hero-content hero-content-centered">
                <div class="hero-badge">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    {{ $settings['hero_subtitle'] ?? 'Spesialis Keamanan Sistem Informasi Polbeng' }}
                </div>
                <h1 class="hero-title">
                    {!! str_replace(['&', 'Mewujudkan', 'Digital'], ['&amp;', '<span>Mewujudkan</span>', '<em>Digital</em>'], $settings['hero_title'] ?? 'Mengamankan & Mewujudkan Visi Digital Anda') !!}
                </h1>
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


    {{-- ═══════════════ STATS ═══════════════ --}}
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

    {{-- ═══════════════ ABOUT ═══════════════ --}}
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══════════════ SERVICES ═══════════════ --}}
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Keahlian Kami</span>
                <h2 class="section-title">Layanan <span>Profesional</span> Kami</h2>
                <p class="section-desc">Solusi IT menyeluruh yang dibangun di atas keahlian akademik dan eksekusi nyata</p>
            </div>
            <div class="services-grid">
                @foreach($services as $i => $service)
                <div class="sc-card" style="animation-delay: {{ $i * 0.08 }}s">
                    <div class="sc-para">
                        <p class="sc-subtitle">
                            LAYANAN {{ str_pad($i+1, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <p class="sc-title">
                            {{ $service->title }}
                        </p>
                    </div>
                    
                    <div class="sc-image-wrap">
                        <div class="sc-icon-container">
                            @if($service->icon_type === 'image' && $service->icon)
                                <img src="{{ Storage::url($service->icon) }}" alt="{{ $service->title }}" class="sc-custom-image">
                            @elseif($service->icon_type === 'emoji')
                                <div class="sc-emoji">{{ $service->icon }}</div>
                            @else
                                <i data-feather="{{ $service->icon }}" class="sc-feather-icon"></i>
                            @endif
                        </div>
                        
                        <div class="sc-tooltips">
                            <p class="sc-tooltip-title">{{ $service->title }}</p>
                            <ul class="sc-tooltip-list">
                                <li class="sc-tooltip-item">
                                    <svg stroke-linejoin="round" stroke-linecap="round" stroke-width="3" class="sc-check-icon" stroke="#495c48" fill="none" viewBox="0 0 24 24" height="12" width="12"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    <p>{{ Str::limit($service->description, 60) }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════ PORTFOLIO ═══════════════ --}}
    <section class="portfolio-section" id="portfolio">
        <div class="container">
            <div class="section-header">
                <span class="section-label">Karya Kami</span>
                <h2 class="section-title">Portofolio &amp; <span>Studi Kasus</span></h2>
                <p class="section-desc">Proyek nyata yang telah kami selesaikan untuk klien dan institusi</p>
            </div>
            <div class="portfolio-grid">
                @forelse($projects as $project)
                <div class="pf-card">
                    {{-- ── TOP SECTION (image / header) ── --}}
                    <div class="pf-top" style="
                        @if($project->image)
                            background-image: url('{{ asset('storage/'.$project->image) }}');
                        @else
                            background: linear-gradient(135deg, #0d2137 0%, #0a3d62 100%);
                        @endif
                    ">
                        <div class="pf-top-overlay"></div>
                        <div class="pf-tab"></div>
                        <div class="pf-icons-row">
                            <div class="pf-logo-wrap">
                                <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha" class="pf-logo-svg">
                            </div>
                            <div class="pf-action-links">
                                @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" rel="noopener" class="pf-icon-btn" title="Demo Live">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                                </a>
                                @endif
                                @if($project->repo_url)
                                <a href="{{ $project->repo_url }}" target="_blank" rel="noopener" class="pf-icon-btn" title="Repository">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- ── BOTTOM SECTION (info) ── --}}
                    <div class="pf-bottom">
                        <span class="pf-title">{{ Str::upper($project->name) }}</span>
                        <div class="pf-tags">
                            @foreach($project->tech_array as $tech)
                                <span class="pf-tech">{{ $tech }}</span>
                            @endforeach
                        </div>
                        <div class="pf-stats">
                            <div class="pf-stat">
                                <span class="pf-stat-label">Masalah</span>
                                <p class="pf-stat-text">{{ Str::limit($project->problem, 60) }}</p>
                            </div>
                            <div class="pf-stat pf-stat--mid">
                                <span class="pf-stat-label">Solusi</span>
                                <p class="pf-stat-text">{{ Str::limit($project->solution, 60) }}</p>
                            </div>
                            <div class="pf-stat">
                                <span class="pf-stat-label">Hasil</span>
                                <p class="pf-stat-text">{{ Str::limit($project->result, 60) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div style="text-align:center; color: var(--text-muted); padding: 80px 0; grid-column: 1/-1;">
                    Portofolio akan segera hadir.
                </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ═══════════════ TEAM ═══════════════ --}}
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

                        {{-- Arc social icons + logo circle + photo --}}
                        <div class="t-stage">

                            {{-- Logo circle (behind photo, behind icons) --}}
                            <div class="t-logo-circle">
                                <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha" class="t-logo-img">
                            </div>

                            {{-- Arc social icons --}}
                            <div class="t-arc-icons">
                                @if($member->instagram_url ?? false)
                                <a href="{{ $member->instagram_url }}" target="_blank" rel="noopener"
                                   class="t-arc-btn t-arc-btn--left" title="Instagram">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                                </a>
                                @else
                                <span class="t-arc-btn t-arc-btn--left t-arc-btn--disabled" title="Instagram">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                                </span>
                                @endif

                                @if($member->github_url)
                                <a href="{{ $member->github_url }}" target="_blank" rel="noopener"
                                   class="t-arc-btn t-arc-btn--center" title="GitHub">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </a>
                                @else
                                <span class="t-arc-btn t-arc-btn--center t-arc-btn--disabled" title="GitHub">
                                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                                </span>
                                @endif

                                @if($member->website_url)
                                <a href="{{ $member->website_url }}" target="_blank" rel="noopener"
                                   class="t-arc-btn t-arc-btn--right" title="Website">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                </a>
                                @else
                                <span class="t-arc-btn t-arc-btn--right t-arc-btn--disabled" title="Web">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                </span>
                                @endif
                            </div>

                            {{-- Person photo (on top of logo circle, icons behind) --}}
                            @if($member->photo_url)
                            <img class="t-avatar" src="{{ $member->photo_url }}" alt="{{ $member->name }}">
                            @else
                            <div class="t-avatar t-avatar-placeholder">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="64" height="64"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            </div>
                            @endif

                        </div>{{-- /.t-stage --}}

                        {{-- Name, role, bio below --}}
                        <div class="t-reveal-info">
                            <h3 class="t-reveal-name">{{ $member->name }}</h3>
                            <p class="t-reveal-role">{{ $member->role }}</p>
                            @if($member->bio)
                            <p class="t-reveal-bio">{{ Str::limit($member->bio, 80) }}</p>
                            @endif
                        </div>

                    </div>{{-- /.t-card-reveal --}}

                    {{-- Shine effect --}}
                    <div class="t-card-shine"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══════════════ TECHNOLOGIES MARQUEE ═══════════════ --}}
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

    {{-- ═══════════════ TESTIMONIALS ═══════════════ --}}
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

    {{-- ═══════════════ CONTACT / CTA ═══════════════ --}}
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

@endsection

@push('scripts')
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

