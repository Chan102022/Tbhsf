@extends('dashboard.landlord.layout')

@section('content')
    <div class="card" style="max-width: 600px; margin: auto;">
        

        @if(session('success'))
            <p style="color: #2ecc71; text-align: center; margin-bottom: 20px;">
                {{ session('success') }}
            </p>
        @endif

        @if ($errors->any())
            <div style="color: #e74c3c; margin-bottom: 15px;">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('landlord.suggestion.submit') }}">
            @csrf

            <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600;">
                Name
            </label>
            <input id="name" name="name" type="text"
                value="{{ old('name') }}"
                required
                style="width: 100%; padding: 10px; border-radius: 6px; border: none; margin-bottom: 20px; font-size: 1rem;" />

            <label for="contact" style="display: block; margin-bottom: 8px; font-weight: 600;">
                Contact
            </label>
            <input id="contact" name="contact" type="text"
                value="{{ old('contact') }}"
                required
                style="width: 100%; padding: 10px; border-radius: 6px; border: none; margin-bottom: 20px; font-size: 1rem;" />

            <label for="suggestion" style="display: block; margin-bottom: 8px; font-weight: 600;">
                Messages
            </label>
            <textarea id="suggestion" name="suggestion" rows="5" required
                style="width: 100%; padding: 10px; border-radius: 6px; border: none; margin-bottom: 20px; font-size: 1rem;">{{ old('suggestion') }}</textarea>

            <button type="submit"
                style="background-color: yellow; border: none; color: #2c3e50; font-weight: 700; padding: 12px 20px; border-radius: 10px; cursor: pointer; width: 100%; font-size: 1rem; transition: background-color 0.3s ease;">
                Submit Message
            </button>
        </form>

       
    </div>
@endsection
