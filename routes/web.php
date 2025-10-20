<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

/** Basic dashboards for authenticated users */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /** Profile management */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** Role‑based dashboards */
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('dashboard.admin');
        })->name('admin.dashboard');
    });

    Route::middleware(['role:tenant'])->group(function () {
        Route::get('/tenant/dashboard', function () {
            return view('dashboard.tenant');
        })->name('tenant.dashboard');
    });

    Route::middleware(['role:landlord'])->group(function () {
        Route::get('/landlord/dashboard', function () {
            return view('dashboard.landlord');
        })->name('landlord.dashboard');
    });

    /** Additional admin routes */
    Route::middleware(['role:admin'])->group(function() {
        Route::get('/dashboard/inquiry', [AdminController::class, 'inquiry'])->name('admin.inquiry');


   
    Route::get('/dashboard/adding/booking', [AdminController::class, 'showAdding/Booking'])->name('admin.showAdding/Booking');
    
    Route::get('/dashboard/management', [AdminController::class, 'management'])->name('admin.management');
    
    });
});

require __DIR__.'/auth.php';
