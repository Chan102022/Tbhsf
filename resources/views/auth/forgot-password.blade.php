<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #2c3e50;
            color: #a0d8ef;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #34495e;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 
                0 4px 15px rgba(0, 0, 0, 0.4),
                inset 0 0 10px #1abc9c33;
            max-width: 500px;
            width: 90%;
        }

        .form-container h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #1abc9c;
            text-align: center;
            text-shadow: 0 0 8px #1abc9c88;
        }

        .form-container p {
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #d0eaf2;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #ecf0f1;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.7rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .error {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .status {
            color: #2ecc71;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .submit-button {
            background-color: #1abc9c;
            color: #2c3e50;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            box-shadow: 0 0 15px #1abc9c88;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .submit-button:hover {
            background-color: #16a085;
            box-shadow: 0 0 25px #16a085aa;
        }

        .back-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            color: #a0d8ef;
            text-decoration: underline;
        }

        .back-link:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Forgot Password</h2>

        <p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="submit-button">Email Password Reset Link</button>
        </form>

        <a href="{{ route('login') }}" class="back-link">Back to Login</a>
    </div>
</body>
</html>
