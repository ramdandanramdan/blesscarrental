@extends('layouts.app')

@section('title', 'Reset Password - Bless Rent Car')
@section('description', 'Atur ulang kata sandi akun Bless Rent Car Anda. Masukkan password baru untuk melanjutkan.')

@push('styles')
<style>
    .password-toggle { cursor: pointer; }
</style>
@endpush

@section('content')
<section class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-primary-50 via-white to-primary-50">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-3xl shadow-xl shadow-primary-100/50 border border-gray-100 p-8 md:p-10">
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center space-x-2 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-car text-white text-lg"></i>
                    </div>
                    <span class="text-lg font-extrabold text-gray-900">BLESS RENT CAR</span>
                </a>
                <div class="w-16 h-16 mx-auto bg-primary-50 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-key text-2xl text-primary-500"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Reset Password</h1>
                <p class="text-gray-500 text-sm mt-1">Buat password baru untuk akun Anda.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}" x-data="{ showPassword: false, showConfirm: false }" class="space-y-5">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <i class="fas fa-envelope text-primary-500 mr-1"></i> Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" readonly
                        class="w-full border border-gray-200 rounded-xl px-4 py-3.5 text-sm bg-gray-100 text-gray-500 cursor-not-allowed">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <i class="fas fa-lock text-primary-500 mr-1"></i> Password Baru
                    </label>
                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required autocomplete="new-password"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3.5 pr-11 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50 @error('password') border-red-300 @enderror"
                            placeholder="Min. 8 karakter">
                        <button type="button" @click="showPassword = !showPassword" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500 transition-colors">
                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <i class="fas fa-lock text-primary-500 mr-1"></i> Konfirmasi Password Baru
                    </label>
                    <div class="relative">
                        <input :type="showConfirm ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3.5 pr-11 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                            placeholder="Ulangi password baru">
                        <button type="button" @click="showConfirm = !showConfirm" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500 transition-colors">
                            <i :class="showConfirm ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-sync-alt mr-2"></i> Reset Password
                </button>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm text-primary-500 hover:text-primary-600 font-medium hover:underline">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
