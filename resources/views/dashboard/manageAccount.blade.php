<!-- resources/views/admin/manage-account.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Account - Trinidad Boarding House</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #f1c40f;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #34495e;
            box-shadow: 0 0 12px rgba(0,0,0,0.4);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1abc9c;
            color: #2c3e50;
        }

        tr:nth-child(even) {
            background-color: #3b5870;
        }

        tr:hover {
            background-color: #49667f;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #f1c40f;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .centered {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

    <h1>Manage Accounts</h1>

    @if (session('success'))
        <p style="color: #2ecc71; text-align:center;">{{ session('success') }}</p>
    @endif

    @if ($users->count())
        <table>
           <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th> <!-- Added role header -->
        <th style="width: 120px;">Action</th>
    </tr>
</thead>

            <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td> <!-- Display the role -->
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
        <div class="centered">
            <p>No user accounts found.</p>
        </div>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="back-link">← Back to Admin Dashboard</a>

</body>
</html>
