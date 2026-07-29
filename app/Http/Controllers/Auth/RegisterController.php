<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:customer,partner'],
            'company_name' => ['required_if:role,partner', 'nullable', 'string', 'max:255'],
            'company_address' => ['required_if:role,partner', 'nullable', 'string', 'max:500'],
        ]);

        $isPartner = $request->role === 'partner';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $isPartner ? 'pending' : 'active',
            'company_name' => $isPartner ? $request->company_name : null,
            'company_address' => $isPartner ? $request->company_address : null,
        ]);

        event(new Registered($user));

        if ($isPartner) {
            return redirect()->route('login')->with('status', 'Pendaftaran sebagai mitra berhasil! Akun Anda sedang menunggu persetujuan admin.');
        }

        Auth::login($user);

        return redirect(route('customer.dashboard'));
    }
}
