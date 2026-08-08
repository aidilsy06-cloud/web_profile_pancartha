<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Panca Artha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-deepest:   #080D18;
            --bg-card:      #111D33;
            --gold:         #D4A853;
            --gold-light:   #F0C97A;
            --accent:       #4E80EE;
            --rose:         #F87171;
            --text-primary: #EEF2FF;
            --text-secondary:#A8B4D0;
            --text-muted:   #5A6A87;
            --border:       rgba(78,128,238,0.2);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-deepest);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background grid */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(78,128,238,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(78,128,238,0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        .bg-glow {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .bg-glow-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(78,128,238,0.15) 0%, transparent 65%);
            top: -200px; left: -200px;
        }

        .bg-glow-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(212,168,83,0.12) 0%, transparent 65%);
            bottom: -150px; right: -150px;
        }

        .bg-glow-3 {
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(124,58,237,0.1) 0%, transparent 65%);
            top: 40%; right: 10%;
        }

        .login-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: rgba(17,29,51,0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(78,128,238,0.22);
            border-radius: 20px;
            padding: 40px 36px;
            box-shadow: 0 24px 80px rgba(0,0,0,0.6), 0 0 0 1px rgba(255,255,255,0.04) inset;
        }

        .login-brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }

        .login-brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(212,168,83,0.4);
        }

        .login-brand-icon img {
            width: 22px; height: 22px;
            filter: brightness(0) invert(0.1);
        }

        .login-brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.2px;
        }

        .login-subtitle {
            font-size: 0.72rem;
            color: var(--text-muted);
            letter-spacing: 1.8px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .login-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(78,128,238,0.3), transparent);
            margin: 24px 0;
        }

        .login-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group { margin-bottom: 16px; }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-secondary);
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .form-control {
            width: 100%;
            background: rgba(8,13,24,0.7);
            border: 1px solid rgba(78,128,238,0.2);
            color: var(--text-primary);
            padding: 11px 14px;
            border-radius: 9px;
            font-family: inherit;
            font-size: 0.925rem;
            transition: all 0.2s;
        }

        .form-control::placeholder { color: var(--text-muted); }

        .form-control:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(8,13,24,0.9);
            box-shadow: 0 0 0 3px rgba(212,168,83,0.12);
        }

        .form-error {
            font-size: 0.78rem;
            color: var(--rose);
            margin-top: 5px;
            font-weight: 500;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 22px;
            cursor: pointer;
        }

        .form-check input {
            width: 16px; height: 16px;
            accent-color: var(--gold);
            cursor: pointer;
        }

        .form-check label {
            font-size: 0.84rem;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-light) 100%);
            color: #1a0e00;
            border: none;
            padding: 13px;
            border-radius: 9px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.25s;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 20px rgba(212,168,83,0.35);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(212,168,83,0.45);
        }

        .btn-login:active { transform: translateY(0); }

        .login-note {
            text-align: center;
            margin-top: 18px;
            font-size: 0.77rem;
            color: var(--text-muted);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-top: 14px;
            font-size: 0.82rem;
            color: var(--accent);
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .back-link:hover { opacity: 1; color: var(--gold); }

        .alert-error {
            background: rgba(248,113,113,0.1);
            border: 1px solid rgba(248,113,113,0.22);
            color: var(--rose);
            padding: 11px 14px;
            border-radius: 9px;
            font-size: 0.85rem;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
    </style>
</head>
<body>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="bg-glow bg-glow-3"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-brand">
                <div class="login-brand-logo">
                    <div class="login-brand-icon">
                        <img src="{{ asset('logo-panca-artha.svg') }}" alt="Logo">
                    </div>
                    <span class="login-brand-name">Panca Artha</span>
                </div>
                <div class="login-subtitle">Panel Admin</div>
            </div>

            <div class="login-divider"></div>

            <div class="login-title">Masuk ke Dashboard</div>

            @if($errors->any())
                <div class="alert-error">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="admin@pancaartha.com"
                        autofocus
                    >
                    @error('email')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="••••••••"
                    >
                </div>

                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk ke Panel →</button>
            </form>

            <div class="login-note">Panel khusus administrator Panca Artha</div>
            <a href="{{ route('home') }}" class="back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                Kembali ke Website
            </a>
        </div>
    </div>
</body>
</html>
