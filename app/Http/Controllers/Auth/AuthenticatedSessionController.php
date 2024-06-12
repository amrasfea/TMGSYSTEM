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

    }

    //redirect to page login 
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     * bila user click login, the store method is called
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();  // This calls the authenticate method in LoginRequest.

        $request->session()->regenerate();  // Regenerate the session to protect against session fixation attacks.

        $url='';
        if($request->user()->roleType==='Staff'){
            $url='/staff/dashboard';
        }
        elseif($request->user()->roleType === 'Mentor') {
            $url='/mentor/dashboard';
        } 
        elseif($request->user()->roleType === 'Platinum') {
            $url='platinum/dashboard';
        }

        return redirect()->intended($url);  // Redirect the user to their respective dashboard.

   
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
