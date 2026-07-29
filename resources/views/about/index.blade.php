@extends('layouts.app')

@section('title', 'Tentang Kami - Bless Rent Car PT. BLESS TRANS MANDIRI')
@section('description', 'Informasi lengkap tentang PT. BLESS TRANS MANDIRI. Pelajari visi, misi, dan layanan rental mobil terpercaya di Jakarta, Bekasi, Tangerang, Depok.')
@section('og_title', 'Tentang Bless Rent Car - PT. BLESS TRANS MANDIRI')
@section('og_description', 'Pelajari lebih lanjut tentang perusahaan rental mobil terpercaya di Indonesia.')

@section('content')
<section class="page-hero py-20 md:py-32">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-car-side hero-shape-drift text-primary-200" style="top:15%;right:8%;font-size:7rem;"></i>
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
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">Tentang Kami</h1>
        <nav class="inline-flex items-center space-x-2 text-sm">
            <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-primary-600 font-semibold">Tentang Kami</span>
        </nav>
    </div>
</section>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="section-label"><i class="fas fa-building"></i> Profil Perusahaan</span>
                <h2 class="section-title">PT. BLESS TRANS MANDIRI</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-primary-300 mt-4 mb-6"></div>
                <div class="space-y-4 text-gray-600 leading-relaxed">
                    <p>PT. BLESS TRANS MANDIRI adalah perusahaan penyedia layanan rental mobil terpercaya di Indonesia. Berdiri sejak 2019, kami telah melayani ribuan pelanggan dengan berbagai kebutuhan transportasi, mulai dari sewa harian, mingguan, bulanan, hingga kontrak jangka panjang untuk korporasi.</p>
                    <p>Kami berkomitmen untuk memberikan pelayanan terbaik dengan armada yang terawat, harga yang kompetitif, dan proses pemesanan yang mudah. Didukung oleh tim profesional yang berpengalaman, kami siap memenuhi kebutuhan perjalanan Anda.</p>
                    <p>Dengan kantor yang tersebar di Jakarta, Bekasi, Tangerang, dan Depok, kami siap melayani Anda kapan saja dan di mana saja. Kepuasan pelanggan adalah prioritas utama kami.</p>
                </div>
                <div class="flex flex-wrap gap-6 mt-8">
                    <div class="text-center gauge-glow rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500"><span class="animate-counter" data-target="50" data-suffix="+" data-duration="1200">0+</span></div>
                        <div class="text-sm text-gray-500">Armada Mobil</div>
                        <div class="fuel-gauge mt-2 max-w-[80px] mx-auto"></div>
                    </div>
                    <div class="text-center gauge-glow rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500"><span class="animate-counter" data-target="1000" data-suffix="+" data-duration="1500">0+</span></div>
                        <div class="text-sm text-gray-500">Pelanggan Puas</div>
                        <div class="fuel-gauge mt-2 max-w-[80px] mx-auto"></div>
                    </div>
                    <div class="text-center gauge-glow rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500"><span class="animate-counter" data-target="5" data-suffix="+" data-duration="1000">0+</span></div>
                        <div class="text-sm text-gray-500">Tahun Pengalaman</div>
                        <div class="fuel-gauge mt-2 max-w-[80px] mx-auto"></div>
                    </div>
                    <div class="text-center gauge-glow rounded-xl p-3">
                        <div class="text-3xl font-bold text-primary-500"><span class="animate-counter" data-target="4" data-suffix="" data-duration="1000">0</span></div>
                        <div class="text-sm text-gray-500">Kantor Cabang</div>
                        <div class="fuel-gauge mt-2 max-w-[80px] mx-auto"></div>
                    </div>
                </div>
            </div>
            <div class="relative" data-aos="fade-left" data-aos-delay="200">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-200 to-primary-100 rounded-3xl blur-3xl opacity-30"></div>
                <div class="relative bg-white rounded-3xl shadow-2xl p-8 border border-gray-100">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl p-8 text-white text-center mb-6">
                        <i class="fas fa-car text-6xl mb-4"></i>
                        <h3 class="text-2xl font-bold">BLESS RENT CAR</h3>
                        <p class="text-white/80">PT. BLESS TRANS MANDIRI</p>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-primary-500 w-5"></i>
                            <span>Jakarta, Bekasi, Tangerang, Depok</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <i class="fas fa-phone text-primary-500 w-5"></i>
                            <span>+62 812-2506-2153</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <i class="fas fa-envelope text-primary-500 w-5"></i>
                            <span>info@blesstransmandiri.com</span>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-600">
                            <i class="fas fa-clock text-primary-500 w-5"></i>
                            <span>Senin - Minggu, 24 Jam</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-eye"></i> Visi & Misi</span>
            <h2 class="section-title">Visi & Misi Perusahaan</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover-lift" data-aos="fade-up">
                <div class="shine-sweep w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-primary-500 steer-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed text-base">Menjadi perusahaan penyedia jasa rental mobil terdepan dan terpercaya di Indonesia yang memberikan solusi transportasi terbaik bagi pelanggan.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100 hover-lift" data-aos="fade-up" data-aos-delay="100">
                <div class="shine-sweep w-14 h-14 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-primary-500 steer-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-1"></i><span>Menyediakan armada berkualitas tinggi dengan perawatan rutin dan standar kebersihan yang ketat.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-1"></i><span>Memberikan pelayanan terbaik dengan proses pemesanan yang cepat, mudah, dan transparan.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-1"></i><span>Mengembangkan jaringan layanan yang luas untuk menjangkau lebih banyak pelanggan.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-1"></i><span>Menerapkan teknologi dalam sistem manajemen untuk meningkatkan efisiensi dan kenyamanan pelanggan.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="section-label"><i class="fas fa-heart"></i> Nilai Perusahaan</span>
            <h2 class="section-title">Nilai-Nilai Kami</h2>
            <p class="section-subtitle mx-auto">Nilai-nilai yang menjadi fondasi dalam setiap layanan yang kami berikan.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover-lift card-border-hover" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-handshake text-2xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Integritas</h3>
                <p class="text-sm text-gray-500">Kami menjunjung tinggi kejujuran dan transparansi dalam setiap transaksi.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover-lift card-border-hover" data-aos="fade-up" data-aos-delay="50">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-star text-2xl text-primary-500 icon-rotate"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kualitas</h3>
                <p class="text-sm text-gray-500">Armada terawat dan layanan terbaik adalah standar utama kami.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover-lift card-border-hover" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-clock text-2xl text-primary-500 icon-rotate"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Ketepatan</h3>
                <p class="text-sm text-gray-500">Kami menghargai waktu Anda dengan layanan tepat waktu dan efisien.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center hover-lift card-border-hover" data-aos="fade-up" data-aos-delay="150">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-2xl text-primary-500 icon-rotate"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kepedulian</h3>
                <p class="text-sm text-gray-500">Kami peduli terhadap kenyamanan dan keamanan setiap pelanggan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Armada</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">Armada Kami</h2>
            <p class="text-gray-500 mt-4 max-w-3xl mx-auto">Kami menyediakan berbagai pilihan mobil berkualitas untuk memenuhi kebutuhan perjalanan Anda, baik untuk keperluan pribadi, keluarga, maupun corporate.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Kategori Armada</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>City Car / Hatchback</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>MPV / Keluarga</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>SUV</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>Luxury / Mewah</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>Commercial / Bus</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-charging-station text-primary-500"></i><span>Electric / EV</span></div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Keunggulan Armada</h3>
                <ul class="space-y-3">
                    <li class="flex items-start space-x-3"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><span class="text-sm text-gray-600">Perawatan rutin berkala di bengkel resmi</span></li>
                    <li class="flex items-start space-x-3"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><span class="text-sm text-gray-600">Kebersihan interior & eksterior terjaga</span></li>
                    <li class="flex items-start space-x-3"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><span class="text-sm text-gray-600">Kondisi mesin prima dan siap pakai</span></li>
                    <li class="flex items-start space-x-3"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><span class="text-sm text-gray-600">Dilengkapi asuransi untuk keamanan</span></li>
                    <li class="flex items-start space-x-3"><i class="fas fa-check-circle text-green-500 mt-0.5"></i><span class="text-sm text-gray-600">AC dingin dan audio system terawat</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Penghargaan</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">Sertifikasi & Penghargaan</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-accent-50 to-accent-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-trophy text-3xl text-accent-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Sertifikat Usaha</h3>
                <p class="text-xs text-gray-500">Terdaftar dan berizin resmi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-primary-50 to-primary-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-shield-alt text-3xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Asuransi</h3>
                <p class="text-xs text-gray-500">Armada terlindungi asuransi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-green-50 to-green-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-3xl text-green-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Standar Kebersihan</h3>
                <p class="text-xs text-gray-500">Protokol kebersihan ketat</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-medal text-3xl text-blue-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Terpercaya</h3>
                <p class="text-xs text-gray-500">Ribuan pelanggan setia</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-br from-primary-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Protokol Kesehatan</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">Komitmen Kebersihan & Keamanan</h2>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Kami menerapkan protokol kebersihan ketat untuk memastikan mobil yang Anda gunakan bersih dan aman.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-green-50 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-spray-can text-2xl text-green-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Disinfeksi</h3>
                <p class="text-sm text-gray-500">Disinfeksi menyeluruh sebelum dan sesudah penyewaan</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-hand-sparkles text-2xl text-blue-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Hand Sanitizer</h3>
                <p class="text-sm text-gray-500">Hand sanitizer tersedia di setiap mobil</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-purple-50 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-wind text-2xl text-purple-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Sirkulasi Udara</h3>
                <p class="text-sm text-gray-500">Sirkulasi udara optimal & AC diservis rutin</p>
            </div>
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-100">
                <div class="w-14 h-14 mx-auto bg-orange-50 rounded-2xl flex items-center justify-center mb-4">
                    <i class="fas fa-broom text-2xl text-orange-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Deep Cleaning</h3>
                <p class="text-sm text-gray-500">Pembersihan mendalam interior & eksterior</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Keunggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">Keunggulan Kami</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-dollar-sign text-xl text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Harga Kompetitif</h3>
                    <p class="text-sm text-gray-500">Kami menawarkan harga yang bersaing dengan kualitas layanan terbaik.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-map-marked-alt text-xl text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Jangkauan Luas</h3>
                    <p class="text-sm text-gray-500">Melayani Jakarta, Bekasi, Tangerang, Depok dan sekitarnya.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-headset text-xl text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Layanan 24 Jam</h3>
                    <p class="text-sm text-gray-500">Tim customer service siap membantu Anda kapan saja.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-6 rounded-2xl bg-gray-50">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-car text-xl text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Armada Lengkap</h3>
                    <p class="text-sm text-gray-500">Lebih dari 50 unit mobil siap melayani kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Tim Kami</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-3 text-gray-900">Tim Profesional Kami</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="team-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-tie text-4xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900">Director</h3>
                    <p class="text-sm text-gray-500 mb-3">PT. BLESS TRANS MANDIRI</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-xs"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-xs"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-cog text-4xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900">Operations Manager</h3>
                    <p class="text-sm text-gray-500 mb-3">Manajemen Armada</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-xs"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-xs"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-headset text-4xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900">Customer Service</h3>
                    <p class="text-sm text-gray-500 mb-3">Layanan Pelanggan</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-xs"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-xs"></i></a>
                    </div>
                </div>
            </div>
            <div class="team-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-48 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-24 h-24 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-wrench text-4xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900">Technical Team</h3>
                    <p class="text-sm text-gray-500 mb-3">Perawatan Armada</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-xs"></i></a>
                        <a href="#" class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-xs"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-20 bg-gradient-to-r from-primary-600 via-primary-500 to-primary-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Hubungi Kami untuk Kerjasama</h2>
        <p class="text-white/80 text-lg mb-8 max-w-2xl mx-auto">Tertarik untuk bekerjasama? Kami terbuka untuk kerjasama corporate, event, maupun kebutuhan transportasi lainnya.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="https://wa.me/6281225062153" target="_blank" class="px-8 py-4 bg-green-500 hover:bg-green-600 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-green-500/30 transition-all duration-300 transform hover:scale-105">
                <i class="fab fa-whatsapp mr-2"></i> Hubungi WhatsApp
            </a>
            <a href="/contact" class="px-8 py-4 bg-white text-primary-600 font-bold text-lg rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg transform hover:scale-105">
                <i class="fas fa-envelope mr-2"></i> Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
