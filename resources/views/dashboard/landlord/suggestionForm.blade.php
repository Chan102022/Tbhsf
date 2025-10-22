<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Landlord Suggestion - Trinidad Boarding House</title>
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
            color: #1abc9c;
            margin-bottom: 30px;
        }

        form {
            background-color: #34495e;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        button {
            background-color: #1abc9c;
            border: none;
            color: #2c3e50;
            font-weight: 700;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #16a085;
        }

        .success-message {
            color: #2ecc71;
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>Submit Landlord Suggestion</h1>

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

    <form method="POST" action="{{ route('landlord.suggestion.submit') }}">
        @csrf

        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required />

        <label for="contact">Contact</label>
        <input id="contact" name="contact" type="text" value="{{ old('contact') }}" required />

        <label for="suggestion">Suggestion</label>
        <textarea id="suggestion" name="suggestion" rows="5" required>{{ old('suggestion') }}</textarea>

        <button type="submit">Submit Suggestion</button>
    </form>

    <a href="{{ route('landlord.dashboard') }}" style="display: block; margin-top: 20px; text-align:center; color:#1abc9c;">
        ← Back to Landlord Dashboard
    </a>

</body>
</html>
