<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Mentor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Staff;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function authenticate(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required'

        ]);

        $userType = $request ->role;
        $user=null;
        $loginAcc=null;

        if ($userType === "Staff") {
            $user = Staff::where('email', '=', $request->email)->first();

            if($user) {
                $loginAcc = User::where('S_staffID', '=', $user->id)->first();
            }
        }
        elseif ($userType==="Mentor") {
            $user= Mentor::where('M_mentorID', '=', $request->email)->first();

            if($user) {
                $loginAcc = User::where('M_mentorID', '=', $user->id)->first();
            }
        }


    }


    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard',absolute:false));

   
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
