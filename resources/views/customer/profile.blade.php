@extends('layouts.user')

@section('title', 'Profil Saya')

@section('content')
<div class="mx-auto max-w-3xl space-y-8">

    {{-- User Info Card --}}
    <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm" data-aos="fade-up">
        <div class="flex flex-col items-center gap-6 sm:flex-row">
            <div class="flex h-20 w-20 flex-shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-primary-500 to-primary-700 text-3xl font-bold text-white shadow-lg shadow-primary-200">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="text-center sm:text-left">
                <h2 class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                <div class="mt-2 flex flex-wrap items-center justify-center gap-3 sm:justify-start">
                    <span class="inline-flex items-center rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700">{{ ucfirst(Auth::user()->role ?? 'Customer') }}</span>
                    <span class="text-xs text-gray-400">Member sejak {{ Auth::user()->created_at?->format('d M Y') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Profile Form --}}
    <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <h3 class="mb-6 text-lg font-bold text-gray-900">Edit Profil</h3>

        <form action="{{ route('customer.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100 @error('name') border-red-300 @enderror"
                           required>
                    @error('name')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="mb-1.5 block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100 @error('email') border-red-300 @enderror"
                           required>
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="mb-1.5 block text-sm font-medium text-gray-700">Telepon</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100 @error('phone') border-red-300 @enderror">
                    @error('phone')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="rounded-xl bg-gradient-to-r from-primary-500 to-primary-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-200 transition hover:shadow-xl hover:shadow-primary-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    {{-- Change Password Form --}}
    <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="200">
        <h3 class="mb-6 text-lg font-bold text-gray-900">Ganti Password</h3>

        <form action="{{ route('customer.password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="current_password" class="mb-1.5 block text-sm font-medium text-gray-700">Password Saat Ini</label>
                    <input type="password" name="current_password" id="current_password"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100 @error('current_password') border-red-300 @enderror"
                           required>
                    @error('current_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="new_password" class="mb-1.5 block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="new_password" id="new_password"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100 @error('new_password') border-red-300 @enderror"
                           required>
                    @error('new_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="new_password_confirmation" class="mb-1.5 block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                           class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-gray-900 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-100"
                           required>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="rounded-xl bg-gray-900 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-gray-800">
                    Ganti Password
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
