@extends('admin.layouts.app')
@section('title', 'Edit Anggota Tim')

@section('content')
<div class="page-header">
    <div><h1>Edit Anggota</h1><p>{{ $team->name }}</p></div>
    <a href="{{ route('admin.team.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.team.update', $team) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Nama Lengkap *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Role/Jabatan *</label>
                <input type="text" name="role" class="form-control" value="{{ old('role', $team->role) }}" required>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Bio Singkat *</label>
            <textarea name="bio" class="form-control" required>{{ old('bio', $team->bio) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Foto Profil</label>
                @if($team->photo)
                    <div style="margin-bottom: 8px;">
                        <img src="{{ $team->photo_url }}" alt="" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; border: 2px solid var(--gold);">
                    </div>
                @endif
                <input type="file" name="photo" class="form-control" accept="image/*">
                @error('photo')<div class="form-error">{{ $message }}</div>@enderror
                <div class="form-hint" style="margin-top: 4px;">
                    Kosongkan untuk mempertahankan foto saat ini.<br>
                    <span style="color: #b4bed2;"><strong>Rekomendasi Format:</strong> Gambar transparan (PNG) dengan aspek rasio 1:1 atau vertikal (misal: 400x500px), menampilkan separuh badan.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Warna Border *</label>
                <select name="border_color" class="form-control" required>
                    <option value="blue" {{ $team->border_color === 'blue' ? 'selected' : '' }}>Biru (Blue)</option>
                    <option value="gold" {{ $team->border_color === 'gold' ? 'selected' : '' }}>Emas (Gold)</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">GitHub URL</label>
                <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $team->github_url) }}">
            </div>
            <div class="form-group">
                <label class="form-label">LinkedIn URL</label>
                <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $team->linkedin_url) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $team->email) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Instagram URL</label>
                <input type="url" name="instagram_url" class="form-control" value="{{ old('instagram_url', $team->instagram_url) }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Website URL</label>
                <input type="url" name="website_url" class="form-control" value="{{ old('website_url', $team->website_url) }}">
            </div>
            <div class="form-group">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $team->sort_order) }}">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Keahlian / Skills (ikon orbit)</label>
            <input type="text" name="skills" class="form-control"
                   value="{{ old('skills', is_array($team->skills) ? implode(', ', $team->skills) : '') }}"
                   placeholder="Laravel, MySQL, Python, React, Docker">
            <div class="form-hint">Pisahkan dengan koma. Nama yang dikenali: Laravel, MySQL, PostgreSQL, Python, React, Vue, Node, Docker, Git, JavaScript, PHP, Linux, Security, Network, Cloud.</div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="is_active" name="is_active" {{ $team->is_active ? 'checked' : '' }}>
                <label for="is_active" style="color:var(--text-light);">Aktif</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Perbarui Anggota</button>
    </form>
</div>
@endsection
