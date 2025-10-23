<?php

namespace App\Http\Controllers;

use App\Models\TenantSuggestion;
use Illuminate\Http\Request;
use App\Models\LandlordAdding;
use App\Models\TenantBooking;



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
 public function book(Request $request)
{
    TenantBooking::create([
        'user_id' => auth()->id(),
        'name' => auth()->user()->name,
        'contact' => auth()->user()->contact ?? 'Not Provided',
        'landlord_id' => $request->landlord_id,
        'landlord_name' => $request->landlord_name,
        'landlord_contact' => $request->landlord_contact,
        'property_name' => $request->property_name,
        'booking_date' => now(),  // <--- add this line
    ]);

    return redirect()->back()->with('success', 'You have successfully booked a boarding house!');
}





}
