<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Trinidad Boarding House - Suggestions</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #a0d8ef;
            padding: 40px;
        }

        .btn-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        button.suggestion-btn, a.back-btn {
            background-color: #1abc9c;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
            color: #2c3e50;
            cursor: pointer;
            box-shadow: 0 4px 12px #16a085cc;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            flex: 1;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        button.suggestion-btn:hover, a.back-btn:hover {
            background-color: #16a085;
            box-shadow: 0 6px 18px #138d75dd;
        }

        .info-section {
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            background-color: #34495e;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            display: none; /* hidden by default */
        }

        .info-section.active {
            display: block;
        }

        h2 {
            color: #1abc9c;
            margin-bottom: 15px;
            text-shadow: 0 0 6px #1abc9c77;
        }

        ul {
            list-style: disc;
            padding-left: 20px;
            color: #a0d8ef;
        }

        ul li {
            margin-bottom: 8px;
        }
    </style>
</head>
@if(session('success'))
    <div style="text-align:center;background-color:#2ecc71;padding:10px;border-radius:5px;margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif

<body>

    <div class="btn-container">
        <button class="suggestion-btn" onclick="showSection('tenantbook')">Show Tenant Booking</button>
        <button class="suggestion-btn" onclick="showSection('landlordadd')">Show Landlord Added Boarding House</button>
        <a href="{{ route('admin.dashboard') }}" class="back-btn">Back to Admin Dashboard</a>
    </div>

   <div id="tenantbook" class="info-section">
    <h2>Tenant Booking Info</h2>
    @forelse ($tenantBooking as $tenantbook)
        <ul>
            <li><strong>Name:</strong> {{ $tenantbook->name }}</li>
            <li><strong>Contact:</strong> {{ $tenantbook->contact }}</li>
            <li><strong>Uploaded on:</strong> {{ $tenantbook->created_at->format('Y-m-d') }}</li>
        </ul>
    @empty
        <p>No tenant booking available.</p>
    @endforelse
</div>

<div id="landlordadd" class="info-section">
    <h2>Landlord Adding Info</h2>
   @forelse ($landlordAdding as $landlordAdd)
    <ul>
        <li><strong>Name:</strong> {{ $landlordAdd->name }}</li>
        <li><strong>Contact:</strong> {{ $landlordAdd->contact }}</li>
        <li><strong>BoardingHouse Name:</strong> {{ $landlordAdd->property_name }}</li>
        <li><strong>Description:</strong> {{ $landlordAdd->property_description }}</li>
        <li><strong>Price:</strong> {{ $landlordAdd->property_price }}</li>
        <li><strong>Uploaded on:</strong> {{ $landlordAdd->created_at->format('Y-m-d') }}</li>
        <li>
            <form action="{{ route('admin.boarding.delete', $landlordAdd->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this boarding house?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="margin-top:10px;background-color:#e74c3c;color:white;padding:8px 12px;border:none;border-radius:5px;cursor:pointer;">
                    Delete
                </button>
            </form>
        </li>
    </ul>
@empty
    <p>No landlord Added available BoardingHouse.</p>
@endforelse

</div>


    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.info-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.add('active');
            }
        }
    </script>

</body>
</html>