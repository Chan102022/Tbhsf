@extends('admin.layout')

@section('content')
@if(session('success'))
    <div style="text-align:center;background-color:#2ecc71;padding:10px;border-radius:5px;margin-bottom:20px;">
        {{ session('success') }}
    </div>
@endif


<div id="tenantbook" class="info-section">
    <h2>Tenant Reservation Info</h2>
    @forelse ($tenantBooking as $tenantbook)
        <ul>
            <li><strong>Name:</strong> {{ $tenantbook->name }}</li>
            <li><strong>Contact:</strong> {{ $tenantbook->contact }}</li>
            <li><strong>Uploaded on:</strong> {{ $tenantbook->created_at->format('Y-m-d') }}</li>
            <li>
                <form action="{{ route('admin.tenantbooking.delete', $tenantbook->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tenant booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="margin-top:10px;background-color:#e74c3c;color:white;padding:8px 12px;border:none;border-radius:5px;cursor:pointer;">
                        Delete
                    </button>
                </form>
            </li>
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
        <p>No landlord added boarding houses available.</p>
    @endforelse
</div>
@endsection

@section('scripts')
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
@endsection
