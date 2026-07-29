@extends('layouts.app')

@section('title', 'Armada & Layanan - Bless Rent Car')
@section('description', 'Lihat koleksi lengkap armada rental mobil Bless Rent Car. Tersedia berbagai pilihan mobil berkualitas dengan harga terbaik.')
@section('og_title', 'Armada & Layanan - Bless Rent Car')
@section('og_description', 'Koleksi lengkap armada rental mobil berkualitas.')

@push('styles')
<style>
    .filter-sidebar { position: sticky; top: 100px; }
    .price-tab { transition: all 0.3s ease; }
    .price-tab.active { background: #0ea5e9; color: white; }
    .custom-checkbox { width: 18px; height: 18px; border-radius: 4px; accent-color: #0ea5e9; }
</style>
@endpush

@section('content')
<section class="page-hero py-16 md:py-24">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-truck hero-shape-drift text-primary-200" style="top:10%;left:3%;font-size:6rem;"></i>
        <i class="fas fa-car hero-shape-drift text-primary-200" style="bottom:15%;right:5%;font-size:5rem;animation-delay:-7s;"></i>
        <svg class="absolute bottom-0 left-0 w-full" height="4" viewBox="0 0 1200 4" preserveAspectRatio="none">
            <line x1="0" y1="2" x2="1200" y2="2" stroke="#0ea5e9" stroke-width="2" stroke-dasharray="24 16" class="road-line" />
        </svg>
        <div class="car-drive absolute bottom-0 left-0 text-primary-300/50"><i class="fas fa-car-side"></i></div>
        <div class="dot-float" style="width:8px;height:8px;top:12%;left:6%;animation-delay:0s;"></div>
        <div class="dot-float" style="width:5px;height:5px;top:30%;right:20%;animation-delay:-1.5s;"></div>
        <div class="dot-float" style="width:10px;height:10px;top:55%;left:40%;animation-delay:-3s;"></div>
        <div class="dot-float" style="width:4px;height:4px;top:75%;right:10%;animation-delay:-4.5s;"></div>
        <div class="dot-float" style="width:6px;height:6px;top:40%;left:70%;animation-delay:-6s;"></div>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 scroll-indicator"><i class="fas fa-chevron-down text-primary-300 text-xl"></i></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Armada & Layanan</h1>
            <nav class="inline-flex items-center space-x-2 text-sm">
                <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
                <span class="text-gray-300">/</span>
                <span class="text-primary-600 font-semibold">Products</span>
            </nav>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Temukan mobil terbaik untuk perjalanan Anda. Lengkap dengan berbagai pilihan sesuai kebutuhan.</p>
        </div>
    </div>
</section>

<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:hidden mb-4">
            <button x-data @click="document.getElementById('filterSidebar').classList.toggle('hidden')" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-white rounded-xl shadow-sm border border-gray-200 text-gray-700 font-medium">
                <i class="fas fa-filter"></i>
                <span>Filter Pencarian</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <div id="filterSidebar" class="hidden lg:block w-full lg:w-72 flex-shrink-0" data-aos="fade-right">
                <div class="filter-sidebar bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-6">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-bold text-gray-900">Filter</h3>
                            <a href="/products" class="text-xs text-primary-500 hover:text-primary-600 font-medium">Reset</a>
                        </div>
                        <form action="/products" method="GET" id="filterForm">
                            <div class="space-y-6">
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
                                <a href="/products" class="block w-full text-center px-4 py-2.5 border border-gray-200 text-gray-600 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 text-sm">
                                    <i class="fas fa-undo mr-1"></i> Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="flex-1 min-w-0">
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
                            <div class="car-card group" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                                <div class="car-card-image-wrap">
                                    @if($car->main_image)
                                        <img src="{{ str_starts_with($car->main_image, 'http') ? $car->main_image : asset('storage/' . $car->main_image) }}" alt="{{ $car->name }}" class="car-card-img">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-200">
                                            <i class="fas fa-car text-5xl text-primary-300/60"></i>
                                        </div>
                                    @endif
                                    <div class="car-card-overlay"></div>
                                    @if($car->discount > 0)
                                        <div class="car-card-badge discount">-{{ $car->discount }}%</div>
                                    @endif
                                    @if($car->is_featured)
                                        <div class="car-card-badge featured">Featured</div>
                                    @endif
                                    <div class="car-card-specs">
                                        <span class="car-card-spec"><i class="fas fa-car-side"></i> {{ $car->transmission }}</span>
                                        <span class="car-card-spec"><i class="fas fa-users"></i> {{ $car->capacity }} Kursi</span>
                                        <span class="car-card-spec"><i class="fas fa-gas-pump"></i> {{ $car->fuel ?? 'Bensin' }}</span>
                                        <span class="car-card-spec"><i class="fas fa-door-open"></i> {{ $car->doors ?? 4 }} Pintu</span>
                                    </div>
                                    @if(!$car->is_available)
                                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center z-10">
                                            <span class="bg-red-500/90 text-white font-bold px-5 py-2.5 rounded-xl backdrop-blur-sm">Tidak Tersedia</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="car-card-body">
                                    <div class="car-card-header">
                                        <div class="flex items-center justify-between gap-2 mb-1">
                                            <h3 class="car-card-title">{{ $car->name }}</h3>
                                            <div class="flex items-center gap-1.5">
                                                @if($car->type)
                                                    <span class="car-card-type">{{ $car->type }}</span>
                                                @endif
                                                @if($car->is_available)
                                                    <span class="car-card-status available"></span>
                                                @else
                                                    <span class="car-card-status unavailable"></span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="car-card-subtitle">{{ $car->brand }} &middot; {{ $car->model_year ?? $car->year ?? '-' }}</p>
                                    </div>
                                    <div class="fuel-gauge mb-3"></div>
                                    @if($car->features && is_array($car->features) && count($car->features) > 0)
                                        <div class="flex flex-wrap gap-1.5 mb-3">
                                            @foreach(array_slice($car->features, 0, 2) as $feature)
                                                <span class="car-card-feature">{{ $feature }}</span>
                                            @endforeach
                                            @if(count($car->features) > 2)
                                                <span class="car-card-feature-more">+{{ count($car->features) - 2 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="car-card-price" x-data="{ tab: 'daily' }">
                                        <div class="car-card-tabs">
                                            <button @click="tab = 'daily'" :class="tab === 'daily' ? 'active' : ''" class="car-card-tab">Harian</button>
                                            <button @click="tab = 'weekly'" :class="tab === 'weekly' ? 'active' : ''" class="car-card-tab">Mingguan</button>
                                            <button @click="tab = 'monthly'" :class="tab === 'monthly' ? 'active' : ''" class="car-card-tab">Bulanan</button>
                                        </div>
                                        <div class="car-card-amount">
                                            <template x-if="tab === 'daily'">
                                                <span class="car-card-value">
                                                    @if($car->discount > 0)
                                                        <span class="car-card-old">Rp {{ number_format($car->price, 0, ',', '.') }}</span>
                                                    @endif
                                                    Rp {{ number_format($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price, 0, ',', '.') }}
                                                    <span class="car-card-unit">/hari</span>
                                                </span>
                                            </template>
                                            <template x-if="tab === 'weekly'">
                                                <span class="car-card-value">
                                                    Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 6, 0, ',', '.') }}
                                                    <span class="car-card-unit">/minggu</span>
                                                </span>
                                            </template>
                                            <template x-if="tab === 'monthly'">
                                                <span class="car-card-value">
                                                    Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 25, 0, ',', '.') }}
                                                    <span class="car-card-unit">/bulan</span>
                                                </span>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="car-card-actions">
                                        <a href="/booking?car={{ $car->slug }}" class="car-card-btn-primary">
                                            <i class="fas fa-calendar-check mr-1.5"></i> Sewa Sekarang
                                        </a>
                                        <a href="{{ route('cars.show', $car->slug) }}" class="car-card-btn-secondary">
                                            <i class="fas fa-info-circle mr-1"></i> Detail
                                        </a>
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
                            <i class="fas fa-car text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada armada tersedia</h3>
                        <p class="text-gray-500 mb-6">Saat ini belum ada mobil yang sesuai dengan kriteria pencarian Anda.</p>
                        <a href="/products" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-md">
                            <i class="fas fa-undo mr-2"></i> Reset Filter
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({duration:800,once:true});</script>
@endpush
