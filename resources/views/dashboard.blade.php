<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sorry something went wrong please Log out first then Log in Again !</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #2c3e50; /* Formal background */
            color: #a0d8ef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome-container {
            background-color: #34495e;
            padding: 3rem;
            border-radius: 12px;
            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.4),
                inset 0 0 10px #1abc9c33;
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        .welcome-container h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #1abc9c;
            text-shadow: 0 0 8px #1abc9c88;
            letter-spacing: 0.08em;
        }

        .welcome-container a {
            display: inline-block;
            margin: 0 1rem;
            padding: 0.6rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            color: #2c3e50;
            background-color: #1abc9c;
            border-radius: 8px;
            box-shadow: 0 0 15px #1abc9c88;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome-container a:hover {
            background-color: #16a085;
            box-shadow: 0 0 25px #16a085aa;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Sorry something went wrong please Log out first then Log in Again !</h1>
           <form method="POST" action="/logout" style="display: inline;">
    <!-- CSRF token for security -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" style="
        background: none;
        border: solid;
        border-radius: 10px;
        color: #a0d8ef;
        font-weight: 1000;
        font-size: 2rem;
        cursor: pointer;
        letter-spacing: 0.5px;
        padding: 5px;
        margin-left: auto;
        transition: color 0.3s ease, text-shadow 0.3s ease;
        
    "
    onmouseover="this.style.color='#1abc9c'; this.style.textShadow='0 0 6px #1abc9caa';"
    onmouseout="this.style.color='#a0d8ef'; this.style.textShadow='none';"
    >
        Logout
    </button>
</form>
    </div>
</body>
</html>
