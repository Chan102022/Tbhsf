@extends('dashboard.tenant.layout')

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
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto 40px auto;
    }

    .card {
        background-color: #01236cf2;
        border-radius: 10px;
        padding: 15px;
        box-shadow:
            0 4px 15px rgba(0, 0, 0, 0.4),
            inset 0 0 10px #1abc9c33;
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
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
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }
</style>

<h2 class="h2">Available Boarding Houses</h2>

<div class="card-grid">
    @forelse ($boardingHouses as $house)
        <div class="card">
            @if($house->image)
                <img src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->property_name }}" class="dashboard-image">
            @endif
            <p><strong>Boarding House:</strong> {{ $house->property_name }}</p>
            <p><strong>Description:</strong> {{ $house->property_description }}</p>
            <p><strong>Price:</strong> ₱{{ $house->property_price }}</p>
            <p><strong>Landlord:</strong> {{ $house->name }}</p>
            <p><strong>Contact:</strong> {{ $house->contact }}</p>
            <p><strong>Added On:</strong> {{ $house->adding_date }}</p>
        </div>
    @empty
        <p style="text-align:center;color:black;">No boarding houses available at the moment.</p>
    @endforelse
</div>
@endsection
