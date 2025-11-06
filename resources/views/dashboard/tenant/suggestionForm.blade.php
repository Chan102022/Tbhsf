<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tenant Message - Trinidad Boarding House</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #a0d8ef;
            padding: 40px;
            max-width: 600px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #37b6e8ff;
            margin-bottom: 30px;
            text-shadow: 0 0 8px #1abc9c88;
        }

        form {
            background-color: #34495e;
            padding: 25px;
            border-radius: 12px;
            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.4),
                inset 0 0 10px #1abc9c33;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #ecf0f1;
        }

        input, textarea {
            width: 97%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            margin-bottom: 20px;
            font-size: 1rem;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        button {
            background-color: #37b6e8ff;
            border: none;
            color: #2c3e50;
            font-weight: 700;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 0 12px #24c9ee88;
        }

        button:hover {
            background-color: #47e0eeff;
            box-shadow: 0 0 20px #16a085aa;
        }

        .success-message {
            background-color: #2ecc71;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.3);
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            background: rgba(231, 76, 60, 0.1);
            padding: 10px;
            border-radius: 6px;
        }

        a.back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #37b6e8ff;
            text-decoration: none;
            font-weight: 600;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Submit Tenant Message</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tenant.suggestion.submit') }}">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required />

        <label for="contact">Contact</label>
        <input id="contact" name="contact" type="text" value="{{ old('contact') }}" required />

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>

        <button type="submit">Submit Message</button>
    </form>

    <a href="{{ route('tenant.dashboard') }}" class="back-link">
        ← Back to Tenant Dashboard
    </a>

</body>
</html>
