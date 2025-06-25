<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController; // THIS MUST BE HERE

// Public landing page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Explicitly define the 'home' route here.
// THIS LINE IS NOW CRUCIAL AND MUST BE PRESENT IN YOUR web.php
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Authentication routes (login, register, reset password, etc.)
// We'll keep this as it defines login, register, etc.
Auth::routes();

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Books resource routes (includes index, create, edit, show, update, delete)
    Route::resource('books', BookController::class);

    // If you prefer /dashboard, define it like this and use route('dashboard')
    // in your views instead of route('home').
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});