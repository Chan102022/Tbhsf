@extends('dashboard.landlord.layout')

@section('content')
<style>
    .h2 {
        color: #01236cf2;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 8px #01236cf2;
    }

    .profile-card {
        max-width: 700px;
        margin: 0 auto 40px auto;
        background-color: #01236cf2;
        color: yellow;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 
            0 4px 15px rgba(0, 0, 0, 0.4),
            inset 0 0 10px #1abc9c33;
    }

    .profile-card p {
        font-size: 1rem;
        margin: 10px 0;
    }

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
        margin-top: 10px;
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

    .no-reservations {
        text-align: center;
        color: black;
        font-size: 1rem;
        margin-top: 20px;
    }
</style>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<h2 class="h2">My Addings</h2>

<div class="card-grid">
    @forelse($bookingsland as $bookingland)
        <div class="card">
            <p><strong>Boarding House:</strong> {{ $bookingland->property_name }}</p>
            <p><strong>Landlord:</strong> {{ $bookingland->landlord_name }}</p>
            <p><strong>Landlord Contact:</strong> {{ $bookingland->landlord_contact }}</p>
            <p><strong>Available in:</strong> {{ \Carbon\Carbon::parse($bookingland->booking_date)->format('F j, Y g:i A') }}</p>
            <p><strong>Total Reserved:</strong></p>

            @if($bookingland->image)
                <img src="{{ asset('storage/' . $bookingland->image) }}" alt="Boarding House Image" class="dashboard-image">
            @endif

            @if($bookingland->latitude && $bookingland->longitude)
                <div id="map-{{ $bookingland->id }}" class="map-container"></div>
            @endif

            <!-- Inline Delete Reservation Button -->
            <form action="{{ route('landlord.adding.delete', $bookingland->id) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this Boarding House?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-btn">Delete Boarding House</button>
</form>

        </div>
    @empty
        <p class="no-reservations">You have no Boarding House Posted yet.</p>
    @endforelse
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($bookingsland as $bookingland)
        @if($bookingland->latitude !== null && $bookingland->longitude !== null)
            (function() {
                var lat = {{ $bookingland->latitude }};
                var lng = {{ $bookingland->longitude }};
                var map = L.map('map-{{ $bookingland->id }}').setView([lat, lng], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(map);
                L.marker([lat, lng])
                 .bindPopup("<strong>{{ $bookingland->property_name }}</strong>")
                 .addTo(map);
            })();
        @endif
    @endforeach
});
</script>
@endsection

<style>
.delete-btn {
    background-color: #f39c12; /* warm yellow */
    color: #01236cf2; /* dark-blue text to match theme */
    border: 2px solid #f1c40f;
    padding: 6px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.delete-btn:hover {
    background-color: #e67e22;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}
</style>

@endsection
