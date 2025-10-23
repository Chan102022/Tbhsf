<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinidad Boarding House Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #a0d8ef;
        }

        header {
            background-color: #1a252f;
            padding: 20px 40px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            font-size: 26px;
            color: #1abc9c;
            text-shadow: 0 0 8px #1abc9c88;
        }

        nav {
            background-color: #34495e;
            padding: 15px 40px;
            display: flex;
            gap: 30px;
            border-bottom: 2px solid #1abc9c33;
        }

        nav a {
            color: #a0d8ef;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        nav a:hover {
            color: #1abc9c;
            text-shadow: 0 0 6px #1abc9caa;
        }

        .content {
            padding: 40px;
        }

        .card {
            background-color: #34495e;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .card h2 {
            font-size: 1.5rem;
            color: #1abc9c;
            margin-bottom: 10px;
            text-shadow: 0 0 6px #1abc9c77;
        }

        .card p, .card ul, .card li {
            font-size: 1rem;
            color: #a0d8ef;
        }

        .card ul {
            margin-top: 10px;
            list-style: disc;
            padding-left: 20px;
        }

        .card li {
            margin-bottom: 6px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Trinidad Boarding House System</h1>
        <h2>Admin Dashboard</h2>
    </header>

    <nav>
    <a href="#">Home</a>
    <a href="{{ route('admin.inquiry') }}">Suggestion</a>
    <a href="{{ route('admin.management') }}">Booking ||  Adding</a>
    <a href="{{ route('admin.account') }}">Create Account</a> 
    <a href="{{ route('admin.accountmanage') }}">Manage Account</a>
    <form method="POST" action="/logout" style="display: inline;">
        <!-- CSRF token for security -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" style="
            background: none;
            border: none;
            color: #a0d8ef;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            letter-spacing: 0.5px;
            padding: 0;
            margin-left: auto;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        "
        onmouseover="this.style.color='#1abc9c'; this.style.textShadow='0 0 6px #1abc9caa';"
        onmouseout="this.style.color='#a0d8ef'; this.style.textShadow='none';"
        >
            Logout
        </button>
    </form>
</nav>


    <div class="content">
        <div class="card">
            <h2>Hello Admin, Welcome Back!</h2>
            <p>Manage your system bookings, addings , and suggestions. .</p>
        </div>

        <div class="card">
            <h2>Overview Cards</h2>
            <ul>
                <li>Total Inquiries:0</li>
                <li>Active Bookings:0</li>
                <li>Available Rooms:0</li>
            </ul>
        </div>
    </div>

</body>
</html>
