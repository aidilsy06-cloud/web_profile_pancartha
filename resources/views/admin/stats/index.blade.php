@extends('admin.layouts.app')
@section('title', 'Statistik Pencapaian')

@section('content')
<div class="page-header">
    <div><h1>Statistik</h1><p>Kelola angka pencapaian yang ditampilkan di website</p></div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
    <!-- Add New -->
    <div class="admin-card">
        <div class="admin-card-title"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah Statistik</div>
        <form action="{{ route('admin.stats.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Label</label>
                <input type="text" name="label" class="form-control" placeholder="Proyek Selesai" required>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nilai (angka)</label>
                    <input type="number" name="value" class="form-control" placeholder="10" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Suffix</label>
                    <input type="text" name="suffix" class="form-control" placeholder="+" maxlength="5">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Urutan</label>
                    <input type="number" name="sort_order" class="form-control" placeholder="0">
                </div>
                <div class="form-group" style="display:flex;align-items:flex-end;padding-bottom:4px;">
                    <div class="form-check">
                        <input type="checkbox" id="hl" name="is_highlighted">
                        <label for="hl" style="color:var(--text-light);">Sorot (warna emas)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i data-feather="plus" style="width: 16px; height: 16px;"></i> Tambah</button>
        </form>
    </div>

    <!-- List -->
    <div>
        @forelse($stats as $stat)
        <div class="admin-card" style="margin-bottom: 12px;">
            <form action="{{ route('admin.stats.update', $stat) }}" method="POST">
                @csrf @method('PUT')
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <span style="font-family: 'Space Mono', monospace; font-size: 1.4rem; color: {{ $stat->is_highlighted ? 'var(--gold)' : 'var(--text-light)' }};">
                        {{ $stat->value }}{{ $stat->suffix }}
                    </span>
                    <div style="display:flex; gap:6px;">
                        <button type="submit" class="btn btn-secondary btn-sm"><i data-feather="save" style="width: 16px; height: 16px;"></i></button>
                        <button type="submit" form="delete-form-{{ $stat->id }}" class="btn btn-danger btn-sm"><i data-feather="trash-2" style="width: 14px; height: 14px;"></i></button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group" style="margin-bottom:8px;">
                        <input type="text" name="label" class="form-control" value="{{ $stat->label }}" required>
                    </div>
                    <div class="form-group" style="margin-bottom:8px; display:flex; gap:8px;">
                        <input type="number" name="value" class="form-control" value="{{ $stat->value }}" required style="flex:2;">
                        <input type="text" name="suffix" class="form-control" value="{{ $stat->suffix }}" maxlength="5" style="flex:1;">
                        <input type="number" name="sort_order" class="form-control" value="{{ $stat->sort_order }}" style="flex:1;">
                    </div>
                </div>
                <div style="display:flex; gap:16px;">
                    <div class="form-check">
                        <input type="checkbox" name="is_highlighted" id="hl_{{ $stat->id }}" {{ $stat->is_highlighted ? 'checked' : '' }}>
                        <label for="hl_{{ $stat->id }}" style="color:var(--text-muted);font-size:0.82rem;">Sorot emas</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="is_active" id="act_{{ $stat->id }}" {{ $stat->is_active ? 'checked' : '' }}>
                        <label for="act_{{ $stat->id }}" style="color:var(--text-muted);font-size:0.82rem;">Aktif</label>
                    </div>
                </div>
            </form>
            <form id="delete-form-{{ $stat->id }}" action="{{ route('admin.stats.destroy', $stat) }}" method="POST" onsubmit="return confirm('Hapus?')" style="display:none;">
                @csrf @method('DELETE')
            </form>
        </div>
        @empty
        <div class="admin-card"><p style="color:var(--text-muted); text-align:center;">Belum ada statistik.</p></div>
        @endforelse
    </div>
</div>
@endsection
