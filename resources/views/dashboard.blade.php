<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout Required - Trinidad Boarding House System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-image: url('{{ asset('image/566631067_1257982686081335_3656752457094491588_n.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: #a0d8ef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #063ffc96;
            padding: 3rem;
            border-radius: 12px;
            box-shadow:
                0 10px 30px rgba(7, 205, 249, 0.4),
                inset 0 0 10px #1abc9c33;
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        .container h1 {
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: #fefbfbff;
            text-shadow: 0 0 8px #16aeef88;
        }

        .container form {
            display: inline-block;
        }

        .container button {
            background-color: #f8fcfdff;
            color: #0881fbff;
            padding: 0.8rem 1.5rem;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 0 12px #1abc9c88;
            transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
        }

        .container button:hover {
            background-color: #62c6f1ff;
            box-shadow: 0 0 20px #02e0f8aa;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sorry, something went wrong! Please log out first, then log in again.</h1>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
