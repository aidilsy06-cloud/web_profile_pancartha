@extends('admin.layouts.app')
@section('title', 'Kelola Tim')

@section('content')
<div class="page-header">
    <div><h1>Tim Kami</h1><p>Kelola profil anggota tim Panca Artha</p></div>
    <a href="{{ route('admin.team.create') }}" class="btn btn-primary"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Anggota</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Border</th>
                <th>Urutan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>
                    <img src="{{ $member->photo_url }}" alt=""
                         style="width: 42px; height: 42px; border-radius: 50%; object-fit: cover; border: 2px solid {{ $member->border_color === 'gold' ? 'var(--gold)' : 'var(--blue)' }};">
                </td>
                <td style="font-weight: 600;">{{ $member->name }}</td>
                <td style="color: var(--text-muted);">{{ $member->role }}</td>
                <td>
                    <span style="display:inline-block; width: 14px; height: 14px; border-radius: 50%; background: {{ $member->border_color === 'gold' ? 'var(--gold)' : 'var(--blue)' }};"></span>
                    {{ ucfirst($member->border_color) }}
                </td>
                <td>{{ $member->sort_order }}</td>
                <td>
                    <span class="badge {{ $member->is_active ? 'badge-active' : 'badge-inactive' }}">
                        {{ $member->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.team.edit', $member) }}" class="btn btn-secondary btn-sm"><i data-feather="edit-2" style="width: 14px; height: 14px;"></i> Edit</a>
                    <form class="delete-form" action="{{ route('admin.team.destroy', $member) }}" method="POST" onsubmit="return confirm('Hapus anggota ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash-2" style="width: 14px; height: 14px;"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center; color:var(--text-muted); padding:30px;">Belum ada anggota tim.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
