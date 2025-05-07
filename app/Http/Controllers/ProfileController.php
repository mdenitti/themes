<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule; // Needed for unique email check
use App\Models\Image; // Add Image model
use Illuminate\Support\Facades\Log; // Optional: for logging errors
use Illuminate\Support\Facades\Validator; // Add Validator facade

class ProfileController extends Controller
{
    public function show()
    { 
        // Eager load the 'images' relationship when fetching the user.
        // Also, order the loaded images by 'created_at' descending (newest first).
            $userId = Auth::id();
            $user = \App\Models\User::with(['images' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])->find($userId);
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

    /**
     * Handle uploading multiple travel images for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadImages(Request $request)
    {
        $user = Auth::user();

        // Create the validator instance manually
        $validator = Validator::make($request->all(), [
            'images'   => 'required|array', // Ensure images is an array
            'images.*' => ['required', File::image()->max(2048)], // Validate each image (max 2MB)
        ], [], [
            'images.*' => 'image', // Custom attribute name for validation messages
        ]);

        // Validate and specify the error bag
        $validator->validateWithBag('imageUpload');

        $uploadedPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    try {
                        // Store in 'public/travel_images/user_{id}'
                        $path = $file->store('travel_images/user_' . $user->id, 'public');
                        // Create image record in the database
                        Image::create([
                            'user_id' => $user->id,
                            'path'    => $path,
                        ]);
                        $uploadedPaths[] = $path; // Keep track of successful uploads
                    } catch (\Exception $e) {
                        // Log error if storage or database save fails
                        Log::error("Image upload failed for user {$user->id}: " . $e->getMessage());
                    }
                }
            }
        }

        if (empty($uploadedPaths)) {
            // If validation passed but no files were actually valid/uploaded
            return back()->withErrors(['images' => 'No valid images were uploaded or an error occurred.'], 'imageUpload');
        }

        return redirect()->route('profile.edit')->with('image_upload_success', count($uploadedPaths) . ' image(s) uploaded successfully!');
    }
}
