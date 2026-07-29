@extends('layouts.user')

@section('title', 'Pusat Bantuan - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Pusat Bantuan</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Help Center</span>
        </nav>
    </div>

    {{-- Search --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6">
        <div class="max-w-xl mx-auto relative">
            <svg class="w-5 h-5 text-gray-400 absolute left-5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="helpSearch" placeholder="Cari bantuan..." class="w-full border border-gray-200 rounded-xl pl-14 pr-4 py-4 text-sm focus:ring-2 focus:ring-primary-300 bg-gray-50">
        </div>
    </div>

    {{-- Guide Cards --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900">Panduan & Informasi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="#pemesanan" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">Tutorial Pemesanan</h3>
                <p class="text-sm text-gray-500 mt-1">Cara mudah memesan mobil</p>
            </a>
            <a href="#syarat" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">Syarat & Ketentuan</h3>
                <p class="text-sm text-gray-500 mt-1">Kebijakan sewa & pembayaran</p>
            </a>
            <a href="#darurat" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">Panduan Darurat</h3>
                <p class="text-sm text-gray-500 mt-1">Prosedur keadaan darurat</p>
            </a>
            <a href="#asuransi" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">Asuransi & Proteksi</h3>
                <p class="text-sm text-gray-500 mt-1">Informasi perlindungan</p>
            </a>
            <a href="#aturan" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">Aturan Sewa</h3>
                <p class="text-sm text-gray-500 mt-1">Kebijakan selama sewa</p>
            </a>
            <a href="#faq" class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-16 h-16 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-bold text-gray-900">FAQ</h3>
                <p class="text-sm text-gray-500 mt-1">Pertanyaan umum</p>
            </a>
        </div>
    </div>

    {{-- Tutorial Pemesanan --}}
    <section id="pemesanan" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
            </span>
            Tutorial Pemesanan
        </h2>
        <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
            <ol class="space-y-6">
                <li class="flex items-start space-x-4">
                    <span class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">1</span>
                    <div><h4 class="font-bold text-gray-900">Pilih Mobil & Jadwal</h4><p class="text-sm text-gray-500 mt-1">Kunjungi halaman Products, pilih mobil yang sesuai dengan kebutuhan Anda, lalu klik "Sewa Sekarang" atau "Pesan Sekarang".</p></div>
                </li>
                <li class="flex items-start space-x-4">
                    <span class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">2</span>
                    <div><h4 class="font-bold text-gray-900">Isi Form Pemesanan</h4><p class="text-sm text-gray-500 mt-1">Lengkapi data diri, tentukan lokasi dan tanggal pickup/return, serta pilih tipe sewa (dengan driver atau lepas kunci).</p></div>
                </li>
                <li class="flex items-start space-x-4">
                    <span class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">3</span>
                    <div><h4 class="font-bold text-gray-900">Verifikasi Data</h4><p class="text-sm text-gray-500 mt-1">Tim kami akan memverifikasi data pemesanan Anda. Kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi.</p></div>
                </li>
                <li class="flex items-start space-x-4">
                    <span class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">4</span>
                    <div><h4 class="font-bold text-gray-900">Lakukan Pembayaran</h4><p class="text-sm text-gray-500 mt-1">Lakukan pembayaran sesuai dengan metode yang tersedia (Transfer Bank, E-Wallet, atau Virtual Account).</p></div>
                </li>
                <li class="flex items-start space-x-4">
                    <span class="w-8 h-8 bg-primary-500 text-white rounded-full flex items-center justify-center text-sm font-bold flex-shrink-0">5</span>
                    <div><h4 class="font-bold text-gray-900">Mobil Siap Digunakan</h4><p class="text-sm text-gray-500 mt-1">Setelah pembayaran terkonfirmasi, mobil siap digunakan sesuai jadwal yang telah ditentukan.</p></div>
                </li>
            </ol>
        </div>
    </section>

    {{-- Syarat & Ketentuan --}}
    <section id="syarat" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </span>
            Syarat & Ketentuan
        </h2>
        <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Kebijakan Keuangan & Pembayaran
                </h3>
                <div class="space-y-4 text-sm text-gray-600">
                    <p><strong>Metode Pembayaran:</strong></p>
                    <ul class="space-y-2 pl-6">
                        <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg><span><strong>Transfer Bank</strong> - BCA, Mandiri, BNI, BRI. Pembayaran dapat dilakukan melalui transfer ke rekening resmi perusahaan.</span></li>
                        <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg><span><strong>E-Wallet</strong> - GoPay, OVO, DANA, LinkAja. Tersedia pembayaran melalui aplikasi dompet digital.</span></li>
                        <li class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg><span><strong>Virtual Account</strong> - Pembayaran melalui virtual account dari berbagai bank.</span></li>
                    </ul>
                    <p><strong>Ketentuan Pembayaran:</strong></p>
                    <ul class="space-y-1 pl-6 list-disc">
                        <li>DP minimal 50% di muka untuk mengkonfirmasi pemesanan.</li>
                        <li>Pelunasan dilakukan saat pengambilan mobil.</li>
                        <li>Untuk sewa jangka panjang (bulanan), pembayaran dilakukan di awal bulan.</li>
                    </ul>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Kebijakan Pembatalan & Refund
                </h3>
                <div class="space-y-3 text-sm text-gray-600">
                    <div class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span><strong>Pembatalan H-3</strong> atau lebih: Refund 100% (dipotong biaya admin 5%).</span></div>
                    <div class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span><strong>Pembatalan H-1 ~ H-2</strong>: Refund 50% dari total pembayaran.</span></div>
                    <div class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span><strong>Pembatalan H-0</strong> (hari H): Tidak ada refund / hangus.</span></div>
                    <div class="flex items-start space-x-2"><svg class="w-4 h-4 text-primary-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg><span><strong>Pembatalan dari pihak perusahaan</strong>: Refund 100% tanpa potongan.</span></div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Mekanisme Pengembalian Deposit
                </h3>
                <div class="space-y-3 text-sm text-gray-600">
                    <p>Deposit akan dikembalikan setelah masa sewa selesai dengan ketentuan:</p>
                    <ul class="space-y-1 pl-6 list-disc">
                        <li>Mobil dikembalikan tepat waktu sesuai jadwal.</li>
                        <li>Tidak ada kerusakan pada mobil (selain pemakaian normal).</li>
                        <li>Kondisi mobil bersih (tidak ada denda kebersihan).</li>
                        <li>Tidak ada pelanggaran aturan sewa (wilayah, BBM, dll).</li>
                    </ul>
                    <p>Proses refund deposit maksimal 1x24 jam setelah inspeksi mobil selesai.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Panduan Darurat --}}
    <section id="darurat" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
            </span>
            Panduan Darurat
        </h2>
        <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    Prosedur Mobil Mogok / Ban Bocor
                </h3>
                <ol class="space-y-3 text-sm text-gray-600 pl-6 list-decimal">
                    <li>Tetap tenang dan jangan panik. Nyalakan lampu hazard.</li>
                    <li>Tepikan mobil ke tempat yang aman, jauh dari lalu lintas.</li>
                    <li>Pasang segitiga pengaman minimal 20 meter di belakang mobil.</li>
                    <li>Hubungi nomor darurat Bless Rent Car yang tercantum di dokumen sewa.</li>
                    <li>Tim kami akan membantu Anda dengan layanan derek atau bantuan darurat.</li>
                    <li>Jangan melakukan perbaikan sendiri tanpa koordinasi dengan tim kami.</li>
                </ol>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    Prosedur Kecelakaan
                </h3>
                <ol class="space-y-3 text-sm text-gray-600 pl-6 list-decimal">
                    <li>Pastikan keselamatan diri dan penumpang terlebih dahulu.</li>
                    <li>Nyalakan lampu hazard dan pasang segitiga pengaman.</li>
                    <li>Hubungi ambulans (112/118/119) jika ada korban luka.</li>
                    <li>Jangan meninggalkan lokasi kejadian (tabrak lari).</li>
                    <li>Dokumentasikan kondisi kecelakaan (foto/video dari berbagai sudut).</li>
                    <li>Hubungi Bless Rent Car segera untuk mendapatkan panduan lebih lanjut.</li>
                    <li>Hubungi polisi (110) untuk mendapatkan laporan polisi.</li>
                    <li>Jangan membuat pernyataan atau menandatangani dokumen tanpa pendampingan.</li>
                </ol>
            </div>
        </div>
    </section>

    {{-- Asuransi --}}
    <section id="asuransi" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </span>
            Informasi Asuransi & Proteksi
        </h2>
        <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
            <div class="space-y-4 text-sm text-gray-600">
                <p>Setiap mobil di Bless Rent Car dilengkapi dengan perlindungan asuransi untuk keamanan dan kenyamanan Anda.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="bg-white rounded-xl p-4 border border-gray-100">
                        <h4 class="font-bold text-gray-900 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            All Risk (Comprehensive)
                        </h4>
                        <p class="text-xs text-gray-500">Perlindungan menyeluruh terhadap kerusakan mobil akibat kecelakaan, tabrakan, atau faktor eksternal lainnya.</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 border border-gray-100">
                        <h4 class="font-bold text-gray-900 mb-2 flex items-center">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            TLO (Total Loss Only)
                        </h4>
                        <p class="text-xs text-gray-500">Perlindungan untuk kerusakan total (≥75%) akibat kecelakaan atau pencurian.</p>
                    </div>
                </div>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 mt-4">
                    <p class="text-xs text-yellow-700"><strong>Catatan:</strong> Asuransi tidak menanggung kerusakan akibat kelalaian pengemudi, kerusakan ban, kaca, atau bagian bawah mobil. Biaya excess/resiko sendiri tetap berlaku sesuai ketentuan polis.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Aturan Sewa --}}
    <section id="aturan" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </span>
            Aturan Selama Masa Sewa
        </h2>
        <div class="space-y-6">
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Kebijakan BBM (Full-to-Full)
                </h3>
                <p class="text-sm text-gray-600">Mobil diberikan dalam kondisi full tank BBM dan wajib dikembalikan dalam kondisi full tank. Jika tidak diisi penuh, akan dikenakan biaya pengisian BBM ditambah biaya jasa. Pastikan Anda mengisi BBM di SPBU resmi terdekat sebelum mengembalikan mobil.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Kebijakan Wilayah / Zonasi
                </h3>
                <p class="text-sm text-gray-600">Mobil hanya boleh digunakan di wilayah Jabodetabek dan sekitarnya. Penggunaan di luar wilayah yang ditentukan memerlukan izin khusus dan dikenakan biaya tambahan. Penggunaan di luar Jawa memerlukan persetujuan terlebih dahulu.</p>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Kebijakan Denda Kebersihan & Bau
                </h3>
                <p class="text-sm text-gray-600">Mobil wajib dikembalikan dalam kondisi bersih. Denda kebersihan akan dikenakan jika:</p>
                <ul class="space-y-1 mt-2 text-sm text-gray-600 pl-6 list-disc">
                    <li>Interior mobil kotor (sampah, noda, makanan berantakan).</li>
                    <li>Ada bau tidak sedap (rokok, hewan peliharaan, dll).</li>
                    <li>Ada muntahan atau tumpahan cairan.</li>
                </ul>
            </div>
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                    <svg class="w-5 h-5 text-primary-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Kebijakan Overtime
                </h3>
                <p class="text-sm text-gray-600">Keterlambatan pengembalian mobil akan dikenakan biaya overtime. Biaya dihitung per jam berdasarkan tarif sewa harian dibagi 24 jam. Jika keterlambatan lebih dari 3 jam, akan dihitung 1 hari penuh sewa. Konfirmasi terlebih dahulu jika ingin memperpanjang masa sewa.</p>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6 md:p-8 scroll-mt-20">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-10 h-10 bg-primary-100 rounded-xl flex items-center justify-center mr-3">
                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            FAQ - Pertanyaan Umum
        </h2>
        <div x-data="{ active: null }" class="space-y-3">
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 1 ? null : 1" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apa saja syarat untuk menyewa mobil?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 1" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Syarat sewa: KTP asli (dan SIM untuk lepas kunci), minimal usia 21 tahun, bersedia meninggalkan deposit atau jaminan (KTP/KK asli atau uang tunai), dan mengisi surat perjanjian sewa.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 2 ? null : 2" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah bisa antar jemput mobil?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 2" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Ya, kami menyediakan layanan antar jemput mobil untuk wilayah Jakarta, Bekasi, Tangerang, dan Depok. Biaya antar jemput tergantung lokasi pengantaran.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 3 ? null : 3" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah boleh membawa mobil ke luar kota?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 3" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Boleh, namun harus mendapatkan izin terlebih dahulu. Bepergian ke luar kota dikenakan biaya tambahan dan wajib melaporkan tujuan perjalanan. Penggunaan di luar Jawa memerlukan persetujuan khusus.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 4 ? null : 4" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Bagaimana jika mobil mogok atau rusak?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 4" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Segera hubungi kami di nomor darurat yang tercantum di dokumen sewa. Kami akan mengirimkan bantuan atau mobil pengganti jika diperlukan. Jangan melakukan perbaikan sendiri tanpa koordinasi dengan tim kami.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 5 ? null : 5" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah tersedia layanan dengan driver?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 5" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Ya, kami menyediakan layanan sewa dengan driver profesional. Driver kami berpengalaman, ramah, dan mengenal rute di Jabodetabek. Tarif driver sudah termasuk biaya BBM dan parkir.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 6 ? null : 6" class="w-full flex items-center justify-between p-5 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Bagaimana cara membatalkan pesanan?</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform duration-300 flex-shrink-0" :class="active === 6 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === 6" x-collapse class="px-5 pb-5">
                    <p class="text-sm text-gray-600">Hubungi kami melalui WhatsApp atau telepon untuk membatalkan pesanan. Pembatalan yang dilakukan H-3 atau lebih akan mendapatkan refund 100% (dikurangi biaya admin). Lihat kebijakan pembatalan untuk detail lebih lanjut.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="rounded-2xl bg-gradient-to-r from-primary-50 via-white to-primary-50 shadow-sm border border-gray-100 p-6 md:p-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-3">Butuh Bantuan Lebih Lanjut?</h2>
            <p class="text-gray-500">Tim customer service kami siap membantu Anda 24 jam sehari, 7 hari seminggu.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <a href="https://wa.me/6281225062153" target="_blank" class="flex items-center justify-center space-x-3 px-6 py-4 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <span>WhatsApp 24 Jam</span>
            </a>
            <a href="tel:+6281225062153" class="flex items-center justify-center space-x-3 px-6 py-4 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Telepon</span>
            </a>
            <a href="{{ route('partner.contact') }}" class="flex items-center justify-center space-x-3 px-6 py-4 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-xl transition-all duration-300 shadow-md">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Form Kontak</span>
            </a>
        </div>
    </section>

</div>

@push('scripts')
<script>
    document.getElementById('helpSearch')?.addEventListener('keyup', function(e) {
        const val = this.value.toLowerCase();
        document.querySelectorAll('[id^="pemesanan"], [id^="syarat"], [id^="darurat"], [id^="asuransi"], [id^="aturan"], [id^="faq"]').forEach(el => {
            el.style.display = el.textContent.toLowerCase().includes(val) ? '' : 'none';
        });
    });
</script>
@endpush
@endsection
