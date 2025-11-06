@extends('admin.layout')

@section('content')
    <div class="card">
        <h2>Hello Admin, Welcome Back!</h2>
        <p>Manage your system bookings, addings, and suggestions.</p>
    </div>

    <div class="card">
        <h2>Overview Users</h2>
        <div class="user-counter">
            <h3>Total Users: {{ $totalUsers }}</h3>
            <p>Tenants: {{ $tenantCount }}</p>
            <p>Landlords: {{ $landlordCount }}</p>
        </div>
    </div>
@endsection
