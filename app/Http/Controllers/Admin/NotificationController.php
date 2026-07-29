<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        $pendingBookings = Booking::with('car')
            ->where('status', 'pending')
            ->latest()
            ->take(10)
            ->get();

        $count = $pendingBookings->count();

        $notifications = $pendingBookings->map(function ($booking) {
            return [
                'id' => $booking->id,
                'message' => "Pemesanan baru dari {$booking->customer_name}",
                'car' => $booking->car?->name ?? 'Mobil tidak diketahui',
                'total' => number_format($booking->total_price, 0, ',', '.'),
                'url' => route('admin.bookings.show', $booking->id),
                'time' => $booking->created_at->diffForHumans(),
            ];
        });

        return response()->json([
            'count' => $count,
            'notifications' => $notifications,
        ]);
    }
}
