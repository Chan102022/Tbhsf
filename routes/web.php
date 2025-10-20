<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/dashboard/inquiry', function () {
            return view('dashboard.adminInquiry');
        })->name('admin.inquiry');

        Route::get('/dashboard/management', function () {
            return view('dashboard.adminManagement');
        })->name('admin.management');
    });
});

require __DIR__.'/auth.php';
