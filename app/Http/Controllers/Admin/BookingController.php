<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function index(Request $request): View
    {
        $query = Booking::with('car', 'user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                    ->orWhere('customer_email', 'like', "%{$search}%")
                    ->orWhere('customer_phone', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $bookings = $query->latest()->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking): View
    {
        $booking->load('car', 'user');

        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:pending,confirmed,active,completed,cancelled'],
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        $statusLabels = [
            'pending' => 'menunggu',
            'confirmed' => 'dikonfirmasi',
            'completed' => 'selesai',
            'cancelled' => 'dibatalkan',
        ];

        return back()->with('success', 'Status pemesanan berhasil diubah menjadi ' . ($statusLabels[$request->status] ?? $request->status) . '.');
    }

    public function updatePaymentStatus(Request $request, Booking $booking): RedirectResponse
    {
        $request->validate([
            'payment_status' => ['required', 'in:pending,paid,failed,refunded'],
        ]);

        $booking->update([
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function export(Request $request)
    {
        $query = Booking::with('car', 'user');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $bookings = $query->latest()->get();

        $filename = 'bookings-export-' . now()->format('Y-m-d-His') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ];

        $callback = function () use ($bookings) {
            $file = fopen('php://output', 'w');
            fputcsv($file, [
                'ID',
                'Nama Pelanggan',
                'Email',
                'Telepon',
                'Mobil',
                'Tanggal Pickup',
                'Tanggal Return',
                'Lokasi Pickup',
                'Lokasi Return',
                'Tipe Sewa',
                'Dengan Supir',
                'Total Harga',
                'Status',
                'Status Pembayaran',
                'Tanggal Pemesanan',
            ]);

            foreach ($bookings as $booking) {
                fputcsv($file, [
                    $booking->id,
                    $booking->customer_name,
                    $booking->customer_email,
                    $booking->customer_phone,
                    $booking->car ? $booking->car->name : '-',
                    $booking->pickup_date ? $booking->pickup_date->format('d/m/Y H:i') : '-',
                    $booking->return_date ? $booking->return_date->format('d/m/Y H:i') : '-',
                    $booking->pickup_location ?? '-',
                    $booking->return_location ?? '-',
                    $booking->rental_type ?? '-',
                    $booking->with_driver ? 'Ya' : 'Tidak',
                    number_format($booking->total_price, 0, ',', '.'),
                    $booking->status,
                    $booking->payment_status,
                    $booking->created_at->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function destroy(Booking $booking): RedirectResponse
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
