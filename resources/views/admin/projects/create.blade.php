@extends('admin.layouts.app')
@section('title', 'Tambah Proyek')

@section('content')
<div class="page-header">
    <div><h1>Tambah Proyek</h1><p>Tambahkan studi kasus atau portofolio baru</p></div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label">Nama Proyek *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Teknologi yang Digunakan * <span style="font-weight:400; text-transform:none;">(pisahkan dengan koma)</span></label>
            <input type="text" name="tech_stack" class="form-control" value="{{ old('tech_stack') }}" placeholder="Laravel, MySQL, CSS3, JavaScript" required>
        </div>
        <div class="form-group">
            <label class="form-label">Masalah / Problem *</label>
            <textarea name="problem" class="form-control" required placeholder="Jelaskan masalah yang dihadapi klien...">{{ old('problem') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Solusi yang Diterapkan *</label>
            <textarea name="solution" class="form-control" required placeholder="Jelaskan solusi yang diberikan tim...">{{ old('solution') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Hasil / Outcome *</label>
            <textarea name="result" class="form-control" required placeholder="Jelaskan hasil akhir yang dicapai...">{{ old('result') }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">URL Demo (opsional)</label>
                <input type="url" name="demo_url" class="form-control" value="{{ old('demo_url') }}" placeholder="https://...">
            </div>
            <div class="form-group">
                <label class="form-label">URL Repository (opsional)</label>
                <input type="url" name="repo_url" class="form-control" value="{{ old('repo_url') }}" placeholder="https://github.com/...">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Gambar Proyek (opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            <div class="form-hint">Format: JPG, PNG, WebP. Maks 2MB.</div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div class="form-group" style="display:flex; align-items:flex-end; padding-bottom:4px;">
                <div class="form-check">
                    <input type="checkbox" id="is_active" name="is_active" checked>
                    <label for="is_active" style="color:var(--text-light);">Aktif</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Simpan Proyek</button>
    </form>
</div>
@endsection
