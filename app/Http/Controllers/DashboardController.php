<?php
use App\Models\User;
use App\Models\TenantBooking;
use App\Models\LandlordAdding;

class DashboardController extends Controller
{
    public function index()
    {
        // Count tenants
        $tenantCount = User::tenants()->count();

        // Count landlords
        $landlordCount = User::landlords()->count();

        $adminCount = User::admins()->count();

        // Optional: total users
        $totalUsers = User::count();

        $totalReservations = TenantBooking::count();

        $totalBoardingHouses = LandlordAdding::count();

        return view('dashboard', compact('tenantCount', 'landlordCount','adminCount','totalUsers','totalReservations','totalBoardingHouses'));
    }

}
