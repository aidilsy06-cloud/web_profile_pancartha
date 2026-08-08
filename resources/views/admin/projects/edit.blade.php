@extends('admin.layouts.app')
@section('title', 'Edit Proyek')

@section('content')
<div class="page-header">
    <div><h1>Edit Proyek</h1><p>{{ $project->name }}</p></div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group">
            <label class="form-label">Nama Proyek *</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Teknologi (pisahkan koma)</label>
            <input type="text" name="tech_stack" class="form-control" value="{{ old('tech_stack', $project->tech_stack) }}" required>
        </div>
        <div class="form-group">
            <label class="form-label">Masalah *</label>
            <textarea name="problem" class="form-control" required>{{ old('problem', $project->problem) }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Solusi *</label>
            <textarea name="solution" class="form-control" required>{{ old('solution', $project->solution) }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Hasil *</label>
            <textarea name="result" class="form-control" required>{{ old('result', $project->result) }}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">URL Demo</label>
                <input type="url" name="demo_url" class="form-control" value="{{ old('demo_url', $project->demo_url) }}">
            </div>
            <div class="form-group">
                <label class="form-label">URL Repository</label>
                <input type="url" name="repo_url" class="form-control" value="{{ old('repo_url', $project->repo_url) }}">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Gambar Proyek</label>
            @if($project->image)
                <div style="margin-bottom: 8px;">
                    <img src="{{ asset('storage/'.$project->image) }}" alt="" style="height: 100px; border-radius: 8px; border: 1px solid rgba(62,109,168,0.3);">
                </div>
            @elseif($project->image === null && file_exists(public_path('assets/lamr-mockup.png')))
                <div style="margin-bottom: 8px; font-size:0.82rem; color: var(--text-muted);">Gambar saat ini: default (lamr-mockup.png)</div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <div class="form-hint">Kosongkan untuk mempertahankan gambar saat ini.</div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $project->sort_order) }}">
            </div>
            <div class="form-group" style="display:flex; align-items:flex-end; padding-bottom:4px;">
                <div class="form-check">
                    <input type="checkbox" id="is_active" name="is_active" {{ $project->is_active ? 'checked' : '' }}>
                    <label for="is_active" style="color:var(--text-light);">Aktif</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i data-feather="save" style="width: 16px; height: 16px;"></i> Perbarui Proyek</button>
    </form>
</div>
@endsection
