@extends('layouts.app')

@section('title', 'Hubungi Kami - Bless Rent Car')
@section('description', 'Hubungi Bless Rent Car untuk informasi rental mobil. WhatsApp: 0812-2506-2153, Telepon, Email, atau kunjungi kantor kami di Jakarta, Bekasi, Tangerang, Depok.')
@section('og_title', 'Hubungi Kami - Bless Rent Car')



@section('content')
<section class="page-hero py-16 md:py-24">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-envelope hero-shape-drift text-primary-200" style="top:10%;left:5%;font-size:5rem;"></i>
        <i class="fas fa-phone-alt hero-shape-drift text-primary-200" style="bottom:15%;right:6%;font-size:5rem;animation-delay:-7s;"></i>
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
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
        <nav class="inline-flex items-center space-x-2 text-sm">
            <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-primary-600 font-semibold">Contact</span>
        </nav>
        <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami siap membantu Anda. Hubungi kami melalui berbagai saluran yang tersedia.</p>
    </div>
</section>

<section class="py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <span class="section-label"><i class="fas fa-paper-plane"></i> Kirim Pesan</span>
                <h2 class="section-title mb-8">Punya Pertanyaan? Kirim Pesan</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-gray-100" data-aos="fade-up">
                    @csrf
                    <div class="space-y-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5"><i class="fas fa-user text-primary-500 mr-1"></i> Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nama Anda">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1.5"><i class="fas fa-envelope text-primary-500 mr-1"></i> Email <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan email Anda">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5"><i class="fas fa-phone text-primary-500 mr-1"></i> No. Telepon / WhatsApp</label>
                            <input type="tel" name="phone" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Masukkan nomor telepon">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5"><i class="fas fa-tag text-primary-500 mr-1"></i> Subjek <span class="text-red-500">*</span></label>
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
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5"><i class="fas fa-comment text-primary-500 mr-1"></i> Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50" placeholder="Tulis pesan Anda..."></textarea>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <span class="section-label"><i class="fas fa-address-card"></i> Informasi Kontak</span>
                <h2 class="section-title mb-8">Informasi Kontak Lengkap</h2>
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 hover-lift" data-aos="fade-up">
                        <div class="w-14 h-14 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fab fa-whatsapp text-2xl text-green-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">WhatsApp (Admin 24 Jam)</h3>
                            <a href="https://wa.me/6281225062153" target="_blank" class="text-primary-500 hover:text-primary-600 text-sm font-medium">+62 812-2506-2153</a>
                            <p class="text-xs text-gray-400 mt-1">Tersedia 24 jam sehari, 7 hari seminggu</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 hover-lift" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone-alt text-2xl text-primary-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Telepon Kantor</h3>
                            <a href="tel:+622112345678" class="text-primary-500 hover:text-primary-600 text-sm font-medium">(021) xxxx-xxxx</a>
                            <p class="text-xs text-gray-400 mt-1">Senin - Minggu, 08:00 - 22:00</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 hover-lift" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-50 to-red-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-2xl text-red-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Alamat Kantor</h3>
                            <p class="text-sm text-gray-600">Kami melayani di wilayah:</p>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Barat</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Timur</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Selatan</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Jakarta Utara</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Bekasi</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Tangerang</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-lg">Depok</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 hover-lift" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-2xl text-blue-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Email</h3>
                            <a href="mailto:info@blesstransmandiri.com" class="text-primary-500 hover:text-primary-600 text-sm font-medium">info@blesstransmandiri.com</a>
                            <p class="text-xs text-gray-400 mt-1">Kami akan merespon dalam 1x24 jam</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-start space-x-4 hover-lift" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-2xl text-purple-500"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Jam Operasional</h3>
                            <p class="text-sm text-gray-600">Senin - Minggu: <strong>24 Jam</strong></p>
                            <p class="text-xs text-gray-400 mt-1">Layanan darurat tersedia 24 jam</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <h3 class="font-bold text-gray-900 mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-3">
                        <a href="#" target="_blank" class="social-link w-12 h-12 bg-blue-600 text-white rounded-xl flex items-center justify-center hover:bg-blue-700 shadow-md">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link w-12 h-12 bg-blue-700 text-white rounded-xl flex items-center justify-center hover:bg-blue-800 shadow-md">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link w-12 h-12 bg-sky-500 text-white rounded-xl flex items-center justify-center hover:bg-sky-600 shadow-md">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" target="_blank" class="social-link w-12 h-12 bg-black text-white rounded-xl flex items-center justify-center hover:bg-gray-800 shadow-md">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="https://www.google.com/maps?q=-6.2088,106.8456" target="_blank" class="inline-flex items-center px-6 py-3 border border-primary-500 text-primary-500 font-semibold rounded-xl hover:bg-primary-50 transition-all duration-300 text-sm">
                        <i class="fab fa-google mr-2"></i> Lihat di Google Business Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.123456789!2d106.8!3d-6.2!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTInMzEuNyJTIDEwNsKwNTAnNDQuNCJF!5e0!3m2!1sen!2sid!4v1" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({duration:800,once:true});</script>
@endpush
