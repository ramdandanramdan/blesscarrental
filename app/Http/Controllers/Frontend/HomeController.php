<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Car;
use App\Models\Category;
use App\Models\Service;
use App\Models\HomepageSection;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Slider::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $featuredCars = Car::with('category')
            ->where('is_featured', true)
            ->where('is_available', true)
            ->where('status', 'active')
            ->latest()
            ->take(8)
            ->get();

        $popularCars = Car::with('category')
            ->where('is_popular', true)
            ->where('is_available', true)
            ->where('status', 'active')
            ->latest()
            ->take(6)
            ->get();

        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $latestArticles = Article::where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categories = Category::where('is_active', true)
            ->withCount('cars')
            ->orderBy('sort_order')
            ->get();

        $homepage = HomepageSection::getAllGrouped();

        return view('home.index', compact(
            'sliders',
            'featuredCars',
            'popularCars',
            'testimonials',
            'latestArticles',
            'services',
            'categories',
            'homepage',
        ));
    }
}
