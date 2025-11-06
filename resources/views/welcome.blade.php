<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body {
            background-image: url('{{ asset('image/566631067_1257982686081335_3656752457094491588_n.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            

            margin: 0;
            padding: 0;
            min-height: 100vh;
            color: #a0d8ef;
            font-family: bankora;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .welcome-container {
            background-color:  #063ffccc;
            padding: 3rem;
            border-radius: 12px;
            box-shadow:
                0 4px 15px rgba(253, 251, 251, 1),
                inset 0 0 10px #1abc9c33;
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        .welcome-container h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color:white;
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
            color: black;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px #1abc9c88;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome-container a:hover {
            background-color:black;
            box-shadow: 0 0 25px white;
            color:white;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Trinidad Boarding House System</h1>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</body>
</html>
