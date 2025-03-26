<?php

use App\Http\Controllers\SchoolPages;
use Illuminate\Support\Facades\Route;

// Share Message Route function //

Route::get('/Ordiciel_School', [SchoolPages::class, 'Ordiciel'])->name('Ordiciel');
Route::get('/Al_Safwa_School', [SchoolPages::class, 'Safwa'])->name('Al_Safwa');
Route::get('/IFPS_School', [SchoolPages::class, 'IFPS'])->name('IFPS');


