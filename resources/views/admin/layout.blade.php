<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinidad Boarding House - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background-color: white;
            color: #01236cf2;
            display: flex;
        }

        /* Side Navigation */
        nav {
            width: 220px;
            background-color: #01236cf2;
            display: flex;
            flex-direction: column;
            padding: 20px;
            min-height: 100vh;
            box-shadow: 2px 0 8px rgba(0,0,0,0.2);
            position: fixed;
            top: 0;
            left: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: color 0.3s ease, text-shadow 0.3s ease, background 0.3s ease;
        }

        nav a:hover {
            color: yellow;
            text-shadow: 0 0 6px #1abc9caa;
            background-color: rgba(255,255,0,0.1);
        }

        nav a.active {
            color: yellow;
            text-shadow: 0 0 6px yellow;
            background-color: rgba(255,255,0,0.2);
        }

        /* Make logout button look like nav links */
.nav-form {
    margin: 0; /* remove default margin */
}

.logout-btn {
    display: block;
    width: 100%;
    background: none;
    border: none;
    color: white;
    font-weight: 600;
    font-size: 1rem;
    text-align: left;
    padding: 12px 15px;
    border-radius: 8px;
    cursor: pointer;
    letter-spacing: 0.5px;
    transition: color 0.3s ease, text-shadow 0.3s ease, background 0.3s ease;
}

.logout-btn:hover {
    color: yellow;
    text-shadow: 0 0 6px #1abc9caa;
    background-color: rgba(255,255,0,0.1);
}


        /* Main Content */
        .content {
            margin-left: 240px; /* same as nav width + some padding */
            padding: 60px 40px 40px 40px;
            flex: 1;
        }

        /* Header */
        header {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 26px;
            color:#01236cf2 ;
            text-shadow: 0 0 8px yellow;
        }

        header h2 {
            font-size: 18px;
            color: #01236cf2;
            margin-top: 5px;
            text-shadow: 0 0 8px white;
        }

        /* Cards */
        .card {
       
            border-radius: 10px;
            padding: 25px;
            margin-top: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: #01236cf2;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        .card h2 {
            font-size: 1.5rem;
            color: #37b6e8ff;
            margin-bottom: 10px;
        }

        .card p,
        .card ul,
        .card li {
            font-size: 1rem;
            color: #01236cf2;
        }

        .card ul {
            margin-top: 10px;
            list-style: disc;
            padding-left: 20px;
        }

        .card li {
            margin-bottom: 6px;
        }
        .delete-btn1 {
    background-color: #e74c3c;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.delete-btn1:hover {
    background-color: #c0392b;
}
    </style>
</head>
<body>
    <!-- Side Navigation -->
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">Home</a>
        <a href="{{ route('admin.inquiry') }}" class="{{ Request::routeIs('admin.inquiry') ? 'active' : '' }}">Messages</a>
        <a href="{{ route('admin.management') }}" class="{{ Request::routeIs('admin.management') ? 'active' : '' }}">Reservation || Adding</a>
        <a href="{{ route('admin.account') }}" class="{{ Request::routeIs('admin.account') ? 'active' : '' }}">Create Account</a>
        <a href="{{ route('admin.accountmanage') }}" class="{{ Request::routeIs('admin.accountmanage') ? 'active' : '' }}">Manage Account</a>

        <!-- Logout -->
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <header>
            <h1>Trinidad Boarding House System</h1>
            <h2>Admin Dashboard</h2>
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
