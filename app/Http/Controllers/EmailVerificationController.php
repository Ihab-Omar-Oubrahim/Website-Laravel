<?php

namespace App\Http\Controllers;

use App\Mail\UserEmailVerification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function VerifyEmail(User $user)
    {

        $validated = request()->validate([
            'new_email' => 'required|email',
        ]);

        $newEmail = $validated['new_email'];

        $token = Str::random(40);


        DB::table('email_verification')->insert([
            'user_id' => Auth::id(),  // Current authenticated user ID
            'new_email' => $newEmail,
            'token' => $token,
            'created_at' => now(),
        ]);

        $user = Auth::user();
        Mail::to($user->email)->send(new UserEmailVerification($user, $newEmail, $token));



        return redirect('/Edit_Account')->with('update_message', "An email has been sent to {$user->email} with a verification link.");

    }


    public function verifyEmailChange($token)
    {
        // Find the record by token
        $verification = DB::table('email_verification')->where('token', $token)->first();

        if (!$verification) {
            return redirect('/')->with('error', 'Invalid or expired verification link.');
        }

        // Update the user's email
        $user = User::find($verification->user_id);
        $user->email = $verification->new_email;
        $user->save();

        // Remove the token record
        DB::table('email_verification')->where('token', $token)->delete();

        return redirect()->back()->with('success', 'Your email address has been updated successfully!');
    }
}
