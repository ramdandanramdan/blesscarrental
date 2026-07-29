@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Welcome Banner --}}
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-500 to-primary-700 p-8 text-white shadow-lg" data-aos="fade-up">
        <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10"></div>
        <div class="absolute -bottom-10 -left-10 h-32 w-32 rounded-full bg-white/5"></div>
        <div class="relative z-10">
            <h1 class="text-2xl font-bold">
                @php
                    $hour = now()->hour;
                    $greeting = $hour < 12 ? 'Selamat pagi' : ($hour < 17 ? 'Selamat siang' : ($hour < 21 ? 'Selamat sore' : 'Selamat malam'));
                @endphp
                {{ $greeting }}, {{ Auth::user()->name }}!
            </h1>
            <p class="mt-2 text-primary-100">Selamat datang di dashboard Bless Rent Car. Kelola pemesanan Anda dengan mudah.</p>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4" data-aos="fade-up" data-aos-delay="100">
        <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Booking</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['total_bookings'] ?? 0 }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Aktif / Dikonfirmasi</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['active_bookings'] ?? 0 }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Selesai</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">{{ $stats['completed_bookings'] ?? 0 }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-50 text-green-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pengeluaran</p>
                    <p class="mt-1 text-3xl font-bold text-gray-900">Rp {{ number_format($stats['total_spent'] ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2" data-aos="fade-up" data-aos-delay="200">
        <a href="{{ route('booking') }}" class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-primary-500 to-primary-700 text-white shadow-lg shadow-primary-200 transition group-hover:scale-105">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Book a Car</h3>
                    <p class="text-sm text-gray-500">Sewa kendaraan impian Anda sekarang</p>
                </div>
            </div>
        </a>

        <a href="{{ route('customer.bookings') }}" class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-lg shadow-blue-200 transition group-hover:scale-105">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">My Bookings</h3>
                    <p class="text-sm text-gray-500">Lihat dan kelola semua pemesanan Anda</p>
                </div>
            </div>
        </a>
    </div>

    {{-- Recent Bookings --}}
    <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm" data-aos="fade-up" data-aos-delay="300">
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-900">Booking Terbaru</h2>
            <a href="{{ route('customer.bookings') }}" class="text-sm font-medium text-primary-600 hover:text-primary-700">Lihat Semua</a>
        </div>

        @if(isset($recentBookings) && $recentBookings->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-500">
                            <th class="pb-3 pr-4 font-medium">Mobil</th>
                            <th class="pb-3 pr-4 font-medium">Tanggal</th>
                            <th class="pb-3 pr-4 font-medium">Status</th>
                            <th class="pb-3 text-right font-medium">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($recentBookings as $booking)
                            <tr class="transition hover:bg-gray-50">
                                <td class="py-4 pr-4">
                                    <p class="font-medium text-gray-900">{{ $booking->car->name ?? 'N/A' }}</p>
                                </td>
                                <td class="py-4 pr-4">
                                    <p class="text-gray-600">{{ $booking->start_date?->format('d M Y') ?? '-' }}</p>
                                    <p class="text-xs text-gray-400">s/d {{ $booking->end_date?->format('d M Y') ?? '-' }}</p>
                                </td>
                                <td class="py-4 pr-4">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                            'confirmed' => 'bg-blue-50 text-blue-700 border-blue-200',
                                            'active' => 'bg-green-50 text-green-700 border-green-200',
                                            'completed' => 'bg-gray-50 text-gray-700 border-gray-200',
                                            'cancelled' => 'bg-red-50 text-red-700 border-red-200',
                                        ];
                                        $colorClass = $statusColors[$booking->status] ?? 'bg-gray-50 text-gray-700 border-gray-200';
                                    @endphp
                                    <span class="inline-block rounded-full border px-3 py-1 text-xs font-medium {{ $colorClass }}">{{ ucfirst($booking->status) }}</span>
                                </td>
                                <td class="py-4 text-right">
                                    <p class="font-semibold text-gray-900">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="py-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">Belum Ada Booking</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai sewa kendaraan pertama Anda sekarang!</p>
                <a href="{{ route('booking') }}" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-200 transition hover:shadow-xl hover:shadow-primary-300">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Book Sekarang
                </a>
            </div>
        @endif
    </div>

</div>
@endsection
