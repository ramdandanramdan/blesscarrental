@extends('admin.layouts.app')

@section('title', 'User: ' . $user->name)

@section('content')
<div class="admin-page-header header-orange anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-user"></i></div>
            <div>
                <h4>User Profile</h4>
                <p>Detail informasi pengguna</p>
            </div>
        </div>
        <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-lg" style="border-radius:12px;">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #ef4444;">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4 anim-fade-up anim-delay-2">
    <!-- Profile Card -->
    <div class="col-lg-4">
        <div class="admin-content-card">
            <div class="card-body py-5 text-center">
                <div class="avatar-circle-lg bg-primary text-white mx-auto mb-3">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                <p class="text-muted mb-3" style="font-size:13px;">{{ $user->email }}</p>
                <div class="mb-2 d-flex justify-content-center gap-2">
                    @php
                        $roleBadges = [
                            'admin' => 'badge bg-danger',
                            'partner' => 'badge bg-primary',
                            'customer' => 'badge bg-success',
                        ];
                        $statusMap = [
                            'active' => ['class' => 'admin-badge badge-active', 'dot' => 'dot-green'],
                            'suspended' => ['class' => 'admin-badge badge-inactive', 'dot' => 'dot-gray'],
                            'pending' => ['class' => 'admin-badge badge-pending', 'dot' => 'dot-yellow'],
                        ];
                        $currentStatus = $statusMap[$user->status ?? 'pending'] ?? ['class' => 'admin-badge badge-pending', 'dot' => 'dot-yellow'];
                    @endphp
                    <span class="{{ $roleBadges[$user->role] ?? 'badge bg-secondary' }}">
                        {{ ucfirst($user->role ?? 'customer') }}
                    </span>
                    <span class="{{ $currentStatus['class'] }}">
                        <span class="status-dot {{ $currentStatus['dot'] }}"></span>
                        {{ ucfirst($user->status ?? 'pending') }}
                    </span>
                </div>
                @if($user->role === 'partner')
                    <div class="mt-3">
                        <span class="text-muted small">Partnership Status:</span>
                        <span class="badge bg-{{ $user->approval_status === 'approved' ? 'success' : ($user->approval_status === 'rejected' ? 'danger' : 'warning') }} d-block mt-1">
                            {{ ucfirst($user->approval_status ?? 'pending') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Account Info -->
        <div class="admin-content-card mt-4">
            <div class="card-header">
                <h5 class="fw-semibold mb-0"><i class="fas fa-info-circle me-2 text-primary"></i>Account Info</h5>
            </div>
            <div class="card-body">
                <div class="info-row">
                    <label class="info-label"><i class="fas fa-phone me-2"></i>Telepon</label>
                    <span class="info-value">{{ $user->phone ?? '—' }}</span>
                </div>
                @if($user->company_name)
                <div class="info-row">
                    <label class="info-label"><i class="fas fa-building me-2"></i>Perusahaan</label>
                    <span class="info-value">{{ $user->company_name }}</span>
                </div>
                @endif
                @if($user->company_address)
                <div class="info-row">
                    <label class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Alamat</label>
                    <span class="info-value">{{ $user->company_address }}</span>
                </div>
                @endif
                <div class="info-row">
                    <label class="info-label"><i class="fas fa-calendar me-2"></i>Bergabung</label>
                    <span class="info-value">{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</span>
                </div>
                <div class="info-row">
                    <label class="info-label"><i class="fas fa-clock me-2"></i>Terakhir Diubah</label>
                    <span class="info-value">{{ $user->updated_at ? $user->updated_at->format('d M Y') : 'N/A' }}</span>
                </div>
                <div class="info-row mb-0">
                    <label class="info-label"><i class="fas fa-envelope me-2"></i>Email Verified</label>
                    <span class="info-value">
                        @if($user->email_verified_at)
                            <span class="text-success"><i class="fas fa-check-circle me-1"></i> Verified</span>
                        @else
                            <span class="text-muted">Not verified</span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions & Booking History -->
    <div class="col-lg-8">
        <!-- Actions -->
        <div class="admin-content-card">
            <div class="card-header">
                <h5 class="fw-semibold mb-0"><i class="fas fa-cog me-2 text-primary"></i>Aksi</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @if($user->role === 'partner' && $user->approval_status === 'pending')
                    <div class="col-md-6">
                        <div class="action-card action-success">
                            <div class="action-icon bg-success-soft"><i class="fas fa-check text-success"></i></div>
                            <h6 class="fw-semibold mb-1">Setujui Mitra</h6>
                            <p class="text-muted small mb-3">Setujui akun mitra ini</p>
                            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-check me-2"></i> Setujui
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="action-card action-danger">
                            <div class="action-icon bg-danger-soft"><i class="fas fa-times text-danger"></i></div>
                            <h6 class="fw-semibold mb-1">Tolak Mitra</h6>
                            <p class="text-muted small mb-3">Tolak aplikasi mitra ini</p>
                            <form action="{{ route('admin.users.reject', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-times me-2"></i> Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                    @if($user->status === 'active')
                    <div class="col-md-6">
                        <div class="action-card action-warning">
                            <div class="action-icon bg-warning-soft"><i class="fas fa-pause text-warning"></i></div>
                            <h6 class="fw-semibold mb-1">Tangguhkan</h6>
                            <p class="text-muted small mb-3">Tangguhkan akun pengguna ini</p>
                            <form action="{{ route('admin.users.suspend', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Tangguhkan akun ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning w-100">
                                    <i class="fas fa-pause me-2"></i> Tangguhkan
                                </button>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6">
                        <div class="action-card action-success">
                            <div class="action-icon bg-success-soft"><i class="fas fa-play text-success"></i></div>
                            <h6 class="fw-semibold mb-1">Aktifkan</h6>
                            <p class="text-muted small mb-3">Aktifkan kembali akun ini</p>
                            <form action="{{ route('admin.users.activate', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Aktifkan akun ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-play me-2"></i> Aktifkan
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                    <div class="col-md-6">
                        <div class="action-card action-danger">
                            <div class="action-icon bg-danger-soft"><i class="fas fa-trash text-danger"></i></div>
                            <h6 class="fw-semibold mb-1">Hapus User</h6>
                            <p class="text-muted small mb-3">Hapus akun permanen</p>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus? Tindakan ini tidak dapat dibatalkan.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="fas fa-trash me-2"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="admin-content-card mt-4">
            <div class="card-header">
                <h5 class="fw-semibold mb-0"><i class="fas fa-calendar-check me-2 text-primary"></i>Riwayat Booking</h5>
            </div>
            <div class="card-body p-0">
                @if($user->bookings && count($user->bookings) > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Mobil</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->bookings->take(5) as $booking)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($booking->car)
                                        <div class="avatar-circle-sm bg-primary-light text-primary me-2">
                                            <i class="fas fa-car"></i>
                                        </div>
                                        <span>{{ $booking->car->name ?? 'N/A' }}</span>
                                        @else
                                        <span class="text-muted">Mobil dihapus</span>
                                        @endif
                                    </div>
                                </td>
                                <td><small>{{ $booking->start_date ?? 'N/A' }} - {{ $booking->end_date ?? 'N/A' }}</small></td>
                                <td>
                                    @php
                                        $bookingStatus = [
                                            'pending' => 'badge bg-warning text-dark',
                                            'confirmed' => 'badge bg-info',
                                            'active' => 'badge bg-success',
                                            'completed' => 'badge bg-secondary',
                                            'cancelled' => 'badge bg-danger',
                                        ];
                                    @endphp
                                    <span class="{{ $bookingStatus[$booking->status] ?? 'badge bg-secondary' }}">
                                        {{ ucfirst($booking->status ?? 'unknown') }}
                                    </span>
                                </td>
                                <td><span class="fw-semibold">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-4">
                    <div class="text-muted">
                        <i class="fas fa-calendar-times fa-2x mb-2 text-muted"></i>
                        <p class="mb-0">Belum ada riwayat booking</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .avatar-circle-lg {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 2.2rem;
        background: linear-gradient(135deg, var(--primary), #3b82f6) !important;
        box-shadow: 0 8px 24px rgba(14,165,233,0.3);
    }
    .avatar-circle-sm {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }
    .bg-primary-light { background: var(--primary-light); }
    .bg-success-soft { background: rgba(16,185,129,0.1); }
    .bg-danger-soft { background: rgba(239,68,68,0.1); }
    .bg-warning-soft { background: rgba(245,158,11,0.1); }
    .info-row {
        padding: 12px 0;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .info-row:last-child { border-bottom: none; }
    .info-label {
        font-size: 12.5px;
        font-weight: 600;
        color: #64748b;
        margin: 0;
    }
    .info-value {
        font-size: 13px;
        font-weight: 500;
        color: #1e293b;
    }
    .action-card {
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        text-align: center;
        transition: var(--transition);
        background: #fff;
    }
    .action-card:hover {
        border-color: var(--primary);
        box-shadow: 0 4px 16px rgba(14,165,233,0.1);
        transform: translateY(-2px);
    }
    .action-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-size: 18px;
    }
</style>
@endpush
