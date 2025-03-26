<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function home(Request $request)
    {
        app(TrackVisitor::class)->trackVisitor($request);

        if (Auth::check() && Auth::user()->is_banned) {
            return view('errors.suspended', ['user' => Auth::user()]);
        } else {
            return view('Potato.HomeLanding');
        }
    }
    public function terms()
    {
        return view('Potato.Pages.Terms');
    }
    public function about_me(Request $request)
    {
        $UserComments = UserComment::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('Potato.Pages.AboutMe', compact('UserComments'));
    }
    public function contact()
    {
        return view('Potato.Pages.Contact');
    }

    public function services()
    {
        return view('Potato.Pages.Services');
    }

    public function profile_page($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return view('Potato.Account.Profile_Page', ['user' => $user]);
    }

    public function edit_profile_page($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();

        // Security Purposes, Users Cannot go to other users edit profile //

        if (Auth::id() !== $user->user_id) {
            abort(404); // 404 Error
        }

        return view('Potato.Account.Edit_Profile_Page', ['user' => $user]);
    }

    public function suspended()
    {
        return view('errors.suspended', ['user' => Auth::user()]);
    }
}
