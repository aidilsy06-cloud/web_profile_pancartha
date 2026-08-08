@extends('admin.layouts.app')
@section('title', 'Pengaturan Konten')

@section('content')
<div class="page-header">
    <div>
        <h1>Pengaturan Konten</h1>
        <p>Edit teks Hero, Tentang Kami, Kontak, dan Media Sosial</p>
    </div>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST">
    @csrf

    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="zap"></i> Section Hero</div>
        <div class="form-group">
            <label class="form-label">Badge/Label Hero</label>
            <input type="text" name="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Judul Utama Hero</label>
            <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Deskripsi Hero</label>
            <textarea name="hero_desc" class="form-control">{{ $settings['hero_desc'] ?? '' }}</textarea>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="info"></i> Section Tentang Kami</div>
        <div class="form-group">
            <label class="form-label">Judul About</label>
            <input type="text" name="about_title" class="form-control" value="{{ $settings['about_title'] ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Deskripsi About</label>
            <textarea name="about_desc" class="form-control" style="min-height: 130px;">{{ $settings['about_desc'] ?? '' }}</textarea>
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="phone"></i> Section Kontak</div>
        <div class="form-group">
            <label class="form-label">Judul CTA Kontak</label>
            <input type="text" name="contact_cta_title" class="form-control" value="{{ $settings['contact_cta_title'] ?? '' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Deskripsi CTA Kontak</label>
            <textarea name="contact_cta_desc" class="form-control">{{ $settings['contact_cta_desc'] ?? '' }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">WhatsApp (format: +628xxx)</label>
                <input type="text" name="contact_whatsapp" class="form-control" value="{{ $settings['contact_whatsapp'] ?? '' }}">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Alamat</label>
            <input type="text" name="contact_address" class="form-control" value="{{ $settings['contact_address'] ?? '' }}">
        </div>
    </div>

    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="share-2"></i> Media Sosial</div>
        <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 20px;">Kosongkan kolom jika tidak ingin menampilkan ikon tersebut di footer.</p>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">📸 Instagram (URL)</label>
                <input type="url" name="social_instagram" class="form-control" placeholder="https://instagram.com/username" value="{{ $settings['social_instagram'] ?? '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">🎵 TikTok (URL)</label>
                <input type="url" name="social_tiktok" class="form-control" placeholder="https://tiktok.com/@username" value="{{ $settings['social_tiktok'] ?? '' }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">▶️ YouTube (URL)</label>
                <input type="url" name="social_youtube" class="form-control" placeholder="https://youtube.com/@channel" value="{{ $settings['social_youtube'] ?? '' }}">
            </div>
            <div class="form-group">
                <label class="form-label">𝕏 Twitter / X (URL)</label>
                <input type="url" name="social_twitter" class="form-control" placeholder="https://x.com/username" value="{{ $settings['social_twitter'] ?? '' }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">💼 LinkedIn (URL)</label>
                <input type="url" name="social_linkedin" class="form-control" placeholder="https://linkedin.com/in/username" value="{{ $settings['social_linkedin'] ?? '' }}">
            </div>
            <div class="form-group"></div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Simpan Semua Pengaturan</button>
</form>
@endsection
