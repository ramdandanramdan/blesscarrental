@extends('layouts.user')

@section('title', 'Beranda - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Beranda</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Beranda</span>
        </nav>
    </div>

    {{-- Welcome Banner --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-500 to-primary-700 p-8 text-white shadow-lg" data-aos="fade-up">
        <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-10 -left-10 h-32 w-32 rounded-full bg-white/5"></div>
        <div class="relative z-10">
            <h2 class="text-2xl font-bold">
                @php
                    $hour = now()->hour;
                    $greeting = $hour < 12 ? 'Selamat pagi' : ($hour < 17 ? 'Selamat siang' : ($hour < 21 ? 'Selamat sore' : 'Selamat malam'));
                @endphp
                {{ $greeting }}, {{ Auth::user()->name }}!
            </h2>
            <p class="mt-2 text-primary-100">Selamat datang di panel partner Bless Rent Car. Jelajahi informasi dan layanan kami.</p>
            <a href="{{ route('partner.bookings') }}" class="inline-flex items-center mt-4 px-6 py-2.5 bg-white text-primary-600 font-semibold rounded-xl shadow hover:shadow-lg transition-all">
                Lihat Booking
            </a>
        </div>
    </div>

    {{-- Stats --}}
    <section class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6" data-aos="fade-up">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $statData = [
                    ['icon' => 'car', 'value' => '50', 'label' => 'Unit Mobil', 'suffix' => '+'],
                    ['icon' => 'users', 'value' => '1000', 'label' => 'Pelanggan Puas', 'suffix' => '+'],
                    ['icon' => 'clock', 'value' => '247', 'label' => 'Layanan', 'suffix' => ''],
                    ['icon' => 'building', 'value' => '5', 'label' => 'Area Layanan', 'suffix' => ''],
                ];
            @endphp
            @foreach($statData as $s)
            <div class="text-center rounded-2xl p-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="flex items-center justify-center mb-2">
                    @if($s['icon'] === 'car')
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                    @elseif($s['icon'] === 'users')
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    @elseif($s['icon'] === 'clock')
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    @else
                        <svg class="w-8 h-8 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    @endif
                </div>
                <div class="text-3xl font-bold text-gray-900">{{ $s['value'] }}<span class="text-primary-500">{{ $s['suffix'] }}</span></div>
                <div class="text-sm text-gray-500 mt-1">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Services --}}
    <section class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6" data-aos="fade-up">
        <div class="mb-6">
            <p class="text-primary-500 font-semibold text-sm tracking-widest uppercase">Layanan</p>
            <h2 class="text-2xl font-bold text-gray-900 mt-1">Apa yang Kami Tawarkan</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('partner.bookings') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Booking Mobil</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Pantau dan kelola pemesanan kendaraan Anda.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Booking <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
            <a href="{{ route('partner.products') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="80">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Lihat Armada</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Jelajahi koleksi unit mobil berkualitas.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Semua <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
            <a href="{{ route('partner.services') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="160">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Layanan Rental</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Berbagai pilihan layanan fleksibel.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Layanan <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
            <a href="{{ route('partner.articles') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="240">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi & Berita</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Tips, berita, dan panduan seputar rental mobil.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Baca Artikel <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
            <a href="{{ route('partner.about') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="320">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tentang Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Kenali lebih dekat PT. BLESS TRANS MANDIRI.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Pelajari <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
            <a href="{{ route('partner.contact') }}" class="group bg-gray-50 rounded-xl p-6 border border-gray-100 hover:border-primary-300 hover:shadow-md transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="400">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Hubungi Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Tim kami siap melayani Anda 24 jam sehari.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Hubungi <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span>
            </a>
        </div>
    </section>

    {{-- CTA --}}
    <section class="rounded-2xl bg-gradient-to-br from-primary-500 to-primary-700 p-10 text-center relative overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="400">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap untuk Perjalanan Anda?</h2>
            <p class="text-white/80 mb-8 max-w-lg mx-auto">Hubungi kami sekarang dan dapatkan mobil terbaik untuk perjalanan Anda.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('partner.bookings') }}" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl transition-all duration-300 shadow-lg hover:-translate-y-0.5 hover:shadow-xl">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    Booking Sekarang
                </a>
                <a href="https://wa.me/6281225062153" target="_blank" class="inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-5 h-5 mr-2 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Hubungi WhatsApp
                </a>
            </div>
        </div>
    </section>

    {{-- Locations --}}
    <section class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6" data-aos="fade-up">
        <div class="flex flex-wrap items-center justify-center gap-2">
            <span class="text-sm text-gray-500 font-medium mr-2">
                <svg class="w-4 h-4 text-primary-500 mr-1 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Wilayah Layanan:
            </span>
            @foreach(['Jakarta', 'Bekasi', 'Tangerang', 'Depok', 'Bogor', 'Bandung'] as $loc)
            <span class="px-4 py-2 bg-gray-50 rounded-lg border border-gray-200 text-sm text-gray-600 hover:border-primary-300 hover:text-primary-600 transition-colors" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="{{ $loop->index * 50 }}">{{ $loc }}</span>
            @endforeach
        </div>
    </section>

</div>
@endsection
