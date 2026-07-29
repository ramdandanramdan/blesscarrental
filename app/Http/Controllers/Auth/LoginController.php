<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->isPartner()) {
            if ($user->status !== 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Akun mitra Anda belum disetujui oleh admin.',
                ]);
            }

            return redirect()->intended(route('partner.dashboard'));
        }

        return redirect()->intended(route('customer.dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Gagal login dengan Google.']);
        }

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(uniqid()),
                'google_id' => $googleUser->getId(),
                'auth_type' => 'google',
                'role' => 'customer',
                'status' => 'approved',
                'avatar' => $googleUser->getAvatar(),
            ]);
        } else {
            $user->update([
                'google_id' => $googleUser->getId(),
                'auth_type' => 'google',
                'avatar' => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user);

        return redirect()->intended(route('customer.dashboard'));
    }

    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(): RedirectResponse
    {
        try {
            $fbUser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Gagal login dengan Facebook.']);
        }

        $user = User::where('email', $fbUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $fbUser->getName(),
                'email' => $fbUser->getEmail(),
                'password' => Hash::make(uniqid()),
                'facebook_id' => $fbUser->getId(),
                'auth_type' => 'facebook',
                'role' => 'customer',
                'status' => 'approved',
                'avatar' => $fbUser->getAvatar(),
            ]);
        } else {
            $user->update([
                'facebook_id' => $fbUser->getId(),
                'auth_type' => 'facebook',
                'avatar' => $fbUser->getAvatar(),
            ]);
        }

        Auth::login($user);

        return redirect()->intended(route('customer.dashboard'));
    }
}
