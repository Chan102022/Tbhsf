<?php

namespace App\Http\Controllers;

use App\Models\TenantSuggestion;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    // Show the form
    public function create()
    {
        return view('dashboard.tenant.suggestionForm');
    }

    // Store the suggestion
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'suggestion' => 'required|string|max:1000',
        ]);

        TenantSuggestion::create($validated);

        return redirect()->route('tenant.suggestion.form')
                         ->with('success', 'Suggestion submitted successfully!');
    }
}
