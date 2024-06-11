<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Publication;

class ProfileController extends Controller
{
    // Display user profile
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Display the user's profile edit form
    public function edit(Request $request): View
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update the user's profile information
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validated = $request->validated();

        // Update common user data
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email']
        ])->save();

        // Update role-specific data
        switch ($user->roleType) {
            case 'Staff':
                $user->staff->update($validated);
                break;
            case 'Mentor':
                $user->mentor->update($validated);
                break;
            case 'Platinum':
                $user->update($validated);
                $platinum = $user->platinum ?? new \App\Models\Platinum(['id' => $user->id]);
                $platinum->fill($validated)->save();
                break;
        }

        return Redirect::route('profile.show')->with('success', 'Profile updated successfully');
    }

    // Delete the user's account
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        // Logout the user, delete the account, and invalidate session

        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage
        return Redirect::to('/');
    }

    // List all profiles (or filtered) based on the current user's role
    public function listProfiles(Request $request): View
    {
        $currentUser = Auth::user();
        $search = $request->input('search');

        $query = User::query();
        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
        }
        if ($currentUser->roleType === 'Platinum') {
            $query->where('roleType', 'Platinum');
        }

        $users = $query->get();
        return view('profile.list', compact('users'));
    }

    // View a specific profile
    public function viewProfile($id): View
    {
        $profileUser = User::findOrFail($id);
        return view('profile.view', compact('profileUser'));
    }

    // View expert domains
    public function viewExpert($id): View
    {
        $profileUser = User::findOrFail($id);
        $experts = DB::table('expertDomains')->where('p_platinumID', $id)->get();
        return view('profile.view', compact('profileUser', 'experts'));
    }

    // Show publications
    public function showPublications($id): View
    {
        $profileUser = User::findOrFail($id);
        $publications = Publication::where('P_platinumID', $id)->get();
        return view('profile.view', compact('profileUser', 'publications'));
    }
}

