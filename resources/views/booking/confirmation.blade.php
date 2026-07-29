@extends('layouts.app')

@section('title', 'Konfirmasi Pemesanan - Bless Rent Car')
@section('description', 'Pemesanan mobil di Bless Rent Car berhasil! Cek detail pemesanan Anda di halaman ini.')

@push('styles')
<style>
    .confirm-header { background: linear-gradient(135deg, #0ea5e9, #06b6d4); border-radius: 20px; padding: 40px 24px; text-align: center; position: relative; overflow: hidden; }
    .confirm-header::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 30% 50%, rgba(255,255,255,0.1) 0%, transparent 60%); }
    .confirm-header .icon { width: 64px; height: 64px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
    .booking-id { font-size: 28px; font-weight: 800; color: #fff; letter-spacing: 3px; }
    .detail-card { background: #fff; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.04); border: 1px solid #f1f5f9; padding: 28px; margin-top: -30px; position: relative; z-index: 2; }
    .section-label { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; color: #0ea5e9; margin-bottom: 12px; padding-bottom: 8px; border-bottom: 2px solid #e0f2fe; }
    .car-chip { display: flex; align-items: center; gap: 12px; padding: 14px; background: #f8fafc; border-radius: 12px; }
    .info-row { display: flex; padding: 8px 0; border-bottom: 1px solid #f8fafc; }
    .info-row .label { width: 120px; font-size: 12px; color: #94a3b8; flex-shrink: 0; }
    .info-row .value { font-size: 14px; color: #1e293b; font-weight: 500; }
    .price-card { background: linear-gradient(135deg, #f0f9ff, #e0f2fe); border-radius: 12px; padding: 18px 20px; display: flex; justify-content: space-between; align-items: center; }
    .price-card .amount { font-size: 24px; font-weight: 800; color: #0ea5e9; }
</style>
@endpush

@section('content')
<div class="min-h-screen py-16 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4">
        @if(session('booking_success'))
        <div class="bg-emerald-50 border border-emerald-200 rounded-xl px-5 py-4 mb-6 flex items-start gap-3" data-aos="fade-down">
            <div class="w-8 h-8 bg-emerald-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-emerald-800 text-sm">Pemesanan berhasil dikirim!</p>
                <p class="text-emerald-600 text-xs mt-0.5">Simpan kode booking ini. Tim kami akan menghubungi Anda maksimal 1x24 jam.</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 flex-shrink-0">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif
        <div class="confirm-header" data-aos="fade-down">
            <div class="icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white mb-1">Pemesanan Berhasil!</h1>
            <p class="text-cyan-100 text-sm">Terima kasih, pemesanan Anda telah diterima.</p>
            <div class="mt-4">
                <span class="text-xs text-cyan-200 uppercase tracking-wider">Kode Booking</span>
                <div class="booking-id">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</div>
            </div>
            <span class="inline-block mt-4 px-4 py-1.5 bg-yellow-400 text-yellow-900 text-xs font-bold rounded-full">Menunggu Konfirmasi</span>
        </div>

        <div class="detail-card" data-aos="fade-up" data-aos-delay="100">
            <!-- Mobil -->
            <div class="section-label">Mobil</div>
            <div class="car-chip mb-6">
                <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-car text-primary-500"></i>
                </div>
                <div>
                    <div class="font-semibold text-gray-900">{{ $booking->car?->name ?? 'Mobil' }}</div>
                    <div class="text-xs text-gray-500">{{ $booking->car?->brand ?? '' }}{{ $booking->car?->model ? ' - ' . $booking->car->model : '' }}</div>
                </div>
            </div>

            <!-- Data Penyewa -->
            <div class="section-label">Data Penyewa</div>
            <div class="grid md:grid-cols-2 gap-0 mb-6">
                <div class="info-row">
                    <span class="label">Nama</span>
                    <span class="value">{{ $booking->customer_name ?? '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Telepon</span>
                    <span class="value">{{ $booking->customer_phone ?? '-' }}</span>
                </div>
                <div class="info-row md:col-span-2">
                    <span class="label">Email</span>
                    <span class="value">{{ $booking->customer_email ?? '-' }}</span>
                </div>
            </div>

            <!-- Jadwal & Lokasi -->
            <div class="section-label">Jadwal & Lokasi</div>
            <div class="grid md:grid-cols-2 gap-0 mb-6">
                <div class="info-row">
                    <span class="label">Ambil</span>
                    <span class="value">{{ \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Kembali</span>
                    <span class="value">{{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y H:i') }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Lokasi Ambil</span>
                    <span class="value">{{ $booking->pickup_location ? str_replace('-', ' ', ucwords($booking->pickup_location, '-')) : '-' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Lokasi Kembali</span>
                    <span class="value">{{ $booking->return_location ? str_replace('-', ' ', ucwords($booking->return_location, '-')) : 'Sama dengan ambil' }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Tipe Sewa</span>
                    <span class="value">{{ $booking->rental_type === 'daily' ? 'Harian' : ($booking->rental_type === 'weekly' ? 'Mingguan' : 'Bulanan') }}</span>
                </div>
                <div class="info-row">
                    <span class="label">Driver</span>
                    <span class="value">{{ $booking->with_driver ? 'Dengan Driver' : 'Tanpa Driver' }}</span>
                </div>
                @if($booking->notes)
                <div class="info-row md:col-span-2">
                    <span class="label">Catatan</span>
                    <span class="value">{{ $booking->notes }}</span>
                </div>
                @endif
            </div>

            <!-- Harga -->
            <div class="section-label">Rincian Harga</div>
            <div class="price-card mb-4">
                <span class="font-semibold text-gray-700">Total Pembayaran</span>
                <span class="amount">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </div>
            @if($booking->with_driver && $booking->driver_price > 0)
            <p class="text-xs text-gray-400 text-center mb-4">* Termasuk biaya driver Rp {{ number_format($booking->driver_price, 0, ',', '.') }}</p>
            @endif

            <!-- Actions -->
            <div class="mt-6 pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-3 justify-center">
                <a href="https://wa.me/6281225062153?text=Halo%20saya%20ingin%20konfirmasi%20pemesanan%20{{ $booking->id }}"
                   class="flex items-center justify-center gap-2 px-6 py-3.5 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-xl transition-all duration-200">
                    <i class="fab fa-whatsapp"></i> Konfirmasi via WhatsApp
                </a>
                <a href="{{ route('home') }}"
                   class="flex items-center justify-center gap-2 px-6 py-3.5 border border-gray-200 hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
