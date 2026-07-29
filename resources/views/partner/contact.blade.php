@extends('layouts.user')

@section('title', 'Hubungi Kami - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Hubungi Kami</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Contact</span>
        </nav>
    </div>

    {{-- Contact Form + Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        {{-- Contact Form --}}
        <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8" data-aos="fade-up">
            <div class="mb-6">
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-primary-50 text-primary-600 text-xs font-semibold mb-3">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Kirim Pesan
                </span>
                <h2 class="text-2xl font-bold text-gray-900">Punya Pertanyaan? Kirim Pesan</h2>
            </div>
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            Nama Lengkap <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                            <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan email Anda">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        No. Telepon / WhatsApp
                    </label>
                    <input type="tel" name="phone" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nomor telepon">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        Subjek <span class="text-red-500">*</span>
                    </label>
                    <select name="subject" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                        <option value="">Pilih Subjek</option>
                        <option value="general">Pertanyaan Umum</option>
                        <option value="booking">Pemesanan Mobil</option>
                        <option value="complaint">Komplain</option>
                        <option value="partnership">Kerjasama / Partnership</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                        <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        Pesan <span class="text-red-500">*</span>
                    </label>
                    <textarea name="message" rows="5" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Tulis pesan Anda..."></textarea>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Kirim Pesan
                </button>
            </form>
        </div>

        {{-- Contact Info --}}
        <div class="space-y-4">
            {{-- WhatsApp --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5 flex items-start space-x-4 hover:shadow-md transition-shadow" data-aos="fade-up">
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">WhatsApp (Admin 24 Jam)</h3>
                    <a href="https://wa.me/6281225062153" target="_blank" class="text-primary-500 hover:text-primary-600 text-sm font-medium">+62 812-2506-2153</a>
                    <p class="text-xs text-gray-400 mt-1">Tersedia 24 jam sehari, 7 hari seminggu</p>
                </div>
            </div>

            {{-- Telepon --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5 flex items-start space-x-4 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="50">
                <div class="w-12 h-12 bg-primary-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Telepon Kantor</h3>
                    <a href="tel:+622112345678" class="text-primary-500 hover:text-primary-600 text-sm font-medium">(021) xxxx-xxxx</a>
                    <p class="text-xs text-gray-400 mt-1">Senin - Minggu, 08:00 - 22:00</p>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5 flex items-start space-x-4 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Alamat Kantor</h3>
                    <p class="text-sm text-gray-600">Kami melayani di wilayah:</p>
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Barat</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Timur</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Selatan</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Utara</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Bekasi</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Tangerang</span>
                        <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Depok</span>
                    </div>
                </div>
            </div>

            {{-- Email --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5 flex items-start space-x-4 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="150">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Email</h3>
                    <a href="mailto:info@blesstransmandiri.com" class="text-primary-500 hover:text-primary-600 text-sm font-medium">info@blesstransmandiri.com</a>
                    <p class="text-xs text-gray-400 mt-1">Kami akan merespon dalam 1x24 jam</p>
                </div>
            </div>

            {{-- Jam Operasional --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5 flex items-start space-x-4 hover:shadow-md transition-shadow" data-aos="fade-up" data-aos-delay="200">
                <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Jam Operasional</h3>
                    <p class="text-sm text-gray-600">Senin - Minggu: <strong>24 Jam</strong></p>
                    <p class="text-xs text-gray-400 mt-1">Layanan darurat tersedia 24 jam</p>
                </div>
            </div>

            {{-- Social Media --}}
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-5" data-aos="fade-up" data-aos-delay="250">
                <h3 class="font-bold text-gray-900 mb-3">Ikuti Kami</h3>
                <div class="flex space-x-3">
                    <a href="#" target="_blank" class="w-10 h-10 bg-pink-500 text-white rounded-xl flex items-center justify-center hover:bg-pink-600 shadow-md transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </a>
                    <a href="#" target="_blank" class="w-10 h-10 bg-blue-700 text-white rounded-xl flex items-center justify-center hover:bg-blue-800 shadow-md transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </a>
                    <a href="#" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-xl flex items-center justify-center hover:bg-sky-600 shadow-md transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </a>
                    <a href="#" target="_blank" class="w-10 h-10 bg-gray-900 text-white rounded-xl flex items-center justify-center hover:bg-gray-800 shadow-md transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Google Maps --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
        <div class="p-6 border-b border-gray-100">
            <h3 class="font-bold text-gray-900">Lokasi Kami</h3>
            <p class="text-sm text-gray-500 mt-1">Klik pada peta untuk membuka Google Maps</p>
        </div>
        <div class="rounded-b-2xl overflow-hidden">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.123456789!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNTAnNDQuNCJF!5e0!3m2!1sen!2sid!4v1" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</div>
@endsection
