<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinidad Boarding House - Tenant</title>
    <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>

<!-- Leaflet JS -->


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            
            min-height: 100vh;
            color: #a0d8ef;
        }


        header { 
            background-color:white; 
            padding:20px 40px; 
            box-shadow:0 2px 8px rgba(0,0,0,0.3); 
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        header h1 { font-size:26px; color: #01236cf2; text-shadow:0 0 8px yellow; }
        header h2 { font-size:18px; color:#01236cf2; margin-top:5px; text-shadow:0 0 8px white; }

        nav { 
            background-color: #01236cf2; 
            padding:15px 40px; 
            display:flex; 
            gap:30px; 
            border-bottom:2px solid #1abc9c33; 
        }
        nav a { 
            color:white; 
            text-decoration:none; 
            font-weight:600; 
            font-size:1rem; 
            letter-spacing:0.5px; 
            transition:color 0.3s ease, text-shadow 0.3s ease; 
        }
        nav a:hover { color:yellow; text-shadow:0 0 6px #1abc9caa; }
        nav a.active { color:yellow; text-shadow:0 0 6px yellow; }

        .logout-btn { 
            background:none; 
            border:none; 
            color:white; 
            font-weight:600; 
            font-size:1rem; 
            cursor:pointer; 
            letter-spacing:0.5px; 
            padding:0; 
            margin-left:auto; 
            transition:color 0.3s ease, text-shadow 0.3s ease; 
        }
        .logout-btn:hover { color:#37b6e8ff; text-shadow:0 0 6px #a0d8ef; }

        .content { 
            padding:60px 40px 40px 40px; 
            max-width: 1200px; 
            margin: 0 auto;
        }

        .card { 
            background-color: #01236cf2; 
            border-radius:10px; 
            padding:25px; 
            margin-top:20px; 
            box-shadow:0 4px 12px rgba(0,0,0,0.3); 
            transition:transform 0.3s ease, box-shadow 0.3s ease; 
        }
        .card:hover { transform:translateY(-4px); box-shadow:0 8px 20px rgba(0,0,0,0.4); }
        .card h2 { font-size:1.5rem; color:#37b6e8ff; margin-bottom:10px; text-shadow:0 0 6px #1abc9c77; }
        .card p, .card ul, .card li { font-size:1rem; color:#a0d8ef; }
        .card ul { margin-top:10px; list-style:disc; padding-left:20px; }
        .card li { margin-bottom:6px; }

        .btn-container { 
            display:flex; gap:30px; justify-content:center; 
            margin-bottom:40px; max-width:700px; margin-left:auto; margin-right:auto; 
        }
        button.action-btn, a.back-btn { 
            background-color:#37b6e8ff; 
            border:none; 
            border-radius:10px; 
            padding:12px 30px; 
            font-size:1rem; 
            font-weight:600; 
            color:#2c3e50; 
            cursor:pointer; 
            box-shadow:0 4px 12px #16a085cc; 
            transition: background-color 0.3s ease, box-shadow 0.3s ease; 
            flex:1; text-align:center; text-decoration:none; display:inline-block; 
        }
        button.action-btn:hover, a.back-btn:hover { background-color:#37b6e8ff; box-shadow:0 6px 18px #138d75dd; }

        /* Image card style for dashboard */
        .dashboard-image { 
            width: 100%; 
            max-height: 400px; 
            object-fit: cover; 
            border-radius:10px; 
        }
    </style>
</head>
<body>
    <header>
        <h1>Trinidad Boarding House System</h1>
        <h2>Tenant Dashboard</h2>
    </header>

    <nav>
        <a href="{{ route('tenant.dashboard') }}" class="{{ Request::routeIs('tenant.dashboard') ? 'active' : '' }}">Home</a>
        <a href="{{ route('tenantdash.book') }}" class="{{ Request::routeIs('tenantdash.book') ? 'active' : '' }}">Browse</a>
        <a href="{{ route('tenant.suggest') }}" class="{{ Request::routeIs('tenant.suggest') ? 'active' : '' }}">Message Admin</a>
        <a href="{{ route('tenant.profile') }}" class="{{ Request::routeIs('tenant.profile') ? 'active' : '' }}">Profile</a>
        <form method="POST" action="/logout" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </nav>

    <div class="content">
        @yield('content')
    </div>

   
   <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
  @yield('scripts')
</body>

</html>
