<?php

namespace App\Http\Controllers;
use App\Models\TenantSuggestion;
use App\Models\LandlordSuggestion;
use App\Models\TenantBooking;
use App\Models\LandlordAdding;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Method to return the admin inquiry view
   public function inquiry()
{
    $tenantSuggestions = TenantSuggestion::latest()->get(); // Fetch tenant suggestions
    $landlordSuggestions = LandlordSuggestion::latest()->get(); // Fetch landlord suggestions

    return view('dashboard.adminInquiry', compact('tenantSuggestions', 'landlordSuggestions'));
}

public function management()
{
    $tenantBooking = TenantBooking::latest()->get(); // Fetch tenant suggestions
    $landlordAdding = LandlordAdding::latest()->get(); // Fetch landlord suggestions

    return view('dashboard.adminManagement', compact('tenantBooking', 'landlordAdding'));
}

}
