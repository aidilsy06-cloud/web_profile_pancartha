<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Panca Artha - Tim IT, Pengembangan Web, dan Keamanan Sistem Informasi Profesional dari Politeknik Negeri Bengkalis. Mengamankan dan mewujudkan visi digital Anda.">
    <title>Panca Artha | Solusi IT &amp; Pengembangan Web Polbeng</title>
    
    <!-- Aset CSS & JS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

    <!-- Efek Latar Belakang Bersinar (Glow Orbs) -->
    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>
    <div class="bg-glow-3"></div>

    <!-- Navigasi Melayang -->
    <div class="header-wrapper">
        <header class="navbar">
            <a href="#home" class="logo">
                <div class="logo-icon">PA</div>
                Panca<span>Artha</span>
            </a>
            
            <button class="menu-toggle" id="menu-toggle-btn" aria-label="Toggle menu">&#9776;</button>
            
            <nav class="nav-menu">
                <a href="#home" class="nav-link active">Beranda</a>
                <a href="#about" class="nav-link">Tentang Kami</a>
                <a href="#services" class="nav-link">Layanan</a>
                <a href="#project" class="nav-link">Studi Kasus</a>
                <a href="#team" class="nav-link">Tim Kami</a>
                <a href="#contact" class="nav-cta">Konsultasi Sekarang</a>
            </nav>
        </header>
    </div>

    <!-- Konten Utama -->
    <main>
        
        <!-- Hero Section -->
        <section class="hero" id="home">
            <div class="container hero-grid">
                <div class="hero-content">
                    <div class="polbeng-badge">
                        <!-- Ikon Kunci Pengaman -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert"><path d="M20 13c0 5-3.5 7.5-7.66 9.7a1 1 0 0 1-.68 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                        Spesialis Keamanan Sistem Informasi Polbeng
                    </div>
                    <h1 class="hero-title">
                        Mengamankan &amp; Mewujudkan <span>Visi Digital</span> Anda
                    </h1>
                    <p class="hero-desc">
                        Kami adalah Panca Artha: kelompok spesialis pengembangan IT &amp; pemrograman web dari program studi Keamanan Sistem Informasi, Politeknik Negeri Bengkalis. Kami merancang sistem web yang tangguh, aman, dan memukau secara visual.
                    </p>
                    <div class="hero-btns">
                        <a href="#project" class="btn-primary">
                            Lihat Karya Kami
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                        </a>
                        <a href="#contact" class="btn-secondary">Hubungi Kami</a>
                    </div>
                    <div class="hero-rating">
                        <div class="stars">★★★★★</div>
                        <div class="rating-text">Standar pengkodean aman bersertifikat. <strong>100% Kepercayaan Klien.</strong></div>
                    </div>
                </div>
                
                <div class="hero-media">
                    <div class="hero-shape-container">
                        <img src="{{ asset('assets/hero-cyber.png') }}" alt="Ilustrasi Keamanan Siber" class="hero-image">
                    </div>
                    <div class="hero-overlay-badge">
                        <div class="badge-num" id="years-xp">100%</div>
                        <div class="badge-text">Aman &amp;<br>Teruji</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Counter Section -->
        <section class="stats">
            <div class="container stats-grid">
                <div class="stat-item">
                    <span class="stat-num highlight" data-target="5" data-suffix="+">0+</span>
                    <span class="stat-label">Spesialis Keamanan &amp; Dev</span>
                </div>
                <div class="stat-item">
                    <span class="stat-num" data-target="100" data-suffix="%">0%</span>
                    <span class="stat-label">Jaminan Kode Aman</span>
                </div>
                <div class="stat-item">
                    <span class="stat-num" data-target="1" data-suffix="+">0+</span>
                    <span class="stat-label">Portal Budaya Utama</span>
                </div>
                <div class="stat-item">
                    <span class="stat-num highlight" data-target="100" data-suffix="%">0%</span>
                    <span class="stat-label">Kepuasan Klien</span>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about" id="about">
            <div class="container about-grid">
                <div class="about-left">
                    <div class="about-img-wrap">
                        <img src="{{ asset('assets/hero-cyber.png') }}" alt="Kerja tim IT">
                    </div>
                    <div class="about-img-wrap">
                        <img src="{{ asset('assets/cta-character.png') }}" alt="Analisis Keamanan">
                    </div>
                </div>
                <div class="about-right">
                    <span class="section-subtitle">Siapa Kami</span>
                    <h3>Mengubah Kompleksitas Menjadi Karya Digital yang Aman</h3>
                    <p>
                        Lahir dari program studi Keamanan Sistem Informasi (KSI) di Politeknik Negeri Bengkalis, Panca Artha menjembatani celah antara rekayasa web tingkat tinggi dan kepatuhan keamanan yang solid.
                    </p>
                    <p>
                        Kami tidak sekadar membangun situs web yang dapat berfungsi; kami memperkuat sistemnya dari ancaman luar, mengoptimalkan struktur basis data, serta merancang antarmuka pengguna premium yang disesuaikan dengan kebutuhan organisasi Anda.
                    </p>
                    <div class="about-features">
                        <div class="about-feature-item">
                            <div class="feature-icon">✔</div>
                            <div class="feature-content">
                                <h4>Keunggulan Akademik, Eksekusi Realistis</h4>
                                <p>Terlatih dalam standar keamanan, enkripsi data, analisis kerentanan sistem, dan framework modern Laravel.</p>
                            </div>
                        </div>
                        <div class="about-feature-item">
                            <div class="feature-icon">✔</div>
                            <div class="feature-content">
                                <h4>Implementasi Portofolio Terbukti</h4>
                                <p>Telah sukses merancang dan menyelesaikan website resmi untuk Lembaga Adat Melayu Riau (LAMR) Kabupaten Bengkalis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Interactive Services Section -->
        <section class="services" id="services">
            <div class="container">
                <div class="section-header">
                    <span class="section-subtitle">Keahlian Kami</span>
                    <h2 class="section-title">Layanan <span>Profesional Kami</span></h2>
                </div>
                
                <div class="services-layout">
                    <div class="services-list">
                        <!-- Service 1 -->
                        <div class="service-tab active" data-service="web-dev">
                            <div class="service-num">01</div>
                            <div class="service-info">
                                <h3>Pengembangan Web Aman</h3>
                                <p>Frontend dan backend interaktif, berkinerja tinggi, dan premium yang dibangun di atas framework Laravel.</p>
                            </div>
                        </div>
                        
                        <!-- Service 2 -->
                        <div class="service-tab" data-service="uiux">
                            <div class="service-num">02</div>
                            <div class="service-info">
                                <h3>Desain UI/UX &amp; Interaktif</h3>
                                <p>Merancang tata letak website estetis bertema gelap, grafis khusus, dan pengalaman pengguna yang halus.</p>
                            </div>
                        </div>
                        
                        <!-- Service 3 -->
                        <div class="service-tab" data-service="network">
                            <div class="service-num">03</div>
                            <div class="service-info">
                                <h3>Pengerasan Jaringan &amp; Basis Data</h3>
                                <p>Perlindungan SQL injection, pengelolaan sertifikat SSL, enkripsi database, dan konfigurasi server.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="services-display">
                        <h3 class="services-display-title">Pengembangan Web Aman</h3>
                        <div class="services-display-img">
                            <img src="{{ asset('assets/lamr-mockup.png') }}" alt="Ilustrasi Layanan">
                        </div>
                        <p class="services-display-desc">
                            Kami merancang situs web dan portal web mutakhir dengan fokus kuat pada ketangguhan kode, pengiriman berkecepatan tinggi, dan kesempurnaan estetika. Portofolio utama kami adalah website resmi Lembaga Adat Melayu Riau (LAMR) Kabupaten Bengkalis.
                        </p>
                        <div class="services-display-links">
                            <a href="#project" class="btn-secondary">Lihat Studi Kasus</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Continuous Ticker Banner -->
        <div class="ticker-section">
            <div class="ticker-wrap">
                <div class="ticker-track">
                    <div class="ticker-item"><span>✦</span> PENGKODEAN AMAN</div>
                    <div class="ticker-item"><span>✦</span> KEAHLIAN LARAVEL</div>
                    <div class="ticker-item"><span>✦</span> POLITEKNIK NEGERI BENGKALIS</div>
                    <div class="ticker-item"><span>✦</span> DESAIN ESTETIS</div>
                    <div class="ticker-item"><span>✦</span> INTEGRITAS SISTEM</div>
                    <!-- Duplicate for marquee loop -->
                    <div class="ticker-item"><span>✦</span> PENGKODEAN AMAN</div>
                    <div class="ticker-item"><span>✦</span> KEAHLIAN LARAVEL</div>
                    <div class="ticker-item"><span>✦</span> POLITEKNIK NEGERI BENGKALIS</div>
                    <div class="ticker-item"><span>✦</span> DESAIN ESTETIS</div>
                    <div class="ticker-item"><span>✦</span> INTEGRITAS SISTEM</div>
                </div>
            </div>
        </div>

        <!-- Case Study Highlight Section -->
        <section class="case-study" id="project">
            <div class="container">
                <div class="section-header">
                    <span class="section-subtitle">Keberhasilan Terbaru Kami</span>
                    <h2 class="section-title">Studi <span>Kasus Terbaru</span></h2>
                </div>
                
                <div class="case-card">
                    <div class="case-grid">
                        <div class="case-info">
                            <div class="case-tags">
                                <span class="case-tag accent">Pengembangan Web</span>
                                <span class="case-tag">Keamanan Basis Data</span>
                                <span class="case-tag">Kolaborasi Polbeng</span>
                            </div>
                            <h3 class="case-title">Website Lembaga Adat Melayu Riau (LAMR) Kabupaten Bengkalis</h3>
                            <p class="case-desc">
                                Kami merancang, mengembangkan, dan meluncurkan portal budaya resmi untuk Lembaga Adat Melayu Riau (LAMR) Kabupaten Bengkalis. Portal ini berfungsi sebagai basis pengetahuan yang aman untuk tradisi lokal, hukum adat, dan berita komunitas.
                            </p>
                            <div class="case-features">
                                <div class="case-feature-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                                    Protokol pencegahan XSS dan SQL Injection yang tangguh
                                </div>
                                <div class="case-feature-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                                    Arsitektur visual budaya yang modern dan responsif
                                </div>
                                <div class="case-feature-row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                                    Pengiriman aset gambar yang optimal untuk daerah kabupaten
                                </div>
                            </div>
                            <a href="#contact" class="btn-primary">Ajukan Proyek Serupa</a>
                        </div>
                        
                        <div class="case-mockup">
                            <img src="{{ asset('assets/lamr-mockup.png') }}" alt="Mockup Portal Web LAMR Bengkalis">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Meet Our Experts Section -->
        <section class="team" id="team">
            <div class="container">
                <div class="section-header">
                    <span class="section-subtitle">Pengurus Panca Artha</span>
                    <h2 class="section-title">Kenali <span>Tim Kami</span></h2>
                </div>
                
                <!-- Upper grid: 3 members -->
                <div class="team-grid">
                    <!-- Akbar Maulana -->
                    <div class="team-card">
                        <div class="team-avatar-wrap">
                            <img src="{{ asset('assets/akbar.png') }}" alt="AKBAR MAULANA" class="team-avatar">
                        </div>
                        <h3 class="team-name">AKBAR MAULANA</h3>
                        <p class="team-role">Fullstack Developer</p>
                        <p class="team-bio">Mengelola logika frontend dan backend secara menyeluruh, menangani controller Laravel, dan mengintegrasikan skema basis data.</p>
                        <div class="team-socials">
                            <a href="#" class="social-btn" aria-label="GitHub">GH</a>
                            <a href="#" class="social-btn" aria-label="LinkedIn">LN</a>
                            <a href="#" class="social-btn" aria-label="Email">✉</a>
                        </div>
                    </div>
                    
                    <!-- Irfan Iswandi -->
                    <div class="team-card">
                        <div class="team-avatar-wrap">
                            <img src="{{ asset('assets/irfan.png') }}" alt="IRFAN ISWANDI" class="team-avatar">
                        </div>
                        <h3 class="team-name">IRFAN ISWANDI</h3>
                        <p class="team-role">Project Manager</p>
                        <p class="team-bio">Mengoordinasikan alur kerja, mengatur linimasa proyek, dan menyelaraskan tujuan klien dengan target tim.</p>
                        <div class="team-socials">
                            <a href="#" class="social-btn" aria-label="GitHub">GH</a>
                            <a href="#" class="social-btn" aria-label="LinkedIn">LN</a>
                            <a href="#" class="social-btn" aria-label="Email">✉</a>
                        </div>
                    </div>
                    
                    <!-- Mhd. Aidil Syahron -->
                    <div class="team-card">
                        <div class="team-avatar-wrap">
                            <img src="{{ asset('assets/aidil.png') }}" alt="MHD. AIDIL SYAHRON" class="team-avatar">
                        </div>
                        <h3 class="team-name">MHD. AIDIL SYAHRON</h3>
                        <p class="team-role">Documentation &amp; Frontend Dev</p>
                        <p class="team-bio">Menulis spesifikasi teknis, melacak log basis kode, dan membantu mengimplementasikan fitur frontend yang memukau.</p>
                        <div class="team-socials">
                            <a href="#" class="social-btn" aria-label="GitHub">GH</a>
                            <a href="#" class="social-btn" aria-label="LinkedIn">LN</a>
                            <a href="#" class="social-btn" aria-label="Email">✉</a>
                        </div>
                    </div>
                </div>
                
                <!-- Lower grid: 2 members -->
                <div class="team-grid-bottom">
                    <!-- Masnidar Akmi -->
                    <div class="team-card">
                        <div class="team-avatar-wrap">
                            <img src="{{ asset('assets/masnidar.png') }}" alt="MASNIDAR AKMI" class="team-avatar">
                        </div>
                        <h3 class="team-name">MASNIDAR AKMI</h3>
                        <p class="team-role">Documentation &amp; Database Specialist</p>
                        <p class="team-bio">Merancang tata letak basis data relasional, menulis dokumentasi sistem proyek, dan mengamankan skema basis data.</p>
                        <div class="team-socials">
                            <a href="#" class="social-btn" aria-label="GitHub">GH</a>
                            <a href="#" class="social-btn" aria-label="LinkedIn">LN</a>
                            <a href="#" class="social-btn" aria-label="Email">✉</a>
                        </div>
                    </div>
                    
                    <!-- Natasya -->
                    <div class="team-card">
                        <div class="team-avatar-wrap">
                            <img src="{{ asset('assets/natasya.png') }}" alt="NATASYA" class="team-avatar">
                        </div>
                        <h3 class="team-name">NATASYA</h3>
                        <p class="team-role">Frontend Developer</p>
                        <p class="team-bio">Merancang desain visual yang sangat responsif, mengoptimalkan kinerja antarmuka (UI), dan menyusun struktur layout.</p>
                        <div class="team-socials">
                            <a href="#" class="social-btn" aria-label="GitHub">GH</a>
                            <a href="#" class="social-btn" aria-label="LinkedIn">LN</a>
                            <a href="#" class="social-btn" aria-label="Email">✉</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <div class="section-header">
                    <span class="section-subtitle">Tanggapan Klien &amp; Dosen</span>
                    <h2 class="section-title">Apa Kata <span>Mereka</span></h2>
                </div>
                
                <div class="testimonials-grid">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-card">
                        <p class="testimonial-quote">
                            "Tim Panca Artha menunjukkan keterampilan teknis dan kedewasaan yang luar biasa. Mereka merancang website LAMR Bengkalis dengan estetika premium sembari tetap menghormati dan menampilkan nilai-nilai budaya Riau secara sempurna."
                        </p>
                        <div class="testimonial-user">
                            <img src="{{ asset('assets/masnidar.png') }}" alt="Klien" class="testimonial-avatar">
                            <div>
                                <h4 class="testimonial-name">Drs. H. Sofyan Said</h4>
                                <p class="testimonial-role">Perwakilan Pengurus Adat, LAMR Kabupaten Bengkalis</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-card">
                        <p class="testimonial-quote">
                            "Sebagai mahasiswa program studi Keamanan Sistem Informasi, mereka menerapkan standar pengkodean aman yang mutakhir. Portal budaya ini tangguh, cepat, dan sangat terlindungi dari kerentanan web pada umumnya."
                        </p>
                        <div class="testimonial-user">
                            <img src="{{ asset('assets/irfan.png') }}" alt="Dosen Pengampu" class="testimonial-avatar">
                            <div>
                                <h4 class="testimonial-name">Tengku Musri, M.Kom</h4>
                                <p class="testimonial-role">Dosen Keamanan Siber, Politeknik Negeri Bengkalis</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer Wave Banner -->
    <footer class="footer">
        <div class="container">
            <div class="footer-simple-wrap" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 20px; text-align: center; padding-bottom: 40px;">
                <div class="logo" style="color: var(--bg-dark); font-size: 1.6rem; margin-bottom: 10px;">
                    <div class="logo-icon" style="background: var(--bg-dark); color: var(--primary);">PA</div>
                    Panca<span>Artha</span>
                </div>
                <div class="footer-simple-contacts" style="display: flex; gap: 40px; font-size: 1.1rem; font-weight: 600; flex-wrap: wrap; justify-content: center;">
                    <a href="mailto:pancaartha@gmail.com" class="contact-link" style="display: flex; align-items: center; gap: 10px; transition: var(--transition-smooth); color: var(--bg-dark);">
                        <span>✉</span> pancaartha@gmail.com
                    </a>
                    <a href="tel:+6282284123456" class="contact-link" style="display: flex; align-items: center; gap: 10px; transition: var(--transition-smooth); color: var(--bg-dark);">
                        <span>📞</span> +62 822-8412-3456
                    </a>
                </div>
            </div>
            
            <div class="footer-bottom" style="border-top: 1px solid rgba(0, 0, 0, 0.08); padding-top: 25px; display: flex; justify-content: center; align-items: center;">
                <p>&copy; 2026 Panca Artha. Semua Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

</body>
</html>
