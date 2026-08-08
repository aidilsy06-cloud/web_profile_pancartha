@extends('admin.layouts.app')
@section('title', 'Kelola Testimoni')

@section('content')
<div class="page-header">
    <div><h1>Testimoni</h1><p>Kelola kutipan dari klien dan dosen</p></div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Testimoni</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Kutipan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $t)
            <tr>
                <td>
                    @if($t->author_photo)
                        <img src="{{ $t->photo_url }}" alt="" style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
                    @else
                        <div style="width:40px;height:40px;border-radius:50%;background:var(--bg-dark);display:flex;align-items:center;justify-content:center;color:var(--text-muted);"><i data-feather="user"></i></div>
                    @endif
                </td>
                <td style="font-weight:600;">{{ $t->author_name }}</td>
                <td style="color:var(--text-muted);font-size:0.82rem;">{{ $t->author_role }}</td>
                <td style="color:var(--text-muted);max-width:260px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $t->quote }}</td>
                <td>
                    <span class="badge {{ $t->is_active ? 'badge-active' : 'badge-inactive' }}">
                        {{ $t->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-secondary btn-sm"><i data-feather="edit-2" style="width: 14px; height: 14px;"></i></a>
                    <form class="delete-form" action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash-2" style="width: 14px; height: 14px;"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" style="text-align:center;color:var(--text-muted);padding:30px;">Belum ada testimoni.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
