<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider(string $provider): RedirectResponse
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->withErrors(['email' => 'Provider tidak didukung.']);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(string $provider): RedirectResponse
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->withErrors(['email' => 'Provider tidak didukung.']);
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            $providerName = $provider === 'google' ? 'Google' : 'Facebook';
            return redirect()->route('login')->withErrors(['email' => "Gagal login dengan {$providerName}."]);
        }

        $email = $socialUser->getEmail();
        $user = User::where('email', $email)->first();

        if (!$user) {
            $idColumn = $provider . '_id';
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $email,
                'password' => Hash::make(uniqid()),
                $idColumn => $socialUser->getId(),
                'auth_type' => $provider,
                'role' => 'customer',
                'status' => 'active',
                'avatar' => $socialUser->getAvatar(),
            ]);
        } else {
            $idColumn = $provider . '_id';
            $user->update([
                $idColumn => $socialUser->getId(),
                'auth_type' => $provider,
                'avatar' => $socialUser->getAvatar(),
            ]);
        }

        Auth::login($user);

        return redirect()->intended(route('customer.dashboard'));
    }

    public function redirectToWhatsApp(): RedirectResponse
    {
        $phone = '6281225062153';
        $message = urlencode('Halo, saya ingin menyewa mobil.');

        return redirect("https://wa.me/{$phone}?text={$message}");
    }
}
