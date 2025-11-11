@extends('dashboard.landlord.layout')

@section('content')
    <div class="card" style="max-width: 700px; margin: auto;">
        <h2 style="text-align: center; color: #f1c40f; margin-bottom: 30px;">
            Add Boarding House
        </h2>

        @if (session('success'))
            <div style="text-align:center; color:#2ecc71; margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('landlord.boarding.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="name" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Your Name
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50;">
            @error('name')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="contact" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Contact
            </label>
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50;">
            @error('contact')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="property_name" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Boarding House Name
            </label>
            <input type="text" id="property_name" name="property_name" value="{{ old('property_name') }}" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50;">
            @error('property_name')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="property_description" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Description
            </label>
            <textarea id="property_description" name="property_description" required
                      style="width:100%; padding:10px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50; resize:vertical; height:100px;">{{ old('property_description') }}</textarea>
            @error('property_description')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="image" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Boarding House Image
            </label>
            <input type="file" id="image" name="image" accept="image/*" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1;">
            @error('image')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="property_price" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Price
            </label>
            <input type="text" id="property_price" name="property_price" value="{{ old('property_price') }}" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50;">
            @error('property_price')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label for="adding_date" style="display:block; margin-bottom:6px; font-weight:bold; color:#1abc9c;">
                Available From
            </label>
            <input type="date" id="adding_date" name="adding_date" value="{{ old('adding_date') }}" required
                   style="width:100%; padding:10px; margin-bottom:15px; border:none; border-radius:6px; background-color:#ecf0f1; color:#2c3e50;">
            @error('adding_date')
                <div style="color:#e74c3c; font-size:0.9rem; margin-top:-10px; margin-bottom:15px;">{{ $message }}</div>
            @enderror

            <label style="display:block; margin-bottom:8px; font-weight:bold; color:#1abc9c;">
                Select Location on Map
            </label>
            <div id="map" style="height:300px; margin-bottom:20px; border-radius:10px;"></div>

            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">

            <button type="submit"
                    style="background-color:#1abc9c; color:#2c3e50; padding:12px 20px; border:none; border-radius:6px; font-weight:bold; cursor:pointer; width:100%; transition:background-color 0.3s ease;">
                Submit
            </button>

        </form>
    </div>
@endsection

@section('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
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

                map.setView([lat, lng], 15);
                marker = L.marker([lat, lng]).addTo(map);

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            }, function() {
                console.log("Geolocation permission denied or unavailable.");
            });
        } else {
            console.log("Geolocation not supported by this browser.");
        }

        // Allow manual marker placement
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

        // If old coordinates exist (validation fail), restore them
        var oldLat = document.getElementById('latitude').value;
        var oldLng = document.getElementById('longitude').value;
        if (oldLat && oldLng) {
            marker = L.marker([oldLat, oldLng]).addTo(map);
            map.setView([oldLat, oldLng], 15);
        }
    </script>
@endsection
