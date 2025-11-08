@extends('admin.layout')

@section('content')
@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="btn-container">
    <button class="suggestion-btn" onclick="showSection('tenant')">Show Tenant Messages</button>
    <button class="suggestion-btn" onclick="showSection('landlord')">Show Landlord Messages</button>
</div>

<div id="tenant" class="info-section">
    <h2>Tenant Uploaded Info</h2>
    @forelse ($tenantSuggestions as $tenant)
        <div class="card">
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
        </div>
    @empty
        <p>No tenant messages available.</p>
    @endforelse
</div>

<div id="landlord" class="info-section">
    <h2>Landlord Uploaded Info</h2>
    @forelse ($landlordSuggestions as $landlord)
        <div class="card">
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
        </div>
    @empty
        <p>No landlord messages available.</p>
    @endforelse
</div>

@endsection

@section('styles')
<style>
.btn-container {
    margin-bottom: 20px;
    text-align: center;
}

.suggestion-btn {
    background-color: #3498db;
    color: #fff;
    padding: 10px 18px;
    margin: 0 8px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.suggestion-btn:hover {
    background-color: #2980b9;
    box-shadow: 0 0 12px #2980b9aa;
}

.info-section {
    display: none;
    margin-top: 20px;
}

.info-section.active {
    display: block;
}

.card {
    background-color: #f4f6f8;
    padding: 15px 20px;
    margin-bottom: 15px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.card ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.card li {
    margin: 5px 0;
}

.delete-btn {
    background-color: #e74c3c;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    margin-top: 10px;
    transition: background-color 0.3s ease;
}

.delete-btn:hover {
    background-color: #c0392b;
}

.alert-success {
    text-align: center;
    background-color: #2ecc71;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    color: #fff;
    font-weight: bold;
}
</style>
@endsection

@section('scripts')
<script>
function showSection(sectionId) {
    document.querySelectorAll('.info-section').forEach(section => section.classList.remove('active'));
    document.getElementById(sectionId).classList.add('active');
}
</script>
@endsection
