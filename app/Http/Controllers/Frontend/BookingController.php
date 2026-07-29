<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationMail;
use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class BookingController extends Controller
{
    private function jsonOrRedirect(Request $request, bool $success, string $message, array $extra = []): JsonResponse|RedirectResponse
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(array_merge([
                'success' => $success,
                'message' => $message,
            ], $extra));
        }

        if ($success && isset($extra['booking'])) {
            $booking = $extra['booking'];
            return redirect()->route('booking.confirmation', $booking->id)
                ->with('booking_success', true);
        }

        return back()->with('error', $message)->withInput();
    }

    public function create(Request $request, ?string $slug = null): View
    {
        $car = null;
        if ($slug) {
            $car = Car::where('slug', $slug)
                ->where('is_available', true)
                ->where('status', 'active')
                ->first();
        }

        $cars = Car::where('is_available', true)
            ->where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('booking.index', compact('car', 'cars'));
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'car_id' => ['required', 'exists:cars,id'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:20'],
            'customer_email' => ['nullable', 'email', 'max:255'],
            'pickup_date' => ['required', 'date', 'after_or_equal:today'],
            'return_date' => ['required', 'date', 'after:pickup_date'],
            'pickup_location' => ['nullable', 'string', 'max:255'],
            'return_location' => ['nullable', 'string', 'max:255'],
            'rental_type' => ['required', 'in:daily,weekly,monthly'],
            'with_driver' => ['boolean'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $car = Car::findOrFail($validated['car_id']);

        if (!$car->is_available || $car->status !== 'active') {
            return $this->jsonOrRedirect($request, false, 'Maaf, mobil ini tidak tersedia untuk disewa.');
        }

        $pickupDate = Carbon::parse($validated['pickup_date']);
        $returnDate = Carbon::parse($validated['return_date']);
        $days = (int) max(1, ceil($pickupDate->diffInDays($returnDate, false)));

        if ($days < (int) $car->minimum_rent_days) {
            return $this->jsonOrRedirect($request, false, "Minimal sewa mobil ini adalah {$car->minimum_rent_days} hari.");
        }

        $price = match ($validated['rental_type']) {
            'weekly' => ($car->price_per_week ?? $car->price_per_day * 7) * ($days / 7),
            'monthly' => ($car->price_per_month ?? $car->price_per_day * 30) * ($days / 30),
            default => $car->price_per_day * $days,
        };

        if ($car->discount_percent) {
            $price = $price - ($price * $car->discount_percent / 100);
        }

        $driverPrice = 0;
        if ($request->boolean('with_driver')) {
            $driverPrice = ($car->price_per_day * 0.2) * $days;
        }

        $totalPrice = $price + $driverPrice;

        $bookingData = [
            'car_id' => $validated['car_id'],
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'] ?? null,
            'pickup_date' => $pickupDate,
            'return_date' => $returnDate,
            'pickup_location' => $validated['pickup_location'] ?? null,
            'return_location' => $validated['return_location'] ?? null,
            'rental_type' => $validated['rental_type'],
            'with_driver' => $request->boolean('with_driver'),
            'driver_price' => $driverPrice,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_status' => 'pending',
            'notes' => $validated['notes'] ?? null,
        ];

        if (Auth::check()) {
            $bookingData['user_id'] = Auth::id();
        }

        $booking = Booking::create($bookingData);
        $booking->load('car');

        if ($booking->customer_email) {
            Mail::to($booking->customer_email)->send(new BookingConfirmationMail($booking));
        }

        return $this->jsonOrRedirect($request, true, 'Pemesanan berhasil!', [
            'booking' => $booking,
            'redirect' => route('booking.confirmation', $booking->id),
        ]);
    }

    public function confirmation(Booking $booking): View
    {
        $booking->load('car');

        return view('booking.confirmation', compact('booking'));
    }
}
