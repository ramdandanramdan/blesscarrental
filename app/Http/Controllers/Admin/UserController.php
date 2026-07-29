<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company_name', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,partner,customer',
            'phone' => 'nullable|string|max:20',
            'status' => 'required|in:active,suspended,pending',
            'company_name' => 'nullable|string|max:255',
            'company_address' => 'nullable|string|max:500',
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna baru berhasil dibuat.');
    }

    public function show(User $user): View
    {
        $user->load('bookings.car');

        return view('admin.users.show', compact('user'));
    }

    public function approve(User $user): RedirectResponse
    {
        if ($user->role !== 'partner') {
            return back()->with('error', 'Hanya akun mitra yang dapat disetujui.');
        }

        $user->update([
            'status' => 'active',
        ]);

        return back()->with('success', 'Akun mitra berhasil disetujui.');
    }

    public function reject(Request $request, User $user): RedirectResponse
    {
        if ($user->role !== 'partner') {
            return back()->with('error', 'Hanya akun mitra yang dapat ditolak.');
        }

        $user->update([
            'status' => 'suspended',
        ]);

        return back()->with('success', 'Akun mitra berhasil ditolak.');
    }

    public function activate(User $user): RedirectResponse
    {
        $user->update([
            'status' => 'active',
        ]);

        return back()->with('success', 'Akun pengguna berhasil diaktifkan.');
    }

    public function suspend(User $user): RedirectResponse
    {
        $user->update([
            'status' => 'suspended',
        ]);

        return back()->with('success', 'Akun pengguna berhasil ditangguhkan.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Akun admin tidak dapat dihapus.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
