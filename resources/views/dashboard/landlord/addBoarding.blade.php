<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Boarding House - Trinidad Boarding House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet CSS for map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

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
        input[type="file"],
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

        #map {
            height: 300px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h1>Add Boarding House</h1>

@if (session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

<form action="{{ route('landlord.boarding.store') }}" method="POST" enctype="multipart/form-data">
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

    <label for="image">Boarding House Image</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    @error('image') <div class="error">{{ $message }}</div> @enderror

    <label for="property_price">Price</label>
    <input type="text" id="property_price" name="property_price" value="{{ old('property_price') }}" required>
    @error('property_price') <div class="error">{{ $message }}</div> @enderror

    <label for="adding_date">Available From</label>
    <input type="date" id="adding_date" name="adding_date" value="{{ old('adding_date') }}" required>
    @error('adding_date') <div class="error">{{ $message }}</div> @enderror

    <label>Select Location on Map</label>
    <div id="map"></div>
    <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
    <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">

    <button type="submit">Submit</button>
    <a href="{{ route('landlord.dashboard') }}" class="back-link">← Back to Dashboard</a>
</form>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    // Initialize map with default location (Trinidad, Bohol)
    var map = L.map('map').setView([10.0478, 124.1965], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    // Try to get user's real location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            map.setView([lat, lng], 15); // Zoom to user location

            // Place marker at user's location
            marker = L.marker([lat, lng]).addTo(map);

            // Update hidden inputs
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }, function() {
            console.log("Geolocation permission denied or unavailable.");
        });
    } else {
        console.log("Geolocation not supported by this browser.");
    }

    // Place marker on map click
    map.on('click', function(e) {
        var lat = e.latlng.lat.toFixed(7);
        var lng = e.latlng.lng.toFixed(7);

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng).addTo(map);
        }

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });

    // If old coordinates exist (validation fail), show marker
    var oldLat = document.getElementById('latitude').value;
    var oldLng = document.getElementById('longitude').value;
    if (oldLat && oldLng) {
        marker = L.marker([oldLat, oldLng]).addTo(map);
        map.setView([oldLat, oldLng], 15);
    }
</script>


</body>
</html>
