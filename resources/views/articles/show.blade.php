@extends('layouts.app')

@section('title', ($article->meta_title ?? $article->title) . ' - Bless Rent Car')
@section('description', $article->meta_description ?? Str::limit(strip_tags($article->content), 160))
@section('og_title', $article->title . ' - Bless Rent Car')
@section('og_description', Str::limit(strip_tags($article->content), 200))
@if($article->image)
    @section('og_image', str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image))
@endif

@push('styles')
<style>
    .article-content h2 { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #111827; }
    .article-content h3 { font-size: 1.25rem; font-weight: 600; margin-top: 1.5rem; margin-bottom: 0.75rem; color: #1f2937; }
    .article-content p { margin-bottom: 1rem; line-height: 1.8; color: #4b5563; }
    .article-content ul, .article-content ol { margin-bottom: 1rem; padding-left: 1.5rem; }
    .article-content li { margin-bottom: 0.5rem; color: #4b5563; }
    .article-content img { border-radius: 12px; margin: 1.5rem 0; max-width: 100%; }
    .article-content blockquote { border-left: 4px solid #0ea5e9; padding-left: 1rem; margin: 1.5rem 0; color: #6b7280; font-style: italic; }
    .article-content a { color: #0ea5e9; text-decoration: underline; }
    .article-content a:hover { color: #0284c7; }
    .share-btn { transition: all 0.3s ease; }
    .share-btn:hover { transform: translateY(-2px); }
</style>
@endpush

@section('content')
<section class="page-hero py-6">
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="hero-radial"></div>
        <div class="hero-radial"></div>
        <i class="fas fa-book-open hero-shape-drift text-primary-200" style="top:5%;right:3%;font-size:3.5rem;"></i>
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
            <a href="/articles" class="text-gray-500 hover:text-primary-500 transition-colors">Articles</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900 font-semibold truncate max-w-[200px]">{{ $article->title }}</span>
        </nav>
    </div>
</section>

<article class="py-10 md:py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($article->image)
            <div class="rounded-2xl overflow-hidden shadow-sm mb-10">
                <img src="{{ str_starts_with($article->image, 'http') ? $article->image : asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover max-h-[500px]">
            </div>
        @endif

        <div class="bg-white rounded-2xl p-6 md:p-10 shadow-sm border border-gray-100" data-aos="fade-up">
            <div class="mb-8">
                @if($article->category)
                    <span class="inline-block bg-primary-500 text-white text-xs font-semibold px-3 py-1 rounded-full mb-4">{{ $article->category }}</span>
                @endif
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-4">{{ $article->title }}</h1>
                <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                    <span><i class="far fa-user text-primary-400 mr-1"></i> {{ $article->author ?? 'Admin' }}</span>
                    <span><i class="far fa-calendar text-primary-400 mr-1"></i> {{ $article->created_at->format('d F Y') }}</span>
                    <span><i class="far fa-clock text-primary-400 mr-1"></i> {{ $article->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <div class="article-content">
                {!! $article->content !!}
            </div>

            <div class="border-t border-gray-100 mt-10 pt-8">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <span class="text-sm text-gray-500 font-medium">Bagikan artikel ini:</span>
                        <div class="flex items-center space-x-2 mt-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="share-btn w-10 h-10 bg-sky-100 text-sky-500 rounded-xl flex items-center justify-center hover:bg-sky-500 hover:text-white transition-all">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" class="share-btn w-10 h-10 bg-green-100 text-green-600 rounded-xl flex items-center justify-center hover:bg-green-600 hover:text-white transition-all">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href);this.innerHTML='<i class=\'fas fa-check\'></i>';setTimeout(()=>this.innerHTML='<i class=\'fas fa-link\'></i>',2000)" class="share-btn w-10 h-10 bg-gray-100 text-gray-600 rounded-xl flex items-center justify-center hover:bg-gray-800 hover:text-white transition-all">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>
                    <a href="/articles" class="inline-flex items-center px-5 py-2.5 border border-primary-500 text-primary-500 font-medium rounded-xl hover:bg-primary-50 transition-all duration-300 text-sm">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Artikel
                    </a>
                </div>
            </div>
        </div>

        @php
            $related = \App\Models\Article::where('is_published', true)->where('id', '!=', $article->id)->where(function($q) use ($article) { if($article->category) $q->where('category', $article->category); })->latest()->take(3)->get();
        @endphp
        @if($related->count() > 0)
            <div class="mt-16" data-aos="fade-up">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($related as $i => $rel)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group hover-lift" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="relative h-44 overflow-hidden bg-gray-200">
                                @if($rel->image)
                                    <img src="{{ str_starts_with($rel->image, 'http') ? $rel->image : asset('storage/' . $rel->image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100">
                                        <i class="fas fa-newspaper text-4xl text-primary-300"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <div class="text-xs text-gray-400 mb-2"><i class="far fa-calendar mr-1"></i> {{ $rel->created_at->format('d M Y') }}</div>
                                <h3 class="font-bold text-gray-900 text-sm mb-2 line-clamp-2 group-hover:text-primary-500 transition-colors">{{ $rel->title }}</h3>
                                <a href="{{ route('articles.show', $rel->slug) }}" class="text-xs text-primary-500 font-semibold hover:text-primary-600">Baca <i class="fas fa-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection

@push('scripts')
<script>AOS.init({duration:800,once:true});</script>
@endpush
