@extends('layouts.user')

@section('title', 'Produk & Armada - Partner Dashboard')

@push('styles')
<style>
    .filter-sidebar { position: sticky; top: 100px; }
    .custom-checkbox { width: 18px; height: 18px; border-radius: 4px; accent-color: #0ea5e9; }
</style>
@endpush

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Produk & Armada</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Products</span>
        </nav>
    </div>

    {{-- Filter + Grid --}}
    <div class="flex flex-col lg:flex-row gap-8">
        {{-- Filter Sidebar --}}
        <div class="lg:hidden">
            <button x-data @click="document.getElementById('filterSidebar').classList.toggle('hidden')" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-white rounded-xl shadow-sm border border-gray-200 text-gray-700 font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                <span>Filter Pencarian</span>
            </button>
        </div>

        <div id="filterSidebar" class="hidden lg:block w-full lg:w-72 flex-shrink-0" data-aos="fade-right">
            <div class="filter-sidebar bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-6">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900">Filter</h3>
                        <a href="{{ route('partner.products') }}" class="text-xs text-primary-500 hover:text-primary-600 font-medium">Reset</a>
                    </div>
                    <form action="{{ route('partner.products') }}" method="GET" id="filterForm">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    Cari Mobil
                                </label>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama mobil / brand..." class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    Kategori
                                </label>
                                <div class="space-y-2">
                                    @foreach($categories as $cat)
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="checkbox" name="categories[]" value="{{ $cat->slug }}" {{ in_array($cat->slug, (array)request('categories', [])) ? 'checked' : '' }} class="custom-checkbox">
                                            <span class="text-sm text-gray-600">{{ $cat->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                                    Transmisi
                                </label>
                                <div class="space-y-2">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="transmission" value="Manual" {{ request('transmission') == 'Manual' ? 'checked' : '' }} class="custom-checkbox">
                                        <span class="text-sm text-gray-600">Manual</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="transmission" value="Matic" {{ request('transmission') == 'Matic' ? 'checked' : '' }} class="custom-checkbox">
                                        <span class="text-sm text-gray-600">Matic</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="transmission" value="" {{ !request('transmission') ? 'checked' : '' }} class="custom-checkbox">
                                        <span class="text-sm text-gray-600">Semua</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    Kapasitas
                                </label>
                                <div class="space-y-2">
                                    @foreach(['4', '6', '7', '15+'] as $cap)
                                        <label class="flex items-center space-x-2 cursor-pointer">
                                            <input type="checkbox" name="capacities[]" value="{{ $cap }}" {{ in_array($cap, (array)request('capacities', [])) ? 'checked' : '' }} class="custom-checkbox">
                                            <span class="text-sm text-gray-600">{{ $cap }} Kursi</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <svg class="w-4 h-4 text-primary-500 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Rentang Harga
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                </div>
                            </div>
                            <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold py-3 rounded-xl transition-all duration-300 shadow-md text-sm">
                                <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                                Terapkan Filter
                            </button>
                            <a href="{{ route('partner.products') }}" class="block w-full text-center px-4 py-2.5 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 text-sm">
                                Reset Filter
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Car Grid --}}
        <div class="flex-1 min-w-0">
            <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-sm text-gray-500">Menampilkan <span class="font-semibold text-gray-900">{{ $cars->total() }}</span> armada</p>
                    <div class="flex items-center space-x-2">
                        <label class="text-sm text-gray-500 hidden sm:inline">Urutkan:</label>
                        <select name="sort" form="filterForm" class="border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 bg-white" onchange="this.form.submit()">
                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                        </select>
                    </div>
                </div>

                @if($cars->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($cars as $i => $car)
                            <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                                <div class="relative h-48 overflow-hidden bg-gray-200">
                                    @if($car->main_image)
                                        <img src="{{ str_starts_with($car->main_image, 'http') ? $car->main_image : asset('storage/' . $car->main_image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-200">
                                            <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                                        </div>
                                    @endif
                                    @if($car->discount > 0)
                                        <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg">-{{ $car->discount }}%</div>
                                    @endif
                                    @if($car->is_featured)
                                        <div class="absolute top-3 right-3 bg-primary-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg">Featured</div>
                                    @endif
                                    @if(!$car->is_available)
                                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                                            <span class="bg-red-500/90 text-white font-bold px-5 py-2.5 rounded-xl backdrop-blur-sm">Tidak Tersedia</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <div class="flex items-center justify-between gap-2 mb-1">
                                        <h3 class="font-bold text-gray-900 text-base">{{ $car->name }}</h3>
                                        <span class="text-xs px-2 py-0.5 rounded-full {{ $car->is_available ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $car->is_available ? 'Tersedia' : 'Disewa' }}</span>
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">{{ $car->brand }} &middot; {{ $car->model_year ?? $car->year ?? '-' }}</p>
                                    <div class="flex flex-wrap gap-1.5 mb-3 text-xs text-gray-500">
                                        <span class="px-2 py-1 bg-white rounded-md border border-gray-100">{{ $car->transmission }}</span>
                                        <span class="px-2 py-1 bg-white rounded-md border border-gray-100">{{ $car->capacity }} Kursi</span>
                                        <span class="px-2 py-1 bg-white rounded-md border border-gray-100">{{ $car->fuel ?? 'Bensin' }}</span>
                                    </div>
                                    <div class="border-t border-gray-100 pt-3 mt-3">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                @if($car->discount > 0)
                                                    <span class="text-xs text-gray-400 line-through">Rp {{ number_format($car->price, 0, ',', '.') }}</span>
                                                @endif
                                                <p class="text-lg font-bold text-primary-600">Rp {{ number_format($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price, 0, ',', '.') }}<span class="text-xs font-normal text-gray-500">/hari</span></p>
                                            </div>
                                            <a href="{{ route('cars.show', $car->slug) }}" class="px-4 py-2 bg-primary-50 text-primary-600 text-sm font-semibold rounded-lg hover:bg-primary-100 transition-colors">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-10">
                        {{ $cars->links('vendor.pagination.tailwind') }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 17h.01M16 17h.01M3 11l1.5-4.5A2 2 0 016.4 5h11.2a2 2 0 011.9 1.5L21 11M3 11h18M3 11v6a1 1 0 001 1h1a1 1 0 001-1v-1h12v1a1 1 0 001 1h1a1 1 0 001-1v-6"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada armada tersedia</h3>
                        <p class="text-gray-500 mb-6">Saat ini belum ada mobil yang sesuai dengan kriteria pencarian Anda.</p>
                        <a href="{{ route('partner.products') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                            Reset Filter
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
