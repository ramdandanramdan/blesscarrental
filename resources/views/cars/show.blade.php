@extends('layouts.app')

@section('title', $car->name . ' - Bless Rent Car')
@section('description', 'Sewa ' . $car->name . ' di Bless Rent Car. ' . $car->brand . ' ' . ($car->model_year ?? $car->year ?? '') . ' dengan harga terjangkau. Tersedia transmisi ' . $car->transmission . ', kapasitas ' . $car->capacity . ' kursi.')
@section('og_title', $car->name . ' - Bless Rent Car')
@section('og_description', 'Sewa ' . $car->name . ' dengan harga terbaik. Armada terawat dan bergaransi.')

@push('styles')
<style>
    .gallery-thumb { transition: all 0.3s ease; cursor: pointer; }
    .gallery-thumb:hover, .gallery-thumb.active { border-color: #0ea5e9; opacity: 1; }
    .spec-item { border-bottom: 1px solid #f3f4f6; padding: 12px 0; }
    .feature-item { transition: all 0.3s ease; }
    .feature-item:hover { transform: translateX(4px); }
</style>
@endpush

@section('content')
<section class="page-hero py-6">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-car hero-shape-drift text-primary-200" style="top:5%;right:3%;font-size:4rem;"></i>
        <svg class="absolute bottom-0 left-0 w-full" height="4" viewBox="0 0 1200 4" preserveAspectRatio="none">
            <line x1="0" y1="2" x2="1200" y2="2" stroke="#0ea5e9" stroke-width="2" stroke-dasharray="24 16" class="road-line" />
        </svg>
        <div class="car-drive absolute bottom-0 left-0 text-primary-300/50"><i class="fas fa-car-side"></i></div>
        <div class="dot-float" style="width:6px;height:6px;top:20%;left:15%;animation-delay:0s;"></div>
        <div class="dot-float" style="width:4px;height:4px;top:60%;right:10%;animation-delay:-3s;"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="flex items-center space-x-2 text-sm">
            <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors"><i class="fas fa-home mr-1"></i>Home</a>
            <span class="text-gray-400">/</span>
            <a href="/products" class="text-gray-500 hover:text-primary-500 transition-colors">Products</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-semibold">{{ $car->name }}</span>
        </nav>
    </div>
</section>

<section class="py-8 md:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
            <div x-data="{ activeImage: 0, images: [] }" x-init="images = @json($car->images ?? [asset('images/placeholder.jpg')]); if(images.length === 0) images = ['placeholder']" data-aos="fade-right">
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 mb-4 motion-blur shine-sweep">
                    <div class="aspect-[16/10] bg-gradient-to-br from-primary-50 to-primary-100 flex items-center justify-center">
                        <template x-if="images[0] !== 'placeholder' && images.length > 0">
                            <img :src="images[activeImage].startsWith('http') ? images[activeImage] : '{{ asset('storage/') }}/' + images[activeImage]" alt="{{ $car->name }}" class="w-full h-full object-cover">
                        </template>
                        <template x-if="images.length === 0 || images[0] === 'placeholder'">
                            <div class="text-center p-12">
                                <i class="fas fa-car text-8xl text-primary-300 mb-4"></i>
                                <p class="text-gray-400">Foto tidak tersedia</p>
                            </div>
                        </template>
                    </div>
                    @if($car->discount > 0)
                        <div class="absolute top-4 left-4 bg-red-500 text-white text-sm font-bold px-4 py-1.5 rounded-full shadow-lg">
                            Diskon {{ $car->discount }}%
                        </div>
                    @endif
                    @if(!$car->is_available)
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                            <span class="bg-red-500 text-white font-bold text-lg px-6 py-3 rounded-xl shadow-lg">Tidak Tersedia</span>
                        </div>
                    @endif
                </div>
                <div class="flex space-x-3 overflow-x-auto pb-2" x-show="images.length > 1">
                    <template x-for="(img, idx) in images" :key="idx">
                        <div @click="activeImage = idx" class="gallery-thumb w-20 h-16 rounded-xl overflow-hidden border-2 flex-shrink-0" :class="activeImage === idx ? 'border-primary-500 opacity-100' : 'border-gray-200 opacity-60'">
                            <img :src="img.startsWith('http') ? img : '{{ asset('storage/') }}/' + img" alt="" class="w-full h-full object-cover">
                        </div>
                    </template>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="100">
                <div class="flex items-center space-x-2 mb-2">
                    <span class="inline-flex items-center px-2.5 py-1 bg-primary-50 text-primary-600 text-xs font-medium rounded-full">
                        <i class="fas fa-tag mr-1"></i> {{ $car->type ?? 'Umum' }}
                    </span>
                    <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                        <i class="fas fa-car-side mr-1"></i> {{ $car->transmission }}
                    </span>
                    <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                        <i class="fas fa-users mr-1"></i> {{ $car->capacity }} Kursi
                    </span>
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-1">{{ $car->name }}</h1>
                <p class="text-lg text-gray-500 mb-4">{{ $car->brand }} {{ $car->model_year ?? $car->year ?? '' }}</p>

                <div x-data="{ tab: 'daily' }">
                    <div class="flex bg-gray-100 rounded-xl p-1 mb-4 w-fit">
                        <button @click="tab = 'daily'" :class="tab === 'daily' ? 'bg-white shadow-sm text-primary-600 font-semibold' : 'text-gray-500 hover:text-gray-700'" class="px-5 py-2 rounded-lg text-sm transition-all duration-200">Harian</button>
                        <button @click="tab = 'weekly'" :class="tab === 'weekly' ? 'bg-white shadow-sm text-primary-600 font-semibold' : 'text-gray-500 hover:text-gray-700'" class="px-5 py-2 rounded-lg text-sm transition-all duration-200">Mingguan</button>
                        <button @click="tab = 'monthly'" :class="tab === 'monthly' ? 'bg-white shadow-sm text-primary-600 font-semibold' : 'text-gray-500 hover:text-gray-700'" class="px-5 py-2 rounded-lg text-sm transition-all duration-200">Bulanan</button>
                    </div>
                    <div class="flex items-baseline space-x-2 mb-2">
                        <template x-if="tab === 'daily'">
                            <>
                                @if($car->discount > 0)
                                    <span class="text-lg text-gray-400 line-through">Rp {{ number_format($car->price, 0, ',', '.') }}</span>
                                @endif
                                <span class="text-4xl font-extrabold text-primary-600">Rp {{ number_format($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price, 0, ',', '.') }}</span>
                                <span class="text-gray-500">/ hari</span>
                            </>
                        </template>
                        <template x-if="tab === 'weekly'">
                            <>
                                <span class="text-4xl font-extrabold text-primary-600">Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 6, 0, ',', '.') }}</span>
                                <span class="text-gray-500">/ minggu</span>
                            </>
                        </template>
                        <template x-if="tab === 'monthly'">
                            <>
                                <span class="text-4xl font-extrabold text-primary-600">Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 25, 0, ',', '.') }}</span>
                                <span class="text-gray-500">/ bulan</span>
                            </>
                        </template>
                    </div>
                    <p class="text-sm text-gray-400 mb-6">*Harga belum termasuk biaya tambahan dan asuransi</p>
                </div>

                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 mb-8">
                    <a href="/booking?car={{ $car->slug }}" class="flex-1 text-center px-6 py-4 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold text-base rounded-xl shadow-lg hover:shadow-primary-500/30 transition-all duration-300 transform hover:scale-[1.02]">
                        <i class="fas fa-shopping-cart mr-2"></i> Pesan Mobil Ini
                    </a>
                    <a href="https://wa.me/6281225062153?text=Halo%20Bless%20Rent%20Car,%20saya%20tertarik%20dengan%20{{ urlencode($car->name) }}" target="_blank" class="flex-1 text-center px-6 py-4 bg-green-500 hover:bg-green-600 text-white font-bold text-base rounded-xl shadow-lg hover:shadow-green-500/30 transition-all duration-300 transform hover:scale-[1.02]">
                        <i class="fab fa-whatsapp mr-2"></i> Tanya via WhatsApp
                    </a>
                </div>

                <div class="flex items-center space-x-6 text-sm text-gray-500">
                    @if($car->is_available)
                        <span class="flex items-center text-green-600 font-semibold"><span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span> Tersedia</span>
                    @else
                        <span class="flex items-center text-red-600 font-semibold"><span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span> Tidak Tersedia</span>
                    @endif
                    <span><i class="fas fa-eye text-gray-400 mr-1"></i> {{ $car->views ?? 0 }} dilihat</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Spesifikasi Mobil</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8">
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-car-side text-primary-400 w-5 mr-2"></i> Transmisi</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->transmission }}</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-users text-primary-400 w-5 mr-2"></i> Kapasitas</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->capacity }} Kursi</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-gas-pump text-primary-400 w-5 mr-2"></i> BBM</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->fuel ?? 'Bensin' }}</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-chair text-primary-400 w-5 mr-2"></i> Jumlah Kursi</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->capacity }} Seat</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-door-open text-primary-400 w-5 mr-2"></i> Pintu</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->doors ?? ($car->capacity <= 5 ? 4 : 5) }} Pintu</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-suitcase text-primary-400 w-5 mr-2"></i> Bagasi</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->luggage ?? 'Standar' }}</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-calendar text-primary-400 w-5 mr-2"></i> Tahun</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->model_year ?? $car->year ?? '-' }}</span>
                    </div>
                    <div class="spec-item flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-palette text-primary-400 w-5 mr-2"></i> Warna</span>
                        <span class="font-semibold text-gray-900 text-sm">{{ $car->color ?? 'Putih/Hitam' }}</span>
                    </div>
                </div>

                @if($car->features && is_array($car->features))
                    <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-6" data-aos="fade-up">Fitur & Fasilitas</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        @foreach($car->features as $i => $feature)
                            <div class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 hover-lift" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                                <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-check text-green-500 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-700">{{ $feature }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if($car->description)
                    <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-6">Deskripsi</h2>
                    <div class="prose prose-gray max-w-none">
                        <p class="text-gray-600 leading-relaxed">{{ $car->description }}</p>
                    </div>
                @endif
            </div>

            <div data-aos="fade-left" data-aos-delay="200">
                <div class="bg-gray-50 rounded-2xl p-6 sticky top-24">
                    <h3 class="font-bold text-gray-900 text-lg mb-4">Ringkasan</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Nama Mobil</span>
                            <span class="font-semibold text-gray-900">{{ $car->name }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Merek</span>
                            <span class="font-semibold text-gray-900">{{ $car->brand }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Tipe</span>
                            <span class="font-semibold text-gray-900">{{ $car->type ?? 'Umum' }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Transmisi</span>
                            <span class="font-semibold text-gray-900">{{ $car->transmission }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Kapasitas</span>
                            <span class="font-semibold text-gray-900">{{ $car->capacity }} Orang</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-500">Ketersediaan</span>
                            @if($car->is_available)
                                <span class="font-semibold text-green-600">Tersedia</span>
                            @else
                                <span class="font-semibold text-red-600">Tidak Tersedia</span>
                            @endif
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 mb-6">
                        <div x-data="{ tab: 'daily' }">
                            <div class="flex bg-white rounded-lg p-0.5 border border-gray-200 mb-4 text-sm">
                                <button @click="tab = 'daily'" :class="tab === 'daily' ? 'bg-primary-500 text-white' : 'text-gray-500'" class="flex-1 py-1.5 rounded-md transition-all">Harian</button>
                                <button @click="tab = 'weekly'" :class="tab === 'weekly' ? 'bg-primary-500 text-white' : 'text-gray-500'" class="flex-1 py-1.5 rounded-md transition-all">Mingguan</button>
                                <button @click="tab = 'monthly'" :class="tab === 'monthly' ? 'bg-primary-500 text-white' : 'text-gray-500'" class="flex-1 py-1.5 rounded-md transition-all">Bulanan</button>
                            </div>
                            <div class="text-center">
                                <template x-if="tab === 'daily'">
                                    <div>
                                        <span class="text-2xl font-bold text-primary-600">Rp {{ number_format($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price, 0, ',', '.') }}</span>
                                        <span class="text-gray-500 text-sm">/hari</span>
                                    </div>
                                </template>
                                <template x-if="tab === 'weekly'">
                                    <div>
                                        <span class="text-2xl font-bold text-primary-600">Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 6, 0, ',', '.') }}</span>
                                        <span class="text-gray-500 text-sm">/minggu</span>
                                    </div>
                                </template>
                                <template x-if="tab === 'monthly'">
                                    <div>
                                        <span class="text-2xl font-bold text-primary-600">Rp {{ number_format(($car->discount > 0 ? $car->price - ($car->price * $car->discount / 100) : $car->price) * 25, 0, ',', '.') }}</span>
                                        <span class="text-gray-500 text-sm">/bulan</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="/booking?car={{ $car->slug }}" class="block w-full text-center px-4 py-3.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold rounded-xl transition-all duration-300 shadow-md">
                            <i class="fas fa-shopping-cart mr-2"></i> Pesan Mobil Ini
                        </a>
                        <a href="https://wa.me/6281225062153?text=Halo%20Bless%20Rent%20Car,%20saya%20tertarik%20dengan%20{{ urlencode($car->name) }}" target="_blank" class="block w-full text-center px-4 py-3.5 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl transition-all duration-300 shadow-md">
                            <i class="fab fa-whatsapp mr-2"></i> Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($car->terms)
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Syarat & Ketentuan</h2>
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <div class="prose prose-sm max-w-none text-gray-600">
                {!! nl2br(e($car->terms)) !!}
            </div>
        </div>
    </div>
</section>
@endif

<section class="py-12 md:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Mobil Terkait</h2>
        @php
            $related = \App\Models\Car::where('id', '!=', $car->id)->where(function($q) use ($car) { $q->where('category_id', $car->category_id)->orWhere('brand', $car->brand); })->take(4)->get();
        @endphp
        @if($related->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($related as $rel)
                    <div class="car-card car-card-sm group">
                        <div class="car-card-image-wrap" style="height:160px;">
                            @if($rel->image)
                                <img src="{{ str_starts_with($rel->image, 'http') ? $rel->image : asset('storage/' . $rel->image) }}" alt="{{ $rel->name }}" class="car-card-img">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-200">
                                    <i class="fas fa-car text-4xl text-primary-300/60"></i>
                                </div>
                            @endif
                            <div class="car-card-overlay"></div>
                            <div class="car-card-specs">
                                <span class="car-card-spec"><i class="fas fa-car-side"></i> {{ $rel->transmission }}</span>
                                <span class="car-card-spec"><i class="fas fa-users"></i> {{ $rel->capacity }} kursi</span>
                            </div>
                        </div>
                        <div class="car-card-body">
                            <div class="car-card-header">
                                <h3 class="car-card-title">{{ $rel->name }}</h3>
                            </div>
                            <div class="car-card-price" style="padding:8px 10px;margin-bottom:10px;">
                                <div class="car-card-amount">
                                    <span class="car-card-value">Rp {{ number_format($rel->price, 0, ',', '.') }} <span class="car-card-unit">/hari</span></span>
                                </div>
                            </div>
                            <a href="{{ route('cars.show', $rel->slug) }}" class="car-card-btn-primary" style="padding:8px 12px;font-size:0.8rem;">
                                Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(range(1,4) as $i)
                    <div class="car-card car-card-sm group">
                        <div class="car-card-image-wrap" style="height:160px;">
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-100 to-primary-200">
                                <i class="fas fa-car text-4xl text-primary-300/60"></i>
                            </div>
                            <div class="car-card-overlay"></div>
                            <div class="car-card-specs">
                                <span class="car-card-spec"><i class="fas fa-car-side"></i> Manual</span>
                                <span class="car-card-spec"><i class="fas fa-users"></i> 7 kursi</span>
                            </div>
                        </div>
                        <div class="car-card-body">
                            <div class="car-card-header">
                                <h3 class="car-card-title">Toyota Avanza</h3>
                            </div>
                            <div class="car-card-price" style="padding:8px 10px;margin-bottom:10px;">
                                <div class="car-card-amount">
                                    <span class="car-card-value">Rp 350.000 <span class="car-card-unit">/hari</span></span>
                                </div>
                            </div>
                            <a href="/products" class="car-card-btn-primary" style="padding:8px 12px;font-size:0.8rem;">
                                Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="text-center mt-10">
            <a href="/products" class="inline-flex items-center px-6 py-3 border border-primary-500 text-primary-500 font-semibold rounded-xl hover:bg-primary-50 transition-all duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Produk
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({duration:800,once:true});</script>
@endpush
