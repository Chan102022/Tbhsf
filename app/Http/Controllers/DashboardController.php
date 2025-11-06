<?php
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Count tenants
        $tenantCount = User::tenants()->count();

        // Count landlords
        $landlordCount = User::landlords()->count();

        // Optional: total users
        $totalUsers = User::count();

        return view('dashboard', compact('tenantCount', 'landlordCount', 'totalUsers'));
    }
}
