@extends('layouts.app')

@section('title', 'Layanan - Bless Rent Car')
@section('description', 'Layanan rental mobil terbaik dari Bless Rent Car. Sewa lepas kunci, dengan driver, airport transfer, sewa jangka panjang, dan paket wisata.')
@section('og_title', 'Layanan - Bless Rent Car')
@section('og_description', 'Berbagai layanan rental mobil untuk kebutuhan Anda.')

@section('content')
<section class="page-hero py-16 md:py-24">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-cogs hero-shape-drift text-primary-200" style="top:12%;left:5%;font-size:5rem;"></i>
        <i class="fas fa-car hero-shape-drift text-primary-200" style="bottom:15%;right:8%;font-size:6rem;animation-delay:-7s;"></i>
        <svg class="absolute bottom-0 left-0 w-full" height="4" viewBox="0 0 1200 4" preserveAspectRatio="none">
            <line x1="0" y1="2" x2="1200" y2="2" stroke="#0ea5e9" stroke-width="2" stroke-dasharray="24 16" class="road-line" />
        </svg>
        <div class="car-drive absolute bottom-0 left-0 text-primary-300/50"><i class="fas fa-car-side"></i></div>
        <div class="dot-float" style="width:8px;height:8px;top:12%;left:6%;animation-delay:0s;"></div>
        <div class="dot-float" style="width:5px;height:5px;top:30%;right:20%;animation-delay:-1.5s;"></div>
        <div class="dot-float" style="width:10px;height:10px;top:55%;left:40%;animation-delay:-3s;"></div>
        <div class="dot-float" style="width:4px;height:4px;top:75%;right:10%;animation-delay:-4.5s;"></div>
        <div class="dot-float" style="width:6px;height:6px;top:40%;left:70%;animation-delay:-6s;"></div>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 scroll-indicator"><i class="fas fa-chevron-down text-primary-300 text-xl"></i></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Layanan Kami</h1>
        <nav class="inline-flex items-center space-x-2 text-sm">
            <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-primary-600 font-semibold">Services</span>
        </nav>
        <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Berbagai pilihan layanan rental mobil untuk memenuhi setiap kebutuhan perjalanan Anda.</p>
    </div>
</section>

<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="/services" method="GET" class="max-w-lg mx-auto">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari layanan..." class="w-full border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-base focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
            </div>
        </form>
    </div>
</section>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $serviceList = \App\Models\Service::when(request('search'), function($q) { $q->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%'); })->get();
        @endphp
        @if($serviceList->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($serviceList as $i => $service)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="p-8">
                            <div class="shine-sweep w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-3xl text-primary-500 steer-spin"></i>
                                @else
                                    <i class="fas fa-cog text-3xl text-primary-500 steer-spin"></i>
                                @endif
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->name }}</h3>
                            <p class="text-gray-500 text-base leading-relaxed mb-6">{{ $service->description }}</p>
                            <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-key text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Lepas Kunci</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Rental mobil tanpa driver untuk perjalanan pribadi. Anda bebas mengemudi sendiri dengan privasi penuh. Cocok untuk perjalanan dinas, liburan, atau kebutuhan pribadi.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Bebas atur jadwal perjalanan</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Privasi lebih terjaga</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Harga lebih ekonomis</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" data-aos-delay="50">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-user-tie text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa dengan Driver</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Mobil lengkap dengan driver profesional dan berpengalaman. Nikmati perjalanan nyaman tanpa harus menyetir sendiri.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Driver profesional & ramah</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mengenal rute Jabodetabek</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>BBM & parkir termasuk</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-plane-arrival text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Antar Jemput Bandara</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Layanan antar jemput bandara tepat waktu dan nyaman. Kami pantau jadwal penerbangan Anda sehingga selalu siap tepat waktu.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Pantau jadwal penerbangan</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Meet & greet di terminal</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Free waiting time 1 jam</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-calendar-alt text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Jangka Panjang</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Sewa bulanan dengan harga spesial untuk kebutuhan corporate. Layanan maintenance dan penggantian mobil jika diperlukan.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Harga spesial corporate</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Termasuk perawatan rutin</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mobil pengganti jika diperlukan</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-clock text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Sewa Harian/Mingguan/Bulanan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Fleksibel sewa harian, mingguan, atau bulanan sesuai kebutuhan. Semakin lama sewa, semakin hemat biayanya.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Durasi fleksibel</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Diskon untuk sewa panjang</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Perpanjangan mudah</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6 icon-rotate">
                            <i class="fas fa-suitcase-rolling text-3xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Paket Wisata & Event</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">Paket sewa mobil untuk liburan, event, dan acara spesial seperti pernikahan, reuni, gathering, dan city tour.</p>
                        <ul class="space-y-2 mb-6 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Paket wisata custom</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mobil wedding/event</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>City tour & outbound</span></li>
                        </ul>
                        <a href="/booking" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
