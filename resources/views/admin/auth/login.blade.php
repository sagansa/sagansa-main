<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — Sagansa</title>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after { box-sizing:border-box; margin:0; padding:0; }
        body { font-family:'Inter',sans-serif; min-height:100vh; display:flex; align-items:center; justify-content:center;
               background: linear-gradient(135deg, #1e3a8a 0%, #4c1d95 100%); padding:24px; }
        .login-card { background:#fff; border-radius:24px; padding:48px 40px; max-width:400px; width:100%;
                      box-shadow: 0 25px 60px rgba(0,0,0,0.3); }
        .login-logo { display:flex; align-items:center; justify-content:center; gap:12px; margin-bottom:8px; }
        .login-logo .logo-icon { width:44px; height:44px; border-radius:12px;
            background: linear-gradient(135deg, #2563eb, #8b5cf6); display:flex; align-items:center; justify-content:center;
            font-weight:900; font-size:1.4rem; color:#fff; }
        .login-logo strong { font-size:1.3rem; font-weight:800; }
        .login-subtitle { text-align:center; color:#6b7280; font-size:0.9rem; margin-bottom:32px; }
        .form-group { margin-bottom:20px; }
        .form-group label { display:block; font-size:0.85rem; font-weight:600; color:#374151; margin-bottom:8px; }
        .form-control { width:100%; padding:12px 16px; border:1px solid #e5e7eb; border-radius:10px;
                        font-size:0.95rem; font-family:inherit; transition:border 0.15s; }
        .form-control:focus { outline:none; border-color:#2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        .checkbox-row { display:flex; align-items:center; gap:8px; font-size:0.85rem; color:#6b7280; }
        .btn { width:100%; padding:13px; background: linear-gradient(135deg, #2563eb, #4c1d95); color:#fff;
               border:none; border-radius:10px; font-size:0.95rem; font-weight:700; cursor:pointer; transition: opacity 0.15s; }
        .btn:hover { opacity:0.9; }
        .alert { padding:12px 16px; border-radius:10px; margin-bottom:20px; font-size:0.85rem; font-weight:500; }
        .alert.error { background:#fef2f2; color:#991b1b; border:1px solid #fecaca; }
        .back-link { display:block; text-align:center; margin-top:24px; font-size:0.85rem; color:#6b7280; text-decoration:none; }
        .back-link:hover { color:#2563eb; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-logo">
            <div class="logo-icon">S</div>
            <strong>Sagansa Admin</strong>
        </div>
        <p class="login-subtitle">Masuk untuk mengelola konten marketing</p>

        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email') }}" required autofocus placeholder="admin@sagansa.id">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required placeholder="••••••••">
            </div>
            <div class="form-group">
                <label class="checkbox-row">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
            </div>
            <button type="submit" class="btn">Masuk</button>
        </form>

        <a href="{{ url('/') }}" class="back-link">← Kembali ke situs</a>
    </div>
</body>
</html>
