<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show the edit form
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        return view('users.edit', compact('user'));
    }

    // Handle the update logic
    public function updateInfo(User $user)
    {

        $validated = request()->validate([
            // users table
            'bio' => 'nullable|min:1|max:255',
            'image' => 'nullable|image',
            // user_profiles table
            'location' => 'nullable|string|max:40',
            'gender' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date',
            'company_name' => 'nullable|string|max:35',
        ]);

        if (request('image')) {
            if ($user->image && !str_contains($user->image, 'default/default-m.png')) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = request()->file('image')->store('profile-images', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);
        $user->save();

        if ($user->profile) {
            // Update profile data if it exists
            $user->profile->update([
                'location' => request('location'),
                'gender' => request('gender'),
                'birthdate' => request('birthdate'),
                'company_name' => request('company_name'),
            ]);
        } else {
            // If profile doesn't exist, create a new one
            $user->profile()->create([
                'location' => request('location'),
                'gender' => request('gender'),
                'birthdate' => request('birthdate'),
                'company_name' => request('company_name'),
            ]);
        }
        return redirect()->back()->with('success', 'Account updated successfully!');
    }

    public function profile_page_update(Request $request, $user_id)
    {

        $validated = $request->validate([
            // Users table
            'bio' => 'nullable|min:1|max:255',
            'edit_image' => 'nullable|image', // Update the input name here
            // User_profiles table
            'location' => 'nullable|string|max:40',
            'gender' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date',
            'company_name' => 'nullable|string|max:35',
        ]);

        $user = User::where('user_id', $user_id)->firstOrFail();

        // Handle image upload
        if ($request->hasFile('edit_image')) { // Use the updated input name
            if ($user->image && !str_contains($user->image, 'default/default-m.png')) {
                Storage::disk('public')->delete($user->image);
            }
            $imagePath = $request->file('edit_image')->store('profile-images', 'public'); // Use the updated input name
            $validated['image'] = $imagePath;
        }

        // Update the `users` table
        $user->update([
            'bio' => $validated['bio'],
            'image' => $validated['image'] ?? $user->image, // Ensure image is set correctly
        ]);

        // Update or create the profile
        $user->profile()->updateOrCreate([], [
            'location' => $validated['location'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'birthdate' => $validated['birthdate'] ?? null,
            'company_name' => $validated['company_name'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }





    public function updatePassword(User $user)
    {
        // Validate input fields
        $validated = request()->validate([
            'username' => 'required|string|min:3|max:20',
            'password' => 'required|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        // Verify the current password
        if (!Hash::check($validated['password'], $user->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
        }

        // Update username
        $user->name = $validated['username'];

        // If new_password is provided, update it
        if (!empty($validated['new_password'])) {
            $user->password = Hash::make($validated['new_password']);
        }

        // Save updates to the database
        $user->save();

        // Redirect back with a success message
        return redirect('/Edit_Account')->with('update_message', "Account Updated Successfuly !");
    }


    public function Sharing()
    {

        return view('Potato.HomeLanding');
    }

    public function ShareMessage(User $user)
    {
        $validated = request()->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'shared_title' => 'nullable',
            'message' => 'required|string|max:255',
        ]);

        DB::table('user_shared_message')->insert([
            'user_id' => Auth::id(),
            'shared_title' => $validated['shared_title'],
            'message' => $validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // Return a success response
        return redirect()->back()->with('success', 'Successfully shared a message!');
    }

    public function Contact()
    {
        return ('Potato.Pages.Contact');
    }

    public function ContactMessage()
    {
        $validated = request()->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'nullable|min:8',
            'contact_title' => 'required|string|max:255',
            'contact_message' => 'required|string|max:255',
            'contact_file' => 'nullable|file|max:16384' /* max file upload is 16 MB */,
        ]);

        // Handle the file if uploaded
        $filePath = null;
        // Check if a file has been uploaded
        if (request()->hasFile('contact_file')) {
            $file = request()->file('contact_file');

            // Check if file size exceeds 16MB (16384 KB)
            if ($file->getSize() > 16384 * 1024) { // 16384 KB converted to Bytes
                $filePath = "File Reached Size Limit";
            } else {
                // Store the file in the private Contact_Files directory
                $filePath = $file->store('Contact_Files', 'private'); // Use the 'private' disk
            }
        }

        DB::table('user_contact')->insert([
            'user_id' => Auth::id(),
            'phone_number' => $validated['phone_number'],
            'contact_title' => $validated['contact_title'],
            'contact_message' => $validated['contact_message'],
            'contact_file' => $filePath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Return a success response
        return redirect('/Contact')->with('contact_message', 'Message Successfully Sent!');
    }
}
