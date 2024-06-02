<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Update user data
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);

        // Handle profile photo upload
        if ($request->hasFile('profile_photo_path')) {
            $profilePhoto = $request->file('profile_photo_path');
            $profilePhotoPath = $profilePhoto->store('profile_photos', 'public');

            // Delete the old profile photo if it exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Save the new profile photo path
            $user->profile_photo_path = $profilePhotoPath;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Update role-specific data
        switch ($user->roleType) {
            case 'Staff':
                $staff = $user->staff;
                $staff->update([
                    'S_position' => $validated['S_position'],
                    'S_department' => $validated['S_department'],
                    'S_phone' => $validated['S_phone'],
                    'S_address' => $validated['S_address'],
                    'S_skills' => $validated['S_skills'],
                    'S_workExperience' => $validated['S_workExperience'],
                ]);
                break;

            case 'Mentor':
                $mentor = $user->mentor;
                $mentor->update([
                    'M_phoneNum' => $validated['M_phoneNum'],
                    'M_position' => $validated['M_position'],
                    'M_title' => $validated['M_title'],
                    'M_eduField' => $validated['M_eduField'],
                    'M_employementHistory' => $validated['M_employementHistory'],
                ]);
                break;

            case 'Platinum':
                $platinum = $user;
                $platinum->update([
                    'P_registration_type' => $validated['P_registration_type'],
                    'P_title' => $validated['P_title'],
                    'P_religion' => $validated['P_religion'],
                    'P_race' => $validated['P_race'],
                    'P_citizenship' => $validated['P_citizenship'],
                    'P_edu_level' => $validated['P_edu_level'],
                    'P_edu_field' => $validated['P_edu_field'],
                    'P_edu_institute' => $validated['P_edu_institute'],
                    'P_occupation' => $validated['P_occupation'],
                    'P_sponsorship' => $validated['P_sponsorship'],
                    'P_address' => $validated['P_address'],
                    'P_phone' => $validated['P_phone'],
                    'P_fb_name' => $validated['P_fb_name'],
                    'P_program' => $validated['P_program'],
                    'P_batch' => $validated['P_batch'],
                   
                ]);

                case 'Platinum':
                    $platinum = $user->platinum;
                    if (!$platinum) {
                        $platinum = new \App\Models\Platinum(['id' => $user->id]);
                        $platinum->save();
                    }
                    $platinum->update([
                        'P_supervisorName' => $validated['P_supervisorName'],
                        'P_supervisorContact' => $validated['P_supervisorContact'],
                        'P_Institution' => $validated['P_Institution'],
                        'P_Department' => $validated['P_Department'],
                        'P_Position' => $validated['P_Position'],
                    ]);
                break;
        }

        return Redirect::route('profile.show')->with('success', 'profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
