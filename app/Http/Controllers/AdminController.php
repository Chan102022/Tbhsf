<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    // Method to return the admin inquiry view
    public function inquiry()
    {
        return view('dashboard.adminInquiry');  // resources/views/adminInquiry.blade.php
    }
     public function management()
    {
        return view('dashboard.adminManagement');  // resources/views/adminInquiry.blade.php
    }
}
