<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// AJAX //

Route::get('/fetch-comments', [UserController::class, 'about_me'])->name('comments.fetch');

