<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use App\Models\TenantBooking;
use App\Models\LandlordAdding;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); // single-page login/register
})->name('home');

// Authentication routes for single-page
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Optional forgot password route
Route::get('/forgot-password', function () {
    return view('auth.forgot-password'); // if you still have a separate page
})->name('password.request');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** Admin Dashboard & Routes */
    Route::middleware(['role:admin'])->group(function () {

        Route::get('/admin/dashboard', function () {
            $totalUsers = User::count();
            $tenantCount = User::where('role', 'tenant')->count();
            $landlordCount = User::where('role', 'landlord')->count();
            $adminCount = User::where('role', 'admin')->count();
            $totalReservations = TenantBooking::count();
            $totalBoardingHouses = LandlordAdding::count();
            return view('dashboard.admin', compact('totalUsers', 'tenantCount', 'landlordCount','adminCount','totalReservations','totalBoardingHouses'));
        })->name('admin.dashboard');

        Route::get('/admin/inquiry', [AdminController::class, 'inquiry'])->name('admin.inquiry');
        Route::get('/admin/management', [AdminController::class, 'management'])->name('admin.management');
        Route::get('/admin/create', function () {
            return view('dashboard.adminCreate');
        })->name('admin.account');
        Route::get('/admin/manage', function () {
            return view('dashboard.adminManagement');
        })->name('admin.manageaccount');
        Route::delete('/admin/suggestion/tenant/{id}', [AdminController::class, 'deleteTenantSuggestion'])->name('admin.suggestion.tenant.delete');
        Route::delete('/admin/suggestion/landlord/{id}', [AdminController::class, 'deleteLandlordSuggestion'])->name('admin.suggestion.landlord.delete');
        Route::delete('/admin/boarding/{id}', [AdminController::class, 'deleteBoarding'])->name('admin.boarding.delete');
        Route::get('/admin/manage-account', [AdminController::class, 'manageAccounts'])->name('admin.accountmanage');
        Route::delete('/admin/manage-account/{id}', [AdminController::class, 'deleteAccount'])->name('admin.account.delete');
        Route::post('/admin/dashboard/adminCreate', [AdminController::class, 'storeAdminCreatedUser'])->name('admin.account.store');
    });

    /** Tenant Dashboard */
    Route::middleware(['role:tenant'])->group(function () {
          Route::get('/dashboard/tenant', [AdminController::class, 'tenantHome'])->name('tenant.dashboard');
        Route::get('/tenant/booking', [AdminController::class, 'tenantDashboards'])->name('tenantdash.book');
        Route::post('/tenant/book', [TenantController::class, 'book'])->name('tenant.book');
        Route::get('/tenant/suggestion', [TenantController::class, 'create'])->name('tenant.suggestion.form');
        Route::post('/tenant/suggestion', [TenantController::class, 'store'])->name('tenant.suggestion.submit');
        Route::get('/tenant/suggestions', function () {
            return view('dashboard.tenant.suggestionForm');
        })->name('tenant.suggest');
    });

    /** Landlord Dashboard */
    Route::middleware(['role:landlord'])->group(function () {
        Route::get('/dashboard/landlord', function () {
            return view('dashboard.landlord.landlord');
        })->name('landlord.dashboard');

        Route::get('/landlord/suggestion', [LandlordController::class, 'create'])->name('landlord.suggestion.form');
        Route::post('/landlord/suggestion', [LandlordController::class, 'store'])->name('landlord.suggestion.submit');

        Route::get('/landlord/boarding/add', function () {
            return view('dashboard.landlord.addBoarding');
        })->name('landlord.boarding.add');
        Route::post('/landlord/boarding/store', [LandlordController::class, 'storeBoarding'])->name('landlord.boarding.store');

        Route::get('/landloard/suggestions', function () {
            return view('dashboard.landlord.suggestionForm');
        })->name('landlord.suggest');

        Route::get('/landloard/adding', function () {
            return view('dashboard.landlord.addBoarding');
        })->name('landlord.add');
       

    });
     Route::get('/tenant/profile', [TenantController::class, 'profile'])->name('tenant.profile');

     Route::delete('/tenant/bookings/{booking}', [TenantController::class, 'destroy'])
    ->name('tenant.booking.destroy')
    ->middleware(['auth', 'role:tenant']);


    // Admin deleting tenant bookings
    Route::delete('/admin/tenant-booking/{id}', [AdminController::class, 'deleteTenantBooking'])->name('admin.tenantbooking.delete');
});


require __DIR__ . '/auth.php';
