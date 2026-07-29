@extends('layouts.user')

@section('title', 'Informasi & Berita - Dashboard')

@push('styles')
<style>
    .category-tab { transition: all 0.3s ease; }
    .category-tab.active { background: #0ea5e9; color: white; border-color: #0ea5e9; }
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
            <h1 class="text-2xl md:text-3xl font-bold mb-2">Informasi & Berita</h1>
            <p class="text-white/80 text-sm">Temukan informasi, tips, dan berita terbaru seputar rental mobil dan perjalanan.</p>
            <nav class="flex items-center space-x-2 text-sm mt-3 text-white/60">
                <a href="{{ route('customer.home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-white font-medium">Artikel</span>
            </nav>
        </div>
    </div>
</div>

<section class="py-5 bg-white rounded-2xl shadow-sm border border-gray-100 mb-6" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('customer.articles') }}" class="px-4 py-1.5 rounded-full text-xs font-medium border transition-all duration-300 {{ !request('category') ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Semua
                </a>
                <a href="{{ route('customer.articles') }}?category=travel" class="px-4 py-1.5 rounded-full text-xs font-medium border transition-all duration-300 {{ request('category') == 'travel' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Travel
                </a>
                <a href="{{ route('customer.articles') }}?category=news" class="px-4 py-1.5 rounded-full text-xs font-medium border transition-all duration-300 {{ request('category') == 'news' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Berita
                </a>
                <a href="{{ route('customer.articles') }}?category=tips" class="px-4 py-1.5 rounded-full text-xs font-medium border transition-all duration-300 {{ request('category') == 'tips' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Tips
                </a>
            </div>
            <form action="{{ route('customer.articles') }}" method="GET" class="w-full sm:w-auto">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="w-full sm:w-64 border border-gray-200 rounded-xl pl-9 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                </div>
            </form>
        </div>
    </div>
</section>

<section class="py-6">
    <div class="max-w-7xl mx-auto px-0">
        @php
            $articles = \App\Models\Article::where('is_published', true)
                ->when(request('category'), function($q) { $q->whereHas('category', function($sq) { $sq->where('slug', request('category')); }); })
                ->when(request('search'), function($q) { $q->where(function($sq) { $sq->where('title', 'like', '%'.request('search').'%')->orWhere('content', 'like', '%'.request('search').'%'); }); })
                ->latest()->paginate(9);
        @endphp
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $i => $article)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                        <div class="relative h-44 overflow-hidden bg-gray-200">
                            @if($article->image)
                                <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100">
                                    <i class="fas fa-newspaper text-4xl text-primary-300"></i>
                                </div>
                            @endif
                            @if($article->category)
                                <div class="absolute top-3 left-3 bg-primary-500 text-white text-[10px] font-semibold px-2.5 py-1 rounded-full">{{ $article->category }}</div>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="flex items-center text-[11px] text-gray-400 mb-2">
                                <i class="far fa-calendar mr-1"></i> {{ $article->created_at->format('d M Y') }}
                                <span class="mx-1.5">·</span>
                                <i class="far fa-user mr-1"></i> {{ $article->author ?? 'Admin' }}
                            </div>
                            <h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-500 transition-colors">{{ $article->title }}</h3>
                            <p class="text-xs text-gray-500 line-clamp-3 mb-3">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $articles->links('vendor.pagination.tailwind') }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-5">
                    <i class="fas fa-newspaper text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500 text-sm">Belum ada artikel yang tersedia saat ini. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection
