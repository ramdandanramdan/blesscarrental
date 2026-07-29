@extends('layouts.user')

@section('title', 'Pusat Bantuan - Dashboard')

@push('styles')
<style>
    .accordion-content { transition: max-height 0.3s ease; }
</style>
@endpush

@section('content')
<div class="mb-6" data-aos="fade-up">
    <div class="bg-gradient-to-r from-primary-500 to-primary-600 rounded-2xl p-6 md:p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="relative">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Pusat Bantuan</h1>
            <p class="text-white/80 text-sm">Temukan jawaban untuk pertanyaan Anda seputar layanan rental mobil.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Pusat Bantuan</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-5 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-xl mx-auto px-4">
        <div class="relative">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" id="helpSearch" placeholder="Cari bantuan..." class="w-full border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary-300 bg-gray-50">
        </div>
    </div>
</section>

<section class="py-8 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-0">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 px-3 py-1.5 bg-primary-50 text-primary-600 text-xs font-bold rounded-full mb-4"><i class="fas fa-compass"></i> Panduan</span>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Panduan & Informasi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <a href="#pemesanan" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-shopping-cart text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">Tutorial Pemesanan</h3>
                <p class="text-xs text-gray-500 mt-1">Cara mudah memesan mobil</p>
            </a>
            <a href="#syarat" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-file-contract text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">Syarat & Ketentuan</h3>
                <p class="text-xs text-gray-500 mt-1">Kebijakan sewa & pembayaran</p>
            </a>
            <a href="#darurat" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-exclamation-triangle text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">Panduan Darurat</h3>
                <p class="text-xs text-gray-500 mt-1">Prosedur keadaan darurat</p>
            </a>
            <a href="#asuransi" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-shield-alt text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">Asuransi & Proteksi</h3>
                <p class="text-xs text-gray-500 mt-1">Informasi perlindungan</p>
            </a>
            <a href="#aturan" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-clipboard-list text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">Aturan Sewa</h3>
                <p class="text-xs text-gray-500 mt-1">Kebijakan selama sewa</p>
            </a>
            <a href="#faq" class="bg-white rounded-2xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300" data-aos="fade-up">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center mb-3">
                    <i class="fas fa-question-circle text-xl text-primary-500"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-sm">FAQ</h3>
                <p class="text-xs text-gray-500 mt-1">Pertanyaan umum</p>
            </a>
        </div>
    </div>
</section>

<section id="pemesanan" class="py-8 mb-6 bg-gray-50 rounded-2xl scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-shopping-cart text-primary-500 text-sm"></i></span>
            Tutorial Pemesanan
        </h2>
        <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
            <ol class="space-y-5">
                <li class="flex items-start space-x-3">
                    <span class="w-7 h-7 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">1</span>
                    <div><h4 class="font-bold text-gray-900 text-sm">Pilih Mobil & Jadwal</h4><p class="text-xs text-gray-500 mt-1">Kunjungi halaman Products, pilih mobil yang sesuai dengan kebutuhan Anda, lalu klik "Sewa Sekarang" atau "Pesan Sekarang".</p></div>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="w-7 h-7 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">2</span>
                    <div><h4 class="font-bold text-gray-900 text-sm">Isi Form Pemesanan</h4><p class="text-xs text-gray-500 mt-1">Lengkapi data diri, tentukan lokasi dan tanggal pickup/return, serta pilih tipe sewa (dengan driver atau lepas kunci).</p></div>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="w-7 h-7 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">3</span>
                    <div><h4 class="font-bold text-gray-900 text-sm">Verifikasi Data</h4><p class="text-xs text-gray-500 mt-1">Tim kami akan memverifikasi data pemesanan Anda. Kami akan menghubungi Anda melalui WhatsApp untuk konfirmasi.</p></div>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="w-7 h-7 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">4</span>
                    <div><h4 class="font-bold text-gray-900 text-sm">Lakukan Pembayaran</h4><p class="text-xs text-gray-500 mt-1">Lakukan pembayaran sesuai dengan metode yang tersedia (Transfer Bank, E-Wallet, atau Virtual Account).</p></div>
                </li>
                <li class="flex items-start space-x-3">
                    <span class="w-7 h-7 bg-primary-500 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">5</span>
                    <div><h4 class="font-bold text-gray-900 text-sm">Mobil Siap Digunakan</h4><p class="text-xs text-gray-500 mt-1">Setelah pembayaran terkonfirmasi, mobil siap digunakan sesuai jadwal yang telah ditentukan.</p></div>
                </li>
            </ol>
        </div>
    </div>
</section>

<section id="syarat" class="py-8 mb-6 scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-file-contract text-primary-500 text-sm"></i></span>
            Syarat & Ketentuan
        </h2>
        <div class="space-y-5">
            <div class="bg-gray-50 rounded-2xl p-5 md:p-7">
                <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center"><i class="fas fa-money-bill-wave text-primary-500 mr-2"></i> Kebijakan Keuangan & Pembayaran</h3>
                <div class="space-y-3 text-xs text-gray-600">
                    <p><strong>Metode Pembayaran:</strong></p>
                    <ul class="space-y-2 pl-5">
                        <li class="flex items-start space-x-2"><i class="fas fa-university text-primary-500 mt-0.5"></i><span><strong>Transfer Bank</strong> - BCA, Mandiri, BNI, BRI. Pembayaran dapat dilakukan melalui transfer ke rekening resmi perusahaan.</span></li>
                        <li class="flex items-start space-x-2"><i class="fas fa-wallet text-primary-500 mt-0.5"></i><span><strong>E-Wallet</strong> - GoPay, OVO, DANA, LinkAja. Tersedia pembayaran melalui aplikasi dompet digital.</span></li>
                        <li class="flex items-start space-x-2"><i class="fas fa-credit-card text-primary-500 mt-0.5"></i><span><strong>Virtual Account</strong> - Pembayaran melalui virtual account dari berbagai bank.</span></li>
                    </ul>
                    <p><strong>Ketentuan Pembayaran:</strong></p>
                    <ul class="space-y-1 pl-5 list-disc">
                        <li>DP minimal 50% di muka untuk mengkonfirmasi pemesanan.</li>
                        <li>Pelunasan dilakukan saat pengambilan mobil.</li>
                        <li>Untuk sewa jangka panjang (bulanan), pembayaran dilakukan di awal bulan.</li>
                    </ul>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 md:p-7">
                <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center"><i class="fas fa-times-circle text-primary-500 mr-2"></i> Kebijakan Pembatalan & Refund</h3>
                <div class="space-y-2.5 text-xs text-gray-600">
                    <div class="flex items-start space-x-2"><i class="fas fa-clock text-primary-500 mt-0.5"></i><span><strong>Pembatalan H-3</strong> atau lebih: Refund 100% (dipotong biaya admin 5%).</span></div>
                    <div class="flex items-start space-x-2"><i class="fas fa-clock text-primary-500 mt-0.5"></i><span><strong>Pembatalan H-1 ~ H-2</strong>: Refund 50% dari total pembayaran.</span></div>
                    <div class="flex items-start space-x-2"><i class="fas fa-clock text-primary-500 mt-0.5"></i><span><strong>Pembatalan H-0</strong> (hari H): Tidak ada refund / hangus.</span></div>
                    <div class="flex items-start space-x-2"><i class="fas fa-clock text-primary-500 mt-0.5"></i><span><strong>Pembatalan dari pihak perusahaan</strong>: Refund 100% tanpa potongan.</span></div>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-5 md:p-7">
                <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center"><i class="fas fa-undo text-primary-500 mr-2"></i> Mekanisme Pengembalian Deposit</h3>
                <div class="space-y-2 text-xs text-gray-600">
                    <p>Deposit akan dikembalikan setelah masa sewa selesai dengan ketentuan:</p>
                    <ul class="space-y-1 pl-5 list-disc">
                        <li>Mobil dikembalikan tepat waktu sesuai jadwal.</li>
                        <li>Tidak ada kerusakan pada mobil (selain pemakaian normal).</li>
                        <li>Kondisi mobil bersih (tidak ada denda kebersihan).</li>
                        <li>Tidak ada pelanggaran aturan sewa (wilayah, BBM, dll).</li>
                    </ul>
                    <p>Proses refund deposit maksimal 1x24 jam setelah inspeksi mobil selesai.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="darurat" class="py-8 mb-6 bg-gray-50 rounded-2xl scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-exclamation-triangle text-primary-500 text-sm"></i></span>
            Panduan Darurat
        </h2>
        <div class="space-y-5">
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center"><i class="fas fa-car-crash text-red-500 mr-2"></i> Prosedur Mobil Mogok / Ban Bocor</h3>
                <ol class="space-y-2.5 text-xs text-gray-600 pl-5 list-decimal">
                    <li>Tetap tenang dan jangan panik. Nyalakan lampu hazard.</li>
                    <li>Tepikan mobil ke tempat yang aman, jauh dari lalu lintas.</li>
                    <li>Pasang segitiga pengaman minimal 20 meter di belakang mobil.</li>
                    <li>Hubungi nomor darurat Bless Rent Car yang tercantum di dokumen sewa.</li>
                    <li>Tim kami akan membantu Anda dengan layanan derek atau bantuan darurat.</li>
                    <li>Jangan melakukan perbaikan sendiri tanpa koordinasi dengan tim kami.</li>
                </ol>
            </div>
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-3 flex items-center"><i class="fas fa-ambulance text-red-500 mr-2"></i> Prosedur Kecelakaan</h3>
                <ol class="space-y-2.5 text-xs text-gray-600 pl-5 list-decimal">
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
    </div>
</section>

<section id="asuransi" class="py-8 mb-6 scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-shield-alt text-primary-500 text-sm"></i></span>
            Informasi Asuransi & Proteksi
        </h2>
        <div class="bg-gray-50 rounded-2xl p-5 md:p-7">
            <div class="space-y-3 text-xs text-gray-600">
                <p>Setiap mobil di Bless Rent Car dilengkapi dengan perlindungan asuransi untuk keamanan dan kenyamanan Anda.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-3">
                    <div class="bg-white rounded-xl p-4 border border-gray-100">
                        <h4 class="font-bold text-gray-900 mb-1.5 flex items-center text-sm"><i class="fas fa-shield-check text-green-500 mr-2"></i> All Risk (Comprehensive)</h4>
                        <p class="text-xs text-gray-500">Perlindungan menyeluruh terhadap kerusakan mobil akibat kecelakaan, tabrakan, atau faktor eksternal lainnya.</p>
                    </div>
                    <div class="bg-white rounded-xl p-4 border border-gray-100">
                        <h4 class="font-bold text-gray-900 mb-1.5 flex items-center text-sm"><i class="fas fa-shield-check text-green-500 mr-2"></i> TLO (Total Loss Only)</h4>
                        <p class="text-xs text-gray-500">Perlindungan untuk kerusakan total (>=75%) akibat kecelakaan atau pencurian.</p>
                    </div>
                </div>
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-3 mt-3">
                    <p class="text-xs text-yellow-700"><strong>Catatan:</strong> Asuransi tidak menanggupi kerusakan akibat kelalaian pengemudi, kerusakan ban, kaca, atau bagian bawah mobil. Biaya excess/resiko sendiri tetap berlaku sesuai ketentuan polis.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="aturan" class="py-8 mb-6 bg-gray-50 rounded-2xl scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-clipboard-list text-primary-500 text-sm"></i></span>
            Aturan Selama Masa Sewa
        </h2>
        <div class="space-y-5">
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center"><i class="fas fa-gas-pump text-primary-500 mr-2"></i> Kebijakan BBM (Full-to-Full)</h3>
                <p class="text-xs text-gray-600">Mobil diberikan dalam kondisi full tank BBM dan wajib dikembalikan dalam kondisi full tank. Jika tidak diisi penuh, akan dikenakan biaya pengisian BBM ditambah biaya jasa. Pastikan Anda mengisi BBM di SPBU resmi terdekat sebelum mengembalikan mobil.</p>
            </div>
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center"><i class="fas fa-map-marked-alt text-primary-500 mr-2"></i> Kebijakan Wilayah / Zonasi</h3>
                <p class="text-xs text-gray-600">Mobil hanya boleh digunakan di wilayah Jabodetabek dan sekitarnya. Penggunaan di luar wilayah yang ditentukan memerlukan izin khusus dan dikenakan biaya tambahan. Penggunaan di luar Jawa memerlukan persetujuan terlebih dahulu.</p>
            </div>
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center"><i class="fas fa-broom text-primary-500 mr-2"></i> Kebijakan Denda Kebersihan & Bau</h3>
                <p class="text-xs text-gray-600">Mobil wajib dikembalikan dalam kondisi bersih. Denda kebersihan akan dikenakan jika:</p>
                <ul class="space-y-1 mt-2 text-xs text-gray-600 pl-5 list-disc">
                    <li>Interior mobil kotor (sampah, noda, makanan berantakan).</li>
                    <li>Ada bau tidak sedap (rokok, hewan peliharaan, dll).</li>
                    <li>Ada muntahan atau tumpahan cairan.</li>
                </ul>
            </div>
            <div class="bg-white rounded-2xl p-5 md:p-7 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-2 flex items-center"><i class="fas fa-clock text-primary-500 mr-2"></i> Kebijakan Overtime</h3>
                <p class="text-xs text-gray-600">Keterlambatan pengembalian mobil akan dikenakan biaya overtime. Biaya dihitung per jam berdasarkan tarif sewa harian dibagi 24 jam. Jika keterlambatan lebih dari 3 jam, akan dihitung 1 hari penuh sewa. Konfirmasi terlebih dahulu jika ingin memperpanjang masa sewa.</p>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="py-8 mb-6 scroll-mt-20" data-aos="fade-up">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-6 flex items-center">
            <span class="w-9 h-9 bg-primary-100 rounded-xl flex items-center justify-center mr-3"><i class="fas fa-question-circle text-primary-500 text-sm"></i></span>
            FAQ - Pertanyaan Umum
        </h2>
        <div x-data="{ active: null }" class="space-y-3">
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 1 ? null : 1" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apa saja syarat untuk menyewa mobil?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 1" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Syarat sewa: KTP asli (dan SIM untuk lepas kunci), minimal usia 21 tahun, bersedia meninggalkan deposit atau jaminan (KTP/KK asli atau uang tunai), dan mengisi surat perjanjian sewa.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 2 ? null : 2" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah bisa antar jemput mobil?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 2" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Ya, kami menyediakan layanan antar jemput mobil untuk wilayah Jakarta, Bekasi, Tangerang, dan Depok. Biaya antar jemput tergantung lokasi pengantaran.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 3 ? null : 3" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah boleh membawa mobil ke luar kota?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 3 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 3" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Boleh, namun harus mendapatkan izin terlebih dahulu. Bepergian ke luar kota dikenakan biaya tambahan dan wajib melaporkan tujuan perjalanan. Penggunaan di luar Jawa memerlukan persetujuan khusus.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 4 ? null : 4" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Bagaimana jika mobil mogok atau rusak?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 4 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 4" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Segera hubungi kami di nomor darurat yang tercantum di dokumen sewa. Kami akan mengirimkan bantuan atau mobil pengganti jika diperlukan. Jangan melakukan perbaikan sendiri tanpa koordinasi dengan tim kami.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 5 ? null : 5" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Apakah tersedia layanan dengan driver?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 5 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 5" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Ya, kami menyediakan layanan sewa dengan driver profesional. Driver kami berpengalaman, ramah, dan mengenal rute di Jabodetabek. Tarif driver sudah termasuk biaya BBM dan parkir.</p>
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100">
                <button @click="active = active === 6 ? null : 6" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-semibold text-gray-900 text-sm">Bagaimana cara membatalkan pesanan?</span>
                    <i class="fas fa-chevron-down text-gray-400 transition-transform duration-300" :class="active === 6 ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="active === 6" x-collapse class="px-4 pb-4">
                    <p class="text-xs text-gray-600">Hubungi kami melalui WhatsApp atau telepon untuk membatalkan pesanan. Pembatalan yang dilakukan H-3 atau lebih akan mendapatkan refund 100% (dikurangi biaya admin). Lihat kebijakan pembatalan untuk detail lebih lanjut.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-8 mb-6 bg-gradient-to-r from-primary-50 via-white to-primary-50 rounded-2xl" data-aos="zoom-in">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Butuh Bantuan Lebih Lanjut?</h2>
            <p class="text-gray-500 text-sm">Tim customer service kami siap membantu Anda 24 jam sehari, 7 hari seminggu.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <a href="https://wa.me/6281225062153" target="_blank" class="flex items-center justify-center space-x-2 px-5 py-3.5 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-md text-sm">
                <i class="fab fa-whatsapp text-lg"></i>
                <span>WhatsApp 24 Jam</span>
            </a>
            <a href="tel:+6281225062153" class="flex items-center justify-center space-x-2 px-5 py-3.5 bg-primary-500 hover:bg-primary-600 text-white font-semibold rounded-xl transition-all duration-300 shadow-md text-sm">
                <i class="fas fa-phone text-lg"></i>
                <span>Telepon</span>
            </a>
            <a href="{{ route('customer.contact') }}" class="flex items-center justify-center space-x-2 px-5 py-3.5 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-xl transition-all duration-300 shadow-md text-sm">
                <i class="fas fa-envelope text-lg"></i>
                <span>Form Kontak</span>
            </a>
        </div>
    </div>
</section>
@endsection

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
