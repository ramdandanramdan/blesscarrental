@extends('admin.layouts.app')

@section('title', 'Booking #' . $booking->id)

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <h4 class="fw-bold mb-0">Booking #{{ $booking->id }}</h4>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Bookings
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">
    <!-- Booking Details -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                <h5 class="fw-semibold mb-0">Booking Details</h5>
                @php
                    $badges = [
                        'pending' => 'warning',
                        'confirmed' => 'info',
                        'active' => 'primary',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    ];
                @endphp
                <span class="badge bg-{{ $badges[$booking->status] ?? 'secondary' }} fs-6 px-3 py-2">
                    {{ ucfirst($booking->status ?? 'pending') }}
                </span>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Booking ID</label>
                        <span class="fw-semibold">#{{ $booking->id }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Booking Date</label>
                        <span class="fw-semibold">{{ $booking->created_at ? $booking->created_at->format('M d, Y h:i A') : 'N/A' }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Pick-up Date</label>
                        <span class="fw-semibold">{{ $booking->start_date ? $booking->start_date->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Return Date</label>
                        <span class="fw-semibold">{{ $booking->end_date ? $booking->end_date->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Rental Type</label>
                        <span class="fw-semibold">{{ ucfirst($booking->rental_type ?? 'daily') }}</span>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">With Driver</label>
                        <span class="fw-semibold">
                            @if($booking->with_driver)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </span>
                    </div>
                    @if($booking->pickup_location)
                    <div class="col-12">
                        <label class="text-muted small d-block">Pick-up Location</label>
                        <span class="fw-semibold">{{ $booking->pickup_location }}</span>
                    </div>
                    @endif
                    @if($booking->special_requests)
                    <div class="col-12">
                        <label class="text-muted small d-block">Special Requests</label>
                        <p class="mb-0 bg-light rounded p-3">{{ $booking->special_requests }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Car Info -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-semibold mb-0">Car Information</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    @if($booking->car && $booking->car->main_image)
                        <img src="{{ asset('storage/' . $booking->car->main_image) }}" alt="{{ $booking->car->name }}"
                             class="rounded me-3" width="100" height="70" style="object-fit:cover;">
                    @else
                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center"
                             style="width:100px;height:70px;">
                            <i class="fas fa-car text-muted fs-2"></i>
                        </div>
                    @endif
                    <div>
                        <h5 class="mb-1">{{ $booking->car->name ?? $booking->car_name ?? 'N/A' }}</h5>
                        <p class="text-muted mb-0">
                            {{ $booking->car->brand ?? '' }} {{ $booking->car->model ?? '' }}
                            @if($booking->car)
                                &middot; {{ $booking->car->model_year ?? '' }}
                                &middot; {{ ucfirst($booking->car->transmission ?? '') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Customer Info -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-semibold mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="avatar-circle bg-primary text-white me-3">
                        {{ substr($booking->customer_name ?? $booking->user->name ?? 'G', 0, 1) }}
                    </div>
                    <div>
                        <h6 class="mb-0">{{ $booking->customer_name ?? $booking->user->name ?? 'Guest' }}</h6>
                        <small class="text-muted">{{ $booking->customer_email ?? $booking->user->email ?? '' }}</small>
                    </div>
                </div>
                @if($booking->customer_phone)
                    <p class="mb-1"><i class="fas fa-phone text-muted me-2"></i>{{ $booking->customer_phone }}</p>
                @endif
                @if($booking->customer_address)
                    <p class="mb-0"><i class="fas fa-map-marker-alt text-muted me-2"></i>{{ $booking->customer_address }}</p>
                @endif
            </div>
        </div>

        <!-- Price Breakdown -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-semibold mb-0">Price Breakdown</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Price per day</span>
                    <span>Rp {{ number_format($booking->price_per_day ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Duration</span>
                    <span>{{ $booking->duration ?? 1 }} day(s)</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span>Rp {{ number_format(($booking->price_per_day ?? 0) * ($booking->duration ?? 1), 0, ',', '.') }}</span>
                </div>
                @if($booking->discount_amount > 0)
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Discount</span>
                    <span class="text-success">-Rp {{ number_format($booking->discount_amount, 0, ',', '.') }}</span>
                </div>
                @endif
                @if($booking->extra_charges > 0)
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Extra Charges</span>
                    <span>Rp {{ number_format($booking->extra_charges, 0, ',', '.') }}</span>
                </div>
                @endif
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Total</span>
                    <span class="fw-bold fs-5 text-primary">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="mt-2">
                    <span class="text-muted small">Payment Status: </span>
                    @php
                        $payBadges = [
                            'pending' => 'warning',
                            'paid' => 'success',
                            'partial' => 'info',
                            'refunded' => 'secondary',
                            'failed' => 'danger',
                        ];
                    @endphp
                    <span class="badge bg-{{ $payBadges[$booking->payment_status] ?? 'secondary' }}">
                        {{ ucfirst($booking->payment_status ?? 'pending') }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Update Status -->
        <div class="card border-0 shadow-sm mt-4">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="fw-semibold mb-0">Update Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <select name="status" class="form-select form-select-lg">
                            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="active" {{ $booking->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-sync me-2"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-4 d-grid gap-2">
            @if($booking->status !== 'cancelled' && $booking->status !== 'completed')
                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="cancelled">
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fas fa-times me-2"></i> Cancel Booking
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.2rem;
    }
</style>
@endpush
