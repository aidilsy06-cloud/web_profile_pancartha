<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Stat;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@pancaartha.com'],
            [
                'name' => 'Admin Panca Artha',
                'password' => Hash::make('pancaartha2026'),
            ]
        );

        // Site Settings
        $settings = [
            'hero_title' => 'Mengamankan & Mewujudkan Visi Digital Anda',
            'hero_subtitle' => 'Spesialis Keamanan Sistem Informasi Polbeng',
            'hero_desc' => 'Kami adalah Panca Artha: kelompok spesialis pengembangan IT & pemrograman web dari program studi Keamanan Sistem Informasi, Politeknik Negeri Bengkalis. Kami merancang sistem web yang tangguh, aman, dan memukau secara visual.',
            'about_title' => 'Mengubah Kompleksitas Menjadi Karya Digital yang Aman',
            'about_desc' => 'Lahir dari program studi Keamanan Sistem Informasi (KSI) di Politeknik Negeri Bengkalis, Panca Artha menjembatani celah antara rekayasa web tingkat tinggi dan kepatuhan keamanan yang solid. Kami tidak sekadar membangun situs web yang dapat berfungsi; kami memperkuat sistemnya dari ancaman luar, mengoptimalkan struktur basis data, serta merancang antarmuka pengguna premium yang disesuaikan dengan kebutuhan organisasi Anda.',
            'contact_email' => 'pancaartha@gmail.com',
            'contact_whatsapp' => '+6282284123456',
            'contact_address' => 'Politeknik Negeri Bengkalis, Jl. Bathin Alam, Bengkalis, Riau',
            'contact_cta_title' => 'Siap Memulai Proyek Bersama Kami?',
            'contact_cta_desc' => 'Konsultasikan kebutuhan digital Anda dengan tim Panca Artha. Kami siap membantu mewujudkan solusi IT yang aman, handal, dan estetis.',
            'social_instagram' => '',
            'social_tiktok'    => '',
            'social_youtube'   => '',
            'social_twitter'   => '',
            'social_linkedin'  => '',
        ];
        foreach ($settings as $key => $value) {
            SiteSetting::set($key, $value);
        }

        // Services
        $services = [
            ['title' => 'Pengembangan Web Aman', 'icon' => '🛡️', 'description' => 'Frontend dan backend interaktif, berkinerja tinggi, dan premium dibangun di atas framework Laravel dengan standar keamanan OWASP.', 'sort_order' => 1],
            ['title' => 'Desain UI/UX & Interaktif', 'icon' => '🎨', 'description' => 'Merancang tata letak website estetis bertema gelap, grafis khusus, dan pengalaman pengguna yang halus dan responsif.', 'sort_order' => 2],
            ['title' => 'Keamanan Sistem & Database', 'icon' => '🔒', 'description' => 'Perlindungan SQL injection, XSS, pengelolaan sertifikat SSL, enkripsi database, dan hardening server.', 'sort_order' => 3],
            ['title' => 'Manajemen Database', 'icon' => '🗄️', 'description' => 'Merancang skema basis data relasional yang optimal, query efisien, backup strategi, dan dokumentasi sistem.', 'sort_order' => 4],
            ['title' => 'Dokumentasi Teknis', 'icon' => '📄', 'description' => 'Penulisan spesifikasi teknis lengkap, SRS, ERD, flowchart sistem, dan laporan proyek berstandar akademik.', 'sort_order' => 5],
            ['title' => 'Konsultasi IT & Keamanan', 'icon' => '💡', 'description' => 'Analisis kerentanan sistem, audit keamanan web, dan rekomendasi mitigasi risiko untuk organisasi dan institusi.', 'sort_order' => 6],
        ];
        Service::truncate();
        foreach ($services as $s) {
            Service::create($s);
        }

        // Projects
        Project::truncate();
        Project::create([
            'name' => 'Website Lembaga Adat Melayu Riau (LAMR) Bengkalis',
            'tech_stack' => 'Laravel, MySQL, CSS3, JavaScript, Bootstrap',
            'problem' => 'LAMR Kabupaten Bengkalis membutuhkan portal digital resmi untuk mendokumentasikan tradisi lokal, hukum adat, dan berita komunitas yang mudah diakses publik namun terlindungi dari ancaman siber.',
            'solution' => 'Kami merancang dan mengembangkan portal budaya berbasis Laravel dengan sistem CMS terintegrasi, protokol keamanan OWASP, enkripsi data sensitif, dan desain visual premium bertema budaya Melayu.',
            'result' => 'Website berhasil diluncurkan dengan performa optimal, zero kerentanan pada audit keamanan awal, dan mendapat respons positif dari pengurus LAMR serta dosen pembimbing Polbeng.',
            'demo_url' => null,
            'repo_url' => null,
            'image' => null,
            'sort_order' => 1,
        ]);

        // Team Members
        TeamMember::truncate();
        $team = [
            ['name' => 'Akbar Maulana', 'role' => 'Fullstack Developer', 'bio' => 'Mengelola logika frontend dan backend secara menyeluruh, menangani controller Laravel, dan mengintegrasikan skema basis data.', 'photo' => 'assets/akbar.png', 'border_color' => 'gold', 'sort_order' => 1],
            ['name' => 'Irfan Iswandi', 'role' => 'Project Manager', 'bio' => 'Mengoordinasikan alur kerja, mengatur linimasa proyek, dan menyelaraskan tujuan klien dengan target tim.', 'photo' => 'assets/irfan.png', 'border_color' => 'blue', 'sort_order' => 2],
            ['name' => 'Mhd. Aidil Syahron', 'role' => 'Documentation & Frontend Dev', 'bio' => 'Menulis spesifikasi teknis, melacak log basis kode, dan membantu mengimplementasikan fitur frontend yang memukau.', 'photo' => 'assets/aidil.png', 'border_color' => 'blue', 'sort_order' => 3],
            ['name' => 'Masnidar Akmi', 'role' => 'Documentation & Database Specialist', 'bio' => 'Merancang tata letak basis data relasional, menulis dokumentasi sistem proyek, dan mengamankan skema basis data.', 'photo' => 'assets/masnidar.png', 'border_color' => 'gold', 'sort_order' => 4],
            ['name' => 'Natasya', 'role' => 'Frontend Developer', 'bio' => 'Merancang desain visual yang sangat responsif, mengoptimalkan kinerja antarmuka (UI), dan menyusun struktur layout.', 'photo' => 'assets/natasya.png', 'border_color' => 'blue', 'sort_order' => 5],
        ];
        foreach ($team as $t) {
            TeamMember::create($t);
        }

        // Stats
        Stat::truncate();
        $stats = [
            ['label' => 'Proyek Selesai', 'value' => 3, 'suffix' => '+', 'is_highlighted' => true, 'sort_order' => 1],
            ['label' => 'Anggota Tim', 'value' => 5, 'suffix' => '', 'is_highlighted' => false, 'sort_order' => 2],
            ['label' => 'Teknologi Dikuasai', 'value' => 12, 'suffix' => '+', 'is_highlighted' => false, 'sort_order' => 3],
            ['label' => 'Kepuasan Klien', 'value' => 100, 'suffix' => '%', 'is_highlighted' => true, 'sort_order' => 4],
        ];
        foreach ($stats as $s) {
            Stat::create($s);
        }

        // Technologies
        Technology::truncate();
        $techs = [
            ['name' => 'Laravel', 'logo' => null, 'sort_order' => 1],
            ['name' => 'PHP', 'logo' => null, 'sort_order' => 2],
            ['name' => 'MySQL', 'logo' => null, 'sort_order' => 3],
            ['name' => 'JavaScript', 'logo' => null, 'sort_order' => 4],
            ['name' => 'HTML5', 'logo' => null, 'sort_order' => 5],
            ['name' => 'CSS3', 'logo' => null, 'sort_order' => 6],
            ['name' => 'Bootstrap', 'logo' => null, 'sort_order' => 7],
            ['name' => 'Git', 'logo' => null, 'sort_order' => 8],
            ['name' => 'Linux', 'logo' => null, 'sort_order' => 9],
            ['name' => 'Figma', 'logo' => null, 'sort_order' => 10],
            ['name' => 'OWASP', 'logo' => null, 'sort_order' => 11],
            ['name' => 'VS Code', 'logo' => null, 'sort_order' => 12],
        ];
        foreach ($techs as $t) {
            Technology::create($t);
        }

        // Testimonials
        Testimonial::truncate();
        Testimonial::create([
            'quote' => '"Tim Panca Artha menunjukkan keterampilan teknis dan kedewasaan yang luar biasa. Mereka merancang website LAMR Bengkalis dengan estetika premium sembari tetap menghormati dan menampilkan nilai-nilai budaya Riau secara sempurna."',
            'author_name' => 'Drs. H. Sofyan Said',
            'author_role' => 'Perwakilan Pengurus Adat, LAMR Kabupaten Bengkalis',
            'author_photo' => null,
            'sort_order' => 1,
        ]);
        Testimonial::create([
            'quote' => '"Sebagai mahasiswa program studi Keamanan Sistem Informasi, mereka menerapkan standar pengkodean aman yang mutakhir. Portal budaya ini tangguh, cepat, dan sangat terlindungi dari kerentanan web pada umumnya."',
            'author_name' => 'Tengku Musri, M.Kom',
            'author_role' => 'Dosen Keamanan Siber, Politeknik Negeri Bengkalis',
            'author_photo' => null,
            'sort_order' => 2,
        ]);
    }
}
