<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ActivityLogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Observers\ActivityLogsObserver;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = User::find(auth()->id());

        activity('auth')
            ->performedOn($user)
            ->causedBy($user)
            ->event(ActivityLogType::Login->value)
            ->log(ActivityLogType::Login->content($user));

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = User::find(auth()->id());
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();



        activity('logout')
            ->performedOn($user)
            ->causedBy($user)
            ->event(ActivityLogType::LogOut->value)
            ->log(ActivityLogType::LogOut->content($user));

        return redirect()->route('login');
    }
}