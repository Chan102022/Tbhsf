@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #2c3e50;
        color: #a0d8ef;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 40px;
    }

    h2 {
        color: #37b6e8ff;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 0 0 8px #1abc9c88;
    }

    .card {
        background-color: #34495e;
        border-radius: 10px;
        padding: 25px;
        box-shadow:
            0 4px 15px rgba(0, 0, 0, 0.4),
            inset 0 0 10px #1abc9c33;
        margin-bottom: 40px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .card p {
        margin: 8px 0;
        color: #ecf0f1;
        font-size: 1rem;
    }

    .btn-book {
        background-color: #37b6e8ff;
        color: #2c3e50;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 0 12px #24c9ee88;
    }

    .btn-book:hover {
        background-color: #47e0eeff;
        box-shadow: 0 0 20px #16a085aa;
    }

    .alert-success {
        background-color: #27ae60;
        padding: 12px;
        border-radius: 8px;
        text-align: center;
        color: #ecf0f1;
        margin-bottom: 25px;
        max-width: 700px;
        margin: 0 auto 25px auto;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.3);
    }

    .btn-back {
        display: block;
        width: fit-content;
        margin: 40px auto 0 auto;
        padding: 10px 20px;
        background-color: #37b6e8ff;
        color: #2c3e50;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 0 12px #24c9ee88;
    }

    .btn-back:hover {
        background-color: #47e0eeff;
        box-shadow: 0 0 20px #16a085aa;
    }

    .booking-form {
        margin-top: 15px;
        margin-bottom: 30px;
    }
</style>

@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<h2>Available Boarding Houses</h2>

@forelse ($boardingHouses as $house)
    <div class="card">
        <p><strong>Landlord Name:</strong> {{ $house->name }}</p>
        <p><strong>Contact:</strong> {{ $house->contact }}</p>
        <p><strong>Boarding House:</strong> {{ $house->property_name }}</p>
        <p><strong>Description:</strong> {{ $house->property_description }}</p>
        <p><strong>Price:</strong> ₱{{ $house->property_price }}</p>
        <p><strong>Added On:</strong> {{ $house->adding_date }}</p>

        <form action="{{ route('tenant.book') }}" method="POST" class="booking-form" onsubmit="return confirm('Book this boarding house?');">
            @csrf
            <input type="hidden" name="property_name" value="{{ $house->property_name }}">
            <input type="hidden" name="landlord_id" value="{{ $house->user_id }}">
            <input type="hidden" name="landlord_name" value="{{ $house->name }}">
            <input type="hidden" name="landlord_contact" value="{{ $house->contact }}">
            <button type="submit" class="btn-book">Book Now</button>
        </form>
    </div>
@empty
    <p style="text-align:center;">No boarding houses available at the moment.</p>
@endforelse

<a href="{{ route('tenant.dashboard') }}" class="btn-back">← Back to Dashboard</a>
@endsection
