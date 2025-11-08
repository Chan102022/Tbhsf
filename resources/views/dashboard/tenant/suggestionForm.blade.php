{{-- resources/views/tenant/message.blade.php --}}
@extends('dashboard.tenant.layout') {{-- Extends your tenant layout --}}

@section('content')
    <h1 class="h1">Send Admin a Message</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" method="POST" action="{{ route('tenant.suggestion.submit') }}">
        @csrf
        <label for="name">Name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required />

        <label for="contact">Contact</label>
        <input id="contact" name="contact" type="text" value="{{ old('contact') }}" required />

        <label for="suggestion">Message</label>
        <textarea id="suggestion" name="suggestion" rows="5" required>{{ old('message') }}</textarea>

        <button class="submit-button" type="submit">Submit Message</button>
    </form>


    <style>
        .h1 {
            text-align: center;
            color:#01236cf2;
            margin-bottom: 30px;
            text-shadow: 0 0 8px white;
        }

        .form {
            background-color: #01236cf2;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4), inset 0 0 10px #1abc9c33;
            max-width: 600px;
            margin: 0 auto 20px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #ecf0f1;
        }

        input, textarea {
            width: 97%;
            padding: 10px;
            border-radius: 6px;
            border: none;
            margin-bottom: 20px;
            font-size: 1rem;
            background-color: #ecf0f1;
            color: #2c3e50;
        }

        .submit-button{
            background-color: yellow;
            border: none;
            color: #2c3e50;
            font-weight: 700;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 0 12px #24c9ee88;
        }

        .submit-button:hover {
            background-color: #01236cf2;
            box-shadow: 0 0 20px white;
            color:yellow;
        }

        .success-message {
            background-color:  #01236cf2;
            color: white;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 0 8px rgba(0,0,0,0.3);
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            background: rgba(231, 76, 60, 0.1);
            padding: 10px;
            border-radius: 6px;
        }

        a.back-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #37b6e8ff;
            text-decoration: none;
            font-weight: 600;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
@endsection
