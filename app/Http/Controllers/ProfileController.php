<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the profile edit form.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user(); // Explicitly type-hinting the user for static analysis.
        return view('profile.edit', compact('user'));
    }

    /**
     * Handle the profile update request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'self_introduction' => 'nullable|string|max:500',
        ]);

        /** @var User $user */
        $user = Auth::user(); // Explicitly type-hinting the user for static analysis.

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            // Delete the old profile photo if it exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Store the new profile photo
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }

        // Update self-introduction
        $user->self_introduction = $request->input('self_introduction');
        $user->save(); // Save the user model.

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
