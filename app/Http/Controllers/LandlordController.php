<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandlordSuggestion;
use App\Models\LandlordAdding;
use App\Models\TenantBooking;



class LandlordController extends Controller
{
    // Show suggestion form
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

        return redirect()
            ->route('landlord.suggestion.form')
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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('boarding_images', 'public');
            $validated['image'] = $imagePath;
        }

        // Attach landlord (logged-in user)
        $validated['user_id'] = auth()->id();

        LandlordAdding::create($validated);

        return redirect()->back()->with('success', 'Boarding house added successfully!');
    }

    // Show all properties added by landlord
    public function landlordprofile()
    {
        $bookingsland = LandlordAdding::where('user_id', auth()->id())
        ->withCount('bookings') // 👈 counts tenant bookings automatically
        ->latest()
        ->get();
        return view('dashboard.landlord.profile', compact('bookingsland'));
        
    }

    // Delete a property added by landlord
    public function destroy($id)
{
    // Find the property belonging to the current landlord
    $property = LandlordAdding::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    // Mark all related tenant bookings as invalid
    $property->bookings()->update(['status' => 'invalid']);

    // Soft delete the property
    $property->delete();

    return redirect()->back()->with('success', 'Boarding house deleted successfully. All related bookings are now marked as invalid.');
}
public function reservations()
{
    $properties = LandlordAdding::where('user_id', auth()->id())
        ->with(['bookings.tenant']) // eager load tenant info
        ->latest()
        ->get();

    return view('dashboard.landlord.reservations', compact('properties'));
}
public function updateBookingStatus(Request $request, $bookingId)
{
    $request->validate([
        'status' => 'required|in:pending,approved,cancelled',
    ]);

    $booking = TenantBooking::findOrFail($bookingId);
    $booking->status = $request->status;
    $booking->save();

    return redirect()->back()->with('success', 'Booking status updated successfully.');
}





    
    
}
