<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('Dashboard.User.Auth.signin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if($request->authenticate()){
            $request->session()->regenerate();

            return redirect()->route('dashboard.user');  
        }
        return back()->withErrors($request->errors());
        // this is the default redirect path after login 
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // in the following line we are logging out the user using the web guard which is the default guard in the config/auth.php
        Auth::guard('web')->logout();
        // here we invalidate the session (killing the session data)
        $request->session()->invalidate();
        // this makes sure that the session is regenerated after logout to be in the safe side
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
