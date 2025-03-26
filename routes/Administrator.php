<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSearchController;
use App\Http\Controllers\dashboard\DashboardAccounOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// admin login //

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        $user = Auth::user();

        // Check if the user is an admin in the `users` table
        if (!$user->is_admin) {
            throw new NotFoundHttpException();
        }

        // Check if the user exists in the `admin` table
        $isInAdminTable = DB::table('admin')->where('user_id', $user->user_id)->exists();

        if (!$isInAdminTable) {
            throw new NotFoundHttpException();
        }

        //$userCount = User::count();
        return view('admin.entrance' /*, compact('userCount')*/);
    })->name('admin.account');
});


Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::get('/contacts/search', [AdminController::class, 'search'])->name('contacts.search');



// dashboard pages //

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard_menu');

Route::get('/dashboard/Contacts', [AdminController::class, 'dashbord_contact'])->name('dashboard_contacts');

Route::get('/dashboard/Shared', [AdminController::class, 'dashbord_shared'])->name('dashboard_shared');

Route::get('/dashboard/Comments', [AdminController::class, 'dashboard_comments'])->name('dashboard_comments');

Route::get('/dashboard/Reports', [AdminController::class, 'dashboard_reports'])->name('dashboard_reports');

Route::get('/dashboard/Visitors', [AdminController::class, 'dashboard_visits'])->name('dashboard_visits');

Route::get('/dashboard/Users', [AdminController::class, 'dashboard_users'])->name('dashboard_users');

Route::get('/dashboard/Users/{user_id}', [AdminController::class, 'dashboard_users_details'])->name('dashboard_users_details');

Route::get('/dashboard/Offense', [AdminController::class, 'dashboard_offense'])->name('dashboard_offense');

Route::get('/dashboard/Offense/{user_id}', [AdminController::class, 'dashboard_offense_details'])->name('dashboard_offense_details');



// download route //

Route::get('download', [AdminController::class, 'attachment_download'])->name('attachment.download');

// Search bar Route //

Route::get('/dashboard/Contacts/search', [AdminController::class, 'search'])->name('contacts.search');

Route::get('/dashboard/Shared/search', [AdminSearchController::class, 'shared_msgs_search'])->name('sharedmsgs.search');

Route::get('/dashboard/Comments/search', [AdminSearchController::class, 'user_comments_search'])->name('userComments.search');

Route::get('/dashboard/Reports/search', [AdminSearchController::class, 'report_comments_search'])->name('reportComments.search');

Route::get('/dashboard/Visitors/search', [AdminSearchController::class, 'visitors_search'])->name('visitors.search');

Route::get('/dashboard/Users/search', [AdminSearchController::class, 'users_search'])->name('users.search');

Route::get('/dashboard/Offense/search', [AdminSearchController::class, 'offense_search'])->name('offense.search');


/* Delete */

Route::post('/contacts/deleteSelected', [AdminContactController::class, 'deleteSelected'])->name('delete_contact');

Route::post('/Shared/deleteSelected', [AdminContactController::class, 'delete_shared'])->name('delete_shared');

Route::post('/Comments/deleteSelected', [AdminContactController::class, 'delete_comment'])->name('delete_comment');

Route::post('/Visitors/deleteSelected', [AdminContactController::class, 'delete_visitor'])->name('delete_visitor');

Route::post('/Reports/deleteSelected', [AdminContactController::class, 'delete_report'])->name('delete_report');

Route::post('/dashboard/users/delete', [AdminContactController::class, 'delete_user_option'])
    ->name('delete_user');

Route::post('/Offense/deleteSelected', [AdminContactController::class, 'delete_offense'])->name('delete_offense');



/* Dash board Account Management */

Route::post('/dashboard/users/{user}/update', [DashboardAccounOptions::class, 'save_account_option'])
    ->name('dashboard_save_account');

Route::put('/dashboard/users/{user}/change_password', [DashboardAccounOptions::class, 'change_password_option'])
    ->name('dashboard_password_change_option');

Route::put('/dashboard/users/{user}/update_id', [DashboardAccounOptions::class, 'change_identification_option'])
    ->name('dashboard_id_change_option');

Route::post('/dashboard/Users/delete', [AdminContactController::class, 'delete_user_option_from_details'])
    ->name('details_user_delete');
