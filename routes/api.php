<?php
use Illuminate\Support\Facades\Route;

// Example route so the file isn’t empty
Route::get('/', function () {
    return response()->json(['message' => 'API routes working']);
});
