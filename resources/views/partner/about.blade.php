@extends('layouts.user')

@section('title', 'Tentang Kami - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Tentang Kami</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Tentang Kami</span>
        </nav>
    </div>

    {{-- Company Profile --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-50 text-primary-600 text-xs font-semibold mb-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Profil Perusahaan
                </span>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">PT. BLESS TRANS MANDIRI</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-primary-300 mt-2 mb-6"></div>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>PT. BLESS TRANS MANDIRI adalah perusahaan penyedia layanan rental mobil terpercaya di Indonesia. Berdiri sejak 2019, kami telah melayani ribuan pelanggan dengan berbagai kebutuhan transportasi, mulai dari sewa harian, mingguan, bulanan, hingga kontrak jangka panjang untuk korporasi.</p>
                    <p>Kami berkomitmen untuk memberikan pelayanan terbaik dengan armada yang terawat, harga yang kompetitif, dan proses pemesanan yang mudah. Didukung oleh tim profesional yang berpengalaman, kami siap memenuhi kebutuhan perjalanan Anda.</p>
                    <p>Dengan kantor yang tersebar di Jakarta, Bekasi, Tangerang, dan Depok, kami siap melayani Anda kapan saja dan di mana saja. Kepuasan pelanggan adalah prioritas utama kami.</p>
                </div>
                <div class="flex flex-wrap gap-6 mt-8">
                    <div class="text-center rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500">50<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-500">Armada Mobil</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500">1000<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-500">Pelanggan Puas</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500">5<span class="text-primary-400">+</span></div>
                        <div class="text-sm text-gray-500">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500">4</div>
                        <div class="text-sm text-gray-500">Kantor Cabang</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-200 to-primary-100 rounded-3xl blur-3xl opacity-30"></div>
                <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl p-8 text-white text-center mb-6">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                        <h3 class="text-2xl font-bold">BLESS RENT CAR</h3>
                        <p class="text-white/80">PT. BLESS TRANS MANDIRI</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Jakarta, Bekasi, Tangerang, Depok</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>+62 812-2506-2153</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>info@blesstransmandiri.com</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <svg class="w-5 h-5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Senin - Minggu, 24 Jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vision & Mission --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-50 text-primary-600 text-xs font-semibold mb-4">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                Visi & Misi
            </span>
            <h2 class="text-3xl font-bold text-gray-900">Visi & Misi Perusahaan</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up">
                <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed text-base">Menjadi perusahaan penyedia jasa rental mobil terdepan dan terpercaya di Indonesia yang memberikan solusi transportasi terbaik bagi pelanggan.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start space-x-2"><svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Menyediakan armada berkualitas tinggi dengan perawatan rutin dan standar kebersihan yang ketat.</span></li>
                    <li class="flex items-start space-x-2"><svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Memberikan pelayanan terbaik dengan proses pemesanan yang cepat, mudah, dan transparan.</span></li>
                    <li class="flex items-start space-x-2"><svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Mengembangkan jaringan layanan yang luas untuk menjangkau lebih banyak pelanggan.</span></li>
                    <li class="flex items-start space-x-2"><svg class="w-5 h-5 text-primary-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span>Menerapkan teknologi dalam sistem manajemen untuk meningkatkan efisiensi dan kenyamanan pelanggan.</span></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Values --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-50 text-primary-600 text-xs font-semibold mb-4">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                Nilai Perusahaan
            </span>
            <h2 class="text-3xl font-bold text-gray-900">Nilai-Nilai Kami</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">Nilai-nilai yang menjadi fondasi dalam setiap layanan yang kami berikan.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Integritas</h3>
                <p class="text-sm text-gray-500">Kami menjunjung tinggi kejujuran dan transparansi dalam setiap transaksi.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="50">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kualitas</h3>
                <p class="text-sm text-gray-500">Armada terawat dan layanan terbaik adalah standar utama kami.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Ketepatan</h3>
                <p class="text-sm text-gray-500">Kami menghargai waktu Anda dengan layanan tepat waktu dan efisien.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="150">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kepedulian</h3>
                <p class="text-sm text-gray-500">Kami peduli terhadap kenyamanan dan keamanan setiap pelanggan.</p>
            </div>
        </div>
    </div>

    {{-- Fleet --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Armada</span>
            <h2 class="text-3xl font-bold mt-3 text-gray-900">Armada Kami</h2>
            <p class="text-gray-500 mt-3 max-w-3xl mx-auto">Kami menyediakan berbagai pilihan mobil berkualitas untuk memenuhi kebutuhan perjalanan Anda.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kategori Armada</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg><span>City Car / Hatchback</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg><span>MPV / Keluarga</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg><span>SUV</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg><span>Luxury / Mewah</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg><span>Commercial / Bus</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg><span>Electric / EV</span></div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Keunggulan Armada</h3>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3"><svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-sm text-gray-600">Perawatan rutin berkala di bengkel resmi</span></li>
                    <li class="flex items-start space-x-3"><svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-sm text-gray-600">Kebersihan interior & eksterior terjaga</span></li>
                    <li class="flex items-start space-x-3"><svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-sm text-gray-600">Kondisi mesin prima dan siap pakai</span></li>
                    <li class="flex items-start space-x-3"><svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-sm text-gray-600">Dilengkapi asuransi untuk keamanan</span></li>
                    <li class="flex items-start space-x-3"><svg class="w-5 h-5 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-sm text-gray-600">AC dingin dan audio system terawat</span></li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Awards --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Penghargaan</span>
            <h2 class="text-3xl font-bold mt-3 text-gray-900">Sertifikasi & Penghargaan</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-amber-50 to-amber-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Sertifikat Usaha</h3>
                <p class="text-xs text-gray-500">Terdaftar dan berizin resmi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-primary-50 to-primary-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Asuransi</h3>
                <p class="text-xs text-gray-500">Armada terlindungi asuransi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-green-50 to-green-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Standar Kebersihan</h3>
                <p class="text-xs text-gray-500">Protokol kebersihan ketat</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Terpercaya</h3>
                <p class="text-xs text-gray-500">Ribuan pelanggan setia</p>
            </div>
        </div>
    </div>

    {{-- Health Protocols --}}
    <div class="rounded-2xl bg-gradient-to-br from-primary-50 to-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Protokol Kesehatan</span>
            <h2 class="text-3xl font-bold mt-3 text-gray-900">Komitmen Kebersihan & Keamanan</h2>
            <p class="text-gray-500 mt-3 max-w-2xl mx-auto">Kami menerapkan protokol kebersihan ketat untuk memastikan mobil yang Anda gunakan bersih dan aman.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-green-50 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Disinfeksi</h3>
                <p class="text-sm text-gray-500">Disinfeksi menyeluruh sebelum dan sesudah penyewaan</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 11.5V14m0-2.5v-6a1.5 1.5 0 113 0m-3 6a1.5 1.5 0 00-3 0v2a7.5 7.5 0 0015 0v-5a1.5 1.5 0 00-3 0m-6-3V11m0-5.5v-1a1.5 1.5 0 013 0v1m0 0V11m0-5.5a1.5 1.5 0 013 0v3m0 0V11"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Hand Sanitizer</h3>
                <p class="text-sm text-gray-500">Hand sanitizer tersedia di setiap mobil</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-purple-50 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Sirkulasi Udara</h3>
                <p class="text-sm text-gray-500">Sirkulasi udara optimal & AC diservis rutin</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-orange-50 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Deep Cleaning</h3>
                <p class="text-sm text-gray-500">Pembersihan mendalam interior & eksterior</p>
            </div>
        </div>
    </div>

    {{-- Advantages --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Keunggulan</span>
            <h2 class="text-3xl font-bold mt-3 text-gray-900">Keunggulan Kami</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Harga Kompetitif</h3>
                    <p class="text-sm text-gray-500">Kami menawarkan harga yang bersaing dengan kualitas layanan terbaik.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Jangkauan Luas</h3>
                    <p class="text-sm text-gray-500">Melayani Jakarta, Bekasi, Tangerang, Depok dan sekitarnya.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Layanan 24 Jam</h3>
                    <p class="text-sm text-gray-500">Tim customer service siap membantu Anda kapan saja.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Armada Lengkap</h3>
                    <p class="text-sm text-gray-500">Lebih dari 50 unit mobil siap melayani kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Team --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Tim Kami</span>
            <h2 class="text-3xl font-bold mt-3 text-gray-900">Tim Profesional Kami</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $teamMembers = [
                    ['icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'title' => 'Director', 'subtitle' => 'PT. BLESS TRANS MANDIRI'],
                    ['icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'title' => 'Operations Manager', 'subtitle' => 'Manajemen Armada'],
                    ['icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z', 'title' => 'Customer Service', 'subtitle' => 'Layanan Pelanggan'],
                    ['icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', 'title' => 'Technical Team', 'subtitle' => 'Perawatan Armada'],
                ];
            @endphp
            @foreach($teamMembers as $member)
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 text-center">
                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white/80 rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $member['icon'] }}"/></svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900">{{ $member['title'] }}</h3>
                    <p class="text-sm text-gray-500">{{ $member['subtitle'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- CTA --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-600 via-primary-500 to-primary-600 p-10 text-center shadow-lg" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-white mb-4">Hubungi Kami untuk Kerjasama</h2>
        <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto">Tertarik untuk bekerjasama? Kami terbuka untuk kerjasama corporate, event, maupun kebutuhan transportasi lainnya.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="https://wa.me/6281225062153" target="_blank" class="px-8 py-4 bg-green-500 hover:bg-green-600 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-green-500/30 transition-all duration-300">
                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Hubungi WhatsApp
            </a>
            <a href="{{ route('partner.contact') }}" class="px-8 py-4 bg-white text-primary-600 font-bold text-lg rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg">
                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Hubungi Kami
            </a>
        </div>
    </div>

</div>
@endsection
