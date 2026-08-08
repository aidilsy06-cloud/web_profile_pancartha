@extends('admin.layouts.app')
@section('title', 'Kelola Proyek/Portofolio')

@section('content')
<div class="page-header">
    <div>
        <h1>Proyek & Portofolio</h1>
        <p>Kelola studi kasus dan portofolio tim</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Proyek</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Proyek</th>
                <th>Teknologi</th>
                <th>Demo</th>
                <th>Repo</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td style="font-weight: 600;">{{ $project->name }}</td>
                <td style="color: var(--text-muted); font-size: 0.8rem;">{{ Str::limit($project->tech_stack, 50) }}</td>
                <td>
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" style="color: var(--blue);">🔗 Demo</a>
                    @else
                        <span style="color: var(--text-muted);">—</span>
                    @endif
                </td>
                <td>
                    @if($project->repo_url)
                        <a href="{{ $project->repo_url }}" target="_blank" style="color: var(--blue);">📦 Repo</a>
                    @else
                        <span style="color: var(--text-muted);">—</span>
                    @endif
                </td>
                <td>
                    <span class="badge {{ $project->is_active ? 'badge-active' : 'badge-inactive' }}">
                        {{ $project->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary btn-sm"><i data-feather="edit-2" style="width: 14px; height: 14px;"></i> Edit</a>
                    <form class="delete-form" action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                          onsubmit="return confirm('Hapus proyek ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash-2" style="width: 14px; height: 14px;"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center; color: var(--text-muted); padding: 30px;">Belum ada proyek.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
