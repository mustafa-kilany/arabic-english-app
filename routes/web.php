<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    // Books resource routes (includes index, create, edit, etc)
    Route::resource('books', BookController::class);

    // Optional: dashboard route if you want a separate dashboard page
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Optional: redirect /home to /dashboard or /books
Route::get('/home', function () {
    return redirect()->route('books.index');
})->middleware('auth');
