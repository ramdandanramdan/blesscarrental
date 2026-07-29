@extends('layouts.user')

@section('title', 'Layanan Kami - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Layanan Kami</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Services</span>
        </nav>
    </div>

    {{-- Search Bar --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-4">
        <form action="{{ route('partner.services') }}" method="GET" class="max-w-lg mx-auto">
            <div class="relative">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari layanan..." class="w-full border border-gray-200 rounded-xl pl-12 pr-4 py-3 text-base focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
            </div>
        </form>
    </div>

    {{-- Service Cards --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8">
        @php
            $serviceList = \App\Models\Service::when(request('search'), function($q) { $q->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%'); })->get();
        @endphp
        @if($serviceList->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($serviceList as $i => $service)
                    <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="p-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-3xl text-primary-500"></i>
                                @else
                                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->name }}</h3>
                            <p class="text-gray-500 text-base leading-relaxed mb-6">{{ $service->description }}</p>
                            <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Sewa Lepas Kunci --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Lepas Kunci</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Rental mobil tanpa driver untuk perjalanan pribadi. Anda bebas mengemudi sendiri dengan privasi penuh. Cocok untuk perjalanan dinas, liburan, atau kebutuhan pribadi.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Bebas atur jadwal perjalanan</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Privasi lebih terjaga</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Harga lebih ekonomis</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Sewa dengan Driver --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="50">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa dengan Driver</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Mobil lengkap dengan driver profesional dan berpengalaman. Nikmati perjalanan nyaman tanpa harus menyetir sendiri.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Driver profesional & ramah</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Mengenal rute Jabodetabek</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>BBM & parkir termasuk</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Antar Jemput Bandara --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Antar Jemput Bandara</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Layanan antar jemput bandara tepat waktu dan nyaman. Kami pantau jadwal penerbangan Anda sehingga selalu siap tepat waktu.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Pantau jadwal penerbangan</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Meet & greet di terminal</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Free waiting time 1 jam</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Sewa Jangka Panjang --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Jangka Panjang</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Sewa bulanan dengan harga spesial untuk kebutuhan corporate. Layanan maintenance dan penggantian mobil jika diperlukan.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Harga spesial corporate</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Termasuk perawatan rutin</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Mobil pengganti jika diperlukan</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Sewa Harian/Mingguan/Bulanan --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Harian/Mingguan/Bulanan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Fleksibel sewa harian, mingguan, atau bulanan sesuai kebutuhan. Semakin lama sewa, semakin hemat biayanya.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Durasi fleksibel</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Diskon untuk sewa panjang</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Perpanjangan mudah</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Paket Wisata & Event --}}
                <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="250">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Paket Wisata & Event</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Paket sewa mobil untuk liburan, event, dan acara spesial seperti pernikahan, reuni, gathering, dan city tour.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Paket wisata custom</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Mobil wedding/event</span></li>
                            <li class="flex items-center space-x-2"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>City tour & outbound</span></li>
                        </ul>
                        <a href="{{ route('partner.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
@endsection
