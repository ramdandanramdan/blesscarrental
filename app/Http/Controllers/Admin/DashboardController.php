<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalCars = Car::count();
        $totalAvailableCars = Car::where('is_available', true)->count();
        $totalBookings = Booking::count();
        $totalPendingBookings = Booking::where('status', 'pending')->count();
        $totalConfirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalCompletedBookings = Booking::where('status', 'completed')->count();
        $totalCancelledBookings = Booking::where('status', 'cancelled')->count();
        $totalUsers = User::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalPartners = User::where('role', 'partner')->count();
        $totalPendingPartners = User::where('role', 'partner')->where('status', 'pending')->count();
        $totalContacts = Contact::count();
        $totalUnreadContacts = Contact::where('is_read', false)->count();
        $recentBookings = Booking::with('car', 'user')->latest()->take(5)->get();
        $recentContacts = Contact::latest()->take(5)->get();
        $monthlyRevenue = Booking::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $monthlyBookings = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyBookings[] = Booking::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->count();
        }

        return view('admin.dashboard.index', compact(
            'totalCars',
            'totalAvailableCars',
            'totalBookings',
            'totalPendingBookings',
            'totalConfirmedBookings',
            'totalCompletedBookings',
            'totalCancelledBookings',
            'totalUsers',
            'totalCustomers',
            'totalPartners',
            'totalPendingPartners',
            'totalContacts',
            'totalUnreadContacts',
            'recentBookings',
            'recentContacts',
            'monthlyRevenue',
            'monthlyBookings',
        ));
    }

    public function stats(): JsonResponse
    {
        $totalCars = Car::count();
        $totalAvailableCars = Car::where('is_available', true)->count();
        $totalBookings = Booking::count();
        $totalPendingBookings = Booking::where('status', 'pending')->count();
        $totalConfirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalCompletedBookings = Booking::where('status', 'completed')->count();
        $totalCancelledBookings = Booking::where('status', 'cancelled')->count();
        $totalUsers = User::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalPartners = User::where('role', 'partner')->count();
        $totalPendingPartners = User::where('role', 'partner')->where('status', 'pending')->count();
        $totalContacts = Contact::count();
        $totalUnreadContacts = Contact::where('is_read', false)->count();
        $monthlyRevenue = Booking::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $monthlyBookings = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyBookings[] = Booking::whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->count();
        }

        $recentBookings = Booking::with('car', 'user')->latest()->take(5)->get()->map(fn($b) => [
            'id' => $b->id,
            'car_name' => $b->car->name ?? '-',
            'customer_name' => $b->user->name ?? '-',
            'status' => $b->status,
            'total_price' => number_format($b->total_price, 0, ',', '.'),
            'start_date' => $b->start_date?->format('d M Y') ?? '-',
        ]);

        $recentContacts = Contact::latest()->take(5)->get()->map(fn($c) => [
            'id' => $c->id,
            'name' => $c->name,
            'subject' => $c->subject ?? '-',
            'message' => Str::limit($c->message, 50),
            'is_read' => $c->is_read,
            'created_at' => $c->created_at->diffForHumans(),
        ]);

        return response()->json([
            'total_cars' => $totalCars,
            'total_available_cars' => $totalAvailableCars,
            'total_bookings' => $totalBookings,
            'total_pending_bookings' => $totalPendingBookings,
            'total_confirmed_bookings' => $totalConfirmedBookings,
            'total_completed_bookings' => $totalCompletedBookings,
            'total_cancelled_bookings' => $totalCancelledBookings,
            'total_users' => $totalUsers,
            'total_customers' => $totalCustomers,
            'total_partners' => $totalPartners,
            'total_pending_partners' => $totalPendingPartners,
            'total_contacts' => $totalContacts,
            'total_unread_contacts' => $totalUnreadContacts,
            'monthly_revenue' => $monthlyRevenue,
            'monthly_revenue_formatted' => number_format($monthlyRevenue, 0, ',', '.'),
            'monthly_bookings' => $monthlyBookings,
            'recent_bookings' => $recentBookings,
            'recent_contacts' => $recentContacts,
        ]);
    }
}
