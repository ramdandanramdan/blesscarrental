@extends('layouts.user')

@section('title', 'My Bookings')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div data-aos="fade-up">
        <h1 class="text-2xl font-bold text-gray-900">My Bookings</h1>
        <p class="mt-1 text-gray-500">Kelola semua pemesanan kendaraan Anda.</p>
    </div>

    {{-- Filter Tabs --}}
    <div class="flex flex-wrap gap-2" data-aos="fade-up" data-aos-delay="100">
        @php
            $currentStatus = request('status');
            $tabs = [
                null => 'Semua',
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'active' => 'Active',
                'completed' => 'Completed',
            ];
        @endphp
        @foreach($tabs as $value => $label)
            <a href="{{ route('customer.bookings', array_merge(request()->except('status'), $value ? ['status' => $value] : [])) }}"
               class="rounded-full border px-5 py-2 text-sm font-medium transition
                      {{ $currentStatus === $value || (!$currentStatus && is_null($value))
                          ? 'border-primary-500 bg-primary-500 text-white shadow-md shadow-primary-200'
                          : 'border-gray-200 bg-white text-gray-600 hover:border-primary-300 hover:text-primary-600' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- Booking Cards --}}
    <div class="space-y-4" data-aos="fade-up" data-aos-delay="200">
        @if(isset($bookings) && $bookings->count() > 0)
            @foreach($bookings as $booking)
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:shadow-md">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                        {{-- Car Image --}}
                        <div class="h-32 w-44 flex-shrink-0 overflow-hidden rounded-xl bg-gray-100">
                            @if($booking->car->image)
                                <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                                </div>
                            @endif
                        </div>

                        {{-- Booking Details --}}
                        <div class="flex-1">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $booking->car->name ?? 'N/A' }}</h3>
                                    <p class="mt-1 text-sm text-gray-500">Kode: <span class="font-mono font-medium text-gray-700">{{ $booking->booking_code ?? '-' }}</span></p>
                                </div>
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
                                <span class="inline-block w-fit rounded-full border px-3 py-1 text-xs font-medium {{ $colorClass }}">{{ ucfirst($booking->status) }}</span>
                            </div>

                            <div class="mt-3 flex flex-wrap gap-x-6 gap-y-2 text-sm text-gray-500">
                                <div class="flex items-center gap-1">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $booking->start_date?->format('d M Y') ?? '-' }} — {{ $booking->end_date?->format('d M Y') ?? '-' }}
                                </div>
                            </div>

                            <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-4">
                                <p class="text-sm text-gray-500">Total Harga</p>
                                <p class="text-xl font-bold text-gray-900">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Pagination --}}
            @if($bookings->hasPages())
                <div class="flex justify-center pt-4">
                    {{ $bookings->links() }}
                </div>
            @endif
        @else
            <div class="rounded-2xl border border-gray-100 bg-white p-12 text-center shadow-sm">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">Tidak Ada Booking</h3>
                <p class="mt-1 text-sm text-gray-500">Belum ada booking yang sesuai dengan filter ini.</p>
                <a href="{{ route('customer.bookings') }}" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-primary-500 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-primary-600">
                    Lihat Semua Booking
                </a>
            </div>
        @endif
    </div>

</div>
@endsection
