<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Share Message Route function //
Route::get('/shareMSG', [UserController::class, 'Sharing'])->name('ShareMessage');
Route::post('/shareMSG', [UserController::class, 'ShareMessage']);


