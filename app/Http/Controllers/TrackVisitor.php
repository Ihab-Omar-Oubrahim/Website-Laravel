<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;

class TrackVisitor extends Controller
{
    public function trackVisitor(Request $request)
    {
        $ip = $request->ip();
        $userId = Auth::check() ? Auth::user()->user_id : null;

        // Check if the IP exists in the visitors table
        $visitor = Visitor::where('ip_address', $ip)->first();

        if ($visitor) {
            // If the visitor exists and `user_id` is null or outdated, update it
            if (is_null($visitor->user_id) || $visitor->user_id !== $userId) {
                $visitor->update(['user_id' => $userId]);
            }
        } else {
            // If the IP doesn't exist, create a new record
            Visitor::create([
                'ip_address' => $ip,
                'user_id' => $userId,
            ]);
        }
    }
}
