@extends('layouts.app')

@section('title', 'Daftar - Bless Rent Car')
@section('description', 'Buat akun Bless Rent Car untuk kemudahan pemesanan dan akses ke berbagai fitur.')

@push('styles')
<style>
    .role-toggle { transition: all 0.3s ease; }
    .role-toggle.active { background: linear-gradient(135deg, #0ea5e9, #0284c7); color: white; border-color: transparent; }
    .social-btn { transition: all 0.3s ease; }
    .social-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 16px -4px rgba(0,0,0,0.1); }
</style>
@endpush

@section('content')
<section class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-primary-50 via-white to-primary-50">
    <div class="w-full max-w-lg">
        <div class="bg-white rounded-3xl shadow-xl shadow-primary-100/50 border border-gray-100 p-8 md:p-10">
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center space-x-2 mb-6">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-car text-white text-lg"></i>
                    </div>
                    <span class="text-lg font-extrabold text-gray-900">BLESS RENT CAR</span>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h1>
                <p class="text-gray-500 text-sm mt-1">Daftar untuk menikmati kemudahan pemesanan</p>
            </div>

            <form method="POST" action="{{ route('register') }}" x-data="{ role: 'customer', showPassword: false, showConfirm: false }">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-3 text-center">Daftar Sebagai</label>
                    <div class="flex bg-gray-100 rounded-xl p-1">
                        <button type="button" @click="role = 'customer'" :class="role === 'customer' ? 'active' : 'text-gray-500 bg-transparent'" class="role-toggle flex-1 py-2.5 px-4 rounded-lg text-sm font-semibold transition-all duration-200">
                            <i class="fas fa-user mr-1"></i> Customer
                        </button>
                        <button type="button" @click="role = 'partner'" :class="role === 'partner' ? 'active' : 'text-gray-500 bg-transparent'" class="role-toggle flex-1 py-2.5 px-4 rounded-lg text-sm font-semibold transition-all duration-200">
                            <i class="fas fa-handshake mr-1"></i> Partner
                        </button>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                placeholder="Nama lengkap">
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">No. Telepon <span class="text-red-500">*</span></label>
                            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                placeholder="08xxxxxxxxxx">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                            placeholder="contoh@email.com">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required autocomplete="new-password"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 pr-11 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                    placeholder="Min. 8 karakter">
                                <button type="button" @click="showPassword = !showPassword" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500 transition-colors">
                                    <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                                </button>
                            </div>
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input :type="showConfirm ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 pr-11 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                    placeholder="Ulangi password">
                                <button type="button" @click="showConfirm = !showConfirm" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-500 transition-colors">
                                    <i :class="showConfirm ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div x-show="role === 'partner'" x-transition>
                        <div class="p-4 bg-primary-50 rounded-xl border border-primary-100 mb-4">
                            <p class="text-xs text-primary-600"><i class="fas fa-info-circle mr-1"></i> Akun Partner memerlukan persetujuan admin setelah pendaftaran.</p>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="company_name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Perusahaan <span class="text-red-500">*</span></label>
                                <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                    placeholder="Nama perusahaan">
                            </div>
                            <div>
                                <label for="company_address" class="block text-sm font-semibold text-gray-700 mb-1">Alamat Perusahaan <span class="text-red-500">*</span></label>
                                <textarea id="company_address" name="company_address" rows="2"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50"
                                    placeholder="Alamat lengkap perusahaan">{{ old('company_address') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-2">
                        <input type="checkbox" id="terms" name="terms" required class="mt-1 w-4 h-4 text-primary-500 border-gray-300 rounded focus:ring-primary-500">
                        <label for="terms" class="text-sm text-gray-600">
                            Saya setuju dengan
                            <a href="/help#syarat" target="_blank" class="text-primary-500 font-medium hover:underline">syarat & ketentuan</a>
                            dan
                            <a href="#" class="text-primary-500 font-medium hover:underline">kebijakan privasi</a>
                            yang berlaku <span class="text-red-500">*</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </button>
                </div>
            </form>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-gray-400">Atau daftar dengan</span>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-3 mb-6">
                <a href="{{ route('social.login', 'google') }}" class="social-btn flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 text-gray-700 font-medium text-sm">
                    <i class="fab fa-google text-lg text-red-500 mr-2"></i> Google
                </a>
                <a href="{{ route('social.login', 'facebook') }}" class="social-btn flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 text-gray-700 font-medium text-sm">
                    <i class="fab fa-facebook text-lg text-blue-600 mr-2"></i> Facebook
                </a>
                <a href="https://wa.me/6281225062153" target="_blank" class="social-btn flex items-center justify-center px-4 py-3 border border-gray-200 rounded-xl hover:bg-gray-50 text-gray-700 font-medium text-sm">
                    <i class="fab fa-whatsapp text-lg text-green-500 mr-2"></i> WhatsApp
                </a>
            </div>

            <p class="text-center text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-primary-500 font-semibold hover:text-primary-600 hover:underline">Masuk</a>
            </p>
        </div>
    </div>
</section>
@endsection
