<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Panca Artha — Tim IT profesional dari Keamanan Sistem Informasi Politeknik Negeri Bengkalis. Spesialis pengembangan web aman, UI/UX, dan keamanan database.')">
    <title>@yield('title', 'Panca Artha | Solusi IT & Keamanan Sistem Informasi')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Ribbons Cursor Animation Container -->
    <div id="ribbons-container" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9999; pointer-events: none; overflow: hidden;"></div>

    <!-- Ambient Background -->
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>
    <div class="noise-overlay"></div>

    <!-- Navigation -->
    <div class="nav-wrapper" id="nav-wrapper">
        <header class="navbar" id="navbar">
            <a href="#home" class="nav-logo">
                <img src="{{ asset('logo-panca-artha.svg') }}" alt="Panca Artha Logo" class="logo-icon">
                <div class="nav-logo-text">
                    <span>Panca<span>Artha</span></span>
                    <span class="nav-logo-sub">IT & Security Solutions</span>
                </div>
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
        @yield('content')
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
                    <div class="footer-col">
                        <h4>Media Sosial</h4>
                        <div class="footer-social-row">

                          @if(!empty($settings['social_instagram']))
                          <a href="{{ $settings['social_instagram'] }}" class="tooltip tooltip--instagram" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg class="tooltip__label" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                              <path id="circlePath-ig" d="M 10 50 A 40 40 0 0 1 90 50"></path>
                              <text><textPath href="#circlePath-ig" startOffset="50%">Instagram</textPath></text>
                            </svg>
                            <svg class="tooltip__content" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                            </svg>
                          </a>
                          @endif

                          @if(!empty($settings['social_tiktok']))
                          <a href="{{ $settings['social_tiktok'] }}" class="tooltip tooltip--tiktok" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                            <svg class="tooltip__label" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                              <path id="circlePath-tt" d="M 10 50 A 40 40 0 0 1 90 50"></path>
                              <text><textPath href="#circlePath-tt" startOffset="50%">TikTok</textPath></text>
                            </svg>
                            <svg class="tooltip__content" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.76a4.85 4.85 0 0 1-1.01-.07z"/>
                            </svg>
                          </a>
                          @endif

                          @if(!empty($settings['social_youtube']))
                          <a href="{{ $settings['social_youtube'] }}" class="tooltip tooltip--youtube" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <svg class="tooltip__label" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                              <path id="circlePath-yt" d="M 10 50 A 40 40 0 0 1 90 50"></path>
                              <text><textPath href="#circlePath-yt" startOffset="50%">YouTube</textPath></text>
                            </svg>
                            <svg class="tooltip__content" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                          </a>
                          @endif

                          @if(!empty($settings['social_twitter']))
                          <a href="{{ $settings['social_twitter'] }}" class="tooltip tooltip--twitter" target="_blank" rel="noopener noreferrer" aria-label="Twitter / X">
                            <svg class="tooltip__label" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                              <path id="circlePath-tw" d="M 10 50 A 40 40 0 0 1 90 50"></path>
                              <text><textPath href="#circlePath-tw" startOffset="50%">Twitter / X</textPath></text>
                            </svg>
                            <svg class="tooltip__content" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.741l7.73-8.835L1.254 2.25H8.08l4.261 5.632 5.903-5.632zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                          </a>
                          @endif

                          @if(!empty($settings['social_linkedin']))
                          <a href="{{ $settings['social_linkedin'] }}" class="tooltip tooltip--linkedin" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg class="tooltip__label" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                              <path id="circlePath-li" d="M 10 50 A 40 40 0 0 1 90 50"></path>
                              <text><textPath href="#circlePath-li" startOffset="50%">LinkedIn</textPath></text>
                            </svg>
                            <svg class="tooltip__content" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                              <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                          </a>
                          @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© {{ date('Y') }} Panca Artha. Hak Cipta Dilindungi.</p>
                <a href="{{ route('admin.login') }}" class="footer-admin-link">Admin</a>
            </div>
        </div>
    </footer>


    @stack('modals')
    @stack('scripts')

    <script src="{{ asset('js/script.js') }}"></script>
    <script type="module" src="{{ asset('js/ribbons.js') }}"></script>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>feather.replace();</script>

</body>
</html>
