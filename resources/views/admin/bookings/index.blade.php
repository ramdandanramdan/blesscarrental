@extends('admin.layouts.app')

@section('title', 'Bookings')

@section('content')
<div class="admin-page-header header-orange anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-calendar-check"></i></div>
            <div>
                <h4>Bookings</h4>
                <p>Kelola semua pemesanan rental kendaraan</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-header">
        <form action="{{ route('admin.bookings.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border-color:#e2e8f0;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Search by customer or car..."
                           value="{{ request('search') }}" style="border-radius:0 10px 10px 0;">
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-primary w-100" style="border-radius:10px;">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Car</th>
                        <th>Dates</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th style="width: 80px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings ?? [] as $booking)
                    <tr>
                        <td><span class="fw-semibold">#{{ $booking->id }}</span></td>
                        <td>
                            <span class="fw-semibold">{{ $booking->customer_name ?? $booking->user->name ?? 'N/A' }}</span>
                            <small class="d-block text-muted">{{ $booking->customer_email ?? $booking->user->email ?? '' }}</small>
                        </td>
                        <td>{{ $booking->car->name ?? $booking->car_name ?? 'N/A' }}</td>
                        <td>
                            <small class="text-muted">
                                {{ $booking->start_date ? $booking->start_date->format('M d') : 'N/A' }}
                                - {{ $booking->end_date ? $booking->end_date->format('M d, Y') : 'N/A' }}
                            </small>
                        </td>
                        <td class="fw-semibold" style="color:#10b981;">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $badges = [
                                    'pending' => 'badge-pending',
                                    'confirmed' => 'badge-active',
                                    'active' => 'badge-active',
                                    'completed' => 'badge-active',
                                    'cancelled' => 'badge-inactive',
                                ];
                                $dotColors = [
                                    'pending' => 'dot-yellow',
                                    'confirmed' => 'dot-blue',
                                    'active' => 'dot-green',
                                    'completed' => 'dot-green',
                                    'cancelled' => 'dot-red',
                                ];
                            @endphp
                            <span class="admin-badge {{ $badges[$booking->status] ?? 'badge-inactive' }}">
                                <span class="status-dot {{ $dotColors[$booking->status] ?? 'dot-gray' }}"></span>
                                {{ ucfirst($booking->status ?? 'pending') }}
                            </span>
                        </td>
                        <td>
                            @php
                                $payColors = [
                                    'pending' => 'dot-yellow',
                                    'paid' => 'dot-green',
                                    'partial' => 'dot-blue',
                                    'refunded' => 'dot-gray',
                                    'failed' => 'dot-red',
                                ];
                            @endphp
                            <span class="admin-badge badge-active">
                                <span class="status-dot {{ $payColors[$booking->payment_status] ?? 'dot-gray' }}"></span>
                                {{ ucfirst($booking->payment_status ?? 'pending') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="admin-action-btn btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="admin-action-btn btn-edit dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown" title="Actions">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="border-radius:12px;box-shadow:var(--shadow-xl);">
                                    <li>
                                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit" class="dropdown-item {{ $booking->status === 'confirmed' ? 'active' : '' }}">
                                                <i class="fas fa-check text-info me-2"></i> Confirm
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="active">
                                            <button type="submit" class="dropdown-item {{ $booking->status === 'active' ? 'active' : '' }}">
                                                <i class="fas fa-play text-primary me-2"></i> Activate
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="dropdown-item {{ $booking->status === 'completed' ? 'active' : '' }}">
                                                <i class="fas fa-check-circle text-success me-2"></i> Complete
                                            </button>
                                        </form>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-times me-2"></i> Cancel
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-orange"><i class="fas fa-calendar-check"></i></div>
                                <h5>Belum ada booking</h5>
                                <p>Booking dari pelanggan akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(($bookings ?? collect())->hasPages())
    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $bookings->total() }} total bookings</small>
            <div>{{ $bookings->links() }}</div>
        </div>
    </div>
    @endif
</div>
@endsection
