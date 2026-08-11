@extends('layouts.public')

@section('title', 'Panca Artha | Solusi IT & Keamanan Sistem Informasi')
@section('meta_description', 'Panca Artha — Tim IT profesional dari Keamanan Sistem Informasi Politeknik Negeri Bengkalis. Spesialis pengembangan web aman, UI/UX, dan keamanan database.')

@section('content')

    {{-- ═══════════════ HERO ═══════════════ --}}
    <section class="hero" id="home">
        <!-- GradientWaves WebGL Background (fixed) -->
        <div id="gradient-waves-bg" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden; z-index: -1; pointer-events: none;"></div>

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
                    </div>

                    {{-- ── BOTTOM SECTION (info) ── --}}
                    <div class="pf-bottom">
                        <span class="pf-title">{{ Str::upper($project->name) }}</span>
                        <div class="pf-tags">
                            @foreach($project->tech_array as $tech)
                                <span class="pf-tech">{{ $tech }}</span>
                            @endforeach
                        </div>
                        
                        <button class="pf-detail-btn" 
                            data-title="{{ $project->name }}"
                            data-image="{{ $project->image ? asset('storage/'.$project->image) : '' }}"
                            data-tech="{{ json_encode($project->tech_array) }}"
                            data-problem="{{ $project->problem }}"
                            data-solution="{{ $project->solution }}"
                            data-result="{{ $project->result }}"
                            data-demo="{{ $project->demo_url }}"
                            data-repo="{{ $project->repo_url }}"
                        >
                            Lihat Detail
                        </button>
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
        <div class="terminal-card">
            <div class="terminal-header">
                <div class="terminal-buttons">
                    <span class="t-btn t-btn-red"></span>
                    <span class="t-btn t-btn-yellow"></span>
                    <span class="t-btn t-btn-green"></span>
                </div>
                <p class="terminal-title">root@panca-artha: ~</p>
            </div>
            <div class="terminal-body">
                <p class="terminal-prompt">
                    <span class="prompt-user">root@panca-artha:~$</span> ls /tools
                </p>
                <div class="terminal-grid">
                    @foreach($technologies as $tech)
                        <p>
                            @if($tech->logo)
                                <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" style="width:16px;height:16px;object-fit:contain;">
                            @else
                                <span style="color:#facc15">✦</span>
                            @endif
                            {{ $tech->name }}
                        </p>
                    @endforeach
                </div>
            </div>
            <div class="terminal-footer">
                <p class="terminal-prompt" style="margin:0;">
                    <span class="prompt-user">root@panca-artha:~$</span>
                </p>
                <span class="terminal-cursor"></span>
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

    {{-- ═══════════════ PORTFOLIO MODAL ═══════════════ --}}
    <div id="pf-modal" class="pf-modal-overlay">
        <div class="pf-modal-content">
            <button id="pf-modal-close" class="pf-modal-close" aria-label="Close modal">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
            <div class="pf-modal-header" id="pf-modal-header">
                {{-- Background image set via JS --}}
                <div class="pf-modal-header-overlay"></div>
                <h3 id="pf-modal-title" class="pf-modal-title">TITLE</h3>
                <div id="pf-modal-tags" class="pf-modal-tags"></div>
            </div>
            <div class="pf-modal-body">
                <div class="pf-modal-section">
                    <h4>Masalah</h4>
                    <p id="pf-modal-problem"></p>
                </div>
                <div class="pf-modal-section">
                    <h4>Solusi</h4>
                    <p id="pf-modal-solution"></p>
                </div>
                <div class="pf-modal-section">
                    <h4>Hasil</h4>
                    <p id="pf-modal-result"></p>
                </div>
            </div>
            <div class="pf-modal-footer">
                <a href="#" id="pf-modal-demo" target="_blank" rel="noopener" class="pf-btn pf-btn-demo" style="display:none;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                    Live Demo
                </a>
                <a href="#" id="pf-modal-repo" target="_blank" rel="noopener" class="pf-btn pf-btn-repo" style="display:none;">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                    Repository
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <!-- OGL for GradientWaves WebGL -->
    <script type="module">
        import { Renderer, Program, Triangle, Mesh } from 'https://cdn.jsdelivr.net/npm/ogl@1.0.8/src/index.js';

        (function initGradientWaves() {
            const container = document.getElementById('gradient-waves-bg');
            if (!container) return;

            const hexToRgb = hex => {
                const r = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return r ? [parseInt(r[1],16)/255, parseInt(r[2],16)/255, parseInt(r[3],16)/255] : [1,1,1];
            };

            const renderer = new Renderer({
                webgl: 2,
                alpha: true,
                premultipliedAlpha: true,
                antialias: false,
                dpr: Math.min(window.devicePixelRatio || 1, 2)
            });

            const gl = renderer.gl;
            gl.clearColor(0, 0, 0, 0);
            gl.canvas.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;display:block;';
            container.appendChild(gl.canvas);

            const vert = `#version 300 es
in vec2 position;
void main() {
  gl_Position = vec4(position, 0.0, 1.0);
}
`;

            const frag = `#version 300 es
precision highp float;
uniform vec2 iResolution;
uniform float iTime;
uniform float uSpeed;
uniform float uAmplitude;
uniform float uWaveScale;
uniform float uWaveRatio;
uniform float uSwell;
uniform float uTurbulence;
uniform float uTilt;
uniform float uZoom;
uniform float uHeight;
uniform float uFogDepth;
uniform float uSteps;
uniform float uBrightness;
uniform float uOpacity;
uniform float uGrain;
uniform float uGrainIntensity;
uniform vec2 uMouse;
uniform float uParallax;
uniform bool uEnableMouse;
uniform vec3 uHorizonColor;
uniform vec3 uWaveColor;
uniform vec3 uCrestColor;
out vec4 fragColor;

const float MAX_DIST = 20000.0;

float hash21(vec2 p) {
  vec3 p3 = fract(vec3(p.xyx) * 0.1031);
  p3 += dot(p3, p3.yzx + 33.33);
  return fract((p3.x + p3.y) * p3.z);
}

float plasma(vec3 r, vec2 freq, vec4 tc) {
  float mx = r.x + tc.x;
  mx += uSwell * sin((r.y + mx) / 20.0 + tc.y);
  float my = r.y - tc.z;
  my += uTurbulence * cos(r.x / 23.0 + tc.w);
  return r.z - (sin(mx * freq.x) * uAmplitude + sin(my * freq.y) * uAmplitude + uHeight);
}

float raymarch(vec3 pos, vec3 dir, vec2 freq, vec4 tc) {
  float dist = 0.0;
  for (int i = 0; i < 128; i++) {
    if (float(i) >= uSteps) break;
    float dscene = plasma(pos + dist * dir, freq, tc);
    if (abs(dscene) < 0.1) break;
    dist += 0.9 * dscene;
    if (!(abs(dist) < MAX_DIST)) return MAX_DIST;
  }
  return dist;
}

void main() {
  float T = iTime * uSpeed;
  vec2 freq = vec2(uWaveScale / 7.0, (uWaveScale * uWaveRatio) / 3.0);
  vec4 tc = vec4(T / 0.130, T / 0.810, T / 0.200, T / 0.710);
  float c, s;
  float vfov = (3.14159 / 2.3) / max(uZoom, 0.05);
  vec3 cam = vec3(0.0, 0.0, 30.0);
  vec2 uv = (gl_FragCoord.xy / iResolution.xy) - 0.5;
  uv.x *= iResolution.x / iResolution.y;
  uv.y *= -1.0;

  vec3 dir = vec3(0.0, 0.0, -1.0);
  float ulen = length(uv);
  float xrot = vfov * ulen;
  c = cos(xrot); s = sin(xrot);
  dir = mat3(1.0, 0.0, 0.0, 0.0, c, -s, 0.0, s, c) * dir;
  vec2 nuv = ulen > 1e-5 ? uv / ulen : vec2(1.0, 0.0);
  c = nuv.x; s = nuv.y;
  dir = mat3(c, -s, 0.0, s, c, 0.0, 0.0, 0.0, 1.0) * dir;
  c = cos(uTilt); s = sin(uTilt);
  dir = mat3(c, 0.0, s, 0.0, 1.0, 0.0, -s, 0.0, c) * dir;

  if (uEnableMouse) {
    float yaw = (uMouse.x - 0.5) * uParallax * 0.4;
    float pitch = (uMouse.y - 0.5) * uParallax * 0.4;
    c = cos(yaw); s = sin(yaw);
    dir = mat3(c, 0.0, s, 0.0, 1.0, 0.0, -s, 0.0, c) * dir;
    c = cos(pitch); s = sin(pitch);
    dir = mat3(1.0, 0.0, 0.0, 0.0, c, -s, 0.0, s, c) * dir;
  }

  float dist = raymarch(cam, dir, freq, tc);
  vec3 pos = cam + dist * dir;

  float t = clamp(uFogDepth / max(dist, 0.001), 0.0, 1.0);
  vec3 body = mix(uWaveColor, uCrestColor, clamp(pos.z * 0.08 + 0.5, 0.0, 1.0));
  vec3 col = mix(uHorizonColor, body, t);
  col *= uBrightness;
  col = clamp(col, 0.0, 1.0);

  float alpha = clamp(t, 0.0, 1.0) * uOpacity;
  if (uGrain > 0.5) {
    float g = hash21(gl_FragCoord.xy + mod(iTime, 64.0) * 11.0);
    alpha += (g - 0.5) * uGrainIntensity;
  }
  alpha = clamp(alpha, 0.0, 1.0);
  fragColor = vec4(col * alpha, alpha);
}
`;

            const uniforms = {
                iTime: { value: 0 },
                iResolution: { value: new Float32Array([1, 1]) },
                uSpeed: { value: 0.4 },
                uAmplitude: { value: 2.5 },
                uWaveScale: { value: 0.6 },
                uWaveRatio: { value: 0.9 },
                uSwell: { value: 35.0 },
                uTurbulence: { value: 20.0 },
                uTilt: { value: 1.11 },
                uZoom: { value: 1.0 },
                uHeight: { value: 5.5 },
                uFogDepth: { value: 15.0 },
                uSteps: { value: 70.0 },
                uBrightness: { value: 1.0 },
                uOpacity: { value: 1.0 },
                uGrain: { value: 1.0 },
                uGrainIntensity: { value: 0.05 },
                uMouse: { value: new Float32Array([0.5, 0.5]) },
                uParallax: { value: 0.5 },
                uEnableMouse: { value: true },
                uHorizonColor: { value: new Float32Array(hexToRgb('#5227FF')) },
                uWaveColor: { value: new Float32Array(hexToRgb('#FF9FFC')) },
                uCrestColor: { value: new Float32Array(hexToRgb('#FFFFFF')) }
            };

            const geometry = new Triangle(gl);
            const program = new Program(gl, { vertex: vert, fragment: frag, uniforms });
            const mesh = new Mesh(gl, { geometry, program });

            const setSize = () => {
                const rect = container.getBoundingClientRect();
                const w = Math.max(1, Math.floor(rect.width));
                const h = Math.max(1, Math.floor(rect.height));
                renderer.setSize(w, h);
                program.uniforms.iResolution.value[0] = gl.drawingBufferWidth;
                program.uniforms.iResolution.value[1] = gl.drawingBufferHeight;
            };

            window.addEventListener('resize', setSize);
            setSize();

            const currentMouse = [0.5, 0.5];
            const targetMouse = [0.5, 0.5];

            const onPointerMove = e => {
                targetMouse[0] = e.clientX / window.innerWidth;
                targetMouse[1] = 1.0 - (e.clientY / window.innerHeight);
            };
            const onPointerLeave = () => {
                targetMouse[0] = 0.5;
                targetMouse[1] = 0.5;
            };
            
            window.addEventListener('pointermove', onPointerMove);
            window.addEventListener('pointerleave', onPointerLeave);

            const t0 = performance.now();
            const render = t => {
                requestAnimationFrame(render);
                program.uniforms.iTime.value = (t - t0) * 0.001;
                
                const tx = uniforms.uEnableMouse.value ? targetMouse[0] : 0.5;
                const ty = uniforms.uEnableMouse.value ? targetMouse[1] : 0.5;
                
                currentMouse[0] += 0.05 * (tx - currentMouse[0]);
                currentMouse[1] += 0.05 * (ty - currentMouse[1]);
                
                program.uniforms.uMouse.value[0] = currentMouse[0];
                program.uniforms.uMouse.value[1] = currentMouse[1];
                
                renderer.render({ scene: mesh });
            };
            requestAnimationFrame(render);
        })();
    </script>

    <!-- Portfolio Modal Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('pf-modal');
            const closeBtn = document.getElementById('pf-modal-close');
            const detailBtns = document.querySelectorAll('.pf-detail-btn');

            if(!modal) return;

            // Open modal
            detailBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const title = this.getAttribute('data-title');
                    const image = this.getAttribute('data-image');
                    const techRaw = this.getAttribute('data-tech');
                    const problem = this.getAttribute('data-problem');
                    const solution = this.getAttribute('data-solution');
                    const result = this.getAttribute('data-result');
                    const demo = this.getAttribute('data-demo');
                    const repo = this.getAttribute('data-repo');

                    // Set header background
                    const headerOverlay = document.querySelector('.pf-modal-header-overlay');
                    if (image) {
                        headerOverlay.style.backgroundImage = `url('${image}')`;
                    } else {
                        headerOverlay.style.background = 'linear-gradient(135deg, #0d2137 0%, #0a3d62 100%)';
                    }

                    // Set texts
                    document.getElementById('pf-modal-title').textContent = title.toUpperCase();
                    document.getElementById('pf-modal-problem').textContent = problem;
                    document.getElementById('pf-modal-solution').textContent = solution;
                    document.getElementById('pf-modal-result').textContent = result;

                    // Set tags
                    const tagsContainer = document.getElementById('pf-modal-tags');
                    tagsContainer.innerHTML = '';
                    if (techRaw) {
                        try {
                            const tags = JSON.parse(techRaw);
                            tags.forEach(tag => {
                                const span = document.createElement('span');
                                span.className = 'pf-tech';
                                span.textContent = tag;
                                tagsContainer.appendChild(span);
                            });
                        } catch(e) {}
                    }

                    // Set links
                    const demoBtn = document.getElementById('pf-modal-demo');
                    if (demo) {
                        demoBtn.href = demo;
                        demoBtn.style.display = 'inline-flex';
                    } else {
                        demoBtn.style.display = 'none';
                    }

                    const repoBtn = document.getElementById('pf-modal-repo');
                    if (repo) {
                        repoBtn.href = repo;
                        repoBtn.style.display = 'inline-flex';
                    } else {
                        repoBtn.style.display = 'none';
                    }

                    // Show modal and prevent body scroll
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close modal functions
            const closeModal = () => {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            };

            closeBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    closeModal();
                }
            });
        });
    </script>
@endpush
