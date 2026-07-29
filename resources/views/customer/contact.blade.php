@extends('layouts.user')

@section('title', 'Hubungi Kami - Dashboard')

@section('content')
<div class="mb-6" data-aos="fade-up">
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-6 md:p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Hubungi Kami</h1>
            <p class="text-white/80 text-sm">Kami siap membantu Anda. Hubungi kami melalui berbagai saluran yang tersedia.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Hubungi Kami</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-8 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-0">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-paper-plane"></i> Kirim Pesan</span>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6">Punya Pertanyaan? Kirim Pesan</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                    @csrf
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5"><i class="fas fa-user text-primary-500 mr-1"></i> Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 mb-1.5"><i class="fas fa-envelope text-primary-500 mr-1"></i> Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan email Anda">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5"><i class="fas fa-phone text-primary-500 mr-1"></i> No. Telepon / WhatsApp</label>
                            <input type="tel" name="phone" class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nomor telepon">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5"><i class="fas fa-tag text-primary-500 mr-1"></i> Subjek <span class="text-red-500">*</span></label>
                            <select name="subject" required class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                <option value="">Pilih Subjek</option>
                                <option value="general">Pertanyaan Umum</option>
                                <option value="booking">Pemesanan Mobil</option>
                                <option value="complaint">Komplain</option>
                                <option value="partnership">Kerjasama / Partnership</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5"><i class="fas fa-comment text-primary-500 mr-1"></i> Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="4" required class="w-full border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg text-sm">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-address-card"></i> Informasi Kontak</span>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6">Informasi Kontak Lengkap</h2>
                <div class="space-y-3">
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start space-x-3 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-whatsapp text-xl text-green-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">WhatsApp (Admin 24 Jam)</h3>
                            <a href="https://wa.me/6281225062153" target="_blank" class="text-primary-500 hover:text-primary-600 text-xs font-medium">+62 812-2506-2153</a>
                            <p class="text-[10px] text-gray-400 mt-0.5">Tersedia 24 jam sehari, 7 hari seminggu</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start space-x-3 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-xl text-primary-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">Telepon Kantor</h3>
                            <a href="tel:+622112345678" class="text-primary-500 hover:text-primary-600 text-xs font-medium">(021) xxxx-xxxx</a>
                            <p class="text-[10px] text-gray-400 mt-0.5">Senin - Minggu, 08:00 - 22:00</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start space-x-3 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-xl text-red-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">Alamat Kantor</h3>
                            <p class="text-xs text-gray-600">Kami melayani di wilayah:</p>
                            <div class="flex flex-wrap gap-1.5 mt-2">
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Jakarta Barat</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Jakarta Timur</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Jakarta Selatan</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Jakarta Utara</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Bekasi</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Tangerang</span>
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-[10px] rounded-md">Depok</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start space-x-3 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="150">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-xl text-blue-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">Email</h3>
                            <a href="mailto:info@blesstransmandiri.com" class="text-primary-500 hover:text-primary-600 text-xs font-medium">info@blesstransmandiri.com</a>
                            <p class="text-[10px] text-gray-400 mt-0.5">Kami akan merespon dalam 1x24 jam</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 flex items-start space-x-3 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-xl text-purple-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-sm">Jam Operasional</h3>
                            <p class="text-xs text-gray-600">Senin - Minggu: <strong>24 Jam</strong></p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Layanan darurat tersedia 24 jam</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="font-bold text-gray-900 mb-3 text-sm">Ikuti Kami</h3>
                    <div class="flex space-x-2">
                        <a href="#" target="_blank" class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center hover:bg-blue-700 shadow-md">
                            <i class="fab fa-instagram text-base"></i>
                        </a>
                        <a href="#" target="_blank" class="w-10 h-10 bg-blue-700 text-white rounded-xl flex items-center justify-center hover:bg-blue-800 shadow-md">
                            <i class="fab fa-facebook-f text-base"></i>
                        </a>
                        <a href="#" target="_blank" class="w-10 h-10 bg-sky-500 text-white rounded-xl flex items-center justify-center hover:bg-sky-600 shadow-md">
                            <i class="fab fa-twitter text-base"></i>
                        </a>
                        <a href="#" target="_blank" class="w-10 h-10 bg-black text-white rounded-xl flex items-center justify-center hover:bg-gray-800 shadow-md">
                            <i class="fab fa-tiktok text-base"></i>
                        </a>
                    </div>
                </div>

                <div class="mt-5">
                    <a href="https://www.google.com/maps?q=-6.2088,106.8456" target="_blank" class="inline-flex items-center px-5 py-2.5 border border-primary-500 text-primary-500 font-semibold rounded-xl hover:bg-primary-50 transition-all duration-300 text-xs">
                        <i class="fab fa-google mr-2"></i> Lihat di Google Business Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-0">
        <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.123456789!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNTAnNDQuNCJF!5e0!3m2!1sen!2sid!4v1" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection
