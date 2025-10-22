<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandlordSuggestion;
use App\Models\LandlordAdding;

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
    public function storeBoarding(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
        'property_name' => 'required|string|max:255',
        'property_description' => 'required|string|max:1000',
        'property_price' => 'required|string|max:255',
        'adding_date' => 'required|date',
    ]);

    LandlordAdding::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'contact' => $request->contact,
        'property_name' => $request->property_name,
        'property_description' => $request->property_description,
        'property_price' => $request->property_price,
        'adding_date' => $request->adding_date,
    ]);

    return redirect()->back()->with('success', 'Boarding house added successfully!');
}

}
