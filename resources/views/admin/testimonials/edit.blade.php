@extends('admin.layouts.app')
@section('title', 'Edit Testimoni')

@section('content')
<div class="page-header">
    <div><h1>Edit Testimoni</h1><p>{{ $testimonial->author_name }}</p></div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label class="form-label">Kutipan *</label>
            <textarea name="quote" class="form-control" required>{{ old('quote', $testimonial->quote) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Nama *</label>
                <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $testimonial->author_name) }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Jabatan *</label>
                <input type="text" name="author_role" class="form-control" value="{{ old('author_role', $testimonial->author_role) }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Foto</label>
                @if($testimonial->author_photo)
                    <div style="margin-bottom:8px;">
                        <img src="{{ $testimonial->photo_url }}" alt="" style="width:50px;height:50px;border-radius:50%;object-fit:cover;">
                    </div>
                @endif
                <input type="file" name="author_photo" class="form-control" accept="image/*">
                <div class="form-hint">Kosongkan untuk mempertahankan foto saat ini.</div>
            </div>
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order) }}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="is_active" name="is_active" {{ $testimonial->is_active ? 'checked' : '' }}>
                <label for="is_active" style="color:var(--text-light);">Aktif</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Perbarui Testimoni</button>
    </form>
</div>
@endsection
