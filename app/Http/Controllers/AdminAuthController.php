<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the form input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Fetch admin credentials
        $admin = DB::table('admin')->where('username', $request->username)->first();


        if ($admin && password_verify($request->password, $admin->password)) {
            // Store admin info in session
            session(['admin_logged_in' => true, 'admin_id' => $admin->user_id]);

            return redirect()->route('dashboard_menu');
        }

        return back()->withErrors(['login_error' => 'Invalid username or password'])->withInput();
    }
}
