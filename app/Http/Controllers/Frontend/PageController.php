<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Service;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        $page = Page::where('slug', 'about')->where('is_published', true)->first();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('about.index', compact('page', 'services'));
    }

    public function contact(): View
    {
        return view('contact.index');
    }

    public function helpCenter(): View
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('help.index', compact('faqs'));
    }

    public function articles(): View
    {
        $articles = Article::where('is_published', true)
            ->latest()
            ->paginate(9);

        $categories = Article::where('is_published', true)
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        $popularArticles = Article::where('is_published', true)
            ->latest()
            ->take(5)
            ->get();

        return view('articles.index', compact('articles', 'categories', 'popularArticles'));
    }

    public function article(string $slug): View
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where(function ($q) use ($article) {
                if ($article->category) {
                    $q->where('category', $article->category);
                }
            })
            ->latest()
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }

    public function services(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('services.index', compact('services'));
    }

    public function show(string $slug): View
    {
        $page = Page::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('help.index', compact('page'));
    }

    public function customerDashboard()
    {
        return view('customer.dashboard', [
            'bookings' => Booking::where('user_id', auth()->id())->latest()->get(),
        ]);
    }

    public function myBookings()
    {
        return view('customer.bookings', [
            'bookings' => Booking::where('user_id', auth()->id())->latest()->paginate(10),
        ]);
    }
}
