<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            background-image: url('{{ asset('image/566631067_1257982686081335_3656752457094491588_n.jpg') }}');
            background-position:center;
            background-size:cover;
            height: 100vh;
            margin: 0;
            padding: 0;
            color: #a0d8ef;
            font-family: bankora, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .auth-container {
            background-color: #01236cf2;
            padding: 3rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(253, 251, 251, 1), inset 0 0 10px #00000033;
            text-align: center;
            max-width: 450px;
            width: 90%;
            color: white;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color:yellow;
        }

        input {
            width: 90%;
            padding: 0.6rem;
            margin: 0.5rem 0;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 1rem;
        }

        .btn {
            display: inline-block;
            background-color: white;
            color: black;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 0 5px black;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-login {
            padding: 0.8rem 2.5rem;
            font-size: 1.3rem;
            margin: 0.5rem 0;
            
        }
        .btn-login:hover {
            padding: 0.8rem 2.5rem;
            font-size: 1.3rem;
            margin: 0.5rem 0;
            margin-top:20px;
            background-color:yellow;
        }

        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.95rem;
            margin: 0.3rem;
        }
        .btn-small:hover {
            padding: 1rem 1rem;
            font-size: 0.95rem;
            margin: 0.3rem;
            background-color:yellow;
        }

        .toggle-section {
            margin-top: 0.5rem;
            font-size: 1rem;
            line-height: 1.6;
        }

        .note {
            font-size: 0.85rem;
            color: #f1c40f;
            margin-top: 1rem;
            line-height: 1.4;
        }
       label{
        color:white;
       }

        [x-cloak] { display: none; }
    </style>
</head>
<body>
<div x-data="{ showLogin: true, showAdmin: false }" class="auth-container">
    {{-- LOGIN FORM --}}
    <div x-show="showLogin" x-transition.opacity.duration.400ms x-cloak>
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" required><br>
            <label for="email">Password</label>
            <input type="password" name="password" placeholder="Password" required><br>
            <div class="toggle-section">
            <a href="{{ route('password.request') }}" class="btn btn-small">Forgot Password</a>
            <span class="btn btn-small" @click="showLogin = false">Register Here</span>
             </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>

       
    </div>

    {{-- REGISTER FORM --}}
    <div x-show="!showLogin" x-transition.opacity.duration.400ms x-cloak>
        <h1>Register (Tenant Only)</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="contact" placeholder="Contact Number" required><br>
            <input type="hidden" name="role" value="tenant">
            <input type="password" name="password" placeholder="Password must be 8 character" required><br>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>

            <div style="margin-top: 0.8rem;">
                <button type="submit" class="btn btn-login" style="margin-right: 0.5rem;">Register</button>
                <button type="button" class="btn btn-login" @click="showAdmin = !showAdmin">Contact Admin</button>
            </div>
        </form>

        <div x-show="showAdmin" x-transition.opacity.duration.400ms class="note">
            <strong>Admin Email:</strong> admin@example.com <br>
            <strong>Contact Number:</strong> +1 234 567 890
        </div>

        <div class="toggle-section" style="margin-top: 1.5rem;">
            <span class="btn btn-small" @click="showLogin = true">Login Here</span>
        </div>

        <div class="note" style="margin-top: 1rem;">
            ⚠️ Only tenants can register here. If you are a landlord, please contact the admin for verification.
        </div>
    </div>
</div>
</body>
</html>
