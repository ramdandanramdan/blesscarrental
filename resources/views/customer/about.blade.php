@extends('layouts.user')

@section('title', 'Tentang Kami - Dashboard')

@section('content')
<div class="mb-6" data-aos="fade-up">
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-6 md:p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Tentang Kami</h1>
            <p class="text-white/80 text-sm">Kenali lebih dekat PT. BLESS TRANS MANDIRI.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Tentang Kami</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-10 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-building"></i> Profil Perusahaan</span>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">PT. BLESS TRANS MANDIRI</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-primary-500 to-primary-300 mt-3 mb-5"></div>
                <div class="space-y-4 text-gray-600 leading-relaxed text-sm">
                    <p>PT. BLESS TRANS MANDIRI adalah perusahaan penyedia layanan rental mobil terpercaya di Indonesia. Berdiri sejak 2019, kami telah melayani ribuan pelanggan dengan berbagai kebutuhan transportasi, mulai dari sewa harian, mingguan, bulanan, hingga kontrak jangka panjang untuk korporasi.</p>
                    <p>Kami berkomitmen untuk memberikan pelayanan terbaik dengan armada yang terawat, harga yang kompetitif, dan proses pemesanan yang mudah. Didukung oleh tim profesional yang berpengalaman, kami siap memenuhi kebutuhan perjalanan Anda.</p>
                    <p>Dengan kantor yang tersebar di Jakarta, Bekasi, Tangerang, dan Depok, kami siap melayani Anda kapan saja dan di mana saja. Kepuasan pelanggan adalah prioritas utama kami.</p>
                </div>
                <div class="flex flex-wrap gap-5 mt-8">
                    <div class="text-center rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">50+</div>
                        <div class="text-xs text-gray-500">Armada Mobil</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">1000+</div>
                        <div class="text-xs text-gray-500">Pelanggan Puas</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">5+</div>
                        <div class="text-xs text-gray-500">Tahun Pengalaman</div>
                    </div>
                    <div class="text-center rounded-xl p-3">
                        <div class="text-2xl font-bold text-primary-500">4</div>
                        <div class="text-xs text-gray-500">Kantor Cabang</div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-r from-primary-200 to-primary-100 rounded-3xl blur-3xl opacity-30"></div>
                <div class="relative bg-white rounded-3xl shadow-2xl p-7 border border-gray-100">
                    <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl p-7 text-white text-center mb-5">
                        <i class="fas fa-car text-5xl mb-3"></i>
                        <h3 class="text-xl font-bold">BLESS RENT CAR</h3>
                        <p class="text-white/80 text-sm">PT. BLESS TRANS MANDIRI</p>
                    </div>
                    <div class="space-y-3">
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

<section class="py-10 bg-gray-50 rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-eye"></i> Visi & Misi</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Visi & Misi Perusahaan</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Visi</h3>
                <p class="text-gray-600 leading-relaxed text-sm">Menjadi perusahaan penyedia jasa rental mobil terdepan dan terpercaya di Indonesia yang memberikan solusi transportasi terbaik bagi pelanggan.</p>
            </div>
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-50 to-primary-100 rounded-2xl flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Misi</h3>
                <ul class="space-y-3 text-gray-600 text-sm">
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-0.5"></i><span>Menyediakan armada berkualitas tinggi dengan perawatan rutin dan standar kebersihan yang ketat.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-0.5"></i><span>Memberikan pelayanan terbaik dengan proses pemesanan yang cepat, mudah, dan transparan.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-0.5"></i><span>Mengembangkan jaringan layanan yang luas untuk menjangkau lebih banyak pelanggan.</span></li>
                    <li class="flex items-start space-x-2"><i class="fas fa-check-circle text-primary-500 mt-0.5"></i><span>Menerapkan teknologi dalam sistem manajemen untuk meningkatkan efisiensi dan kenyamanan pelanggan.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-heart"></i> Nilai Perusahaan</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Nilai-Nilai Kami</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto text-sm">Nilai-nilai yang menjadi fondasi dalam setiap layanan yang kami berikan.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100 hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-handshake text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Integritas</h3>
                <p class="text-xs text-gray-500">Kami menjunjung tinggi kejujuran dan transparansi dalam setiap transaksi.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100 hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-star text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Kualitas</h3>
                <p class="text-xs text-gray-500">Armada terawat dan layanan terbaik adalah standar utama kami.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100 hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-clock text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Ketepatan</h3>
                <p class="text-xs text-gray-500">Kami menghargai waktu Anda dengan layanan tepat waktu dan efisien.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100 hover:shadow-md transition-all duration-300">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-heart text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Kepedulian</h3>
                <p class="text-xs text-gray-500">Kami peduli terhadap kenyamanan dan keamanan setiap pelanggan.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Armada</span>
            <h2 class="text-2xl md:text-3xl font-bold mt-2 text-gray-900">Armada Kami</h2>
            <p class="text-gray-500 mt-3 max-w-2xl mx-auto text-sm">Kami menyediakan berbagai pilihan mobil berkualitas untuk memenuhi kebutuhan perjalanan Anda, baik untuk keperluan pribadi, keluarga, maupun corporate.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Kategori Armada</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>City Car / Hatchback</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>MPV / Keluarga</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>SUV</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>Luxury / Mewah</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-car text-primary-500"></i><span>Commercial / Bus</span></div>
                    <div class="flex items-center space-x-2 text-sm text-gray-600"><i class="fas fa-charging-station text-primary-500"></i><span>Electric / EV</span></div>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Keunggulan Armada</h3>
                <ul class="space-y-2.5">
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

<section class="py-10 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Penghargaan</span>
            <h2 class="text-2xl md:text-3xl font-bold mt-2 text-gray-900">Sertifikasi & Penghargaan</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-accent-50 to-accent-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-trophy text-2xl text-accent-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Sertifikat Usaha</h3>
                <p class="text-xs text-gray-500">Terdaftar dan berizin resmi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-50 to-primary-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-shield-alt text-2xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Asuransi</h3>
                <p class="text-xs text-gray-500">Armada terlindungi asuransi</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-green-50 to-green-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-leaf text-2xl text-green-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Standar Kebersihan</h3>
                <p class="text-xs text-gray-500">Protokol kebersihan ketat</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 text-center border border-gray-100">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fas fa-medal text-2xl text-blue-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Terpercaya</h3>
                <p class="text-xs text-gray-500">Ribuan pelanggan setia</p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gradient-to-br from-primary-50 to-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Protokol Kesehatan</span>
            <h2 class="text-2xl md:text-3xl font-bold mt-2 text-gray-900">Komitmen Kebersihan & Keamanan</h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto text-sm">Kami menerapkan protokol kebersihan ketat untuk memastikan mobil yang Anda gunakan bersih dan aman.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                <div class="w-12 h-12 mx-auto bg-green-50 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-spray-can text-xl text-green-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Disinfeksi</h3>
                <p class="text-xs text-gray-500">Disinfeksi menyeluruh sebelum dan sesudah penyewaan</p>
            </div>
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                <div class="w-12 h-12 mx-auto bg-blue-50 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-hand-sparkles text-xl text-blue-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Hand Sanitizer</h3>
                <p class="text-xs text-gray-500">Hand sanitizer tersedia di setiap mobil</p>
            </div>
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                <div class="w-12 h-12 mx-auto bg-purple-50 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-wind text-xl text-purple-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Sirkulasi Udara</h3>
                <p class="text-xs text-gray-500">Sirkulasi udara optimal & AC diservis rutin</p>
            </div>
            <div class="bg-white rounded-2xl p-5 text-center shadow-sm border border-gray-100">
                <div class="w-12 h-12 mx-auto bg-orange-50 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-broom text-xl text-orange-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-1 text-sm">Deep Cleaning</h3>
                <p class="text-xs text-gray-500">Pembersihan mendalam interior & eksterior</p>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Keunggulan</span>
            <h2 class="text-2xl md:text-3xl font-bold mt-2 text-gray-900">Keunggulan Kami</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50">
                <div class="w-11 h-11 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-dollar-sign text-lg text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1 text-sm">Harga Kompetitif</h3>
                    <p class="text-xs text-gray-500">Kami menawarkan harga yang bersaing dengan kualitas layanan terbaik.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50">
                <div class="w-11 h-11 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-map-marked-alt text-lg text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1 text-sm">Jangkauan Luas</h3>
                    <p class="text-xs text-gray-500">Melayani Jakarta, Bekasi, Tangerang, Depok dan sekitarnya.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50">
                <div class="w-11 h-11 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-headset text-lg text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1 text-sm">Layanan 24 Jam</h3>
                    <p class="text-xs text-gray-500">Tim customer service siap membantu Anda kapan saja.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50">
                <div class="w-11 h-11 bg-gradient-to-br from-primary-100 to-primary-200 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-car text-lg text-primary-500"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1 text-sm">Armada Lengkap</h3>
                    <p class="text-xs text-gray-500">Lebih dari 50 unit mobil siap melayani kebutuhan Anda.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50 rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-primary-500 font-semibold text-sm tracking-wider uppercase">Tim Kami</span>
            <h2 class="text-2xl md:text-3xl font-bold mt-2 text-gray-900">Tim Profesional Kami</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-40 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-20 h-20 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-tie text-3xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-sm">Director</h3>
                    <p class="text-xs text-gray-500 mb-2">PT. BLESS TRANS MANDIRI</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-[10px]"></i></a>
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-[10px]"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-40 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-20 h-20 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-cog text-3xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-sm">Operations Manager</h3>
                    <p class="text-xs text-gray-500 mb-2">Manajemen Armada</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-[10px]"></i></a>
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-[10px]"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-40 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-20 h-20 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-headset text-3xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-sm">Customer Service</h3>
                    <p class="text-xs text-gray-500 mb-2">Layanan Pelanggan</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-[10px]"></i></a>
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-[10px]"></i></a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 text-center">
                <div class="h-40 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                    <div class="w-20 h-20 bg-white/80 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-wrench text-3xl text-primary-400"></i>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-sm">Technical Team</h3>
                    <p class="text-xs text-gray-500 mb-2">Perawatan Armada</p>
                    <div class="flex justify-center space-x-2">
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-linkedin-in text-[10px]"></i></a>
                        <a href="#" class="w-7 h-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-500 hover:bg-primary-500 hover:text-white transition-colors"><i class="fab fa-instagram text-[10px]"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 bg-gradient-to-r from-primary-600 via-primary-500 to-primary-600 rounded-2xl shadow-sm mb-6" data-aos="zoom-in">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Hubungi Kami untuk Kerjasama</h2>
        <p class="text-white/80 text-base mb-8 max-w-2xl mx-auto">Tertarik untuk bekerjasama? Kami terbuka untuk kerjasama corporate, event, maupun kebutuhan transportasi lainnya.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-3 sm:space-y-0 sm:space-x-4">
            <a href="https://wa.me/6281225062153" target="_blank" class="px-7 py-3.5 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl shadow-lg hover:shadow-green-500/30 transition-all duration-300">
                <i class="fab fa-whatsapp mr-2"></i> Hubungi WhatsApp
            </a>
            <a href="{{ route('customer.contact') }}" class="px-7 py-3.5 bg-white text-primary-600 font-bold rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-lg">
                <i class="fas fa-envelope mr-2"></i> Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
