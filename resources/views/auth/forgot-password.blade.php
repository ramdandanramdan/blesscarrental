@extends('layouts.app')

@section('title', 'Lupa Password - Bless Rent Car')
@section('description', 'Lupa kata sandi akun Bless Rent Car? Masukkan email Anda untuk mendapatkan tautan reset password.')

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
                    <i class="fas fa-lock-open text-2xl text-primary-500"></i>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Lupa Password?</h1>
                <p class="text-gray-500 text-sm mt-1">Masukkan email Anda dan kami akan mengirimkan tautan reset password.</p>
            </div>

            @if (session('status'))
                <div class="bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl p-4 mb-6">
                    <i class="fas fa-check-circle mr-1"></i> {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <i class="fas fa-envelope text-primary-500 mr-1"></i> Email
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-gray-200 rounded-xl px-4 py-3.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50 @error('email') border-red-300 @enderror"
                        placeholder="Masukkan email Anda">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Tautan Reset
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
