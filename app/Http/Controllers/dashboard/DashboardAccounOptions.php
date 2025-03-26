<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardAccounOptions extends Controller
{
    public function save_account_option(User $user)
    {
        $validated = request()->validate([
            // users table
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            // user_profiles table
            'location' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:10',
            'birthdate' => 'nullable|date',
            'company_name' => 'nullable|string|max:255',
        ]);


        if (request()->hasFile('image')) {
            // Delete old image if it's not the default one
            if ($user->user_image && !str_contains($user->user_image, 'default/default-m.png')) {
                Storage::disk('public')->delete($user->user_image);
            }
            // Store new image
            $imagePath = request()->file('image')->store('profile-images', 'public');
            $validated['image'] = $imagePath; // Ensure it matches the DB column
        }

        // Update user details
        $user->update($validated);

        // Update or create user profile
        $user->profile()->updateOrCreate(
            ['user_id' => $user->user_id], // Find by user_id
            [
                'location' => request('location'),
                'gender' => request('gender'),
                'birthdate' => request('birthdate'),
                'company_name' => request('company_name'),
            ]
        );

        return redirect()->back()->with('success', 'Account updated successfully!');
    }

    public function change_password_option(Request $request, User $user)
    {
        $validated = $request->validate([
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($validated['new_password']), // Hash the password before saving
        ]);

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    public function change_identification_option(Request $request, User $user)
    {
        $validated = $request->validate([
            'new_user_id' => 'required|string|size:8|regex:/^[A-Za-z0-9]+$/|unique:users,user_id',
        ]);

        $newUserId = 'EXO-' . strtoupper($validated['new_user_id']); // Ensure consistent format
        $oldUserId = $user->user_id;

        DB::transaction(function () use ($oldUserId, $newUserId) {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Update `users` table first
            DB::table('users')->where('user_id', $oldUserId)->update(['user_id' => $newUserId]);

            // Update all related tables
            $relatedTables = [
                'visitors',
                'user_profiles',
                'user_shared_message',
                'user_contact',
                'reports',
                'comments',
                'user_comment'
            ];

            foreach ($relatedTables as $table) {
                DB::table($table)->where('user_id', $oldUserId)->update(['user_id' => $newUserId]);
            }

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        });

        return redirect()->route('dashboard_users_details', ['user_id' => $newUserId])
            ->with('success', 'User ID updated successfully!');
    }

    public function delete_user_option(){

    }
}
