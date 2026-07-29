@extends('layouts.user')

@section('title', 'Beranda - Dashboard')

@section('content')
<div class="mb-6" data-aos="fade-up">
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-6 md:p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Selamat Datang, {{ $user->name ?? 'User' }}!</h1>
            <p class="text-white/80 text-sm">Berikut ringkasan layanan Bless Rent Car untuk Anda.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Beranda</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-6" data-aos="fade-up" data-aos-delay="100">
    <div class="max-w-7xl mx-auto px-0">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-6">
            @php
                $statData = [
                    [$homepage['stats']['stat1_icon'] ?? 'car', $homepage['stats']['stat1_value'] ?? '50', $homepage['stats']['stat1_label'] ?? 'Unit Mobil', $homepage['stats']['stat1_suffix'] ?? '+'],
                    [$homepage['stats']['stat2_icon'] ?? 'users', $homepage['stats']['stat2_value'] ?? '1000', $homepage['stats']['stat2_label'] ?? 'Pelanggan Puas', $homepage['stats']['stat2_suffix'] ?? '+'],
                    [$homepage['stats']['stat3_icon'] ?? 'clock', $homepage['stats']['stat3_value'] ?? '247', $homepage['stats']['stat3_label'] ?? 'Layanan', $homepage['stats']['stat3_suffix'] ?? ''],
                    [$homepage['stats']['stat4_icon'] ?? 'building', $homepage['stats']['stat4_value'] ?? '5', $homepage['stats']['stat4_label'] ?? 'Area Layanan', $homepage['stats']['stat4_suffix'] ?? ''],
                ];
            @endphp
            @foreach($statData as $s)
            <div class="text-center bg-white rounded-2xl p-5 border border-gray-100 shadow-sm" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="flex items-center justify-center mb-2">
                    <x-svg-icon name="{{ $s[0] }}" class="w-8 h-8 text-primary-300" />
                </div>
                <div class="text-2xl lg:text-3xl font-bold text-gray-900">
                    <span class="animate-counter" data-target="{{ $s[1] }}" data-suffix="{{ $s[3] }}" data-duration="1500">0{{ $s[3] }}</span>
                </div>
                <div class="text-xs text-gray-500 mt-1">{{ $s[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-6">
    <div class="max-w-7xl mx-auto px-0">
        <div class="text-center mb-10" data-aos="fade-up" data-aos-duration="350">
            <p class="text-primary-500 font-semibold text-sm tracking-widest uppercase mb-3">{{ $homepage['services_intro']['subtitle'] ?? 'Layanan' }}</p>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $homepage['services_intro']['title'] ?? 'Apa yang Kami Tawarkan' }}</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">{{ $homepage['services_intro']['description'] ?? 'Pilih layanan yang Anda perlukan untuk memulai perjalanan Anda.' }}</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <a href="{{ route('customer.bookings') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="calendar-check" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Booking Mobil</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Pesan mobil impian Anda dengan mudah dan cepat melalui form online.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Booking Sekarang <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="{{ route('customer.products') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="80">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="car" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Lihat Armada</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Jelajahi koleksi lengkap unit mobil berkualitas kami.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Semua <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="{{ route('customer.services') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="160">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="settings" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Layanan Rental</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Berbagai pilihan layanan rental fleksibel sesuai kebutuhan.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Layanan <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="{{ route('customer.articles') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="240">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="newspaper" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi & Berita</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Tips, berita, dan panduan seputar rental mobil.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Baca Artikel <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="{{ route('customer.about') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="320">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="building" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tentang Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Kenali lebih dekat PT. BLESS TRANS MANDIRI.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Pelajari <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="{{ route('customer.contact') }}" class="group bg-white rounded-xl p-7 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="400">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-4 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="headset" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Hubungi Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-3">Tim kami siap melayani Anda 24 jam sehari.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Hubungi <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
        </div>
    </div>
</section>

<section class="py-6">
    <div class="max-w-7xl mx-auto px-0">
        <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl p-10 md:p-14 text-center relative overflow-hidden" data-aos="zoom-in" data-aos-duration="400">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
            </div>
            <div class="relative">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">{{ $homepage['cta']['heading'] ?? 'Siap untuk Perjalanan Anda?' }}</h2>
                <p class="text-white/80 mb-8 max-w-lg mx-auto">{{ $homepage['cta']['description'] ?? 'Hubungi kami sekarang dan dapatkan mobil terbaik untuk perjalanan Anda.' }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('customer.bookings') }}" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl transition-all duration-300 shadow-lg hover:-translate-y-0.5 hover:shadow-xl">
                        <x-svg-icon name="calendar-check" class="w-5 h-5 mr-2.5" /> {{ $homepage['cta']['button1_text'] ?? 'Booking Sekarang' }}
                    </a>
                    <a href="{{ $homepage['cta']['button2_link'] ?? 'https://wa.me/6281225062153' }}" target="_blank" class="inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl border border-white/20 transition-all duration-300 hover:-translate-y-0.5">
                        <x-svg-icon name="whatsapp" class="w-5 h-5 mr-2.5 text-green-300" /> {{ $homepage['cta']['button2_text'] ?? 'Hubungi WhatsApp' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-6">
    <div class="max-w-7xl mx-auto px-0">
        <div class="flex flex-wrap items-center justify-center gap-2" data-aos="fade-up" data-aos-duration="350">
            <span class="text-sm text-gray-500 font-medium mr-2"><x-svg-icon name="map-pin" class="w-4 h-4 text-primary-500 mr-1 inline-block" /> {{ $homepage['locations']['label'] ?? 'Wilayah Layanan:' }}</span>
            @php
                $locs = json_decode($homepage['locations']['locations'] ?? '["Jakarta","Bekasi","Tangerang","Depok","Bogor","Bandung"]', true);
            @endphp
            @foreach($locs as $loc)
            <span class="px-4 py-2 bg-white rounded-lg border border-gray-200 text-sm text-gray-600 hover:border-primary-300 hover:text-primary-600 transition-colors" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="{{ $loop->index * 50 }}">{{ $loc }}</span>
            @endforeach
        </div>
    </div>
</section>
@endsection
