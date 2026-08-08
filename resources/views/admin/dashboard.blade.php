@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div>
        <h1>Dashboard</h1>
        <p>Selamat datang kembali, <strong style="color: var(--gold);">{{ auth()->user()->name }}</strong></p>
    </div>
</div>

@push('styles')
<style>
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px;
        text-decoration: none;
        display: block;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
        box-shadow: var(--shadow-card);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--gold), var(--gold-light));
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        border-color: rgba(212,168,83,0.4);
        transform: translateY(-3px);
        box-shadow: 0 8px 32px rgba(0,0,0,0.4), 0 0 20px rgba(212,168,83,0.1);
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-icon {
        width: 40px; height: 40px;
        background: var(--gold-dim);
        border: 1px solid rgba(212,168,83,0.25);
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gold);
        margin-bottom: 14px;
    }

    .stat-count {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--gold), var(--gold-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        margin-bottom: 6px;
    }

    .stat-label {
        font-size: 0.8rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    .quick-access-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
</style>
@endpush

<div class="stat-grid">
    @foreach([
        ['label' => 'Layanan',      'count' => $counts['services'],     'icon' => 'shield',       'route' => 'admin.services.index'],
        ['label' => 'Proyek',       'count' => $counts['projects'],     'icon' => 'folder',       'route' => 'admin.projects.index'],
        ['label' => 'Anggota Tim',  'count' => $counts['team'],         'icon' => 'users',        'route' => 'admin.team.index'],
        ['label' => 'Statistik',    'count' => $counts['stats'],        'icon' => 'bar-chart-2',  'route' => 'admin.stats.index'],
        ['label' => 'Teknologi',    'count' => $counts['technologies'], 'icon' => 'cpu',          'route' => 'admin.technologies.index'],
        ['label' => 'Testimoni',    'count' => $counts['testimonials'], 'icon' => 'message-circle','route'=> 'admin.testimonials.index'],
    ] as $item)
    <a href="{{ route($item['route']) }}" class="stat-card">
        <div class="stat-icon">
            <i data-feather="{{ $item['icon'] }}" style="width:18px;height:18px;"></i>
        </div>
        <div class="stat-count">{{ $item['count'] }}</div>
        <div class="stat-label">{{ $item['label'] }}</div>
    </a>
    @endforeach
</div>

<div class="admin-card">
    <div class="admin-card-title">
        <i data-feather="zap" style="width:16px;height:16px;color:var(--gold);"></i>
        Akses Cepat
    </div>
    <div class="quick-access-grid">
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            <i data-feather="sliders" style="width:14px;height:14px;"></i> Edit Hero & About
        </a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-secondary">
            <i data-feather="plus" style="width:14px;height:14px;"></i> Tambah Proyek
        </a>
        <a href="{{ route('admin.team.create') }}" class="btn btn-secondary">
            <i data-feather="user-plus" style="width:14px;height:14px;"></i> Tambah Anggota
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-secondary">
            <i data-feather="plus" style="width:14px;height:14px;"></i> Tambah Testimoni
        </a>
        <a href="{{ route('admin.services.create') }}" class="btn btn-secondary">
            <i data-feather="plus" style="width:14px;height:14px;"></i> Tambah Layanan
        </a>
    </div>
</div>
@endsection

