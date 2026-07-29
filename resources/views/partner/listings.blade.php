@extends('layouts.user')

@section('title', 'My Listings')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between" data-aos="fade-up">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">My Listings</h1>
            <p class="mt-1 text-gray-500">Kelola kendaraan yang Anda tawarkan.</p>
        </div>
        <a href="{{ route('partner.listings.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-700 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-200 transition hover:shadow-xl hover:shadow-primary-300">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Tambah Listing
        </a>
    </div>

    {{-- Car Grid --}}
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3" data-aos="fade-up" data-aos-delay="100">
        @if(isset($cars) && $cars->count() > 0)
            @foreach($cars as $car)
                <div class="group rounded-2xl border border-gray-100 bg-white shadow-sm transition hover:shadow-md">
                    {{-- Car Image --}}
                    <div class="relative h-48 overflow-hidden rounded-t-2xl bg-gray-100">
                        @if($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="h-full w-full object-cover transition group-hover:scale-105">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gray-100">
                                <svg class="h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                            </div>
                        @endif
                        @php
                            $carStatusColors = [
                                'available' => 'bg-green-500 text-white',
                                'rented' => 'bg-blue-500 text-white',
                                'maintenance' => 'bg-amber-500 text-white',
                                'inactive' => 'bg-gray-400 text-white',
                            ];
                            $carStatusClass = $carStatusColors[$car->status] ?? 'bg-gray-400 text-white';
                        @endphp
                        <span class="absolute left-3 top-3 rounded-full px-3 py-1 text-xs font-semibold {{ $carStatusClass }}">{{ ucfirst($car->status ?? 'Available') }}</span>
                    </div>

                    {{-- Card Body --}}
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-900">{{ $car->name }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ $car->brand ?? '' }} {{ $car->type ?? '' }}</p>

                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center gap-1 text-sm text-gray-500">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                {{ $car->bookings_count ?? 0 }} booking
                            </div>
                            <p class="text-lg font-bold text-primary-600">Rp {{ number_format($car->price_per_day ?? 0, 0, ',', '.') }}<span class="text-xs font-normal text-gray-400">/hari</span></p>
                        </div>

                        <div class="mt-4 flex gap-2 border-t border-gray-100 pt-4">
                            <a href="{{ route('partner.listings.edit', $car) }}" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-center text-sm font-medium text-gray-700 transition hover:bg-gray-50">Edit</a>
                            <form action="{{ route('partner.listings.destroy', $car) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus listing ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-xl border border-red-200 px-4 py-2.5 text-sm font-medium text-red-600 transition hover:bg-red-50">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-full rounded-2xl border border-gray-100 bg-white p-12 text-center shadow-sm">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                <h3 class="mt-4 text-lg font-semibold text-gray-700">Belum Ada Listing</h3>
                <p class="mt-1 text-sm text-gray-500">Mulai tambahkan kendaraan Anda untuk disewakan.</p>
                <a href="{{ route('partner.listings.create') }}" class="mt-4 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-primary-500 to-primary-700 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-primary-200 transition hover:shadow-xl hover:shadow-primary-300">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                    Tambah Listing Pertama
                </a>
            </div>
        @endif
    </div>

    {{-- Pagination --}}
    @if(isset($cars) && $cars->hasPages())
        <div class="flex justify-center">
            {{ $cars->links() }}
        </div>
    @endif

</div>
@endsection
