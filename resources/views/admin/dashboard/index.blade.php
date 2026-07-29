@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <div>
        <h4 class="fw-bold mb-1">Dashboard</h4>
        <p class="text-muted mb-0 small">{{ now()->format('l, F j, Y') }}</p>
    </div>
    <div class="d-flex gap-2 align-items-center">
        <span class="live-dot"></span>
        <span class="badge bg-success bg-opacity-10 text-success py-2 px-3 rounded-pill" id="lastUpdate">
            <i class="fas fa-sync-alt me-1"></i> Live
        </span>
    </div>
</div>

<!-- Welcome Card -->
<div class="welcome-card mb-4 anim-fade-up">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h4>Welcome back, {{ auth()->user()->name ?? 'Admin' }}! 👋</h4>
            <p class="mb-0">Here's what's happening with <strong>{{ config('app.name') }}</strong> today.</p>
        </div>
        <span class="badge bg-white bg-opacity-20 text-white rounded-pill px-3 py-2 d-none d-md-inline-flex align-items-center gap-2" style="background: rgba(255,255,255,0.2);">
            <i class="fas fa-calendar-alt"></i>
            {{ now()->format('M Y') }}
        </span>
    </div>
</div>

<!-- Stat Cards — Animated Counters -->
<div class="row g-3 mb-4">
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-1">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #0ea5e9;">
            <div class="card-body">
                <p class="stat-label">Total Mobil</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up" data-target="{{ $totalCars ?? 0 }}" style="color:#0ea5e9">0</h3>
                    <div class="stat-icon" style="background: #e0f2fe; color:#0ea5e9;">
                        <i class="fas fa-car"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill">
                        <span class="me-1">✓</span><span class="count-up-small" data-target="{{ $totalAvailableCars ?? 0 }}">0</span> Ready
                    </span>
                    <a href="{{ route('admin.cars.index') }}" class="small text-decoration-none ms-auto fw-medium" style="color:#0ea5e9;">View →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-2">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #10b981;">
            <div class="card-body">
                <p class="stat-label">Total Booking</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up" data-target="{{ $totalBookings ?? 0 }}" style="color:#10b981">0</h3>
                    <div class="stat-icon" style="background: #d1fae5; color:#10b981;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 rounded-pill">
                        <span class="me-1">⏳</span><span class="count-up-small" data-target="{{ $totalPendingBookings ?? 0 }}">0</span> Pending
                    </span>
                    <a href="{{ route('admin.bookings.index') }}" class="small text-decoration-none ms-auto fw-medium" style="color:#10b981;">View →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-3">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #8b5cf6;">
            <div class="card-body">
                <p class="stat-label">Active Rental</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up" data-target="{{ $totalConfirmedBookings ?? 0 }}" style="color:#8b5cf6">0</h3>
                    <div class="stat-icon" style="background: #ede9fe; color:#8b5cf6;">
                        <i class="fas fa-car-side"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-primary bg-opacity-10 text-primary px-2 py-1 rounded-pill">
                        <span class="me-1">✓</span><span class="count-up-small" data-target="{{ $totalCompletedBookings ?? 0 }}">0</span> Done
                    </span>
                    <a href="{{ route('admin.bookings.index') }}" class="small text-decoration-none ms-auto fw-medium" style="color:#8b5cf6;">View →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-4">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #f59e0b;">
            <div class="card-body">
                <p class="stat-label">Total Users</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up" data-target="{{ $totalUsers ?? 0 }}" style="color:#f59e0b">0</h3>
                    <div class="stat-icon" style="background: #fef3c7; color:#f59e0b;">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-info bg-opacity-10 text-info px-2 py-1 rounded-pill">
                        <span class="me-1">👤</span><span class="count-up-small" data-target="{{ $totalCustomers ?? 0 }}">0</span> Customers
                    </span>
                    <a href="{{ route('admin.users.index') }}" class="small text-decoration-none ms-auto fw-medium" style="color:#f59e0b;">View →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-5">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #ef4444;">
            <div class="card-body">
                <p class="stat-label">Pesan</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up" data-target="{{ $totalContacts ?? 0 }}" style="color:#ef4444">0</h3>
                    <div class="stat-icon" style="background: #fecaca; color:#ef4444;">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1 rounded-pill">
                        <span class="me-1">✉</span><span class="count-up-small" data-target="{{ $totalUnreadContacts ?? 0 }}">0</span> Unread
                    </span>
                    <a href="{{ route('admin.contacts.index') }}" class="small text-decoration-none ms-auto fw-medium" style="color:#ef4444;">View →</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 anim-fade-up anim-delay-6">
        <div class="card stat-card h-100 shadow-sm" style="border-left: 4px solid #06b6d4;">
            <div class="card-body">
                <p class="stat-label">Revenue Bulan Ini</p>
                <div class="d-flex justify-content-between align-items-end mb-2">
                    <h3 class="count-up-money" data-target="{{ $monthlyRevenue ?? 0 }}" style="color:#06b6d4;font-size:22px;">Rp 0</h3>
                    <div class="stat-icon" style="background: #cffafe; color:#06b6d4;">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill">
                        <span class="me-1">📅</span> This Month
                    </span>
                    <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}" class="small text-decoration-none ms-auto fw-medium" style="color:#06b6d4;">View →</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Left: Bookings + Chart -->
    <div class="col-lg-8">
        <!-- Recent Bookings -->
        <div class="card shadow-sm chart-card anim-fade-up anim-delay-7">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-history text-primary me-2"></i>Booking Terbaru</h5>
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-eye me-1"></i> Lihat Semua
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Customer</th>
                                <th>Mobil</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="recentBookingsBody">
                            @forelse($recentBookings ?? [] as $booking)
                            <tr>
                                <td><span class="fw-semibold">#{{ $booking->id }}</span></td>
                                <td>
                                    <div class="fw-semibold">{{ $booking->customer_name ?? 'N/A' }}</div>
                                    <small class="text-muted">{{ $booking->customer_email ?? '' }}</small>
                                </td>
                                <td>{{ $booking->car_name ?? 'N/A' }}</td>
                                <td>
                                    <small>
                                        {{ $booking->start_date ? $booking->start_date->format('M d') : 'N/A' }}
                                        - {{ $booking->end_date ? $booking->end_date->format('M d, Y') : 'N/A' }}
                                    </small>
                                </td>
                                <td class="fw-semibold">Rp {{ number_format($booking->total_price ?? 0, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $statusClasses = [
                                            'pending' => 'warning',
                                            'confirmed' => 'info',
                                            'active' => 'primary',
                                            'completed' => 'success',
                                            'cancelled' => 'danger',
                                        ];
                                        $class = $statusClasses[$booking->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $class }} bg-opacity-10 text-{{ $class }} rounded-pill px-3 py-2">
                                        <i class="fas fa-circle me-1" style="font-size:6px;vertical-align:middle;"></i>
                                        {{ ucfirst($booking->status ?? 'pending') }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-calendar-times fa-2x mb-2 d-block"></i>
                                    Belum ada booking.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Revenue Chart — Animated Gradient -->
        <div class="card shadow-sm mt-4 chart-card anim-fade-up anim-delay-8">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-chart-line text-primary me-2"></i>Revenue Overview</h5>
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">
                    <i class="fas fa-calendar me-1"></i> {{ now()->format('Y') }}
                </span>
            </div>
            <div class="card-body">
                <div class="chart-container" style="height:260px;">
                    <canvas id="monthlyBookingsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-lg-4">
        <!-- Quick Stats — Animated -->
        <div class="card shadow-sm mb-4 anim-fade-up anim-delay-7">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-info-circle text-primary me-2"></i>Quick Stats</h5>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0">
                        <span class="text-muted"><i class="fas fa-check-circle text-success me-2"></i>Selesai</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalCompletedBookings ?? 0 }}">0</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0 border-top">
                        <span class="text-muted"><i class="fas fa-times-circle text-danger me-2"></i>Dibatalkan</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalCancelledBookings ?? 0 }}">0</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0 border-top">
                        <span class="text-muted"><i class="fas fa-users text-info me-2"></i>Customers</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalCustomers ?? 0 }}">0</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0 border-top">
                        <span class="text-muted"><i class="fas fa-handshake text-warning me-2"></i>Partners</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalPartners ?? 0 }}">0</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0 border-top">
                        <span class="text-muted"><i class="fas fa-clock text-danger me-2"></i>Partner Pending</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalPendingPartners ?? 0 }}">0</span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center py-3 px-4 border-0 border-top">
                        <span class="text-muted"><i class="fas fa-car text-primary me-2"></i>Mobil Ready</span>
                        <span class="fw-bold count-up-small" data-target="{{ $totalAvailableCars ?? 0 }}">0</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Messages — Live -->
        <div class="card shadow-sm anim-fade-up anim-delay-8">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-comment-dots text-primary me-2"></i>Pesan Terbaru</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body p-0" id="recentContactsBody">
                @forelse($recentContacts ?? [] as $contact)
                <div class="activity-item px-4">
                    <div class="activity-icon" style="background: {{ $contact->is_read ? '#f1f5f9' : '#e0f2fe' }}; color: {{ $contact->is_read ? '#94a3b8' : '#0ea5e9' }};">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="flex-grow-1 min-width-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-semibold small">{{ $contact->name ?? 'Anonymous' }}</span>
                            <small class="text-muted">{{ $contact->created_at ? $contact->created_at->diffForHumans() : '' }}</small>
                        </div>
                        <p class="text-muted small mb-0 text-truncate">{{ $contact->message ?? '' }}</p>
                    </div>
                </div>
                @empty
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                    Belum ada pesan.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // =============================================
    // COUNTER ANIMATION
    // =============================================
    function animateCountUp(el, target, duration) {
        duration = duration || 1500;
        var start = 0;
        var startTime = null;
        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(eased * target);
            el.textContent = current.toLocaleString('id-ID');
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target.toLocaleString('id-ID');
        }
        requestAnimationFrame(step);
    }

    function animateCountMoney(el, target, duration) {
        duration = duration || 1800;
        var startTime = null;
        function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            var current = Math.floor(eased * target);
            el.textContent = 'Rp ' + current.toLocaleString('id-ID');
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = 'Rp ' + target.toLocaleString('id-ID');
        }
        requestAnimationFrame(step);
    }

    // IntersectionObserver — animate when visible
    var counters = document.querySelectorAll('.count-up');
    var smallCounters = document.querySelectorAll('.count-up-small');
    var moneyCounters = document.querySelectorAll('.count-up-money');
    var animated = new Set();

    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting && !animated.has(entry.target)) {
                animated.add(entry.target);
                var target = parseInt(entry.target.dataset.target) || 0;
                animateCountUp(entry.target, target, 1500);
            }
        });
    }, { threshold: 0.3 });

    counters.forEach(function(el) { observer.observe(el); });

    var observerSmall = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting && !animated.has(entry.target)) {
                animated.add(entry.target);
                var target = parseInt(entry.target.dataset.target) || 0;
                animateCountUp(entry.target, target, 1200);
            }
        });
    }, { threshold: 0.3 });

    smallCounters.forEach(function(el) { observerSmall.observe(el); });

    var observerMoney = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting && !animated.has(entry.target)) {
                animated.add(entry.target);
                var target = parseInt(entry.target.dataset.target) || 0;
                animateCountMoney(entry.target, target, 1800);
            }
        });
    }, { threshold: 0.3 });

    moneyCounters.forEach(function(el) { observerMoney.observe(el); });

    // =============================================
    // CHART.JS — ANIMATED GRADIENT
    // =============================================
    var ctx = document.getElementById('monthlyBookingsChart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 260);
    gradient.addColorStop(0, 'rgba(14, 165, 233, 0.25)');
    gradient.addColorStop(0.5, 'rgba(14, 165, 233, 0.08)');
    gradient.addColorStop(1, 'rgba(14, 165, 233, 0)');

    var gradient2 = ctx.createLinearGradient(0, 0, 0, 260);
    gradient2.addColorStop(0, 'rgba(99, 102, 241, 0.15)');
    gradient2.addColorStop(1, 'rgba(99, 102, 241, 0)');

    var monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Bookings',
                data: {{ json_encode($monthlyBookings ?? [0,0,0,0,0,0,0,0,0,0,0,0]) }},
                borderColor: '#0ea5e9',
                backgroundColor: gradient,
                fill: true,
                tension: 0.45,
                pointBackgroundColor: '#0ea5e9',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 8,
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#0ea5e9',
                pointHoverBorderWidth: 3,
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 2000,
                easing: 'easeOutQuart'
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleFont: { size: 12, weight: '600' },
                    bodyFont: { size: 13 },
                    padding: 14,
                    cornerRadius: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(ctx) { return ctx.parsed.y + ' booking'; }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1, precision: 0, font: { size: 11 } },
                    grid: { color: 'rgba(0,0,0,0.04)' }
                },
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 11 } }
                }
            },
            interaction: { intersect: false, mode: 'index' }
        }
    });

    // =============================================
    // REAL-TIME POLLING — DASHBOARD STATS (10s)
    // =============================================
    var statsUrl = '{{ route("admin.dashboard.stats") }}';

    function updateDashboard() {
        fetch(statsUrl, { headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' } })
        .then(function(r) { return r.json(); })
        .then(function(d) {
            // Update counters smoothly
            var mapping = [
                ['.count-up[data-target]', d],
            ];
            document.querySelectorAll('.count-up').forEach(function(el) {
                var key = el.dataset.target;
                var newVal = getStatValue(el, d);
                if (newVal !== undefined) {
                    el.dataset.target = newVal;
                    animateCountUp(el, newVal, 800);
                }
            });
            document.querySelectorAll('.count-up-small').forEach(function(el) {
                var newVal = getStatValue(el, d);
                if (newVal !== undefined) {
                    el.dataset.target = newVal;
                    animateCountUp(el, newVal, 800);
                }
            });
            document.querySelectorAll('.count-up-money').forEach(function(el) {
                var newVal = getStatMoneyValue(el, d);
                if (newVal !== undefined) {
                    el.dataset.target = newVal;
                    animateCountMoney(el, newVal, 1000);
                }
            });

            // Update chart
            monthlyChart.data.datasets[0].data = d.monthly_bookings;
            monthlyChart.update('active');

            // Update last update indicator
            var now = new Date();
            var time = now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0') + ':' + now.getSeconds().toString().padStart(2,'0');
            document.getElementById('lastUpdate').innerHTML = '<i class="fas fa-sync-alt me-1"></i> Updated ' + time;

            // Update recent bookings
            if (d.recent_bookings && d.recent_bookings.length > 0) {
                var html = '';
                var statusClasses = { pending: 'warning', confirmed: 'info', active: 'primary', completed: 'success', cancelled: 'danger' };
                d.recent_bookings.forEach(function(b) {
                    var cls = statusClasses[b.status] || 'secondary';
                    html += '<tr>';
                    html += '<td><span class="fw-semibold">#' + b.id + '</span></td>';
                    html += '<td><div class="fw-semibold">' + b.customer_name + '</div></td>';
                    html += '<td>' + b.car_name + '</td>';
                    html += '<td><small>' + b.start_date + '</small></td>';
                    html += '<td class="fw-semibold">Rp ' + b.total_price + '</td>';
                    html += '<td><span class="badge bg-' + cls + ' bg-opacity-10 text-' + cls + ' rounded-pill px-3 py-2"><i class="fas fa-circle me-1" style="font-size:6px;vertical-align:middle;"></i>' + capitalize(b.status) + '</span></td>';
                    html += '</tr>';
                });
                document.getElementById('recentBookingsBody').innerHTML = html;
            }

            // Update recent contacts
            if (d.recent_contacts && d.recent_contacts.length > 0) {
                var html = '';
                d.recent_contacts.forEach(function(c) {
                    var bg = c.is_read ? '#f1f5f9' : '#e0f2fe';
                    var color = c.is_read ? '#94a3b8' : '#0ea5e9';
                    html += '<div class="activity-item px-4">';
                    html += '<div class="activity-icon" style="background:' + bg + ';color:' + color + ';"><i class="fas fa-envelope"></i></div>';
                    html += '<div class="flex-grow-1 min-width-0">';
                    html += '<div class="d-flex justify-content-between align-items-center">';
                    html += '<span class="fw-semibold small">' + c.name + '</span>';
                    html += '<small class="text-muted">' + c.created_at + '</small>';
                    html += '</div>';
                    html += '<p class="text-muted small mb-0 text-truncate">' + c.message + '</p>';
                    html += '</div></div>';
                });
                document.getElementById('recentContactsBody').innerHTML = html;
            }
        })
        .catch(function() {});
    }

    function getStatValue(el, d) {
        var parent = el.closest('.stat-card');
        if (!parent) return undefined;
        var label = parent.querySelector('.stat-label');
        if (!label) return undefined;
        var text = label.textContent.trim().toLowerCase();
        if (text.includes('mobil')) return d.total_cars;
        if (text.includes('booking') && !text.includes('active')) return d.total_bookings;
        if (text.includes('active') || text.includes('rental')) return d.total_confirmed_bookings;
        if (text.includes('user')) return d.total_users;
        if (text.includes('pesan') || text.includes('message')) return d.total_contacts;
        // Quick stats badges
        var badge = parent.closest('.list-group-item');
        if (badge) {
            var icon = badge.querySelector('i');
            if (icon) {
                if (icon.classList.contains('fa-check-circle')) return d.total_completed_bookings;
                if (icon.classList.contains('fa-times-circle')) return d.total_cancelled_bookings;
                if (icon.classList.contains('fa-users')) return d.total_customers;
                if (icon.classList.contains('fa-handshake')) return d.total_partners;
                if (icon.classList.contains('fa-clock')) return d.total_pending_partners;
                if (icon.classList.contains('fa-car')) return d.total_available_cars;
            }
        }
        return undefined;
    }

    function getStatMoneyValue(el, d) {
        return d.monthly_revenue;
    }

    function capitalize(s) {
        return s ? s.charAt(0).toUpperCase() + s.slice(1) : '';
    }

    setInterval(updateDashboard, 10000);

});
</script>
@endsection
