<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinidad Boarding House - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Keep your exact CSS here */
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;   background-image: url('{{ asset('image/LGU-Trinidad-Banner-3.png') }}');
            background-size:100%,100%;
            background-position:center 250px;
              background-repeat: no-repeat;
            color:#a0d8ef; }
        header { background-color:#1a252f; padding:20px 40px; box-shadow:0 2px 8px rgba(0,0,0,0.3); }
        header h1 { font-size:26px; color:#37b6e8ff; text-shadow:0 0 8px #1abc9c88; }
        nav { background-color:#34495e; padding:15px 40px; display:flex; gap:30px; border-bottom:2px solid #1abc9c33; }
        nav a { color:#a0d8ef; text-decoration:none; font-weight:600; font-size:1rem; letter-spacing:0.5px; transition:color 0.3s ease, text-shadow 0.3s ease; }
        nav a:hover { color:#37b6e8ff; text-shadow:0 0 6px #1abc9caa; }
        nav a.active { color:#1abc9c; text-shadow:0 0 6px #1abc9c; }
        .logout-btn { background:none; border:none; color:#a0d8ef; font-weight:600; font-size:1rem; cursor:pointer; letter-spacing:0.5px; padding:0; margin-left:auto; transition:color 0.3s ease, text-shadow 0.3s ease; }
        .logout-btn:hover { color:#37b6e8ff; text-shadow:0 0 6px #a0d8ef; }
        .content { padding:40px;}
        .card { background-color:#34495e; border-radius:10px; padding:25px; margin-top:350px; box-shadow:0 4px 12px rgba(0,0,0,0.3); transition:transform 0.3s ease, box-shadow 0.3s ease; }
        .card:hover { transform:translateY(-4px); box-shadow:0 8px 20px rgba(0,0,0,0.4); }
        .card h2 { font-size:1.5rem; color:#37b6e8ff; margin-bottom:10px; text-shadow:0 0 6px #1abc9c77; }
        .card p, .card ul, .card li { font-size:1rem; color:#a0d8ef; }
        .card ul { margin-top:10px; list-style:disc; padding-left:20px; }
        .card li { margin-bottom:6px; }
        .btn-container { display:flex; gap:30px; justify-content:center; margin-bottom:40px; max-width:700px; margin-left:auto; margin-right:auto; }
        button.suggestion-btn, a.back-btn { background-color:#37b6e8ff; border:none; border-radius:10px; padding:12px 30px; font-size:1rem; font-weight:600; color:#2c3e50; cursor:pointer; box-shadow:0 4px 12px #16a085cc; transition: background-color 0.3s ease, box-shadow 0.3s ease; flex:1; text-align:center; text-decoration:none; display:inline-block; }
        button.suggestion-btn:hover, a.back-btn:hover { background-color:#37b6e8ff; box-shadow:0 6px 18px #138d75dd; }
        .info-section { max-width:700px; margin-left:auto; margin-right:auto; background-color:#34495e; border-radius:10px; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.3); display:none; }
        .info-section.active { display:block; }
    </style>
</head>
<body>
    <header>
        <h1>Trinidad Boarding House System</h1>
        <h2>Admin Dashboard</h2>
    </header>

    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Home</a>
        <a href="{{ route('admin.inquiry') }}" class="{{ Request::routeIs('admin.inquiry') ? 'active' : '' }}">Messages</a>
        <a href="{{ route('admin.management') }}" class="{{ Request::routeIs('admin.management') ? 'active' : '' }}">Reservation || Adding</a>
        <a href="{{ route('admin.account') }}" class="{{ Request::routeIs('admin.account') ? 'active' : '' }}">Create Account</a>
        <a href="{{ route('admin.accountmanage') }}" class="{{ Request::routeIs('admin.accountmanage') ? 'active' : '' }}">Manage Account</a>
        <form method="POST" action="/logout" style="display: inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
