@extends('admin.layouts.app')
@section('title', 'Tambah Testimoni')

@section('content')
<div class="page-header">
    <div><h1>Tambah Testimoni</h1></div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label">Kutipan / Quote *</label>
            <textarea name="quote" class="form-control" required placeholder='"Tulis kutipan dari klien atau dosen di sini..."'>{{ old('quote') }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Nama *</label>
                <input type="text" name="author_name" class="form-control" value="{{ old('author_name') }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Jabatan/Peran *</label>
                <input type="text" name="author_role" class="form-control" value="{{ old('author_role') }}" placeholder="Dosen Pembimbing, Polbeng" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Foto (opsional)</label>
                <input type="file" name="author_photo" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="is_active" name="is_active" checked>
                <label for="is_active" style="color:var(--text-light);">Aktif</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Simpan Testimoni</button>
    </form>
</div>
@endsection
