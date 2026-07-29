<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $query = Car::with('category');

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('transmission')) {
            $query->where('transmission', $request->transmission);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%");
            });
        }

        $cars = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('admin.cars.index', compact('cars', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('admin.cars.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'model' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:2000', 'max:' . (date('Y') + 2)],
            'transmission' => ['required', 'string', 'max:50'],
            'capacity' => ['required', 'integer', 'min:1'],
            'fuel_type' => ['nullable', 'string', 'max:50'],
            'price_per_day' => ['required', 'numeric', 'min:0'],
            'price_per_week' => ['nullable', 'numeric', 'min:0'],
            'price_per_month' => ['nullable', 'numeric', 'min:0'],
            'discount_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'seat_count' => ['nullable', 'integer', 'min:1'],
            'door_count' => ['nullable', 'integer', 'min:1'],
            'luggage' => ['nullable', 'string', 'max:50'],
            'minimum_rent_days' => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'specifications' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'terms' => ['nullable', 'string'],
            'is_featured' => ['boolean'],
            'is_available' => ['boolean'],
            'is_popular' => ['boolean'],
            'main_image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:5120'],
            'gallery.*' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:5120'],
        ]);

        $validated['slug'] = Str::slug($request->name . '-' . Str::random(4));
        $validated['status'] = $request->status ?? 'active';
        $validated['transmission'] = strtolower($validated['transmission']);

        if ($request->hasFile('main_image')) {
            $validated['main_image'] = $request->file('main_image')->store('cars', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('cars/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        if (isset($validated['specifications']) && is_string($validated['specifications'])) {
            $validated['specifications'] = array_filter(explode("\n", str_replace("\r", "", $validated['specifications'])));
        }

        if (isset($validated['features']) && is_string($validated['features'])) {
            $validated['features'] = array_filter(explode("\n", str_replace("\r", "", $validated['features'])));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_available'] = $request->boolean('is_available');
        $validated['is_popular'] = $request->boolean('is_popular');

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit(Car $car): View
    {
        $categories = Category::all();

        return view('admin.cars.edit', compact('car', 'categories'));
    }

    public function update(Request $request, Car $car): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'model' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:2000', 'max:' . (date('Y') + 2)],
            'transmission' => ['required', 'string', 'max:50'],
            'capacity' => ['required', 'integer', 'min:1'],
            'fuel_type' => ['nullable', 'string', 'max:50'],
            'price_per_day' => ['required', 'numeric', 'min:0'],
            'price_per_week' => ['nullable', 'numeric', 'min:0'],
            'price_per_month' => ['nullable', 'numeric', 'min:0'],
            'discount_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'seat_count' => ['nullable', 'integer', 'min:1'],
            'door_count' => ['nullable', 'integer', 'min:1'],
            'luggage' => ['nullable', 'string', 'max:50'],
            'minimum_rent_days' => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string'],
            'specifications' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'terms' => ['nullable', 'string'],
            'is_featured' => ['boolean'],
            'is_available' => ['boolean'],
            'is_popular' => ['boolean'],
            'main_image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:5120'],
            'gallery.*' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,pdf', 'max:5120'],
        ]);

        $validated['transmission'] = strtolower($validated['transmission']);

        if ($request->hasFile('main_image')) {
            if ($car->main_image) {
                Storage::disk('public')->delete($car->main_image);
            }
            $validated['main_image'] = $request->file('main_image')->store('cars', 'public');
        }

        if ($request->hasFile('gallery')) {
            if (!empty($car->gallery) && is_array($car->gallery)) {
                foreach ($car->gallery as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('cars/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        if (isset($validated['specifications']) && is_string($validated['specifications'])) {
            $validated['specifications'] = array_filter(explode("\n", str_replace("\r", "", $validated['specifications'])));
        }

        if (isset($validated['features']) && is_string($validated['features'])) {
            $validated['features'] = array_filter(explode("\n", str_replace("\r", "", $validated['features'])));
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_available'] = $request->boolean('is_available');
        $validated['is_popular'] = $request->boolean('is_popular');

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy(Car $car): RedirectResponse
    {
        if ($car->main_image) {
            Storage::disk('public')->delete($car->main_image);
        }

        if (!empty($car->gallery) && is_array($car->gallery)) {
            foreach ($car->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
