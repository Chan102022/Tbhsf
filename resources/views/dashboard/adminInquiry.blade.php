@extends('admin.layout')

@section('content')
    <div class="btn-container">
        <button class="suggestion-btn" onclick="showSection('tenant')">Show Tenant Messages</button>
        <button class="suggestion-btn" onclick="showSection('landlord')">Show Landlord Messages</button>
    

    <div id="tenant" class="info-section">
        <h2>Tenant Uploaded Info</h2>
        @forelse ($tenantSuggestions as $tenant)
            <ul>
                <li><strong>Name:</strong> {{ $tenant->name }}</li>
                <li><strong>Contact:</strong> {{ $tenant->contact }}</li>
                <li><strong>Suggestion:</strong> {{ $tenant->suggestion }}</li>
                <li><strong>Uploaded on:</strong> {{ $tenant->created_at->format('Y-m-d') }}</li>
                <li>
                    <form action="{{ route('admin.suggestion.tenant.delete', $tenant->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            </ul>
        @empty
            <p>No tenant messages available.</p>
        @endforelse
    </div>

    <div id="landlord" class="info-section">
        <h2>Landlord Uploaded Info</h2>
        @forelse ($landlordSuggestions as $landlord)
            <ul>
                <li><strong>Name:</strong> {{ $landlord->name }}</li>
                <li><strong>Contact:</strong> {{ $landlord->contact }}</li>
                <li><strong>Suggestion:</strong> {{ $landlord->suggestion }}</li>
                <li><strong>Uploaded on:</strong> {{ $landlord->created_at->format('Y-m-d') }}</li>
                <li>
                    <form action="{{ route('admin.suggestion.landlord.delete', $landlord->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            </ul>
        @empty
            <p>No landlord messages available.</p>
        @endforelse
    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.info-section').forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
@endsection
