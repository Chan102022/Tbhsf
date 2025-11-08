@extends('admin.layout')

@section('content')

<div id="manageAccounts" class="info-section active">
    <h2>Manage Accounts</h2>

    @if (session('success'))
        <p style="color: #2ecc71; margin-bottom: 15px;">{{ session('success') }}</p>
    @endif

    @if ($users->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 120px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.account.delete', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this account?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="margin-top: 15px;">No user accounts found.</p>
    @endif
</div>

<style>
    .info-section {
        display: block; /* Make it visible by default */
        margin-top: 20px;
        background-color:  #01236cf2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .info-section h2 {
        color: white;
        text-shadow: 0 0 6px #1abc9c77;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 12px rgba(0,0,0,0.4);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
    }

    th {
        background-color:  #01236cf2;
        color: white;
    }

    tr:nth-child(even) {
        background-color: yellow;
    }

    tr:hover {
        background-color: yellow;
    }

    .delete-btn {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c0392b;
    }

    .back-btn {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        color: #f1c40f;
        font-weight: bold;
    }

    .back-btn:hover {
        text-decoration: underline;
    }
</style>

@endsection
