<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class AuthController extends Controller
{
    public function register()
    {

        return view('Potato.Account.register');
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:40|confirmed'
        ]);

        $UserID = $this->generateID();

        $user = User::create([
            'user_id' => $UserID, // User_ID EXO-######
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'image' => "default/default-m.png",
        ]);

        // profile table //
        UserProfile::create([
            'user_id' => $user->user_id,
            'location' => null,
            'gender' => null,
            'birthdate' => null,
            'company_name' => null,
        ]);

        // profile table //

        // Mail in proccess later

        Auth::login($user); // automatically logs the user when they register their account so u wouldn't log in

        return redirect()->route('index')->with('success', 'Account created successfully!');
    }

    public function generateID()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        // Generate a random string of 8 characters
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return 'EXO-' . $randomString;
    }

    public function login()
    {
        return view('Potato.Account.login');
    }

    public function authenticate()
    {
        // Check if the input is an email or username
        $loginField = filter_var(request('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $validate = request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([$loginField => $validate['email'], 'password' => $validate['password']])) {

            request()->session()->regenerate();

            // Optional: add "Remember Me" functionality if needed
            if (request()->has('remember')) {
                Auth::login(Auth::user(), true);
            }

            return redirect()->route('index')->with('success', 'Logged in successfully');
        }

        // Return error if authentication fails
        return redirect()->route('login')->withErrors([
            'password' => 'No matching user found',
        ]);
    }

    public function authenticate2(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Will be true if the checkbox is checked

        // Attempt login with 'remember' functionality
        if (Auth::attempt($credentials, $remember)) {
            // Redirect to intended page or dashboard
            return redirect()->route('index')->with('success', 'Logged in successfully!');
        }

        // Redirect back with error if login fails
        return redirect()->route('login')->withErrors([
            'password' => 'no matching user'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Logged out successfully');
    }
}
