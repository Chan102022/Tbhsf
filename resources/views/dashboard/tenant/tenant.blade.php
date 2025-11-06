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
            color: #f6fbfaff;
            text-shadow: 0 0 8px #06c7f888;
        }

        nav {
            background-color: #34495e;
            padding: 15px 40px;
            display: flex;
            gap: 30px;
            border-bottom: 2px solid #1abc9c33;
        }

        nav a {
            color: #37b6e8ff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        nav a:hover {
            color: #37b6e8ff;
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
            color: #37b6e8ff;
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
        <h2>Welcome,Tenant!</h2>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="{{route('tenantdash.book')}}">Booking</a>
        <a href="{{ route('tenant.suggest') }}">Contact</a>
        <a href="#">Tenant Profile</a>
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
        onmouseover="this.style.color='#37b6e8ff'; this.style.textShadow='0 0 6px #37b6e8ff';"
        onmouseout="this.style.color='#a0d8ef'; this.style.textShadow='none';"
        >
            Logout
        </button>
    </nav>

       <div class="card">
    <img src="{{ asset('image/566631067_1257982686081335_3656752457094491588_n.jpg') }}" 
         alt="bbh" 
         width="100%" 
         height="100%">
</div>

    </div>

</body>
</html>
