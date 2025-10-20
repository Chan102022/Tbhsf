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
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        header {
            background-color: #2c3e50;
            color: white;
            padding: 20px 40px;
        }

        header h1 {
            font-size: 24px;
        }

        nav {
            background-color: #34495e;
            padding: 10px 40px;
            display: flex;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #1abc9c;
        }

        .content {
            padding: 40px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Trinidad Boarding House Dashboard</h1>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">Inquiry</a>
        <a href="#">Booking / Adding</a>
        <a href="#">Profile</a>
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
