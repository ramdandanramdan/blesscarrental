@extends('layouts.app')

@section('title', 'Bless Rent Car - Rental Mobil Terbaik di Jakarta, Bekasi, Tangerang, Depok')
@section('description', 'Sewa mobil berkualitas dengan harga terbaik. PT. BLESS TRANS MANDIRI melayani rental mobil di Jakarta, Bekasi, Tangerang, Depok. Armada lengkap, proses mudah, layanan 24 jam.')

@push('styles')
<style>
    .hero-mesh { background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 40%, #e0f2fe 100%); position: relative; overflow: hidden; }
    .hero-blob { position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none; }
    .hero-glass { background: rgba(255,255,255,0.65); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.7); }
    .hero-glass-strong { background: rgba(255,255,255,0.85); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.9); }
    .hero-grid-bg { background-image: radial-gradient(rgba(14,165,233,0.07) 1px, transparent 1px); background-size: 32px 32px; }
    .text-gradient { background: linear-gradient(135deg, #0ea5e9, #06b6d4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .text-gradient-warm { background: linear-gradient(135deg, #0ea5e9, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .hero-float { animation: heroFloat 6s ease-in-out infinite; }
    .hero-float-2 { animation: heroFloat 7s ease-in-out infinite; animation-delay: -2.5s; }
    .hero-float-3 { animation: heroFloat 5.5s ease-in-out infinite; animation-delay: -4s; }
    @keyframes heroFloat { 0%,100% { transform: translateY(0px); } 50% { transform: translateY(-18px); } }
    @keyframes blobA { 0%,100% { transform: translate(0,0) scale(1); } 33% { transform: translate(40px,-50px) scale(1.15); } 66% { transform: translate(-30px,30px) scale(0.9); } }
    @keyframes blobB { 0%,100% { transform: translate(0,0) scale(1); } 33% { transform: translate(-50px,40px) scale(1.1); } 66% { transform: translate(30px,-40px) scale(0.85); } }
    @keyframes blobC { 0%,100% { transform: translate(0,0) scale(1); } 33% { transform: translate(30px,60px) scale(0.95); } 66% { transform: translate(-40px,-30px) scale(1.2); } }
    .blob-a { animation: blobA 18s ease-in-out infinite; }
    .blob-b { animation: blobB 22s ease-in-out infinite; }
    .blob-c { animation: blobC 15s ease-in-out infinite; }
    .slide-up { animation: slideUp 0.7s ease-out forwards; opacity: 0; }
    .slide-up-d1 { animation-delay: 0.1s; }
    .slide-up-d2 { animation-delay: 0.2s; }
    .slide-up-d3 { animation-delay: 0.35s; }
    .slide-up-d4 { animation-delay: 0.5s; }
    .slide-up-d5 { animation-delay: 0.65s; }
    .slide-up-d6 { animation-delay: 0.8s; }
    @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes pulseGlow { 0%,100% { box-shadow: 0 0 20px rgba(14,165,233,0.15); } 50% { box-shadow: 0 0 40px rgba(14,165,233,0.3); } }
    .pulse-glow { animation: pulseGlow 3s ease-in-out infinite; }
    .hero-road { height: 3px; background: repeating-linear-gradient(90deg, #0ea5e9 0px, #0ea5e9 20px, transparent 20px, transparent 36px); animation: roadMove 0.8s linear infinite; }
    .scroll-indicator { animation: scrollBounce 2.5s ease-in-out infinite; }
</style>
@endpush

@section('content')

{{-- HERO SECTION 2026 --}}
<section class="hero-mesh min-h-[90vh] flex items-center relative">
    {{-- Background blobs --}}
    <div class="hero-blob blob-a w-[500px] h-[500px] bg-blue-200/40 -top-20 -left-20"></div>
    <div class="hero-blob blob-b w-[400px] h-[400px] bg-cyan-200/30 bottom-10 right-10"></div>
    <div class="hero-blob blob-c w-[350px] h-[350px] bg-sky-200/35 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></div>

    {{-- Grid overlay --}}
    <div class="absolute inset-0 hero-grid-bg pointer-events-none"></div>

    {{-- Subtle floating shapes --}}
    <div class="absolute top-16 right-[8%] w-20 h-20 border border-primary-200/30 rounded-full hero-float-3 pointer-events-none"></div>
    <div class="absolute bottom-20 left-[5%] w-12 h-12 border border-cyan-200/40 rounded-lg hero-float-2 pointer-events-none" style="transform:rotate(45deg);"></div>
    <div class="absolute top-1/4 left-[12%] w-6 h-6 bg-primary-100/40 rounded-full hero-float pointer-events-none"></div>
    <div class="absolute bottom-1/3 right-[15%] w-8 h-8 bg-cyan-100/30 rounded hero-float-3 pointer-events-none" style="transform:rotate(30deg);"></div>

    {{-- Main content --}}
    <div class="relative z-10 w-full py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left Column --}}
                <div>
                    {{-- Badge --}}
                    <div class="slide-up slide-up-d1 inline-flex items-center gap-2 px-4 py-2 rounded-full hero-glass-strong text-sm font-medium text-primary-700 mb-8">
                        <span class="w-2 h-2 bg-green-500 rounded-full inline-block" style="animation:pulseDot 2s ease-in-out infinite;"></span>
                        {{ $homepage['hero']['badge'] ?? 'Terpercaya Sejak 2019' }}
                    </div>

                    {{-- Heading --}}
                    <h1 class="slide-up slide-up-d2 text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 leading-[1.1] mb-6">
                        {{ $homepage['hero']['title_1'] ?? 'Sewa Mobil' }}<br>
                        <span class="text-gradient">{{ $homepage['hero']['title_2'] ?? 'Berkualitas' }}</span><br>
                        {{ $homepage['hero']['title_3'] ?? '& Terpercaya' }}
                    </h1>

                    {{-- Description --}}
                    <p class="slide-up slide-up-d3 text-base sm:text-lg text-gray-500 leading-relaxed mb-10 max-w-lg">
                        {{ $homepage['hero']['description'] ?? 'Nikmati pengalaman rental mobil terbaik dengan armada lengkap, harga terjangkau, dan layanan profesional 24 jam nonstop.' }}
                    </p>

                    {{-- Buttons --}}
                    <div class="slide-up slide-up-d4 flex flex-col sm:flex-row gap-4">
                        <a href="{{ $homepage['hero']['cta1_link'] ?? '/booking' }}"
                           class="group hero-btn inline-flex items-center px-8 py-4 bg-primary-500 hover:bg-primary-600 text-white font-semibold text-base rounded-xl transition-all duration-300 shadow-lg hover:shadow-primary-500/30 hover:-translate-y-0.5 pulse-glow">
                            <x-svg-icon name="calendar-check" class="w-5 h-5 mr-2.5" />
                            {{ $homepage['hero']['cta1_text'] ?? 'Booking Sekarang' }}
                            <svg class="hero-btn-arrow w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                        <a href="{{ $homepage['hero']['cta2_link'] ?? 'https://wa.me/6281225062153' }}" target="_blank"
                           class="inline-flex items-center px-8 py-4 hero-glass-strong text-gray-700 font-semibold text-base rounded-xl border border-gray-200 hover:border-primary-300 hover:text-primary-600 transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                            <x-svg-icon name="whatsapp" class="w-5 h-5 mr-2.5 text-green-500" />
                            {{ $homepage['hero']['cta2_text'] ?? 'Hubungi WhatsApp' }}
                        </a>
                    </div>

                    {{-- Stats --}}
                    <div class="slide-up slide-up-d5 flex items-center gap-6 sm:gap-10 mt-14">
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $homepage['hero']['stat1_value'] ?? '50' }}<span class="text-primary-500">+</span></div>
                            <div class="text-sm text-gray-500 mt-1">{{ $homepage['hero']['stat1_label'] ?? 'Unit Mobil' }}</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200/70"></div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $homepage['hero']['stat2_value'] ?? '1.000' }}<span class="text-primary-500">+</span></div>
                            <div class="text-sm text-gray-500 mt-1">{{ $homepage['hero']['stat2_label'] ?? 'Pelanggan Puas' }}</div>
                        </div>
                        <div class="w-px h-10 bg-gray-200/70"></div>
                        <div>
                            <div class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $homepage['hero']['stat3_value'] ?? '24/7' }}</div>
                            <div class="text-sm text-gray-500 mt-1">{{ $homepage['hero']['stat3_label'] ?? 'Layanan' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="hidden lg:flex items-center justify-center slide-up slide-up-d3">
                    <div class="relative">
                        {{-- Main glass card --}}
                        <div class="hero-glass-strong rounded-3xl p-10 shadow-2xl hero-float" style="box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);">
                            <div class="w-56 h-56 xl:w-64 xl:h-64 flex items-center justify-center">
                                <x-svg-icon name="car-side" class="w-full h-full text-primary-200" />
                            </div>
                        </div>

                            {{-- Garansi badge --}}
                            <div class="absolute -bottom-4 -left-4 px-5 py-3 hero-glass-strong rounded-xl shadow-lg flex items-center gap-2.5 badge-float">
                                <div class="w-9 h-9 bg-primary-50 rounded-lg flex items-center justify-center">
                                    <x-svg-icon name="shield" class="w-5 h-5 text-primary-500" />
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-800">{{ $homepage['hero']['garansi_title'] ?? 'Garansi Layanan' }}</div>
                                    <div class="text-xs text-gray-400">{{ $homepage['hero']['garansi_subtitle'] ?? '100% kepuasan' }}</div>
                                </div>
                            </div>

                            {{-- Rating badge --}}
                            <div class="absolute -top-4 -right-4 px-5 py-3 hero-glass-strong rounded-xl shadow-lg flex items-center gap-2.5 badge-float-2">
                                <div class="flex">
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-800">{{ $homepage['hero']['rating_title'] ?? 'Rating 4.9' }}</div>
                                    <div class="text-xs text-gray-400">{{ $homepage['hero']['rating_subtitle'] ?? 'Google Review' }}</div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Animated road at bottom --}}
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-primary-50/80 to-transparent pointer-events-none">
        <div class="absolute bottom-0 left-0 right-0 h-0.5 hero-road"></div>
        <span class="absolute -bottom-1 left-0 text-primary-300/40 car-drive" style="animation-duration:12s;">
            <x-svg-icon name="car-side" class="w-6 h-6" />
        </span>
        <span class="absolute -bottom-1 left-0 text-primary-400/30 car-drive-reverse" style="animation-duration:16s;animation-delay:-5s;">
            <x-svg-icon name="car" class="w-5 h-5" />
        </span>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-20 left-1/2 -translate-x-1/2 scroll-indicator text-primary-300">
        <x-svg-icon name="chevron-down" class="w-6 h-6" />
    </div>
</section>

{{-- DECORATIVE ANIMATED ROAD DIVIDER --}}
<div class="relative h-20 bg-white overflow-hidden border-t border-b border-gray-100">
    <div class="absolute inset-0 bg-[#f8fafc]"></div>
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-0.5 road-lane opacity-60" style="background: repeating-linear-gradient(90deg, rgba(14,165,233,0.25) 0px, rgba(14,165,233,0.25) 20px, transparent 20px, transparent 40px);"></div>
    <div class="absolute inset-x-0 top-[30%] h-px bg-primary-100/50"></div>
    <div class="absolute inset-x-0 top-[70%] h-px bg-primary-100/50"></div>
    <span class="absolute left-0 top-1/2 -translate-y-1/2 text-primary-300/50 car-drive" style="animation-duration:10s;font-size:1.1rem;animation-delay:-2s;"><x-svg-icon name="car-side" class="w-6 h-6" /></span>
    <span class="absolute left-0 top-[22%] text-primary-300/30 car-drive-fast" style="animation-duration:8s;font-size:0.9rem;animation-delay:-6s;"><x-svg-icon name="car" class="w-5 h-5" /></span>
    <span class="absolute left-0 top-[72%] text-primary-400/35 car-drive-reverse" style="animation-duration:14s;font-size:1rem;animation-delay:-4s;"><x-svg-icon name="car" class="w-5 h-5" /></span>
    <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1200 80" preserveAspectRatio="none">
        <path d="M0,40 Q150,16 300,40 T600,40 T900,40 T1200,40" fill="none" stroke="#bae6fd" stroke-width="2.5" stroke-dasharray="12 10">
            <animate attributeName="stroke-dashoffset" from="0" to="-44" dur="2s" repeatCount="indefinite" />
        </path>
        <path d="M0,44 Q150,20 300,44 T600,44 T900,44 T1200,44" fill="none" stroke="#bae6fd" stroke-width="1.5" stroke-dasharray="8 6">
            <animate attributeName="stroke-dashoffset" from="0" to="-28" dur="1.5s" repeatCount="indefinite" />
        </path>
    </svg>
</div>

{{-- STATS --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 lg:gap-12">
            @php
                $statData = [
                    [$homepage['stats']['stat1_icon'] ?? 'car', $homepage['stats']['stat1_value'] ?? '50', $homepage['stats']['stat1_label'] ?? 'Unit Mobil', $homepage['stats']['stat1_suffix'] ?? '+'],
                    [$homepage['stats']['stat2_icon'] ?? 'users', $homepage['stats']['stat2_value'] ?? '1000', $homepage['stats']['stat2_label'] ?? 'Pelanggan Puas', $homepage['stats']['stat2_suffix'] ?? '+'],
                    [$homepage['stats']['stat3_icon'] ?? 'clock', $homepage['stats']['stat3_value'] ?? '247', $homepage['stats']['stat3_label'] ?? 'Layanan', $homepage['stats']['stat3_suffix'] ?? ''],
                    [$homepage['stats']['stat4_icon'] ?? 'building', $homepage['stats']['stat4_value'] ?? '5', $homepage['stats']['stat4_label'] ?? 'Area Layanan', $homepage['stats']['stat4_suffix'] ?? ''],
                ];
            @endphp
            @foreach($statData as $s)
            <div class="text-center gauge-glow rounded-2xl p-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="flex items-center justify-center mb-2">
                    <x-svg-icon name="{{ $s[0] }}" class="w-8 h-8 text-primary-300 steer-spin" />
                </div>
                <div class="text-3xl lg:text-4xl font-bold text-gray-900">
                    <span class="animate-counter" data-target="{{ $s[1] }}" data-suffix="{{ $s[3] }}" data-duration="1500">0{{ $s[3] }}</span>
                </div>
                <div class="text-sm text-gray-500 mt-1">{{ $s[2] }}</div>
                <div class="fuel-gauge mt-3 max-w-[120px] mx-auto"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SMALL ANIMATED ROAD DIVIDER --}}
<div class="relative h-10 bg-gray-50/50 overflow-hidden border-t border-gray-100">
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-px road-lane opacity-30" style="background: repeating-linear-gradient(90deg, rgba(14,165,233,0.15) 0px, rgba(14,165,233,0.15) 12px, transparent 12px, transparent 24px);"></div>
    <span class="absolute left-0 top-1/2 -translate-y-1/2 text-primary-200/30 car-drive" style="animation-duration:15s;font-size:0.85rem;animation-delay:-3s;"><x-svg-icon name="car-side" class="w-5 h-5" /></span>
</div>

{{-- LAYANAN --}}
<section class="py-20 bg-gray-50/50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up" data-aos-duration="350">
            <p class="text-primary-500 font-semibold text-sm tracking-widest uppercase mb-3">{{ $homepage['services_intro']['subtitle'] ?? 'Layanan' }}</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $homepage['services_intro']['title'] ?? 'Apa yang Kami Tawarkan' }}</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">{{ $homepage['services_intro']['description'] ?? 'Pilih layanan yang Anda perlukan untuk memulai perjalanan Anda.' }}</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="/booking" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350">
                <div class="shine-sweep w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="calendar-check" class="w-7 h-7 text-primary-500 steer-spin" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Booking Mobil</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Pesan mobil impian Anda dengan mudah dan cepat melalui form online.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Booking Sekarang <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="/products" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="80">
                <div class="shine-sweep w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="car" class="w-7 h-7 text-primary-500 steer-spin" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Lihat Armada</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Jelajahi koleksi lengkap unit mobil berkualitas kami.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Semua <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="/services" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="160">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="settings" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Layanan Rental</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Berbagai pilihan layanan rental fleksibel sesuai kebutuhan.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Lihat Layanan <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="/articles" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="240">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="newspaper" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Informasi & Berita</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Tips, berita, dan panduan seputar rental mobil.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Baca Artikel <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="/about" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="320">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="building" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Tentang Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Kenali lebih dekat PT. BLESS TRANS MANDIRI.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Pelajari <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
            <a href="/contact" class="group bg-white rounded-xl p-8 border border-gray-200 hover:border-primary-300 hover:shadow-lg transition-all duration-300 text-center" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="400">
                <div class="w-14 h-14 mx-auto bg-primary-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-primary-100 transition-colors duration-300">
                    <x-svg-icon name="headset" class="w-7 h-7 text-primary-500" />
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Hubungi Kami</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-4">Tim kami siap melayani Anda 24 jam sehari.</p>
                <span class="text-primary-500 font-semibold text-sm group-hover:translate-x-1 transition-transform inline-flex items-center">Hubungi <x-svg-icon name="arrow-right" class="w-3 h-3 ml-1.5" /></span>
            </a>
        </div>
    </div>
</section>

{{-- SMALL ANIMATED ROAD DIVIDER --}}
<div class="relative h-10 bg-white overflow-hidden border-b border-gray-100">
    <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-px road-lane opacity-30" style="background: repeating-linear-gradient(90deg, rgba(14,165,233,0.12) 0px, rgba(14,165,233,0.12) 14px, transparent 14px, transparent 28px);"></div>
    <span class="absolute left-0 top-1/2 -translate-y-1/2 text-primary-200/30 car-drive-reverse" style="animation-duration:12s;font-size:0.9rem;animation-delay:-5s;"><x-svg-icon name="car" class="w-5 h-5" /></span>
</div>

{{-- CTA --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl p-12 md:p-16 text-center relative overflow-hidden" data-aos="zoom-in" data-aos-duration="400">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
                {{-- Subtle cars in CTA background --}}
                <span class="car-drive absolute -bottom-2 left-0 text-white/20" style="animation-duration:12s;font-size:1.5rem;animation-delay:-1s;"><x-svg-icon name="car-side" class="w-6 h-6" /></span>
                <span class="car-drive-reverse absolute -bottom-2 left-0 text-white/15" style="animation-duration:16s;font-size:1.25rem;animation-delay:-8s;"><x-svg-icon name="car" class="w-5 h-5" /></span>
                <div class="speed-line" style="top:40%;width:60px;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.08),transparent);animation-delay:0.5s;"></div>
                <div class="speed-line" style="top:60%;width:80px;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.06),transparent);animation-delay:1.8s;"></div>
            </div>
            <div class="relative">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $homepage['cta']['heading'] ?? 'Siap untuk Perjalanan Anda?' }}</h2>
                <p class="text-white/80 mb-8 max-w-lg mx-auto">{{ $homepage['cta']['description'] ?? 'Hubungi kami sekarang dan dapatkan mobil terbaik untuk perjalanan Anda.' }}</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ $homepage['cta']['button1_link'] ?? '/booking' }}" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-xl transition-all duration-300 shadow-lg hover:-translate-y-0.5 hover:shadow-xl">
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

{{-- LOCATIONS --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
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
