<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFollowingController extends Controller
{
    public function user_following(Request $request, User $user)
    {


        $request->validate([
            'followed_email' => 'required|email',
        ]);

        $inputEmail = $request->input('followed_email');

        if ($inputEmail !== Auth::user()->email) {
            return response()->json(['error' => 'The email inserted does not match your account email.'], 422);
        }



        // Add a new entry in the Following table
        UserFollowing::create([
            'follower_user_id' => Auth::user()->user_id,
        ]);

        // Update User boolean following [Yes] following [No] Not Following //

        $user = User::find(Auth::user()->user_id); // Replace $id with the actual user ID

        if ($user) {
            $user->update(['following' => true]); // Update the boolean value
        }


        return redirect()->back()->with('success', 'Followed!');
    }

    public function user_unfollowing(User $user)
    {
        $userId = Auth::user()->user_id;

        // Delete the record from the UserFollowing table
        UserFollowing::where('follower_user_id', $userId)->delete();

        // Update the user boolean 'following' to false
        $user = User::find($userId);
        if ($user) {
            $user->update(['following' => false]); // Set following to false
        }

        $user = User::find($userId);

        if ($user) {
            $user->update(['following' => false]);
        }

        return redirect()->back()->with('success', 'Unfollowed!');
    }
}
