@extends('admin.layouts.app')
@section('title', 'Tambah Layanan')

@section('content')
<div class="page-header">
    <div>
        <h1>Tambah Layanan</h1>
        <p>Tambahkan card layanan/keahlian baru</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label">Judul Layanan *</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')<div class="form-error">{{ $message }}</div>@enderror
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Tipe Icon *</label>
                <select name="icon_type" id="icon_type" class="form-control" onchange="toggleIconFields()">
                    <option value="emoji" {{ old('icon_type') == 'emoji' ? 'selected' : '' }}>Emoji / Teks</option>
                    <option value="feather" {{ old('icon_type') == 'feather' ? 'selected' : '' }}>Feather Icon</option>
                    <option value="image" {{ old('icon_type') == 'image' ? 'selected' : '' }}>Upload Gambar / SVG</option>
                </select>
                @error('icon_type')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group" id="field_icon_text">
                <label class="form-label" id="label_icon_text">Emoji / Nama Icon</label>
                <input type="text" name="icon_text" class="form-control" value="{{ old('icon_text') }}">
                <div class="form-hint" id="hint_icon_text">Masukkan emoji (contoh: 🚀)</div>
                @error('icon_text')<div class="form-error">{{ $message }}</div>@enderror
            </div>
            <div class="form-group" id="field_icon_image" style="display: none;">
                <label class="form-label">Upload Icon</label>
                <input type="file" name="icon_image" class="form-control" accept="image/*,.svg">
                <div class="form-hint">Format didukung: JPG, PNG, GIF, SVG. Ukuran kecil direkomendasikan.</div>
                @error('icon_image')<div class="form-error">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi *</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')<div class="form-error">{{ $message }}</div>@enderror
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Urutan Tampil</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
            </div>
            <div class="form-group" style="display: flex; align-items: flex-end; padding-bottom: 4px;">
                <div class="form-check">
                    <input type="checkbox" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label for="is_active" style="color: var(--text-light); font-size: 0.9rem;">Aktifkan layanan ini</label>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Simpan Layanan</button>
    </form>
</div>

<script>
function toggleIconFields() {
    const type = document.getElementById('icon_type').value;
    const fieldText = document.getElementById('field_icon_text');
    const fieldImage = document.getElementById('field_icon_image');
    const labelText = document.getElementById('label_icon_text');
    const hintText = document.getElementById('hint_icon_text');
    
    if (type === 'image') {
        fieldText.style.display = 'none';
        fieldImage.style.display = 'block';
    } else {
        fieldText.style.display = 'block';
        fieldImage.style.display = 'none';
        if (type === 'feather') {
            labelText.innerText = 'Nama Feather Icon';
            hintText.innerText = 'Gunakan nama Feather Icon (contoh: shield, zap, lock)';
        } else {
            labelText.innerText = 'Emoji / Teks';
            hintText.innerText = 'Masukkan emoji (contoh: 🚀, 💻)';
        }
    }
}
// Run on load
document.addEventListener('DOMContentLoaded', toggleIconFields);
</script>
@endsection
