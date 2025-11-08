@extends('admin.layout')

@section('content')

<div class="card">
    <h2 style="color: #01236cf2">Overview Users</h2>

    <!-- Colored Boxes -->
    <div class="user-counter" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-bottom: 30px;">
        <!-- Tenant Box -->
        <div class="user-box tenant-box">
            <h3>{{ $tenantCount }}</h3>
            <p>Tenants</p>
        </div>

        <!-- Landlord Box -->
        <div class="user-box landlord-box">
            <h3>{{ $landlordCount }}</h3>
            <p>Landlords</p>
        </div>

        <!-- Admin Box -->
        <div class="user-box admin-box">
            <h3>{{ $adminCount }}</h3>
            <p>Admins</p>
        </div>

        <!-- Boarding House Box -->
        <div class="user-box boarding-house-box">
            <h3>{{ $totalBoardingHouses }}</h3>
            <p>Boarding Houses</p>
        </div>

        <!-- Reservations Box -->
        <div class="user-box reservation-box">
            <h3>{{ $totalReservations }}</h3>
            <p>Reservations</p>
        </div>
    </div>

    <!-- Pie Chart -->
    <canvas id="userPieChart" width="300" height="300"></canvas>
</div>

<script>
    const data = {
        labels: ['Tenants', 'Landlords', 'Admins'],
        datasets: [{
            label: 'User Distribution',
            data: [{{ $tenantCount }}, {{ $landlordCount }}, {{ $adminCount }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)', // blue
                'rgba(255, 99, 132, 0.7)', // red
                'rgba(255, 206, 86, 0.7)'  // yellow
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
        }]
    };

    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: 'yellow',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'User Distribution',
                    color: 'yellow',
                    font: {
                        size: 20,
                        weight: 'bold'
                    }
                }
            }
        },
    };

    const ctx = document.getElementById('userPieChart').getContext('2d');
    new Chart(ctx, config);
</script>

<style>
    /* Boxes */
    .user-box {
        width: 200px;
        height: 120px;
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        color: white;
        font-size: 2rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .tenant-box { background-color: #36A2EB; }       /* Blue */
    .landlord-box { background-color: #FF6384; }     /* Red */
    .admin-box { background-color: #FFCE56; color: white; } /* Yellow */
    .boarding-house-box { background-color: #4BC0C0; } /* Teal */
    .reservation-box { background-color: #9966FF; }  /* Purple */

    .user-box p {
        margin: 5px 0 0;
        font-size: 1rem;
        font-weight: normal;
    }

    /* Pie Chart styling */
    #userPieChart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
        display: block;
    }
</style>

@endsection
