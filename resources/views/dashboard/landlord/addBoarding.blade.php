<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Boarding House - Trinidad Boarding House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #f1c40f;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: auto;
            background-color: #34495e;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.3);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #1abc9c;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 6px;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .error {
            color: #e74c3c;
            font-size: 0.9rem;
            margin-top: -15px;
            margin-bottom: 15px;
        }

        button {
            background-color: #1abc9c;
            color: #2c3e50;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #16a085;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #f1c40f;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .success-message {
            text-align: center;
            color: #2ecc71;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Add Boarding House</h1>

    @if (session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('landlord.boarding.store') }}" method="POST">
        @csrf

        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="contact">Contact</label>
        <input type="text" id="contact" name="contact" value="{{ old('contact') }}" required>
        @error('contact') <div class="error">{{ $message }}</div> @enderror

        <label for="property_name">Boarding House Name</label>
        <input type="text" id="property_name" name="property_name" value="{{ old('property_name') }}" required>
        @error('property_name') <div class="error">{{ $message }}</div> @enderror

        <label for="property_description">Description</label>
        <textarea id="property_description" name="property_description" required>{{ old('property_description') }}</textarea>
        @error('property_description') <div class="error">{{ $message }}</div> @enderror

        <label for="property_price">Price</label>
        <input type="text" id="property_price" name="property_price" value="{{ old('property_price') }}" required>
        @error('property_price') <div class="error">{{ $message }}</div> @enderror

        <label for="adding_date">Available From</label>
        <input type="date" id="adding_date" name="adding_date" value="{{ old('adding_date') }}" required>
        @error('adding_date') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Submit</button>

        <a href="{{ route('landlord.dashboard') }}" class="back-link">← Back to Dashboard</a>
    </form>

</body>
</html>
