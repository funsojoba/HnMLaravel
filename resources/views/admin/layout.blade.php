<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — Hearts and Mind')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --purple:#6b21a8; --purple-dark:#3b0764; --gold:#f5c542; --bg:#f6f3fb; --ink:#241a35; --muted:#6f6685; }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Plus Jakarta Sans',system-ui,sans-serif; background:var(--bg); color:var(--ink); }
        a { color:var(--purple); text-decoration:none; }
        .admin-shell { display:grid; grid-template-columns:230px 1fr; min-height:100vh; }
        .sidebar { background:var(--purple-dark); color:#e9d5ff; padding:1.6rem 1rem; }
        .sidebar .logo { font-weight:800; font-size:1.05rem; color:#fff; margin-bottom:2rem; display:block; }
        .sidebar nav a { display:block; color:#e9d5ff; padding:.65rem .9rem; border-radius:10px; font-size:.92rem; font-weight:600; margin-bottom:.2rem; }
        .sidebar nav a:hover, .sidebar nav a.active { background:rgba(255,255,255,.12); color:#fff; }
        .main { padding:2rem 2.4rem; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:1.8rem; }
        .topbar h1 { font-size:1.5rem; }
        .btn { display:inline-block; padding:.6rem 1.3rem; border-radius:999px; font-weight:700; font-size:.88rem; border:0; cursor:pointer; font-family:inherit; }
        .btn-purple { background:var(--purple); color:#fff; }
        .btn-danger { background:#fee2e2; color:#b91c1c; }
        .btn-ghost { background:#ede9f5; color:var(--purple); }
        .cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:1.2rem; margin-bottom:2rem; }
        .card { background:#fff; border-radius:16px; padding:1.4rem; box-shadow:0 2px 10px rgba(59,7,100,.06); }
        .card .num { font-size:1.9rem; font-weight:800; color:var(--purple); }
        .card .label { color:var(--muted); font-size:.88rem; }
        table { width:100%; border-collapse:collapse; background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 10px rgba(59,7,100,.06); }
        th, td { text-align:left; padding:.85rem 1rem; font-size:.9rem; border-bottom:1px solid #f0ecf7; vertical-align:top; }
        th { background:#faf8fd; font-size:.76rem; text-transform:uppercase; letter-spacing:.08em; color:var(--muted); }
        tr:last-child td { border-bottom:0; }
        .pill { display:inline-block; padding:.2rem .7rem; border-radius:999px; font-size:.75rem; font-weight:700; }
        .pill.paid { background:#dcfce7; color:#166534; }
        .pill.pending { background:#fef9c3; color:#854d0e; }
        .pill.failed { background:#fee2e2; color:#b91c1c; }
        .pill.unread { background:#ede9f5; color:var(--purple); }
        .form-grid { display:grid; gap:1rem; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); }
        .field { display:flex; flex-direction:column; gap:.3rem; }
        .field.full { grid-column:1/-1; }
        .field label { font-weight:700; font-size:.85rem; }
        .field input, .field select, .field textarea { font-family:inherit; padding:.65rem .8rem; border-radius:10px; border:1.5px solid #e2dcef; font-size:.92rem; }
        .alert { background:#dcfce7; border:1px solid #86efac; color:#166534; padding: .8rem 1.1rem; border-radius:12px; margin-bottom:1.2rem; font-weight:600; font-size:.9rem; }
        .alert-error { background:#fee2e2; border-color:#fca5a5; color:#b91c1c; }
        .pagination { display:flex; gap:.4rem; margin-top:1.2rem; flex-wrap:wrap; }
        .pagination a, .pagination span { padding:.4rem .8rem; border-radius:8px; background:#fff; font-size:.85rem; }
        .pagination .active span { background:var(--purple); color:#fff; }
        details.json { font-size:.82rem; }
        details.json pre { background:#faf8fd; padding: .7rem; border-radius:8px; margin-top:.4rem; white-space:pre-wrap; word-break:break-word; }
        .tabs { display:flex; gap:.5rem; margin-bottom:1.4rem; flex-wrap:wrap; }
        .tabs a { padding:.5rem 1.1rem; border-radius:999px; background:#fff; font-size:.85rem; font-weight:700; }
        .tabs a.active { background:var(--purple); color:#fff; }
        @media (max-width:860px){ .admin-shell{grid-template-columns:1fr;} .sidebar{display:flex;flex-wrap:wrap;align-items:center;gap:.4rem;} .sidebar nav{display:flex;flex-wrap:wrap;gap:.2rem;} .main{padding:1.4rem;} }
    </style>
</head>
<body>
<div class="admin-shell">
    <aside class="sidebar">
        <a class="logo" href="{{ route('admin.dashboard') }}">💜 Hearts &amp; Mind Admin</a>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">Events</a>
            <a href="{{ route('admin.donations') }}" class="{{ request()->routeIs('admin.donations') ? 'active' : '' }}">Donations</a>
            <a href="{{ route('admin.submissions') }}" class="{{ request()->routeIs('admin.submissions') ? 'active' : '' }}">Submissions</a>
            <a href="{{ route('home') }}" target="_blank">View Site ↗</a>
        </nav>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:1.6rem;">
            @csrf
            <button class="btn btn-ghost" type="submit">Log out</button>
        </form>
    </aside>
    <main class="main">
        @if (session('success'))<div class="alert">✓ {{ session('success') }}</div>@endif
        @yield('content')
    </main>
</div>
</body>
</html>
