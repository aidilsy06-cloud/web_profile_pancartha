@extends('admin.layouts.app')
@section('title', 'Tools & Teknologi')

@section('content')
<div class="page-header">
    <div><h1>Tools & Teknologi</h1><p>Kelola strip logo teknologi di marquee website</p></div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
    <!-- Add form -->
    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Teknologi</div>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Teknologi *</label>
                <input type="text" name="name" class="form-control" placeholder="Laravel" required>
            </div>
            <div class="form-group">
                <label class="form-label">Logo (opsional)</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
                <div class="form-hint">Format: PNG/SVG. Maks 1MB. Jika tidak diisi, hanya nama yang ditampilkan.</div>
            </div>
            <div class="form-group">
                <label class="form-label">Urutan</label>
                <input type="number" name="sort_order" class="form-control" value="0">
            </div>
            <button type="submit" class="btn btn-primary"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah</button>
        </form>
    </div>

    <!-- List -->
    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="clipboard"></i> Daftar Teknologi</div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>Urutan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($technologies as $tech)
                <tr>
                    <td>
                        @if($tech->logo)
                            <img src="{{ $tech->logo_url }}" alt="{{ $tech->name }}" style="height: 28px; width: auto;">
                        @else
                            <span style="font-size: 1.2rem;">⬡</span>
                        @endif
                    </td>
                    <td style="font-weight:600;">{{ $tech->name }}</td>
                    <td style="color:var(--text-muted);">{{ $tech->sort_order }}</td>
                    <td>
                        <form class="delete-form" action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash-2" style="width: 14px; height: 14px;"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" style="text-align:center;color:var(--text-muted);padding:20px;">Belum ada teknologi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
