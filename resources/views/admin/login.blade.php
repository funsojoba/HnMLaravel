<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Hearts and Mind</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Plus Jakarta Sans',system-ui,sans-serif; min-height:100vh; display:grid; place-items:center;
               background:linear-gradient(135deg,#3b0764,#7e22ce); }
        .box { background:#fff; border-radius:20px; padding:2.6rem; width:min(400px,92vw); box-shadow:0 24px 60px rgba(0,0,0,.25); }
        h1 { font-size:1.3rem; margin-bottom:.4rem; color:#241a35; }
        p { color:#6f6685; font-size:.9rem; margin-bottom:1.6rem; }
        label { font-weight:700; font-size:.85rem; display:block; margin-bottom:.3rem; color:#241a35; }
        input { width:100%; padding:.75rem .9rem; border-radius:10px; border:1.5px solid #e2dcef; font-size:.95rem; font-family:inherit; margin-bottom:1.1rem; }
        button { width:100%; padding:.85rem; border-radius:999px; border:0; background:#6b21a8; color:#fff; font-weight:700; font-size:1rem; cursor:pointer; font-family:inherit; }
        .err { background:#fee2e2; color:#b91c1c; padding:.7rem 1rem; border-radius:10px; font-size:.85rem; margin-bottom:1.1rem; }
    </style>
</head>
<body>
    <form class="box" method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <h1>💜 Hearts &amp; Mind</h1>
        <p>Sign in to the admin panel</p>
        @if ($errors->any())<div class="err">{{ $errors->first() }}</div>@endif
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
