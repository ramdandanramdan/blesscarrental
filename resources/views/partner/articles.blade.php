@extends('layouts.user')

@section('title', 'Informasi & Berita - Partner Dashboard')

@section('content')
<div class="space-y-8">

    {{-- Page Header --}}
    <div class="rounded-2xl bg-gradient-to-r from-primary-500 to-primary-600 p-6 text-white shadow-lg" data-aos="fade-up">
        <h1 class="text-2xl font-bold">Informasi & Berita</h1>
        <nav class="flex items-center space-x-2 text-sm text-white/70 mt-1">
            <a href="{{ route('partner.home') }}" class="hover:text-white transition-colors">Home</a>
            <span>/</span>
            <span class="text-white font-medium">Articles</span>
        </nav>
    </div>

    {{-- Category Tabs + Search --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('partner.articles') }}" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ !request('category') ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Semua
                </a>
                <a href="{{ route('partner.articles', ['category' => 'travel']) }}" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'travel' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Travel
                </a>
                <a href="{{ route('partner.articles', ['category' => 'news']) }}" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'news' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Berita
                </a>
                <a href="{{ route('partner.articles', ['category' => 'tips']) }}" class="px-5 py-2 rounded-full text-sm font-medium border transition-all duration-300 {{ request('category') == 'tips' ? 'bg-primary-500 text-white border-primary-500' : 'bg-white text-gray-600 border-gray-200 hover:border-primary-300' }}">
                    Tips
                </a>
            </div>
            <form action="{{ route('partner.articles') }}" method="GET" class="w-full sm:w-auto">
                <div class="relative">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari artikel..." class="w-full sm:w-64 border border-gray-200 rounded-xl pl-9 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-gray-50">
                </div>
            </form>
        </div>
    </div>

    {{-- Articles Grid --}}
    <div class="rounded-2xl bg-white shadow-sm border border-gray-100 p-6">
        @php
            $articles = \App\Models\Article::where('is_published', true)
                ->when(request('category'), function($q) { $q->whereHas('category', function($sq) { $sq->where('slug', request('category')); }); })
                ->when(request('search'), function($q) { $q->where(function($sq) { $sq->where('title', 'like', '%'.request('search').'%')->orWhere('content', 'like', '%'.request('search').'%'); }); })
                ->latest()->paginate(9);
        @endphp
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $i => $article)
                    <div class="bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 group hover:shadow-md transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $i % 3 * 100 }}">
                        <div class="relative h-52 overflow-hidden bg-gray-200">
                            @if($article->image)
                                <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100">
                                    <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                            @endif
                            @if($article->category)
                                <div class="absolute top-4 left-4 bg-primary-500 text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $article->category }}</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-xs text-gray-400 mb-3">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $article->created_at->format('d M Y') }}
                                <span class="mx-2">·</span>
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $article->author ?? 'Admin' }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary-500 transition-colors">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-3 mb-4">{{ Str::limit(strip_tags($article->content), 150) }}</p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="inline-flex items-center text-primary-500 font-semibold text-sm hover:text-primary-600 transition-colors">
                                Baca Selengkapnya <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
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
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum ada artikel</h3>
                <p class="text-gray-500">Belum ada artikel yang tersedia saat ini. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </div>

</div>
@endsection
