@extends('admin.layouts.app')
@section('title', 'Kelola Layanan')

@section('content')
<div class="page-header">
    <div>
        <h1>Layanan</h1>
        <p>Kelola card layanan dan keahlian yang ditampilkan di website</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
        <i data-feather="plus" style="width:15px;height:15px;"></i>
        Tambah Layanan
    </a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th style="width:48px;">#</th>
                <th style="width:60px;">Icon</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th style="width:90px; text-align:center;">Urutan</th>
                <th style="width:100px; text-align:center;">Status</th>
                <th style="width:140px; text-align:right;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td style="color: var(--text-muted); font-size:0.8rem;">{{ $service->id }}</td>
                <td>
                    <div class="icon-cell">
                        <i data-feather="{{ $service->icon }}" style="width:16px;height:16px;"></i>
                    </div>
                </td>
                <td style="font-weight: 600; font-family: 'Space Grotesk', sans-serif;">{{ $service->title }}</td>
                <td style="color: var(--text-muted); font-size: 0.85rem; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $service->description }}</td>
                <td style="text-align:center;">
                    <span style="display:inline-flex; align-items:center; justify-content:center; width:28px; height:28px; background:var(--accent-dim); border-radius:6px; font-size:0.8rem; font-weight:700; color:#7BA7F5;">{{ $service->sort_order }}</span>
                </td>
                <td style="text-align:center;">
                    <span class="badge {{ $service->is_active ? 'badge-active' : 'badge-inactive' }}">
                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </td>
                <td>
                    <div class="action-group" style="justify-content:flex-end;">
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary btn-sm">
                            <i data-feather="edit-2" style="width:13px;height:13px;"></i> Edit
                        </a>
                        <form class="delete-form" action="{{ route('admin.services.destroy', $service) }}" method="POST"
                              onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i data-feather="trash-2" style="width:13px;height:13px;"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i data-feather="shield" style="width:24px;height:24px;"></i>
                        </div>
                        <h3>Belum ada layanan</h3>
                        <p>Tambahkan layanan pertama untuk ditampilkan di website Anda</p>
                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                            <i data-feather="plus" style="width:14px;height:14px;"></i>
                            Tambah Layanan Pertama
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

