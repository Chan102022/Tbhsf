<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandlordSuggestion;

class LandlordController extends Controller
{
    // Show the suggestion form
    public function create()
    {
        return view('dashboard.landlord.suggestionForm');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'suggestion' => 'required|string|max:1000',
        ]);

        LandlordSuggestion::create($validated);

        return redirect()->route('landlord.suggestion.form')
                         ->with('success', 'Suggestion submitted successfully!');
    }
}
