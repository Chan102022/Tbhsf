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
        <h1>Trinidad Boarding House Dashboard</h1>
        <h2>Tenant Dashboard</h2>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Inquiry</a>
        <a href="#">Booking</a>
        <a href="#">Tenant Profile</a>
    </nav>

    <div class="content">
        <div class="card">
            <h2>Welcome to the Dashboard</h2>
            <p>Manage your bookings, inquiries, and profile easily.</p>
        </div>

        <div class="card">
            <h2>Quick Stats</h2>
            <ul>
                <li>Total Inquiries: 15</li>
                <li>Active Bookings: 8</li>
                <li>Available Rooms: 5</li>
            </ul>
        </div>
    </div>

</body>
</html>
