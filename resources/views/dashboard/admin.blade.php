@extends('admin.layout')

@section('content')
 

   <div class="card">
    <h2>Overview Users</h2>
    <div class="user-counter">
        <h3>Total Users: {{ $totalUsers }}</h3>
        <p>Tenants: {{ $tenantCount }}</p>
        <p>Landlords: {{ $landlordCount }}</p>
        <p>Admins: {{ $adminCount }}</p>
    </div>

    <!-- Smaller Pie Chart -->
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
            color: 'yellow', // Legend label color
            font: {
                size: 16,
                weight: 'bold'
            }
        }
    },
    title: {
        display: true,
        text: 'User Distribution',
        color: 'yellow',       // Title color
        font: {
            size: 20,          // Bigger font
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
    /* Limit chart size with CSS as well */
    #userPieChart {
        max-width: 300px;
        max-height: 300px;
        margin: 0 auto;
        display: block;
    }
</style>


@endsection
