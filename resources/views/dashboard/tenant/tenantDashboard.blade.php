@extends('dashboard.tenant.layout')

@section('content')
<style>
    .h2 {
        color: #01236cf2;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 8px #01236cf2;
    }

    /* Grid container for cards */
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto 40px auto;
    }

    .card {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    background-color: #01236cf2;
    border-radius: 10px;
    padding: 15px;
    box-shadow:
        0 4px 15px rgba(0, 0, 0, 0.4),
        inset 0 0 10px #1abc9c33;
    transition: transform 0.3s ease;
}

    .card:hover {
        transform: translateY(-4px);
    }

    .card p {
        margin: 6px 0;
        color: yellow;
        font-size: 0.9rem;
    }

   .btn-book {
    width: 100%; /* Make it full width at the bottom */
    background-color: #37b6e8ff;
    color: #2c3e50;
    padding: 10px;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 8px #24c9ee88;
    font-size: 0.95rem;
}

    .btn-book:hover {
        background-color: #47e0eeff;
        box-shadow: 0 0 15px #16a085aa;
    }

    .alert-success {
        background-color: #27ae60;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        color: #ecf0f1;
        margin-bottom: 25px;
        max-width: 700px;
        margin: 0 auto 25px auto;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.3);
        font-size: 0.95rem;
    }

    .dashboard-image {
        width: 200px;
        max-height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .map-container {
        width: 100%;
        height: 150px;
        border-radius: 8px;
        margin-bottom: 10px;
    }

   .booking-form {
    margin-top: auto; /* Push form to the bottom */
}

</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<h2 class="h2">Available Boarding Houses</h2>

<div class="card-grid">
    @forelse ($boardingHouses as $house)
        <div class="card">
            <p><strong>Landlord Name:</strong> {{ $house->name }}</p>
            <p><strong>Contact:</strong> {{ $house->contact }}</p>
            <p><strong>Boarding House:</strong> {{ $house->property_name }}</p>
            <p><strong>Description:</strong> {{ $house->property_description }}</p>
            <p><strong>Price:</strong> ₱{{ $house->property_price }}</p>
            <p><strong>Added On:</strong> {{ $house->adding_date }}</p>

            @if($house->image)
                <img src="{{ asset('storage/' . $house->image) }}" alt="Boarding House Image" class="dashboard-image">
            @endif

            @if($house->latitude && $house->longitude)
                <div id="map-{{ $house->id }}" class="map-container"></div>
            @endif

           <form action="{{ route('tenant.book') }}" method="POST" class="booking-form" onsubmit="return confirm('Reserve this boarding house?');">
    @csrf
    <input type="hidden" name="property_name" value="{{ $house->property_name }}">
    <input type="hidden" name="landlord_id" value="{{ $house->user_id }}">
    <input type="hidden" name="landlord_name" value="{{ $house->name }}">
    <input type="hidden" name="landlord_contact" value="{{ $house->contact }}">
    <input type="hidden" name="latitude" value="{{ $house->latitude }}">
    <input type="hidden" name="longitude" value="{{ $house->longitude }}">
    <button type="submit" class="btn-book">Reserve Now</button>
</form>

        </div>
    @empty
        <p style="text-align:center;color:black;">No boarding houses available at the moment.</p>
    @endforelse
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($boardingHouses as $house)
        @if($house->latitude !== null && $house->longitude !== null)
            (function() {
                var lat = {{ $house->latitude }};
                var lng = {{ $house->longitude }};
                var map = L.map('map-{{ $house->id }}').setView([lat, lng], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
                L.marker([lat, lng])
                 .bindPopup("<strong>{{ $house->property_name }}</strong>")
                 .addTo(map);
            })();
        @endif
    @endforeach
});
</script>
@endsection
