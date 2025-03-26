<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Share Message Route function //
Route::get('/Contact', [UserController::class, 'Contact'])->name('Contact');
Route::post('/Contact', [UserController::class, 'ContactMessage']);


