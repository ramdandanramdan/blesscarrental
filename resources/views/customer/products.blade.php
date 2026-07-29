@extends('layouts.user')

@section('title', 'Produk & Armada - Dashboard')

@push('styles')
<style>
    .filter-sidebar { position: sticky; top: 100px; }
    .price-tab { transition: all 0.3s ease; }
    .price-tab.active { background: #0ea5e9; color: white; }
    .custom-checkbox { width: 18px; height: 18px; border-radius: 4px; accent-color: #0ea5e9; }
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
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Produk & Armada</h1>
            <p class="text-white/80 text-sm">Temukan mobil terbaik untuk perjalanan Anda.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Produk & Armada</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-6">
    <div class="lg:hidden mb-4">
        <button x-data @click="document.getElementById('filterSidebar').classList.toggle('hidden')" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-white rounded-xl shadow-sm border border-gray-200 text-gray-700 font-medium">
            <i class="fas fa-filter"></i>
            <span>Filter Pencarian</span>
            <i class="fas fa-chevron-down text-xs"></i>
        </button>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
        <div id="filterSidebar" class="hidden lg:block w-full lg:w-72 flex-shrink-0" data-aos="fade-right">
            <div class="filter-sidebar bg-white rounded-2xl shadow-sm border border-gray-100 p-5 space-y-5">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900">Filter</h3>
                        <a href="{{ route('customer.products') }}" class="text-xs text-primary-500 hover:text-primary-600 font-medium">Reset</a>
                    </div>
                    <form action="{{ route('customer.products') }}" method="GET" id="filterForm">
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-search text-primary-500 mr-1"></i> Cari Mobil
                                </label>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama mobil / brand..." class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="fas fa-tag text-primary-500 mr-1"></i> Kategori
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
                                    <i class="fas fa-car-side text-primary-500 mr-1"></i> Transmisi
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
                                    <i class="fas fa-users text-primary-500 mr-1"></i> Kapasitas
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
                                    <i class="fas fa-dollar-sign text-primary-500 mr-1"></i> Rentang Harga
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold py-3 rounded-xl transition-all duration-300 shadow-md text-sm">
                                <i class="fas fa-filter mr-1"></i> Terapkan Filter
                            </button>
                            <a href="{{ route('customer.products') }}" class="block w-full text-center px-4 py-2.5 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 text-sm">
                                <i class="fas fa-undo mr-1"></i> Reset Filter
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1 min-w-0">
            <div class="flex items-center justify-between mb-5">
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
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach($cars as $i => $car)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                            <div class="relative h-44 overflow-hidden bg-gray-200">
                                @if($car->main_image)
                                    <img src="{{ str_starts_with($car->main_image, 'http') ? $car->main_image : asset('storage/' . $car->main_image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-200">
                                        <i class="fas fa-car text-4xl text-primary-300/60"></i>
                                    </div>
                                @endif
                                @if($car->discount > 0)
                                    <div class="absolute top-3 left-3 bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg">-{{ $car->discount }}%</div>
                                @endif
                                @if($car->is_featured)
                                    <div class="absolute top-3 right-3 bg-accent-500 text-white text-xs font-bold px-2.5 py-1 rounded-lg">Featured</div>
                                @endif
                                @if(!$car->is_available)
                                    <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-10">
                                        <span class="bg-red-500/90 text-white font-bold px-4 py-2 rounded-xl backdrop-blur-sm text-sm">Tidak Tersedia</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <div class="flex items-center justify-between gap-2 mb-1">
                                    <h3 class="font-bold text-gray-900 text-sm">{{ $car->name }}</h3>
                                    <div class="flex items-center gap-1.5">
                                        @if($car->type)
                                            <span class="text-[10px] font-semibold bg-primary-50 text-primary-600 px-2 py-0.5 rounded-md">{{ $car->type }}</span>
                                        @endif
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mb-2">{{ $car->brand }} &middot; {{ $car->model_year ?? $car->year ?? '-' }}</p>
                                <div class="flex flex-wrap gap-1.5 mb-3">
                                    <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md"><i class="fas fa-car-side mr-1 text-primary-400"></i>{{ $car->transmission }}</span>
                                    <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md"><i class="fas fa-users mr-1 text-primary-400"></i>{{ $car->capacity }}</span>
                                    <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded-md"><i class="fas fa-gas-pump mr-1 text-primary-400"></i>{{ $car->fuel ?? 'Bensin' }}</span>
                                </div>
                                @if($car->features && is_array($car->features) && count($car->features) > 0)
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach(array_slice($car->features, 0, 2) as $feature)
                                            <span class="text-[10px] bg-primary-50 text-primary-600 px-2 py-0.5 rounded-md">{{ $feature }}</span>
                                        @endforeach
                                        @if(count($car->features) > 2)
                                            <span class="text-[10px] bg-primary-50 text-primary-600 px-2 py-0.5 rounded-md">+{{ count($car->features) - 2 }}</span>
                                        @endif
                                    </div>
                                @endif
                                <div class="border-t border-gray-100 pt-3 mt-3" x-data="{ tab: 'daily' }">
                                    <div class="flex space-x-1 mb-2">
                                        <button @click="tab = 'daily'" :class="tab === 'daily' ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-600'" class="text-[10px] font-semibold px-3 py-1 rounded-md transition-all">Harian</button>
                                        <button @click="tab = 'weekly'" :class="tab === 'weekly' ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-600'" class="text-[10px] font-semibold px-3 py-1 rounded-md transition-all">Mingguan</button>
                                        <button @click="tab = 'monthly'" :class="tab === 'monthly' ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-600'" class="text-[10px] font-semibold px-3 py-1 rounded-md transition-all">Bulanan</button>
                                    </div>
                                    <div class="text-lg font-bold text-primary-600">
                                        <template x-if="tab === 'daily'">
                                            <span>
                                                @if($car->discount > 0)
                                                    <span class="text-xs text-gray-400 line-through font-normal mr-1">Rp {{ number_format($car->price, 0, ',', '.') }}</span>
                                                @endif
                                                Rp {{ number_format($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price, 0, ',', '.') }}
                                                <span class="text-xs text-gray-400 font-normal">/hari</span>
                                            </span>
                                        </template>
                                        <template x-if="tab === 'weekly'">
                                            <span>
                                                Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 6, 0, ',', '.') }}
                                                <span class="text-xs text-gray-400 font-normal">/minggu</span>
                                            </span>
                                        </template>
                                        <template x-if="tab === 'monthly'">
                                            <span>
                                                Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 25, 0, ',', '.') }}
                                                <span class="text-xs text-gray-400 font-normal">/bulan</span>
                                            </span>
                                        </template>
                                    </div>
                                </div>
                                <div class="flex space-x-2 mt-3">
                                    <a href="{{ route('customer.bookings') }}?car={{ $car->slug }}" class="flex-1 text-center bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold py-2.5 rounded-xl transition-all duration-300 shadow-md text-xs">
                                        <i class="fas fa-calendar-check mr-1"></i> Sewa
                                    </a>
                                    <a href="{{ route('cars.show', $car->slug) }}" class="flex-1 text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 rounded-xl transition-all duration-300 text-xs">
                                        <i class="fas fa-info-circle mr-1"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $cars->links('vendor.pagination.tailwind') }}
                </div>
            @else
                <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-5">
                        <i class="fas fa-car text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada armada tersedia</h3>
                    <p class="text-gray-500 mb-5 text-sm">Saat ini belum ada mobil yang sesuai dengan kriteria pencarian Anda.</p>
                    <a href="{{ route('customer.products') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-md text-sm">
                        <i class="fas fa-undo mr-2"></i> Reset Filter
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
