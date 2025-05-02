<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule; // Needed for unique email check

class ProfileController extends Controller
{
    public function show() { /* Fetches user, returns show view */ 
        $user = Auth::user();
        return view('profile.show', compact('user'));
       }

       public function edit() { /* Fetches user, returns edit view */
        $user = Auth::user();
        return view('profile.edit', compact('user'));
        }
    
        public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)], // Unique email check!
            'avatar' => ['nullable', File::image()->max(1024)],
        ]);

        $userData = $request->only('name', 'email'); // Get name and email

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            // Delete old avatar if exists
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Store new one
            $userData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($userData); // Update the user record

        return redirect()->route('profile.show')->with('success', 'Profile updated!');
    }
}
