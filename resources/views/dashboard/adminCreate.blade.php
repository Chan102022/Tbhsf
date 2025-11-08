@extends('admin.layout')

@section('content')

<div id="createAccount" class="info-section active">
    <h2>Create New Account</h2>

    <form method="POST" action="{{ route('admin.account.store') }}">
        @csrf

        <label for="name">Name</label>
        <input type="text" placeholder="Enter Fullname" name="name" value="{{ old('name') }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="email" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label for="role">Role</label>
        <select name="role" required>
            <option value="">-- Select Role --</option>
            <option value="admin" {{ old('role')=='admin' ? 'selected':'' }}>Admin</option>
            <option value="tenant" {{ old('role')=='tenant' ? 'selected':'' }}>Tenant</option>
            <option value="landlord" {{ old('role')=='landlord' ? 'selected':'' }}>Landlord</option>
        </select>
        @error('role') <div class="error">{{ $message }}</div> @enderror

        <label for="contact">Contact Number</label>
        <input type="text" name="contact" value="{{ old('contact') }}" placeholder="+639123456789" required>
        @error('contact') <div class="error">{{ $message }}</div> @enderror

        <label for="password">Password</label>
        <input type="password" placeholder="Atleast 8 letters" name="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Create Account</button>
    </form>
</div>

<style>
    .info-section {
        display: block; /* Changed from none to block so it shows automatically */
        margin-top: 20px;
        background-color:  #01236cf2;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        
    }

    .info-section h2 {
        color:white;
        text-shadow: 0 0 6px #1abc9c77;
        margin-bottom: 15px;
    }

    .info-section form input,
    .info-section form select {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border-radius: 6px;
        border: none;
        font-size: 1rem;
        color:black;
    }

    .info-section form button {
        background-color: white;
        color: #2c3e50;
        border: none;
        border-radius: 8px;
        padding: 10px 15px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 12px #16a085cc;
        transition: all 0.3s ease;
    }

    .info-section form button:hover {
        background-color: #01236cf2;
        box-shadow: 0 6px 18px #138d75dd;
        color:white;
    }

    .error {
        color: #e74c3c;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    label{
        color: white;
       
    }
    input{
        color:black;
        background-color:  white;
    }
</style>

@endsection
