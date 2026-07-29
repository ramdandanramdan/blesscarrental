<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-brand">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-car-side"></i>
                            <span>{{ config('app.name') }}</span>
                        </a>
            </div>
            <nav class="sidebar-nav">
                <ul class="nav flex-column">
                    <div class="sidebar-nav-label">Main</div>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <div class="sidebar-nav-label">Content</div>
                    <li class="nav-item">
                        <a href="{{ route('admin.homepage.index') }}" class="nav-link {{ request()->routeIs('admin.homepage.*') ? 'active' : '' }}">
                            <i class="fas fa-home"></i>
                            <span>Homepage</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt"></i>
                            <span>Pages</span>
                        </a>
                    </li>
                    <div class="sidebar-nav-label">Inventory</div>
                    <li class="nav-item">
                        <a href="#carsSubmenu" data-bs-toggle="collapse" class="nav-link {{ request()->routeIs('admin.cars.*') || request()->routeIs('admin.categories.*') ? '' : 'collapsed' }}">
                            <i class="fas fa-car"></i>
                            <span>Cars Management</span>
                        </a>
                        <ul class="nav flex-column collapse {{ request()->routeIs('admin.cars.*') || request()->routeIs('admin.categories.*') ? 'show' : '' }}" id="carsSubmenu">
                            <li class="nav-item">
                                <a href="{{ route('admin.cars.index') }}" class="nav-link sub {{ request()->routeIs('admin.cars.index') ? 'active' : '' }}">
                                    <span>All Cars</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.cars.create') }}" class="nav-link sub {{ request()->routeIs('admin.cars.create') ? 'active' : '' }}">
                                    <span>Add New</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link sub {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                    <span>Categories</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            <span>Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                            <i class="fas fa-newspaper"></i>
                            <span>Articles/News</span>
                        </a>
                    </li>
                    <div class="sidebar-nav-label">Engagement</div>
                    <li class="nav-item">
                        <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                            <i class="fas fa-question-circle"></i>
                            <span>FAQs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                            <i class="fas fa-envelope"></i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check"></i>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <i class="fas fa-star"></i>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <div class="sidebar-nav-label">System</div>
                    <li class="nav-item">
                        <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                            <i class="fas fa-sliders-h"></i>
                            <span>Sliders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.chat.index') }}" class="nav-link {{ request()->routeIs('admin.chat.*') ? 'active' : '' }}">
                            <i class="fas fa-comments"></i>
                            <span>Live Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Sidebar Overlay (mobile) -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Top Navbar -->
            <nav class="admin-topbar navbar navbar-expand navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <button class="sidebar-toggle btn btn-sm d-lg-none me-2" type="button" id="sidebarToggle">
                        <i class="fas fa-bars"></i>
                    </button>

                    <form class="d-none d-md-flex me-auto" action="#" method="GET">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="search" class="form-control border-start-0" placeholder="Search anything..." aria-label="Search">
                        </div>
                    </form>

                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Live Chat Notification -->
                        <li class="nav-item mx-2">
                            <a href="{{ route('admin.chat.index') }}" class="nav-link position-relative" title="Live Chat">
                                <i class="fas fa-comments fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success" id="chatUnreadCount" style="display:none;">
                                    0
                                </span>
                            </a>
                        </li>

                        <!-- Notifications -->
                        <li class="nav-item dropdown mx-2">
                            <a href="#" class="nav-link position-relative" data-bs-toggle="dropdown">
                                <i class="fas fa-bell fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notificationCount">
                                    0
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end notification-dropdown" style="min-width: 320px;">
                                <div class="dropdown-header d-flex justify-content-between align-items-center">
                                    <strong>Notifications</strong>
                                    <span class="small text-muted">Pending Bookings</span>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div id="notificationList">
                                    <p class="text-center text-muted small py-3 mb-0">No notifications</p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('admin.bookings.index') }}" class="dropdown-item text-center small">View All Bookings</a>
                            </div>
                        </li>

                        <!-- Admin User Dropdown -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="dropdown">
                                <div class="avatar-circle bg-primary text-white me-2">
                                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                                </div>
                                <div class="d-none d-md-block">
                                    <span class="fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</span>
                                    <small class="d-block text-muted lh-1">{{ auth()->user()->email ?? '' }}</small>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('admin.users.show', auth()->id()) }}" class="dropdown-item">
                                        <i class="fas fa-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.settings.index') }}" class="dropdown-item">
                                        <i class="fas fa-cog me-2"></i> Settings
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Content Area -->
            <main class="admin-content admin-content-enter">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-slide-down" role="alert">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm anim-slide-down" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="admin-footer text-center text-muted py-3 border-top">
                <small>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</small>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    @yield('scripts')

    <script>
    function fetchNotifications() {
        fetch('{{ route("admin.notifications") }}', {
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            const badge = document.getElementById('notificationCount');
            if(badge) badge.textContent = data.count;

            const list = document.getElementById('notificationList');
            if(!list) return;

            if(data.count === 0) {
                list.innerHTML = '<p class="text-center text-muted small py-3 mb-0">No notifications</p>';
                return;
            }

            list.innerHTML = data.notifications.map(n => `
                <a href="${n.url}" class="dropdown-item notification-item px-4 py-3 border-bottom">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3">
                            <div class="w-8 h-8 bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width:32px;height:32px;">
                                <i class="fas fa-car text-primary" style="font-size:12px;"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 min-width-0">
                            <p class="mb-0 fw-semibold small text-truncate">${n.message}</p>
                            <small class="text-muted">${n.car} · Rp ${n.total}</small>
                        </div>
                        <small class="text-muted ms-2 text-nowrap">${n.time}</small>
                    </div>
                </a>
            `).join('');
        })
        .catch(() => {});
    }

    let lastChatUnread = 0;
    function fetchChatUnread() {
        fetch('{{ route("admin.chat.unreadCount") }}', {
            headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            const badge = document.getElementById('chatUnreadCount');
            if (!badge) return;
            if (data.count > 0) {
                badge.style.display = '';
                badge.textContent = data.count;
                if (data.count > lastChatUnread && lastChatUnread > 0) {
                    try {
                        const audio = document.getElementById('chatNotifSound');
                        if (audio) { audio.currentTime = 0; audio.volume = 0.3; audio.play().catch(()=>{}); }
                    } catch(e) {}
                }
            } else {
                badge.style.display = 'none';
            }
            lastChatUnread = data.count;
        })
        .catch(() => {});
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchNotifications();
        fetchChatUnread();
        setInterval(fetchNotifications, 30000);
        setInterval(fetchChatUnread, 10000);
    });
    </script>
</body>
</html>
