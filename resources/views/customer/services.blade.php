@extends('layouts.user')

@section('title', 'Layanan Kami - Dashboard')

@section('content')
<div class="mb-6" data-aos="fade-up">
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-6 md:p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Layanan Kami</h1>
            <p class="text-white/80 text-sm">Berbagai pilihan layanan rental mobil untuk memenuhi setiap kebutuhan perjalanan Anda.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Layanan</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-5 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('customer.services') }}" method="GET" class="max-w-lg mx-auto">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari layanan..." class="w-full border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
            </div>
        </form>
    </div>
</section>

<section class="py-8">
    <div class="max-w-7xl mx-auto px-0">
        @php
            $serviceList = \App\Models\Service::when(request('search'), function($q) { $q->where('name', 'like', '%'.request('search').'%')->orWhere('description', 'like', '%'.request('search').'%'); })->get();
        @endphp
        @if($serviceList->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($serviceList as $i => $service)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <div class="p-7">
                            <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                                @if($service->icon)
                                    <i class="{{ $service->icon }} text-2xl text-primary-500"></i>
                                @else
                                    <i class="fas fa-cog text-2xl text-primary-500"></i>
                                @endif
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $service->name }}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed mb-5">{{ $service->description }}</p>
                            <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-key text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Sewa Lepas Kunci</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Rental mobil tanpa driver untuk perjalanan pribadi. Anda bebas mengemudi sendiri dengan privasi penuh. Cocok untuk perjalanan dinas, liburan, atau kebutuhan pribadi.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Bebas atur jadwal perjalanan</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Privasi lebih terjaga</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Harga lebih ekonomis</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="50">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-user-tie text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Sewa dengan Driver</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Mobil lengkap dengan driver profesional dan berpengalaman. Nikmati perjalanan nyaman tanpa harus menyetir sendiri.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Driver profesional & ramah</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mengenal rute Jabodetabek</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>BBM & parkir termasuk</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-plane-arrival text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Antar Jemput Bandara</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Layanan antar jemput bandara tepat waktu dan nyaman. Kami pantau jadwal penerbangan Anda sehingga selalu siap tepat waktu.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Pantau jadwal penerbangan</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Meet & greet di terminal</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Free waiting time 1 jam</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-calendar-alt text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Sewa Jangka Panjang</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Sewa bulanan dengan harga spesial untuk kebutuhan corporate. Layanan maintenance dan penggantian mobil jika diperlukan.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Harga spesial corporate</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Termasuk perawatan rutin</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mobil pengganti jika diperlukan</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-clock text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Sewa Harian/Mingguan/Bulanan</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Fleksibel sewa harian, mingguan, atau bulanan sesuai kebutuhan. Semakin lama sewa, semakin hemat biayanya.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Durasi fleksibel</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Diskon untuk sewa panjang</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Perpanjangan mudah</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="250">
                    <div class="p-7">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                            <i class="fas fa-suitcase-rolling text-2xl text-primary-500"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Paket Wisata & Event</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-5">Paket sewa mobil untuk liburan, event, dan acara spesial seperti pernikahan, reuni, gathering, dan city tour.</p>
                        <ul class="space-y-2 mb-5 text-sm text-gray-600">
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Paket wisata custom</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>Mobil wedding/event</span></li>
                            <li class="flex items-center space-x-2"><i class="fas fa-check-circle text-green-500 text-xs"></i><span>City tour & outbound</span></li>
                        </ul>
                        <a href="{{ route('customer.bookings') }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                            Pesan Sekarang <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
