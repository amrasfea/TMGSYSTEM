<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegistrationUser extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10); // Ensure we are paginating the results

        return view('users.index', compact('users'));
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'P_registration_type' => ['nullable', 'string'],
            'P_title' => ['nullable', 'string'],
            'P_identity_card' => ['nullable', 'string'],
            'P_gender' => ['nullable', 'string'],
            'P_religion' => ['nullable', 'string'],
            'P_race' => ['nullable', 'string'],
            'P_citizenship' => ['nullable', 'string'],
            'P_edu_level' => ['nullable', 'string'],
            'P_edu_field' => ['nullable', 'string'],
            'P_edu_institute' => ['nullable', 'string'],
            'P_occupation' => ['nullable', 'string'],
            'P_sponsorship' => ['nullable', 'string'],
            'P_address' => ['nullable', 'string'],
            'P_phone' => ['nullable', 'string'],
            'P_fb_name' => ['nullable', 'string'],
            'P_program' => ['nullable', 'string'],
            'P_batch' => ['nullable', 'integer'],
            'P_referral' => ['nullable', 'boolean'],
            'P_referral_name' => ['nullable', 'string'],
            'P_referral_batch' => ['nullable', 'string'],
        ]);

        // Set the password to the identity card number
         $password = $request->P_identity_card;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'P_registration_type' => $request->P_registration_type,
            'P_title' => $request->P_title,
            'P_identity_card' => $request->P_identity_card,
            'P_gender' => $request->P_gender,
            'P_religion' => $request->P_religion,
            'P_race' => $request->P_race,
            'P_citizenship' => $request->P_citizenship,
            'P_edu_level' => $request->P_edu_level,
            'P_edu_field' => $request->P_edu_field,
            'P_edu_institute' => $request->P_edu_institute,
            'P_occupation' => $request->P_occupation,
            'P_sponsorship' => $request->P_sponsorship,
            'P_address' => $request->P_address,
            'P_phone' => $request->P_phone,
            'P_fb_name' => $request->P_fb_name,
            'P_program' => $request->P_program,
            'P_batch' => $request->P_batch,
            'P_referral' => $request->P_referral,
            'P_referral_name' => $request->P_referral_name,
            'P_referral_batch' => $request->P_referral_batch,
        ]);

        event(new Registered($user));

        return redirect(route('users.index'))->with('success', 'User registered successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'P_registration_type' => ['nullable', 'string'],
            'P_title' => ['nullable', 'string'],
            'P_identity_card' => ['nullable', 'string'],
            'P_gender' => ['nullable', 'string'],
            'P_religion' => ['nullable', 'string'],
            'P_race' => ['nullable', 'string'],
            'P_citizenship' => ['nullable', 'string'],
            'P_edu_level' => ['nullable', 'string'],
            'P_edu_field' => ['nullable', 'string'],
            'P_edu_institute' => ['nullable', 'string'],
            'P_occupation' => ['nullable', 'string'],
            'P_sponsorship' => ['nullable', 'string'],
            'P_address' => ['nullable', 'string'],
            'P_phone' => ['nullable', 'string'],
            'P_fb_name' => ['nullable', 'string'],
            'P_program' => ['nullable', 'string'],
            'P_batch' => ['nullable', 'integer'],
            'P_referral' => ['nullable', 'boolean'],
            'P_referral_name' => ['nullable', 'string'],
            'P_referral_batch' => ['nullable', 'string'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'P_registration_type' => $request->P_registration_type,
            'P_title' => $request->P_title,
            'P_identity_card' => $request->P_identity_card,
            'P_gender' => $request->P_gender,
            'P_religion' => $request->P_religion,
            'P_race' => $request->P_race,
            'P_citizenship' => $request->P_citizenship,
            'P_edu_level' => $request->P_edu_level,
            'P_edu_field' => $request->P_edu_field,
            'P_edu_institute' => $request->P_edu_institute,
            'P_occupation' => $request->P_occupation,
            'P_sponsorship' => $request->P_sponsorship,
            'P_address' => $request->P_address,
            'P_phone' => $request->P_phone,
            'P_fb_name' => $request->P_fb_name,
            'P_program' => $request->P_program,
            'P_batch' => $request->P_batch,
            'P_referral' => $request->P_referral,
            'P_referral_name' => $request->P_referral_name,
            'P_referral_batch' => $request->P_referral_batch,
        ]);

        if ($user->roleType === 'Platinum') {
            $user->platinum()->updateOrCreate(
                ['id' => $user->id],
                [
                    'P_supervisorName' => $request->P_supervisorName,
                    'P_supervisorContact' => $request->P_supervisorContact,
                    'P_Institution' => $request->P_Institution,
                    'P_Department' => $request->P_Department,
                    'P_Position' => $request->P_Position,
                ]
            );
        }

        return redirect(route('users.index'))->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect(route('users.index'))->with('success', 'User deleted successfully.');
    }
    
    /**
     * Show the specified user.
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }
}
