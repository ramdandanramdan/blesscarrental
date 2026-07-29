@extends('layouts.app')

@section('title', 'Informasi & Berita - Bless Rent Car')
@section('description', 'Baca artikel, tips, dan berita terbaru seputar rental mobil dan perjalanan dari Bless Rent Car.')
@section('og_title', 'Informasi & Berita - Bless Rent Car')
@section('og_description', 'Artikel dan berita terbaru seputar rental mobil dan perjalanan.')

@push('styles')
<style>
    .category-tab { transition: all 0.3s ease; }
    .category-tab.active { background: #0ea5e9; color: white; border-color: #0ea5e9; }
</style>
@endpush

@section('content')
<section class="page-hero py-16 md:py-24">
    <div class="absolute inset-0 overflow-hidden pointer-events-none wind-lines">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-newspaper hero-shape-drift text-primary-200" style="top:10%;right:5%;font-size:5rem;"></i>
        <i class="fas fa-pen-fancy hero-shape-drift text-primary-200" style="bottom:15%;left:5%;font-size:5rem;animation-delay:-7s;"></i>
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10" data-aos="fade-up">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Informasi & Berita</h1>
        <nav class="inline-flex items-center space-x-2 text-sm">
            <a href="/" class="text-gray-500 hover:text-primary-500 transition-colors">Home</a>
            <span class="text-gray-300">/</span>
            <span class="text-primary-600 font-semibold">Articles</span>
        </nav>
        <p class="text-gray-500 mt-4 max-w-2xl mx-auto">Temukan informasi, tips, dan berita terbaru seputar rental mobil dan perjalanan.</p>
    </div>
</section>

<section class="py-10 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-2">
                <a href="/articles" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ !request('category') ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Semua
                </a>
                <a href="/articles?category=travel" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'travel' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Travel
                </a>
                <a href="/articles?category=news" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'news' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Berita
                </a>
                <a href="/articles?category=tips" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'tips' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Tips
                </a>
            </div>
            <form action="/articles" method="GET" class="w-full sm:w-auto">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="w-full sm:w-64 border border-gray-200 rounded-xl pl-9 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                </div>
            </form>
        </div>
    </div>
</section>

<section class="py-12 md:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $articles = \App\Models\Article::where('is_published', true)
                ->when(request('category'), function($q) { $q->whereHas('category', function($sq) { $sq->where('slug', request('category')); }); })
                ->when(request('search'), function($q) { $q->where(function($sq) { $sq->where('title', 'like', '%'.request('search').'%')->orWhere('content', 'like', '%'.request('search').'%'); }); })
                ->latest()->paginate(9);
        @endphp
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $i => $article)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group hover-lift" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                        <div class="relative h-52 overflow-hidden bg-gray-200">
                            @if($article->image)
                                <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100">
                                    <i class="fas fa-newspaper text-5xl text-primary-300"></i>
                                </div>
                            @endif
                            @if($article->category)
                                <div class="absolute top-4 left-4 bg-primary-500 text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $article->category }}</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-xs text-gray-400 mb-3">
                                <i class="far fa-calendar mr-1"></i> {{ $article->created_at->format('d M Y') }}
                                <span class="mx-2">·</span>
                                <i class="far fa-user mr-1"></i> {{ $article->author ?? 'Admin' }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-500 transition-colors">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-3 mb-4">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $articles->links('vendor.pagination.tailwind') }}
            </div>
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-newspaper text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500">Belum ada artikel yang tersedia saat ini. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>AOS.init({duration:800,once:true});</script>
@endpush
