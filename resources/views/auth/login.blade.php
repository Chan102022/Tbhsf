<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Trinidad Boarding House System</title>
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
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        .form-container h1 {
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: #1abc9c;
            text-shadow: 0 0 8px #1abc9c88;
        }

        .form-container form {
            text-align: left;
        }

        .form-container label {
            display: block;
            margin-bottom: 0.3rem;
            font-weight: 600;
            color: #ecf0f1;
        }

        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 0.6rem;
            border-radius: 6px;
            border: none;
            margin-bottom: 1rem;
            font-size: 1rem;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .form-container input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .form-container .remember {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        .form-container .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-container a {
            font-size: 0.9rem;
            color: #1abc9c;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .form-container button {
            background-color: #1abc9c;
            color: #2c3e50;
            padding: 0.6rem 1.2rem;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            box-shadow: 0 0 12px #1abc9c88;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container button:hover {
            background-color: #16a085;
            box-shadow: 0 0 20px #16a085aa;
        }

        .error {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: -0.8rem;
            margin-bottom: 1rem;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Login to Your Account</h1>

        <!-- Session Status -->
        @if (session('status'))
            <div class="error">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>


            <div class="actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                @endif

                <button type="submit">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
