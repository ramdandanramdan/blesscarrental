<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $query = Car::with('category')
            ->where('is_available', true)
            ->where('status', 'active');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('categories') && is_array($request->categories)) {
            $catSlugs = $request->categories;
            $catIds = Category::whereIn('slug', $catSlugs)->pluck('id');
            if ($catIds->isNotEmpty()) {
                $query->whereIn('category_id', $catIds);
            }
        }

        if ($request->filled('transmission')) {
            $trans = $request->transmission;
            if (in_array(strtolower($trans), ['matic', 'automatic', 'auto'])) {
                $query->whereRaw('LOWER(transmission) IN (?, ?, ?)', ['automatic', 'matic', 'auto']);
            } else {
                $query->whereRaw('LOWER(transmission) = ?', [strtolower($trans)]);
            }
        }

        if ($request->filled('capacities') && is_array($request->capacities)) {
            $query->where(function ($q) use ($request) {
                foreach ($request->capacities as $cap) {
                    if ($cap === '15+') {
                        $q->orWhere('capacity', '>=', 15);
                    } else {
                        $q->orWhere('capacity', '>=', (int) $cap);
                    }
                }
            });
        }

        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price_per_day');
                break;
            case 'price_desc':
                $query->orderByDesc('price_per_day');
                break;
            case 'name':
                $query->orderBy('name');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $cars = $query->paginate(12)->withQueryString();
        $categories = Category::where('is_active', true)->get();
        $brands = Car::where('is_available', true)->where('status', 'active')->select('brand')->distinct()->pluck('brand');
        $fuelTypes = Car::where('is_available', true)->where('status', 'active')->select('fuel_type')->distinct()->pluck('fuel_type');

        return view('cars.index', compact('cars', 'categories', 'brands', 'fuelTypes'));
    }

    public function show(string $slug): View
    {
        $car = Car::with('category')
            ->where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $relatedCars = Car::with('category')
            ->where('category_id', $car->category_id)
            ->where('id', '!=', $car->id)
            ->where('is_available', true)
            ->where('status', 'active')
            ->latest()
            ->take(4)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }
}
