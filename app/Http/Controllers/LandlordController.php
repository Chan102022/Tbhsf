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

    // Handle suggestion submission
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

    // Handle boarding house submission
    public function storeBoarding(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'property_name' => 'required|string|max:255',
            'property_description' => 'required|string|max:1000',
            'property_price' => 'required|string|max:255',
            'adding_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // 2MB max
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('boarding_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Add the authenticated landlord ID (if applicable)
        $validated['user_id'] = auth()->id();

        // Save record to database
        LandlordAdding::create($validated);

        return redirect()->back()->with('success', 'Boarding house added successfully!');
    }
}
