@extends('dashboard.landlord.layout')

@section('content')
<style>
    .h2 {
        color: #01236cf2;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 8px #01236cf2;
    }

    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto 40px auto;
    }

    .card {
        background-color: #01236cf2;
        color: yellow;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4),
                    inset 0 0 10px #1abc9c33;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-4px);
    }

    .card p {
        margin: 6px 0;
        font-size: 0.9rem;
    }

    .dashboard-image {
        width: 100%;
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

    .no-reservations {
        text-align: center;
        color: black;
        font-size: 1rem;
        margin-top: 20px;
    }

    .status {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .status-pending { background-color: #f1c40f; color: #01236cf2; }
    .status-approved { background-color: #27ae60; color: #fff; }
    .status-cancelled { background-color: #e74c3c; color: #fff; }

    .status-dropdown {
    padding: 4px 8px;
    border-radius: 5px;
    font-weight: bold;
    border: none;
    cursor: pointer;
    color: #01236cf2;
    background-color: #f1c40f;
}

.status-dropdown option[selected="selected"] {
    font-weight: bold;
}


</style>

<h2 class="h2">Tenant Reservations</h2>

<div class="card-grid">
    @forelse($properties as $property)
        @forelse($property->bookings as $booking)
            <div class="card">
                <p><strong>Boarding House:</strong> {{ $property->property_name }}</p>
                @if($property->image)
                    <img src="{{ asset('storage/' . $property->image) }}" alt="Property Image" class="dashboard-image">
                @endif

                <p><strong>Tenant Name:</strong> {{ $booking->tenant->name }}</p>
                <p><strong>Email:</strong> {{ $booking->tenant->email }}</p>
                 <p><strong>Contact:</strong> {{ $booking->tenant->contact }}</p>
                <p><strong>Reserved At:</strong> {{ \Carbon\Carbon::parse($booking->created_at)->format('F j, Y g:i A') }}</p>
                <p><strong>Status:</strong></p>
<form action="{{ route('landlord.booking.updateStatus', $booking->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <select name="status" onchange="this.form.submit()" class="status-dropdown">
        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="approved" {{ $booking->status === 'approved' ? 'selected' : '' }}>Approved</option>
        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>
</form>


                @if($property->latitude && $property->longitude)
                    <div id="map-{{ $booking->id }}" class="map-container"></div>
                @endif
            </div>
        @empty
            <div class="card">
                <p>No tenants have booked <strong>{{ $property->property_name }}</strong> yet.</p>
            </div>
        @endforelse
    @empty
        <p class="no-reservations">You have no properties posted yet.</p>
    @endforelse
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($properties as $property)
        @foreach($property->bookings as $booking)
            @if($property->latitude && $property->longitude)
                (function() {
                    var lat = {{ $property->latitude }};
                    var lng = {{ $property->longitude }};
                    var map = L.map('map-{{ $booking->id }}').setView([lat, lng], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(map);
                    L.marker([lat, lng])
                     .bindPopup("<strong>{{ $property->property_name }}</strong>")
                     .addTo(map);
                })();
            @endif
        @endforeach
    @endforeach
});
</script>
@endsection

@endsection
