@extends('layouts.app')

@section('title', 'Booking - Bless Rent Car')
@section('description', 'Booking rental mobil secara online. Mudah, cepat, dan aman. Pesan mobil impian Anda sekarang.')
@section('og_title', 'Booking - Bless Rent Car')

@push('styles')
<style>
    .order-summary { position: sticky; top: 100px; }
    [x-cloak] { display: none !important; }
    .step-num { width: 28px; height: 28px; background: #0ea5e9; color: #fff; font-size: 12px; font-weight: 700; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .time-chip { padding: 6px 14px; font-size: 12px; font-weight: 500; border-radius: 8px; border: 1.5px solid #e2e8f0; background: #f8fafc; color: #475569; cursor: pointer; transition: all .15s; }
    .time-chip:hover { border-color: #0ea5e9; background: #f0f9ff; }
    .time-chip.active { background: #0ea5e9; border-color: #0ea5e9; color: #fff; box-shadow: 0 2px 8px rgba(14,165,233,0.25); }
    .time-chip.disabled { opacity: .35; cursor: not-allowed; pointer-events: none; }
</style>
@endpush

@section('content')
<section class="page-hero py-12 md:py-16">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-calendar-check hero-shape-drift text-primary-200" style="top:10%;right:5%;font-size:5rem;"></i>
        <i class="fas fa-car hero-shape-drift text-primary-200" style="bottom:12%;left:5%;font-size:5rem;animation-delay:-7s;"></i>
        <svg class="absolute bottom-0 left-0 w-full" height="4" viewBox="0 0 1200 4" preserveAspectRatio="none">
            <line x1="0" y1="2" x2="1200" y2="2" stroke="#0ea5e9" stroke-width="2" stroke-dasharray="24 16" class="road-line" />
        </svg>
        <div class="car-drive absolute bottom-0 left-0 text-primary-300/50"><i class="fas fa-car-side"></i></div>
        <div class="dot-float" style="width:8px;height:8px;top:12%;left:6%;animation-delay:0s;"></div>
        <div class="dot-float" style="width:5px;height:5px;top:30%;right:20%;animation-delay:-1.5s;"></div>
        <div class="dot-float" style="width:10px;height:10px;top:55%;left:40%;animation-delay:-3s;"></div>
        <div class="dot-float" style="width:6px;height:6px;top:40%;left:70%;animation-delay:-6s;"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Booking Rental Mobil</h1>
            <nav class="inline-flex items-center space-x-2 text-sm">
                <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-primary-600 font-semibold">Booking</span>
            </nav>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto">Isi form di bawah untuk melakukan pemesanan. Tim kami akan segera menghubungi Anda.</p>
        </div>
    </div>
</section>

<section class="py-10 md:py-14 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2" data-aos="fade-right">
                <div class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <i class="fas fa-file-invoice text-primary-500 mr-2"></i> Form Pemesanan
                    </h2>

                    @if(session('error'))
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm mb-4">
                            <i class="fas fa-exclamation-circle mr-1"></i> {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('booking.store') }}" method="POST" x-data="bookingForm()" @submit.prevent="submitForm">
                        @csrf
                        <div class="space-y-7">

                            <!-- Step 1: Pilih Mobil -->
                            <div>
                                <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="step-num">1</span> Pilih Mobil
                                </h3>
                                <div class="relative">
                                    <i class="fas fa-car absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10"></i>
                                    <select name="car_id" x-model="carId"
                                        class="w-full border border-gray-200 rounded-xl pl-11 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50 appearance-none">
                                        <option value="">Pilih Mobil</option>
                                        @foreach($cars as $c)
                                            <option value="{{ $c->id }}"
                                                data-price="{{ $c->price }}"
                                                data-name="{{ $c->name }}"
                                                data-brand="{{ $c->brand }}"
                                                data-transmission="{{ $c->transmission }}"
                                                data-capacity="{{ $c->capacity }}"
                                                data-discount="{{ $c->discount }}"
                                                data-image="{{ $c->image ? asset('storage/' . $c->image) : '' }}"
                                                {{ request('car') == $c->slug ? 'selected' : '' }}>
                                                {{ $c->name }} — {{ $c->brand }} — Rp {{ number_format($c->price, 0, ',', '.') }}/hari
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Step 2: Data Pemesan -->
                            <div>
                                <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="step-num">2</span> Data Pemesan
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                                        <input type="text" name="customer_name" x-model="customerName" required
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50"
                                            placeholder="Masukkan nama lengkap">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon / WA <span class="text-red-500">*</span></label>
                                        <input type="tel" name="customer_phone" x-model="customerPhone" required
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50"
                                            placeholder="Contoh: 0812xxxx">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-gray-400 font-normal">(opsional)</span></label>
                                        <input type="email" name="customer_email" x-model="customerEmail"
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50"
                                            placeholder="contoh@email.com">
                                    </div>
                                </div>
                            </div>

                            <!-- Step 3: Jadwal & Lokasi -->
                            <div>
                                <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="step-num">3</span> Jadwal & Lokasi
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Pickup <span class="text-red-500">*</span></label>
                                        <select name="pickup_location" x-model="pickupLocation" required
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50">
                                            <option value="">Pilih Lokasi</option>
                                            <option value="jakarta-barat">Jakarta Barat</option>
                                            <option value="jakarta-timur">Jakarta Timur</option>
                                            <option value="jakarta-selatan">Jakarta Selatan</option>
                                            <option value="jakarta-utara">Jakarta Utara</option>
                                            <option value="bekasi">Bekasi</option>
                                            <option value="tangerang">Tangerang</option>
                                            <option value="depok">Depok</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Return</label>
                                        <select name="return_location" x-model="returnLocation"
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50">
                                            <option value="">Sama dengan pickup</option>
                                            <option value="jakarta-barat">Jakarta Barat</option>
                                            <option value="jakarta-timur">Jakarta Timur</option>
                                            <option value="jakarta-selatan">Jakarta Selatan</option>
                                            <option value="jakarta-utara">Jakarta Utara</option>
                                            <option value="bekasi">Bekasi</option>
                                            <option value="tangerang">Tangerang</option>
                                            <option value="depok">Depok</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pickup <span class="text-red-500">*</span></label>
                                        <input type="hidden" name="pickup_date" x-model="pickupDate">
                                        <input type="date" x-model="pickupDatePart" @change="updatePickupDate"
                                            :min="today"
                                            required
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50 mb-2">
                                        <div class="flex flex-wrap gap-1.5">
                                            <template x-for="t in timeOptions" :key="t">
                                                <button type="button" @click="pickupTime = t; updatePickupDate()"
                                                    :disabled="!pickupDatePart"
                                                    class="time-chip"
                                                    :class="{ 'active': pickupTime === t, 'disabled': !pickupDatePart }"
                                                    x-text="t"></button>
                                            </template>
                                        </div>
                                        <p class="text-xs mt-1.5" x-show="pickupDate" x-cloak>
                                            <span class="text-primary-600 font-medium"><i class="fas fa-check-circle mr-0.5"></i>Pickup:</span>
                                            <span class="text-gray-500" x-text="formatDateTime(pickupDate)"></span>
                                        </p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Return <span class="text-red-500">*</span></label>
                                        <input type="hidden" name="return_date" x-model="returnDate">
                                        <input type="date" x-model="returnDatePart" @change="updateReturnDate"
                                            :min="pickupDatePart || today"
                                            required
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50 mb-2">
                                        <div class="flex flex-wrap gap-1.5">
                                            <template x-for="t in timeOptions" :key="t">
                                                <button type="button" @click="returnTime = t; updateReturnDate()"
                                                    :disabled="!returnDatePart"
                                                    class="time-chip"
                                                    :class="{ 'active': returnTime === t, 'disabled': !returnDatePart }"
                                                    x-text="t"></button>
                                            </template>
                                        </div>
                                        <p class="text-xs mt-1.5" x-show="returnDate" x-cloak>
                                            <span class="text-primary-600 font-medium"><i class="fas fa-check-circle mr-0.5"></i>Return:</span>
                                            <span class="text-gray-500" x-text="formatDateTime(returnDate)"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 4: Tipe Sewa -->
                            <div>
                                <h3 class="text-sm font-bold text-gray-700 mb-4 flex items-center gap-2">
                                    <span class="step-num">4</span> Tipe Sewa & Layanan
                                </h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipe Sewa</label>
                                        <select name="rental_type" x-model="rentalType"
                                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50">
                                            <option value="daily">Harian</option>
                                            <option value="weekly">Mingguan</option>
                                            <option value="monthly">Bulanan</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Dengan Driver?</label>
                                        <div class="flex items-center gap-3 mt-2">
                                            <label class="flex items-center gap-2 cursor-pointer px-4 py-2.5 rounded-xl border text-sm transition-all"
                                                :class="withDriver === '0' ? 'border-primary-300 bg-primary-50 text-primary-700 font-medium' : 'border-gray-200 bg-gray-50 text-gray-600'">
                                                <input type="radio" name="with_driver" value="0" x-model="withDriver" class="sr-only">
                                                <span>Tanpa Driver</span>
                                            </label>
                                            <label class="flex items-center gap-2 cursor-pointer px-4 py-2.5 rounded-xl border text-sm transition-all"
                                                :class="withDriver === '1' ? 'border-primary-300 bg-primary-50 text-primary-700 font-medium' : 'border-gray-200 bg-gray-50 text-gray-600'">
                                                <input type="radio" name="with_driver" value="1" x-model="withDriver" class="sr-only">
                                                <span>+Driver <span class="text-gray-400">(Rp150rb/hari)</span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Catatan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catatan <span class="text-gray-400 font-normal">(opsional)</span></label>
                                <textarea name="notes" x-model="notes" rows="3"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary-500 bg-gray-50"
                                    placeholder="Tambahkan catatan atau permintaan khusus..."></textarea>
                            </div>

                            <!-- Terms -->
                            <div class="flex items-start gap-2">
                                <input type="checkbox" id="terms" x-model="agreeTerms" required
                                    class="mt-0.5 accent-primary-500">
                                <label for="terms" class="text-sm text-gray-600">Saya setuju dengan <a href="/help#syarat" target="_blank" class="text-primary-500 underline font-medium">syarat & ketentuan</a> yang berlaku <span class="text-red-500">*</span></label>
                            </div>

                            <!-- Error -->
                            <div x-show="errorMsg" x-cloak class="bg-red-50 border border-red-200 text-red-700 rounded-xl px-4 py-3 text-sm flex items-center gap-2">
                                <i class="fas fa-exclamation-circle"></i>
                                <span x-text="errorMsg"></span>
                            </div>

                            <!-- Submit -->
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button type="submit" :disabled="submitting"
                                    class="flex-1 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg disabled:opacity-60 text-sm">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    <span x-show="!submitting">Kirim Pemesanan</span>
                                    <span x-show="submitting" x-cloak><i class="fas fa-spinner fa-spin mr-1"></i> Mengirim...</span>
                                </button>
                                <button type="button" @click="resetForm"
                                    class="px-6 py-3.5 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 text-sm">
                                    <i class="fas fa-undo mr-1"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Ringkasan -->
            <div data-aos="fade-left" data-aos-delay="100">
                <div class="order-summary bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-receipt text-primary-500 mr-2"></i> Ringkasan Pesanan
                    </h3>

                    <!-- Empty State -->
                    <div x-show="!selectedCar" class="text-center py-10">
                        <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-car text-2xl text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500">Belum ada mobil dipilih</p>
                        <p class="text-xs text-gray-400 mt-1">Silakan pilih mobil terlebih dahulu</p>
                    </div>

                    <!-- Summary Content -->
                    <div x-show="selectedCar" x-cloak>
                        <!-- Car Image -->
                        <div class="rounded-xl overflow-hidden mb-4 bg-gray-100 h-36 flex items-center justify-center" x-show="selectedCar.image">
                            <img :src="selectedCar.image" :alt="selectedCar.name" class="w-full h-full object-cover">
                        </div>
                        <!-- Car Info -->
                        <div class="bg-gradient-to-br from-primary-50 to-primary-100 rounded-xl p-4 mb-4">
                            <h4 class="font-bold text-gray-900" x-text="selectedCar.name"></h4>
                            <p class="text-xs text-gray-500 mt-1" x-text="selectedCar.specs"></p>
                        </div>
                        <!-- Price Details -->
                        <div class="space-y-3 text-sm border-b border-gray-100 pb-4 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Harga Sewa</span>
                                <span class="font-semibold text-gray-900" x-text="'Rp ' + formatPrice(pricePerDay) + '/hari'"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Durasi</span>
                                <span class="font-semibold text-gray-900" x-text="days + ' hari'"></span>
                            </div>
                            <div x-show="withDriver === '1'" class="flex justify-between">
                                <span class="text-gray-500">Driver</span>
                                <span class="font-semibold text-gray-900" x-text="'Rp ' + formatPrice(driverCost)"></span>
                            </div>
                            <div x-show="discountAmount > 0" class="flex justify-between text-green-600">
                                <span><i class="fas fa-tag mr-1"></i>Diskon</span>
                                <span class="font-semibold" x-text="'− Rp ' + formatPrice(discountAmount)"></span>
                            </div>
                        </div>
                        <!-- Total -->
                        <div class="flex justify-between items-center mb-4">
                            <span class="font-bold text-gray-900">Total</span>
                            <span class="text-xl font-extrabold text-primary-600" x-text="'Rp ' + formatPrice(totalPrice)"></span>
                        </div>
                        <!-- Booking info -->
                        <div class="text-[10px] text-gray-400 space-y-1">
                            <p>*Harga belum termasuk biaya tambahan di lapangan</p>
                            <p x-show="pickupDate && returnDate" x-text="'Sewa ' + days + ' hari: ' + formatDate(pickupDate) + ' — ' + formatDate(returnDate)"></p>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp CTA -->
                <div class="mt-4 bg-green-50 rounded-2xl p-4 border border-green-100">
                    <div class="flex items-start gap-3">
                        <i class="fab fa-whatsapp text-green-500 text-xl mt-0.5"></i>
                        <div>
                            <p class="text-sm font-semibold text-green-800">Pemesanan via WhatsApp?</p>
                            <p class="text-xs text-green-600 mt-1">Hubungi kami langsung untuk pemesanan cepat.</p>
                            <a href="https://wa.me/6281225062153" target="_blank" class="inline-flex items-center text-xs font-semibold text-green-700 mt-2 hover:underline">
                                <i class="fab fa-whatsapp mr-1"></i> +62 812-2506-2153
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function bookingForm() {
        const todayStr = new Date().toISOString().split('T')[0];
        return {
            carId: '{{ request("car") ? \App\Models\Car::where("slug", request("car"))->first()?->id ?? "" : "" }}',
            customerName: '',
            customerPhone: '',
            customerEmail: '',
            pickupLocation: '',
            returnLocation: '',
            pickupDate: '',
            returnDate: '',
            pickupDatePart: todayStr,
            pickupTime: '10:00',
            returnDatePart: '',
            returnTime: '12:00',
            timeOptions: ['08:00','09:00','10:00','12:00','14:00','17:00','19:00','21:00'],
            rentalType: 'daily',
            withDriver: '0',
            notes: '',
            agreeTerms: false,
            submitting: false,
            errorMsg: '',
            get today() { return todayStr; },
            get selectedCar() {
                if(!this.carId) return null;
                const opt = document.querySelector('select[name="car_id"] option[value="' + this.carId + '"]');
                if(!opt) return null;
                return {
                    name: opt.dataset.name,
                    brand: opt.dataset.brand,
                    specs: opt.dataset.transmission + ' · ' + opt.dataset.capacity + ' kursi',
                    price: parseInt(opt.dataset.price),
                    discount: parseInt(opt.dataset.discount || 0),
                    image: opt.dataset.image || ''
                };
            },
            get pricePerDay() {
                if(!this.selectedCar) return 0;
                const p = this.selectedCar.price;
                const d = this.selectedCar.discount;
                return d > 0 ? p - (p * d / 100) : p;
            },
            get days() {
                if(!this.pickupDate || !this.returnDate) return 0;
                const p = new Date(this.pickupDate), r = new Date(this.returnDate);
                return Math.max(1, Math.ceil((r - p) / (1000*60*60*24)));
            },
            get driverCost() {
                return this.withDriver === '1' ? this.days * 150000 : 0;
            },
            get discountAmount() {
                if(!this.selectedCar || !this.selectedCar.discount) return 0;
                return this.selectedCar.price * this.selectedCar.discount / 100 * this.days;
            },
            get totalPrice() {
                const base = this.pricePerDay * this.days;
                return base + this.driverCost;
            },
            formatPrice(num) { return Math.round(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); },
            formatDate(str) {
                if (!str) return '—';
                const d = new Date(str);
                return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
            },
            formatDateTime(str) {
                if (!str) return '—';
                const d = new Date(str);
                return d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }) + ' ' + d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            },
            updatePickupDate() {
                if (this.pickupDatePart && this.pickupTime) {
                    this.pickupDate = this.pickupDatePart + 'T' + this.pickupTime;
                    if (!this.returnDatePart) {
                        this.returnDatePart = this.pickupDatePart;
                    }
                }
            },
            updateReturnDate() {
                if (this.returnDatePart && this.returnTime) {
                    this.returnDate = this.returnDatePart + 'T' + this.returnTime;
                }
            },
            submitForm() {
                if(!this.agreeTerms) { this.errorMsg = 'Silakan setujui syarat & ketentuan terlebih dahulu.'; return; }
                if(!this.carId) { this.errorMsg = 'Silakan pilih mobil terlebih dahulu.'; return; }
                if(!this.pickupDate) { this.errorMsg = 'Silakan pilih tanggal & jam pickup.'; return; }
                if(!this.returnDate) { this.errorMsg = 'Silakan pilih tanggal & jam return.'; return; }
                if(this.submitting) return;
                this.submitting = true;
                this.errorMsg = '';
                this.$el.submit();
            },
            resetForm() {
                this.carId = ''; this.customerName = ''; this.customerPhone = ''; this.customerEmail = '';
                this.pickupLocation = ''; this.returnLocation = '';
                this.pickupDate = ''; this.pickupDatePart = todayStr; this.pickupTime = '10:00';
                this.returnDate = ''; this.returnDatePart = ''; this.returnTime = '12:00';
                this.rentalType = 'daily'; this.withDriver = '0'; this.notes = ''; this.agreeTerms = false;
                this.errorMsg = '';
            }
        }
    }

    AOS.init({duration:800,once:true});
</script>
@endpush
