<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') — Admin Sagansa</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='10' fill='%232563eb'/%3E%3Ctext x='50%25' y='54%25' dominant-baseline='central' text-anchor='middle' font-family='Arial' font-weight='900' font-size='22' fill='white'%3ES%3C/text%3E%3C/svg%3E">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *,*::before,*::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary: #2563eb; --primary-dark: #1e40af;
            --gray-50:#f9fafb; --gray-100:#f3f4f6; --gray-200:#e5e7eb;
            --gray-500:#6b7280; --gray-700:#374151; --gray-900:#111827;
            --success:#059669; --danger:#dc2626; --warning:#d97706;
            --sidebar-w: 260px;
        }
        body { font-family: 'Inter', sans-serif; background: var(--gray-50); color: var(--gray-900); }
        .admin-layout { display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w); background: var(--gray-900); color: #fff;
            display: flex; flex-direction: column; position: fixed; top:0; bottom:0; left:0; z-index: 100;
        }
        .sidebar-brand { padding: 24px; display:flex; align-items:center; gap:12px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-brand .logo-icon {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), #8b5cf6);
            display:flex; align-items:center; justify-content:center; font-weight:900; font-size:1.2rem;
        }
        .sidebar-brand strong { font-size: 1.05rem; }
        .sidebar-brand small { display:block; font-size:0.7rem; color: rgba(255,255,255,0.5); font-weight:500; }
        .sidebar-nav { padding: 16px; flex: 1; overflow-y: auto; }
        .sidebar-section { font-size:0.7rem; text-transform:uppercase; letter-spacing:0.08em; color: rgba(255,255,255,0.4); padding: 16px 12px 8px; font-weight:700; }
        .sidebar-link {
            display:flex; align-items:center; gap:12px; padding: 11px 12px;
            border-radius: 10px; color: rgba(255,255,255,0.75); text-decoration:none;
            font-size: 0.9rem; font-weight:500; margin-bottom: 2px; transition: all 0.15s;
        }
        .sidebar-link:hover { background: rgba(255,255,255,0.08); color: #fff; }
        .sidebar-link.active { background: var(--primary); color: #fff; }
        .sidebar-link svg { width: 18px; height: 18px; flex-shrink: 0; }
        .sidebar-footer { padding: 16px; border-top: 1px solid rgba(255,255,255,0.1); }
        .sidebar-user { display:flex; align-items:center; gap:10px; padding: 4px; }
        .sidebar-user .avatar { width: 36px; height: 36px; border-radius:50%; background: var(--primary); display:flex; align-items:center; justify-content:center; font-weight:700; color:#fff; }
        .sidebar-user-info { flex:1; min-width:0; }
        .sidebar-user-info strong { display:block; font-size:0.85rem; color:#fff; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
        .sidebar-user-info span { font-size:0.7rem; color: rgba(255,255,255,0.5); }
        .logout-btn { color: rgba(255,255,255,0.5); background:none; border:none; cursor:pointer; padding:6px; border-radius:6px; }
        .logout-btn:hover { color:#fff; background: rgba(255,255,255,0.1); }

        /* Main */
        .main { flex:1; margin-left: var(--sidebar-w); display:flex; flex-direction:column; min-width:0; }
        .topbar {
            background:#fff; border-bottom: 1px solid var(--gray-200); padding: 16px 32px;
            display:flex; align-items:center; justify-content:space-between; position: sticky; top:0; z-index:50;
        }
        .topbar h1 { font-size: 1.3rem; font-weight:800; }
        .topbar-actions { display:flex; align-items:center; gap:12px; }
        .topbar-actions a { font-size:0.85rem; color: var(--gray-500); text-decoration:none; }
        .content { padding: 32px; flex:1; max-width: 1200px; width:100%; }

        /* Flash */
        .flash { padding: 14px 18px; border-radius: 12px; margin-bottom: 24px; font-size:0.9rem; font-weight:500; }
        .flash.success { background:#ecfdf5; color:#065f46; border:1px solid #a7f3d0; }
        .flash.error { background:#fef2f2; color:#991b1b; border:1px solid #fecaca; }

        /* Buttons */
        .btn { display:inline-flex; align-items:center; gap:8px; padding: 10px 18px; border-radius:10px; font-size:0.875rem; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition: all 0.15s; }
        .btn-primary { background: var(--primary); color:#fff; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-secondary { background:#fff; color: var(--gray-700); border:1px solid var(--gray-200); }
        .btn-secondary:hover { background: var(--gray-50); }
        .btn-danger { background: var(--danger); color:#fff; }
        .btn-danger:hover { background:#b91c1c; }
        .btn-sm { padding: 6px 12px; font-size:0.8rem; }

        /* Cards / stats */
        .stats-grid { display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:20px; margin-bottom:32px; }
        .stat-card { background:#fff; border:1px solid var(--gray-200); border-radius:16px; padding:24px; }
        .stat-card .stat-label { font-size:0.8rem; color: var(--gray-500); font-weight:600; margin-bottom:8px; }
        .stat-card .stat-value { font-size:2rem; font-weight:900; color: var(--gray-900); }
        .stat-card .stat-sub { font-size:0.8rem; color: var(--success); margin-top:4px; }

        /* Table */
        .panel { background:#fff; border:1px solid var(--gray-200); border-radius:16px; overflow:hidden; margin-bottom:32px; }
        .panel-header { padding: 20px 24px; border-bottom:1px solid var(--gray-200); display:flex; align-items:center; justify-content:space-between; }
        .panel-header h2 { font-size:1.1rem; font-weight:800; }
        table { width:100%; border-collapse: collapse; }
        th { text-align:left; padding: 12px 24px; font-size:0.75rem; text-transform:uppercase; letter-spacing:0.06em; color: var(--gray-500); font-weight:700; border-bottom:1px solid var(--gray-200); background: var(--gray-50); }
        td { padding: 14px 24px; font-size:0.9rem; color: var(--gray-700); border-bottom:1px solid var(--gray-100); }
        tr:last-child td { border-bottom:none; }
        .badge { display:inline-block; padding:3px 10px; border-radius:100px; font-size:0.72rem; font-weight:700; }
        .badge.green { background:#ecfdf5; color:#065f46; }
        .badge.gray { background: var(--gray-100); color: var(--gray-500); }

        /* Forms */
        .form-grid { display:grid; grid-template-columns: 1fr 1fr; gap:20px; }
        .form-group { margin-bottom: 20px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group label { display:block; font-size:0.85rem; font-weight:600; color: var(--gray-700); margin-bottom:8px; }
        .form-group .hint { font-size:0.78rem; color: var(--gray-500); margin-top:6px; }
        .form-control { width:100%; padding: 11px 14px; border:1px solid var(--gray-200); border-radius:10px; font-size:0.9rem; font-family:inherit; transition: border 0.15s; }
        .form-control:focus { outline:none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        textarea.form-control { min-height: 120px; resize: vertical; }
        .form-actions { display:flex; gap:12px; margin-top:24px; }
        .checkbox-row { display:flex; align-items:center; gap:10px; }
        .checkbox-row input { width:18px; height:18px; }

        @media (max-width: 900px) {
            .sidebar { transform: translateX(-100%); }
            .main { margin-left: 0; }
            .form-grid { grid-template-columns: 1fr; }
        }
    </style>
    @stack('styles')
</head><body>
<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">S</div>
            <div>
                <strong>Sagansa Admin</strong>
                <small>Content Manager</small>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-section">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>

            <div class="sidebar-section">Konten</div>
            <a href="{{ route('admin.features.index') }}" class="sidebar-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                Fitur
            </a>
            <a href="{{ route('admin.blog.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                Blog
            </a>
            <a href="{{ route('admin.vlog.index') }}" class="sidebar-link {{ request()->routeIs('admin.vlog.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                Vlog
            </a>

            <div class="sidebar-section">Pengguna</div>
            <a href="{{ route('admin.beta.index') }}" class="sidebar-link {{ request()->routeIs('admin.beta.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                Beta Tester
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="avatar">{{ strtoupper(substr(auth('admin')->user()?->name ?? 'A', 0, 1)) }}</div>
                <div class="sidebar-user-info">
                    <strong>{{ auth('admin')->user()?->name }}</strong>
                    <span>{{ auth('admin')->user()?->email }}</span>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn" title="Logout">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main -->
    <div class="main">
        <header class="topbar">
            <h1>@yield('title', 'Dashboard')</h1>
            <div class="topbar-actions">
                <a href="{{ url('/') }}" target="_blank">↗ Lihat Situs</a>
            </div>
        </header>

        <main class="content">
            @if(session('success'))
                <div class="flash success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="flash error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
@stack('scripts')
</body>
</html>
