<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Panel Admin Panca Artha')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-deepest:   #080D18;
            --bg-dark:      #0D1526;
            --bg-card:      #111D33;
            --bg-card-hover:#152038;
            --bg-input:     #0A1120;

            --gold:         #D4A853;
            --gold-light:   #F0C97A;
            --gold-dim:     rgba(212,168,83,0.15);

            --accent:       #4E80EE;
            --accent-dim:   rgba(78,128,238,0.12);
            --accent-glow:  rgba(78,128,238,0.35);

            --emerald:      #34D399;
            --emerald-dim:  rgba(52,211,153,0.12);

            --rose:         #F87171;
            --rose-dim:     rgba(248,113,113,0.12);

            --border:       rgba(78,128,238,0.18);
            --border-light: rgba(78,128,238,0.08);

            --text-primary: #EEF2FF;
            --text-secondary:#A8B4D0;
            --text-muted:   #5A6A87;

            --sidebar-width: 265px;
            --topbar-height: 64px;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;

            --shadow-card: 0 4px 24px rgba(0,0,0,0.35);
            --shadow-glow: 0 0 24px rgba(78,128,238,0.12);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html, body {
            overflow-x: hidden;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-deepest);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg-deepest); }
        ::-webkit-scrollbar-thumb { background: rgba(78,128,238,0.3); border-radius: 99px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(78,128,238,0.5); }

        /* ─── SIDEBAR ──────────────────────────────── */
        .admin-sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #0D1526 0%, #091020 100%);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 200;
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 4px 0 32px rgba(0,0,0,0.4);
        }

        /* ─── BRAND ──────────────────────────────── */
        .sidebar-brand {
            padding: 22px 20px 20px;
            border-bottom: 1px solid var(--border-light);
            position: relative;
            overflow: hidden;
        }

        .sidebar-brand::before {
            content: '';
            position: absolute;
            top: -30px; right: -20px;
            width: 80px; height: 80px;
            background: radial-gradient(circle, rgba(212,168,83,0.18) 0%, transparent 70%);
            pointer-events: none;
        }

        .sidebar-brand-inner {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .sidebar-brand-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 16px rgba(212,168,83,0.35);
        }

        .sidebar-brand-icon img {
            width: 22px; height: 22px;
            filter: brightness(0) invert(0.1);
        }

        .sidebar-brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: 0.2px;
            line-height: 1.2;
        }

        .sidebar-brand-sub {
            font-size: 0.68rem;
            color: var(--text-muted);
            margin-top: 2px;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            font-weight: 500;
        }

        /* ─── NAV ──────────────────────────────── */
        .sidebar-nav {
            padding: 12px 12px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .sidebar-section { margin-top: 8px; }

        .sidebar-group-label {
            font-size: 0.62rem;
            font-weight: 700;
            letter-spacing: 1.8px;
            text-transform: uppercase;
            color: var(--text-muted);
            padding: 10px 10px 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .sidebar-group-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-light);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: var(--radius-sm);
            position: relative;
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, var(--accent-dim), transparent);
            opacity: 0;
            transition: opacity 0.2s;
        }

        .sidebar-link:hover { color: var(--text-primary); background: rgba(78,128,238,0.08); }
        .sidebar-link:hover::before { opacity: 1; }

        .sidebar-link.active { color: var(--text-primary); background: var(--accent-dim); }
        .sidebar-link.active::before { opacity: 1; }

        .sidebar-link.active .nav-icon {
            color: var(--gold);
            filter: drop-shadow(0 0 6px rgba(212,168,83,0.5));
        }

        .active-dot { display: none; }

        .sidebar-link.active .active-dot {
            display: block;
            width: 6px; height: 6px;
            background: var(--gold);
            border-radius: 50%;
            margin-left: auto;
            flex-shrink: 0;
            box-shadow: 0 0 8px rgba(212,168,83,0.7);
        }

        .nav-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px; height: 20px;
            flex-shrink: 0;
            color: var(--text-muted);
            transition: color 0.2s;
        }

        .sidebar-link:hover .nav-icon { color: var(--text-secondary); }
        .nav-label { flex: 1; }

        /* ─── SIDEBAR FOOTER ──────────────────────── */
        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid var(--border-light);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            background: rgba(78,128,238,0.06);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-sm);
            margin-bottom: 10px;
        }

        .sidebar-user-avatar {
            width: 32px; height: 32px;
            background: linear-gradient(135deg, var(--accent), #7C3AED);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 700;
            color: white;
            flex-shrink: 0;
        }

        .sidebar-user-name {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .sidebar-user-role {
            font-size: 0.68rem;
            color: var(--text-muted);
            margin-top: 1px;
        }

        .sidebar-footer form button {
            width: 100%;
            background: var(--rose-dim);
            color: var(--rose);
            border: 1px solid rgba(248,113,113,0.2);
            padding: 9px 14px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-size: 0.83rem;
            font-family: inherit;
            font-weight: 600;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .sidebar-footer form button:hover {
            background: rgba(248,113,113,0.2);
            border-color: rgba(248,113,113,0.35);
        }

        /* ─── MAIN ──────────────────────────────── */
        .admin-main {
            margin-left: var(--sidebar-width);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ─── TOPBAR ──────────────────────────────── */
        .admin-topbar {
            height: var(--topbar-height);
            background: rgba(13,21,38,0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 0 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .topbar-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            font-family: 'Space Grotesk', sans-serif;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .topbar-view-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            background: var(--accent-dim);
            border: 1px solid rgba(78,128,238,0.25);
            border-radius: var(--radius-sm);
            color: #7BA7F5;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .topbar-view-btn:hover {
            background: rgba(78,128,238,0.2);
            border-color: rgba(78,128,238,0.4);
            transform: translateY(-1px);
        }

        .topbar-time {
            font-size: 0.8rem;
            color: var(--text-muted);
            font-variant-numeric: tabular-nums;
            background: rgba(255,255,255,0.03);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-light);
        }

        /* ─── CONTENT ──────────────────────────────── */
        .admin-content {
            padding: 28px;
            flex: 1;
        }

        /* ─── ALERTS ──────────────────────────────── */
        .alert {
            padding: 13px 16px;
            border-radius: var(--radius-md);
            margin-bottom: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .alert-icon { flex-shrink: 0; margin-top: 1px; }

        .alert-success {
            background: var(--emerald-dim);
            color: var(--emerald);
            border: 1px solid rgba(52,211,153,0.2);
        }

        .alert-error {
            background: var(--rose-dim);
            color: var(--rose);
            border: 1px solid rgba(248,113,113,0.2);
        }

        /* ─── CARDS ──────────────────────────────── */
        .admin-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: var(--shadow-card);
            transition: box-shadow 0.2s;
        }

        .admin-card:hover {
            box-shadow: var(--shadow-card), var(--shadow-glow);
        }

        .admin-card-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: 'Space Grotesk', sans-serif;
        }

        /* ─── TABLES ──────────────────────────────── */
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .admin-table th {
            text-align: left;
            padding: 11px 16px;
            color: var(--text-muted);
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: rgba(78,128,238,0.04);
            border-bottom: 1px solid var(--border);
        }

        .admin-table th:first-child { border-radius: var(--radius-sm) 0 0 0; }
        .admin-table th:last-child  { border-radius: 0 var(--radius-sm) 0 0; }

        .admin-table td {
            padding: 13px 16px;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        .admin-table tr:last-child td { border-bottom: none; }

        .admin-table tbody tr { transition: background 0.15s; }
        .admin-table tbody tr:hover td { background: rgba(78,128,238,0.05); }

        /* ─── FORMS ──────────────────────────────── */
        .form-group { margin-bottom: 20px; }

        .form-label {
            display: block;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--text-secondary);
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
        }

        .form-control {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border);
            color: var(--text-primary);
            padding: 10px 14px;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 0.9rem;
            transition: all 0.2s;
            appearance: none;
        }

        .form-control::placeholder { color: var(--text-muted); }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(10,17,32,0.9);
            box-shadow: 0 0 0 3px rgba(212,168,83,0.12);
        }

        textarea.form-control { min-height: 110px; resize: vertical; line-height: 1.6; }

        .form-check {
            display: flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
        }

        .form-check input[type="checkbox"] {
            width: 17px; height: 17px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        .form-hint {
            font-size: 0.76rem;
            color: var(--text-muted);
            margin-top: 5px;
            line-height: 1.5;
        }

        .form-error {
            font-size: 0.79rem;
            color: var(--rose);
            margin-top: 5px;
            font-weight: 500;
        }

        /* ─── BUTTONS ──────────────────────────────── */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            border: none;
            transition: all 0.2s;
            position: relative;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: #1a0e00;
            box-shadow: 0 4px 16px rgba(212,168,83,0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212,168,83,0.4);
        }

        .btn-secondary {
            background: var(--accent-dim);
            color: #7BA7F5;
            border: 1px solid rgba(78,128,238,0.25);
        }

        .btn-secondary:hover {
            background: rgba(78,128,238,0.18);
            border-color: rgba(78,128,238,0.4);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: var(--rose-dim);
            color: var(--rose);
            border: 1px solid rgba(248,113,113,0.2);
        }

        .btn-danger:hover {
            background: rgba(248,113,113,0.2);
            border-color: rgba(248,113,113,0.35);
            transform: translateY(-1px);
        }

        .btn-sm { padding: 6px 12px; font-size: 0.78rem; }

        /* ─── BADGE ──────────────────────────────── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .badge::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .badge-active {
            background: var(--emerald-dim);
            color: var(--emerald);
            border: 1px solid rgba(52,211,153,0.2);
        }

        .badge-active::before { background: var(--emerald); }

        .badge-inactive {
            background: rgba(90,106,135,0.12);
            color: var(--text-muted);
            border: 1px solid rgba(90,106,135,0.2);
        }

        .badge-inactive::before { background: var(--text-muted); }

        /* ─── PAGE HEADER ──────────────────────────── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            gap: 16px;
        }

        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-primary);
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: -0.3px;
        }

        .page-header p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-top: 3px;
        }

        /* ─── FORM ROW ──────────────────────────────── */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        @media (max-width: 700px) {
            .form-row { grid-template-columns: 1fr; }
        }

        /* ─── MISC ──────────────────────────────── */
        .delete-form { display: inline; }

        .action-group {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .icon-cell {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 34px; height: 34px;
            background: var(--gold-dim);
            border: 1px solid rgba(212,168,83,0.2);
            border-radius: var(--radius-sm);
            color: var(--gold);
        }

        .empty-state {
            text-align: center;
            padding: 48px 24px;
        }

        .empty-state-icon {
            width: 56px; height: 56px;
            background: var(--accent-dim);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: var(--text-muted);
        }

        .empty-state h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 18px;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-brand-inner">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('logo-panca-artha.svg') }}" alt="Logo">
                </div>
                <div>
                    <div class="sidebar-brand-name">Panca Artha</div>
                    <div class="sidebar-brand-sub">Panel Admin</div>
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section">
                <div class="sidebar-group-label">Utama</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="home" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Dashboard</span>
                    <span class="active-dot"></span>
                </a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-group-label">Konten</div>
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="sliders" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Hero & Tentang & Kontak</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="shield" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Layanan</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="folder" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Portofolio / Proyek</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.team.index') }}" class="sidebar-link {{ request()->routeIs('admin.team*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="users" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Tim Kami</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.stats.index') }}" class="sidebar-link {{ request()->routeIs('admin.stats*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="bar-chart-2" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Statistik</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.technologies.index') }}" class="sidebar-link {{ request()->routeIs('admin.technologies*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="cpu" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Tools & Teknologi</span>
                    <span class="active-dot"></span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <span class="nav-icon"><i data-feather="message-circle" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Testimoni</span>
                    <span class="active-dot"></span>
                </a>
            </div>

            <div class="sidebar-section">
                <div class="sidebar-group-label">Lainnya</div>
                <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                    <span class="nav-icon"><i data-feather="external-link" style="width:16px;height:16px;"></i></span>
                    <span class="nav-label">Lihat Website</span>
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit">
                    <i data-feather="log-out" style="width:14px;height:14px;"></i>
                    Keluar dari Akun
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="admin-main">
        <div class="admin-topbar">
            <div class="topbar-title">@yield('title', 'Dashboard')</div>
            <div class="topbar-right">
                <div class="topbar-time" id="topbarClock">--:--:--</div>
                <a href="{{ route('home') }}" target="_blank" class="topbar-view-btn">
                    <i data-feather="globe" style="width:13px;height:13px;"></i>
                    Lihat Website
                </a>
            </div>
        </div>

        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">
                    <span class="alert-icon"><i data-feather="check-circle" style="width:16px;height:16px;"></i></span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error">
                    <span class="alert-icon"><i data-feather="x-circle" style="width:16px;height:16px;"></i></span>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-error">
                    <span class="alert-icon"><i data-feather="alert-triangle" style="width:16px;height:16px;"></i></span>
                    <div>
                        <ul style="margin: 0; padding-left: 16px; font-size: 0.875rem; line-height: 1.7;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
        function updateClock() {
            const el = document.getElementById('topbarClock');
            if (!el) return;
            const now = new Date();
            const h = String(now.getHours()).padStart(2, '0');
            const m = String(now.getMinutes()).padStart(2, '0');
            const s = String(now.getSeconds()).padStart(2, '0');
            el.textContent = `${h}:${m}:${s}`;
        }
        updateClock();
        setInterval(updateClock, 1000);
    </script>
    @stack('scripts')
</body>
</html>
