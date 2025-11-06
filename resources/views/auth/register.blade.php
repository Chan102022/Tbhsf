<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Trinidad Boarding House System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #063ffc96;
            color: #a0d8ef;
            background-image: url('{{ asset('image/566631067_1257982686081335_3656752457094491588_n.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #063ffca6;
            padding: 3rem;
            border-radius: 12px;
            box-shadow:
                0 4px 15px rgba(3, 220, 248, 1),
                inset 0 0 10px #1abc9c33;
            text-align: center;
            max-width: 700px;
            width: 90%;
        }

        .form-container h1 {
            font-size: 2.2rem;
            margin-bottom: 2rem;
            color: white;
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

        .form-container input {
            width: 100%;
            padding: 0.6rem;
            border-radius: 6px;
            border: none;
            margin-bottom: 1rem;
            font-size: 1rem;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .form-container .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-container a {
            font-size: 0.9rem;
            color: white;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .form-container button {
            background-color: white;
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
            background-color: #0fb8f5b4;
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
        <h1>Create Your Account</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" placeholder="Enter Your Full Name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contact Number -->
            <div>
                <label for="contact">{{ __('Contact Number') }}</label>
                <input id="contact" type="text" name="contact" value="{{ old('contact') }}" required autocomplete="tel" placeholder="e.g., +639123456789">
                @error('contact')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Hidden Default Role -->
            <input type="hidden" name="role" value="tenant">

            <!-- Password -->
            <div>
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" placeholder="Enter atleast 8 Characters" min="8" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="actions mt-4">
                <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
