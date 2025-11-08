<?php

namespace App\Http\Controllers;

use App\Models\TenantSuggestion;
use App\Models\LandlordSuggestion;
use App\Models\TenantBooking;
use App\Models\LandlordAdding;
use App\Models\User; // ✅ User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect; 

class AdminController extends Controller
{
    public function inquiry()
    {
        $tenantSuggestions = TenantSuggestion::latest()->get();
        $landlordSuggestions = LandlordSuggestion::latest()->get();

        return view('dashboard.adminInquiry', compact('tenantSuggestions', 'landlordSuggestions'));
    }

    public function management()
    {
        $tenantBooking = TenantBooking::latest()->get();
        $landlordAdding = LandlordAdding::latest()->get();

        return view('dashboard.adminManagement', compact('tenantBooking', 'landlordAdding'));
    }

    public function manageAccounts()
    {
        $users = User::all();
        return view('dashboard.manageAccount', compact('users'));
    }

    public function deleteAccount($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User account deleted successfully.');
    }

    /**
     * ✅ Create new user from admin panel without auto-login
     */
   public function storeAdminCreatedUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'role' => 'required|in:admin,tenant,landlord',
        'password' => 'required|string|min:8|confirmed',
        'contact'  =>'required|string|min:11|max:13',
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'role' => $validated['role'],
        'password' => Hash::make($validated['password']),
        'contact' => $validated['contact'],
    ]);

    return redirect()->route('admin.dashboard')
                     ->with('success', 'User registered successfully!');
}
public function deleteTenantSuggestion($id)
{
    $suggestion = TenantSuggestion::findOrFail($id);
    $suggestion->delete();

    return Redirect::back()->with('success', 'Tenant messages deleted successfully.');
}

public function deleteLandlordSuggestion($id)
{
    $suggestion = LandlordSuggestion::findOrFail($id);
    $suggestion->delete();

    return Redirect::back()->with('success', 'Landlord messages deleted successfully.');
}
public function deleteBoarding($id)
{
    $boarding = LandlordAdding::findOrFail($id);
    $boarding->delete();

    return redirect()->back()->with('success', 'Boarding house deleted successfully.');
}
public function tenantDashboards()
{
    $boardingHouses = \App\Models\LandlordAdding::latest()->get();
    return view('dashboard.tenant.tenantDashboard', compact('boardingHouses'));
}
public function tenantHome()
{
    $boardingHouses = \App\Models\LandlordAdding::latest()->get();
    return view('dashboard.tenant.tenant', compact('boardingHouses'));
}
public function deleteTenantBooking($id)
{
    $booking = TenantBooking::findOrFail($id);
    $booking->delete();

    return redirect()->back()->with('success', 'Tenant booking deleted successfully.');
}


}
