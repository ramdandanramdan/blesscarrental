<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Category;
use App\Models\Faq;
use App\Models\HomepageSection;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function dashboard(): View
    {
        $user = auth()->user();
        $bookings = Booking::where('user_id', $user->id);

        $stats = [
            'total_bookings' => (clone $bookings)->count(),
            'active_bookings' => (clone $bookings)->whereIn('status', ['pending', 'confirmed', 'active'])->count(),
            'completed_bookings' => (clone $bookings)->where('status', 'completed')->count(),
            'total_spent' => (clone $bookings)->where('status', 'completed')->sum('total_price'),
        ];

        $recentBookings = Booking::where('user_id', $user->id)
            ->with('car')
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact('stats', 'recentBookings'));
    }

    public function bookings(Request $request): View
    {
        $query = Booking::where('user_id', auth()->id())->with('car');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->paginate(10);

        return view('customer.bookings', compact('bookings'));
    }

    public function profile(): View
    {
        return view('customer.profile');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
        ]);

        auth()->user()->update($validated);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($validated['current_password'], auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        auth()->user()->update([
            'password' => $validated['password'],
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    public function home(): View
    {
        $homepage = HomepageSection::getAllGrouped();

        return view('customer.home', compact('homepage'));
    }

    public function about(): View
    {
        $page = Page::where('slug', 'about')->where('is_published', true)->first();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();

        return view('customer.about', compact('page', 'services'));
    }

    public function products(Request $request): View
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

        return view('customer.products', compact('cars', 'categories'));
    }

    public function services(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('customer.services', compact('services'));
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

        return view('customer.articles', compact('articles', 'categories'));
    }

    public function help(): View
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('customer.help', compact('faqs'));
    }

    public function contact(): View
    {
        return view('customer.contact');
    }
}
