<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile - Trinidad Boarding House</title>
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

        .profile-container {
            max-width: 600px;
            margin: auto;
            background-color: #34495e;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .profile-container h2 {
            color: #1abc9c;
            margin-bottom: 20px;
            text-shadow: 0 0 6px #1abc9c88;
        }

        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #1abc9c;
            box-shadow: 0 4px 8px #1abc9c88;
            margin-bottom: 20px;
        }

        .profile-info {
            text-align: left;
            margin-top: 20px;
        }

        .profile-info p {
            font-size: 1rem;
            margin: 10px 0;
            color: #a0d8ef;
        }

        .edit-btn {
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
            margin-top: 30px;
        }

        .edit-btn:hover {
            background-color: #16a085;
            box-shadow: 0 6px 18px #138d75dd;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <h2>User Profile</h2>

        {{-- Profile picture --}}
        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-profile.png') }}" alt="Profile Picture" class="profile-pic">

        <div class="profile-info">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        {{-- Edit Profile Button --}}
        <a href="{{ route('profile.edit') }}">
            <button class="edit-btn">Edit Profile</button>
        </a>
    </div>

</body>
</html>
