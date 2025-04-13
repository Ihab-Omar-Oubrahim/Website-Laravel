<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\EditAccountRoutes;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserFollowingController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;


require __DIR__ . '/auth.php'; // Auth routes
require __DIR__ . '/ShareMSG.php'; // Landing Share Message Form
require __DIR__ . '/Contacts.php'; // User Contact Message Form
require __DIR__ . '/comment_routes.php'; // Comment routes
require __DIR__ . '/Schools.php'; // School Routes
require __DIR__ . '/Administrator.php'; // admin routes
// require __DIR__ . 'Visitors.php'; // Visitors

Route::get('/', [Dashboard::class, 'home'])->name('index');

Route::get('/Terms', [Dashboard::class, 'terms'])->name('Terms');

Route::get('/Contact', [Dashboard::class, 'contact'])->name('Contact');

Route::get('/About_Me', [Dashboard::class, 'about_me'])->name('About_Me');

Route::get('/Services', [Dashboard::class, 'services'])->name('Services');

Route::get('/{name}/Profile', [Dashboard::class, 'profile_page'])->name('Profile_Page');

Route::get('/{user_id}/Edit_Profile', [Dashboard::class, 'edit_profile_page'])->name('Edit_Profile_Page');

Route::put('/{user_id}/Edit_Profile', [UserController::class, 'profile_page_update'])->name('profile_page_update');


// Route for displaying the edit form
Route::get('users/{id_user}/edit', [UserController::class, 'edit'])->name('editInfo');

// Route for updating the user
Route::put('users/{user}', [UserController::class, 'updateInfo'])->name('updateInfo');

Route::put('users/{user}/password', [UserController::class, 'updatePassword'])->name('updatePassword');

// Route for udpating user information (important)

Route::get('Edit_Account', [EditAccountRoutes::class, 'Edit_Account'])->name('Advanced');

// Route for Email Verifications

Route::post('/VerifyEmail', [EmailVerificationController::class, 'VerifyEmail'])->name('VerifyEmail');

// Route for a Temp email interface and to update email via database

Route::get('/verify-email-change/{token}', [EmailVerificationController::class, 'verifyEmailChange'])->name('email.verify.change');

// Route for user Following/Subing to the website

Route::post('/Follow', [UserFollowingController::class, 'user_following'])->name('user.following');

// Route for user UnFollowing/UnSubing to the website

Route::delete('/UnFollow', [UserFollowingController::class, 'user_unfollowing'])->name('user.unfollowing');



// offense page //

Route::get('/Error', [Dashboard::class, 'suspended'])->name('Banned');







Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});










