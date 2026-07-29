<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | Bless Rent Car</title>
        <meta name="title" content="@yield('title') | Bless Rent Car">
    @else
        <title>Bless Rent Car | PT. BLESS TRANS MANDIRI - Sewa Mobil Terpercaya</title>
        <meta name="title" content="Bless Rent Car | PT. BLESS TRANS MANDIRI - Sewa Mobil Terpercaya">
    @endif

    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="Bless Rent Car PT. BLESS TRANS MANDIRI - Penyedia layanan sewa mobil terpercaya di Jakarta, Bekasi, Tangerang, Depok. Nikmati berbagai pilihan mobil berkualitas dengan harga terjangkau.">
    @endif

    <meta name="keywords" content="sewa mobil, rental mobil, bless rent car, bless trans mandiri, sewa mobil jakarta, rental mobil murah, car rental indonesia, rental mobil bekasi">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesia">
    <meta name="author" content="PT. BLESS TRANS MANDIRI">
    <link rel="canonical" href="{{ url()->current() }}">

    @hasSection('og_title')
        <meta property="og:title" content="@yield('og_title') | Bless Rent Car">
    @else
        <meta property="og:title" content="Bless Rent Car | PT. BLESS TRANS MANDIRI - Sewa Mobil Terpercaya">
    @endif

    @hasSection('og_description')
        <meta property="og:description" content="@yield('og_description')">
    @else
        <meta property="og:description" content="Penyedia layanan sewa mobil terpercaya di Jakarta, Bekasi, Tangerang, Depok. Armada lengkap, harga terjangkau.">
    @endif

    <meta property="og:image" content="@yield('og_image', 'https://placehold.co/1200x630/0ea5e9/ffffff?text=Bless+Rent+Car')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Bless Rent Car">
    <meta property="og:locale" content="id_ID">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Bless Rent Car')">
    <meta name="twitter:description" content="@yield('description', 'Penyedia layanan sewa mobil terpercaya.')">
    <meta name="twitter:image" content="@yield('og_image', 'https://placehold.co/1200x630/0ea5e9/ffffff?text=Bless+Rent+Car')">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc',
                            400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1',
                            800: '#075985', 900: '#0c4a6e', 950: '#082f49',
                        },
                        accent: { 50: '#fffbeb', 400: '#fbbf24', 500: '#f59e0b', 600: '#d97706' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'Plus Jakarta Sans', 'system-ui', 'sans-serif'],
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        grot: ['Space Grotesk', 'sans-serif'],
                    },
                    animation: {
                        'drive': 'drive 20s linear infinite',
                        'shimmer': 'shimmer 3s ease-in-out infinite',
                    },
                    keyframes: {
                        drive: { '0%': { transform: 'translateX(-200px)' }, '100%': { transform: 'translateX(calc(100vw + 200px))' } },
                        shimmer: { '0%, 100%': { backgroundPosition: '0% 50%' }, '50%': { backgroundPosition: '100% 50%' } },
                    }
                }
            }
        }
    </script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @vite('resources/css/app.css')

    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900 overflow-x-hidden" x-data="{ mobileMenu: false, chatOpen: false, scrolled: false }" x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 50)">

    {{-- Announcement Bar --}}
    <div class="relative z-50 bg-gradient-to-r from-primary-600 via-primary-500 to-sky-400 text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAyNHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-30"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-2.5 flex items-center justify-between text-sm">
            <div class="flex items-center space-x-2">
                <span class="flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="font-medium">Promo Spesial: Diskon 20% untuk Sewa 3 Hari!</span>
            </div>
            <a href="https://wa.me/6281225062153" target="_blank" class="hidden sm:flex items-center space-x-1.5 text-white/90 hover:text-white transition-colors group">
                <span>Hubungi Kami</span>
            </a>
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="sticky top-0 z-40 transition-all duration-500" :class="scrolled ? 'bg-white/95 backdrop-blur-xl shadow-lg shadow-gray-200/50' : 'bg-white/80 backdrop-blur-sm'">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="shine-sweep w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-primary-500/40 group-hover:scale-105 transition-all duration-300">
                        <span class="text-white font-bold text-lg">B</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-lg font-extrabold text-gray-900 leading-tight tracking-tight">BLESS RENT CAR</span>
                        <span class="text-[10px] text-primary-500 font-semibold tracking-[0.25em] uppercase leading-tight">PT. BLESS TRANS MANDIRI</span>
                    </div>
                </a>

                <div class="hidden lg:flex items-center space-x-1">
                    <a href="/" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('/') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Home
                    </a>
                    <a href="/about" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('about') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        About
                    </a>
                    <a href="/products" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('products') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Products
                    </a>
                    <a href="/services" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('services') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Services
                    </a>
                    <a href="/articles" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('articles') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Articles
                    </a>
                    <a href="/help" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('help') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Help
                    </a>
                    <a href="/contact" class="px-4 py-2 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->is('contact') ? 'text-white bg-gradient-to-r from-primary-500 to-primary-600 shadow-md shadow-primary-500/20' : 'text-gray-600 hover:text-primary-600 hover:bg-primary-50' }}">
                        Contact
                    </a>
                </div>

                <div class="hidden lg:flex items-center space-x-2">
                    <a href="https://wa.me/6281225062153" target="_blank" class="engine-rev px-4 py-2.5 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-green-500/30 hover:shadow-lg hover:-translate-y-0.5">
                        WhatsApp
                    </a>
                    <a href="/login" class="px-5 py-2.5 bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white text-sm font-semibold rounded-xl transition-all duration-300 shadow-md hover:shadow-primary-500/30 hover:shadow-lg hover:-translate-y-0.5">
                        Login
                    </a>
                </div>

                <button @click="mobileMenu = !mobileMenu" class="lg:hidden relative w-10 h-10 flex items-center justify-center rounded-xl hover:bg-gray-100 transition-colors" :aria-expanded="mobileMenu">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="mobileMenu" @click.away="mobileMenu = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden border-t border-gray-100 bg-white/95 backdrop-blur-xl" style="display: none;">
            <div class="px-4 py-4 space-y-1">
                <a href="/" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Home</span></a>
                <a href="/about" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">About</span></a>
                <a href="/products" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Products & Services</span></a>
                <a href="/services" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Services</span></a>
                <a href="/articles" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Articles</span></a>
                <a href="/help" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Help Center</span></a>
                <a href="/contact" class="flex items-center space-x-3 px-4 py-3 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-xl transition-all"><span class="font-medium">Contact</span></a>
                <hr class="my-3 border-gray-100">
                <a href="/login" class="block w-full px-4 py-3 bg-gradient-to-r from-primary-500 to-primary-600 text-white font-semibold rounded-xl shadow-md hover:shadow-primary-500/30 transition-all text-center">Login</a>
                <a href="https://wa.me/6281225062153" target="_blank" class="block w-full px-4 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-semibold rounded-xl shadow-md hover:shadow-green-500/30 transition-all text-center">WhatsApp</a>
            </div>
        </div>
    </nav>

    {{-- Decorative road divider between content and footer --}}
    <div class="relative h-16 bg-gray-50 overflow-hidden border-t border-b border-gray-100">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-primary-100/20 via-transparent to-transparent"></div>
        <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-0.5 road-lane opacity-40" style="background: repeating-linear-gradient(90deg, rgba(14,165,233,0.2) 0px, rgba(14,165,233,0.2) 24px, transparent 24px, transparent 48px);"></div>
        <div class="absolute inset-x-0 top-[25%] h-px bg-primary-100/30"></div>
        <div class="absolute inset-x-0 top-[75%] h-px bg-primary-100/30"></div>
        <span class="absolute left-0 top-1/2 -translate-y-1/2 text-primary-300/40 car-drive" style="animation-duration:12s;font-size:1rem;animation-delay:-3s;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M5 11l1.5-4.5h11L19 11M3 11h18v5h-2a2 2 0 01-4 0H9a2 2 0 01-4 0H3v-5z"/></svg>
        </span>
        <span class="absolute left-0 top-[18%] text-primary-300/25 car-drive-reverse" style="animation-duration:15s;font-size:0.85rem;animation-delay:-8s;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/></svg>
        </span>
        <span class="absolute left-0 top-[72%] text-primary-400/30 car-drive-slow" style="animation-duration:18s;font-size:1.1rem;animation-delay:-5s;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7"><path d="M5 11l1.5-4.5h11L19 11M3 11h18v5h-2a2 2 0 01-4 0H9a2 2 0 01-4 0H3v-5z"/></svg>
        </span>
        <div class="wind-line" style="top:30%;width:80px;animation-delay:0.5s;background:linear-gradient(90deg,transparent,rgba(14,165,233,0.06),transparent);"></div>
        <div class="wind-line" style="top:60%;width:60px;animation-delay:1.8s;background:linear-gradient(90deg,transparent,rgba(14,165,233,0.05),transparent);"></div>
    </div>

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="relative bg-gray-950 text-gray-400 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-primary-900/20 via-gray-950 to-gray-950"></div>
        <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary-500/30 to-transparent"></div>
        <div class="absolute top-0 left-0 right-0 checkered-divider opacity-[0.04]"></div>
        {{-- Drifting cars in footer background --}}
        <span class="absolute bottom-20 left-0 text-white/[0.03] car-drive-slow" style="animation-duration:25s;font-size:2rem;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-12 h-12"><path d="M5 11l1.5-4.5h11L19 11M3 11h18v5h-2a2 2 0 01-4 0H9a2 2 0 01-4 0H3v-5z"/></svg>
        </span>
        <span class="absolute bottom-40 right-0 text-white/[0.02] car-drive-reverse" style="animation-duration:30s;font-size:1.5rem;animation-delay:-10s;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99z"/></svg>
        </span>
        <span class="absolute bottom-10 right-[20%] text-white/[0.02] car-drive" style="animation-duration:22s;font-size:1.2rem;animation-delay:-15s;">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8"><path d="M5 11l1.5-4.5h11L19 11M3 11h18v5h-2a2 2 0 01-4 0H9a2 2 0 01-4 0H3v-5z"/></svg>
        </span>
        {{-- Speed lines in footer --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden opacity-20">
            <div class="speed-line" style="top:15%;width:120px;animation-delay:0.2s;background:linear-gradient(90deg,transparent,rgba(14,165,233,0.04),transparent);"></div>
            <div class="speed-line" style="top:55%;width:80px;animation-delay:1.5s;background:linear-gradient(90deg,transparent,rgba(14,165,233,0.03),transparent);"></div>
            <div class="speed-line" style="top:75%;width:100px;animation-delay:2.8s;background:linear-gradient(90deg,transparent,rgba(14,165,233,0.04),transparent);"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-0">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="shine-sweep w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-lg">B</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-lg font-extrabold text-white leading-tight tracking-tight">BLESS RENT CAR</span>
                            <span class="text-[10px] text-primary-400 font-semibold tracking-[0.25em] uppercase leading-tight">PT. BLESS TRANS MANDIRI</span>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Penyedia layanan rental mobil terpercaya di Jakarta, Bekasi, Tangerang, dan Depok. Armada lengkap, harga kompetitif, pelayanan terbaik 24 jam.
                    </p>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-primary-500 after:to-primary-400">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Home</a></li>
                        <li><a href="/about" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">About Us</a></li>
                        <li><a href="/products" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Products</a></li>
                        <li><a href="/services" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Services</a></li>
                        <li><a href="/articles" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Articles</a></li>
                        <li><a href="/contact" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-primary-500 after:to-primary-400">Our Services</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Sewa Lepas Kunci</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Sewa Dengan Driver</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Airport Transfer</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Long Term Rental</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Paket Wisata</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">Corporate Fleet</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold text-lg mb-6 relative pb-3 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-0.5 after:bg-gradient-to-r after:from-primary-500 after:to-primary-400">Contact Info</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <span class="text-gray-500 text-sm leading-relaxed">Jakarta, Bekasi, Tangerang, Depok</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <a href="tel:+6281225062153" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">+62 812-2506-2153</a>
                        </li>
                        <li class="flex items-start space-x-3">
                            <a href="mailto:info@blesstransmandiri.com" class="text-gray-500 hover:text-primary-400 text-sm transition-colors">info@blesstransmandiri.com</a>
                        </li>
                        <li class="flex items-start space-x-3">
                            <a href="https://wa.me/6281225062153" target="_blank" class="text-gray-500 hover:text-green-400 text-sm transition-colors">+62 812-2506-2153</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800/60 mt-12 pt-8 pb-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-600 text-sm">&copy; {{ date('Y') }} <span class="text-primary-400 font-semibold">Bless Rent Car</span> - PT. BLESS TRANS MANDIRI. All rights reserved.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-600 hover:text-primary-400 text-sm transition-colors">Terms & Conditions</a>
                        <a href="#" class="text-gray-600 hover:text-primary-400 text-sm transition-colors">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Chat Button --}}
    <div class="fixed bottom-6 right-6 flex flex-col space-y-3 z-50">
        <button @click="chatOpen = !chatOpen" class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white rounded-2xl flex items-center justify-center shadow-xl hover:shadow-primary-500/40 transition-all duration-300 hover:-translate-y-1 relative group" title="Live Chat">
            <span class="text-xl font-bold">C</span>
            <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-[10px] rounded-full flex items-center justify-center font-bold animate-pulse">1</span>
        </button>

        <a href="https://wa.me/6281225062153" target="_blank" class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white rounded-2xl flex items-center justify-center shadow-xl hover:shadow-green-500/40 transition-all duration-300 hover:-translate-y-1 whatsapp-pulse group" title="WhatsApp">
            <span class="text-2xl font-bold">W</span>
        </a>
    </div>

    {{-- Live Chat Widget --}}
    <div class="chat-container" :class="{ 'active': chatOpen }" x-show="chatOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-4 scale-95" style="display: none;">
        {{-- Mode Selector Screen --}}
        <div id="chatModeSelector" class="bg-white flex flex-col" style="height:520px;">
            <div class="bg-gradient-to-r from-primary-600 to-primary-500 px-5 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">B</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-sm text-white">Bless Rent Car</h4>
                        <div class="flex items-center space-x-1.5">
                            <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="text-[11px] text-white/70">Online sekarang</span>
                        </div>
                    </div>
                </div>
                <button @click="chatOpen = false" class="w-8 h-8 rounded-full bg-white/20 hover:bg-white/30 flex items-center justify-center text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="flex-1 flex flex-col items-center justify-center px-6 pb-6 pt-4">
                <div class="w-14 h-14 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mb-3 shadow-lg shadow-primary-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 text-center mb-1">Ada yang bisa kami bantu?</h3>
                <p class="text-xs text-gray-400 text-center mb-6">Pilih layanan chat yang Anda inginkan</p>

                <button onclick="selectChatMode('ai')" class="w-full max-w-sm group relative bg-white border-2 border-purple-200 hover:border-purple-400 rounded-2xl px-5 py-4 flex items-center space-x-4 transition-all duration-300 hover:shadow-lg hover:shadow-purple-500/10 hover:-translate-y-0.5 active:scale-[0.98]">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md shadow-purple-500/20 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="text-left flex-1">
                        <div class="font-bold text-sm text-gray-800">Chat dengan AI</div>
                        <div class="text-[11px] text-gray-400 mt-0.5">Respon instan 24/7 · Tanya sepuasnya</div>
                    </div>
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-purple-400 group-hover:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                <div class="flex items-center space-x-3 my-3 w-full max-w-sm">
                    <div class="flex-1 h-px bg-gray-100"></div>
                    <span class="text-[11px] text-gray-300 font-medium uppercase tracking-wider">atau</span>
                    <div class="flex-1 h-px bg-gray-100"></div>
                </div>

                <button onclick="selectChatMode('human')" class="w-full max-w-sm group relative bg-white border-2 border-primary-200 hover:border-primary-400 rounded-2xl px-5 py-4 flex items-center space-x-4 transition-all duration-300 hover:shadow-lg hover:shadow-primary-500/10 hover:-translate-y-0.5 active:scale-[0.98]">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md shadow-primary-500/20 group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div class="text-left flex-1">
                        <div class="font-bold text-sm text-gray-800">Chat dengan CS</div>
                        <div class="text-[11px] text-gray-400 mt-0.5">Admin merespon · Jam kerja</div>
                    </div>
                    <svg class="w-5 h-5 text-gray-300 group-hover:text-primary-400 group-hover:translate-x-0.5 transition-all flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                <div class="mt-5 flex items-center space-x-2 bg-gray-50 rounded-full px-4 py-2">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-[11px] text-gray-400">Biasanya merespon dalam hitungan detik</span>
                </div>
            </div>
        </div>

        {{-- Chat Screen (hidden initially) --}}
        <div id="chatScreen" class="bg-white flex-col" style="height:520px;display:none;">
            <div id="chatHeaderBar" class="bg-gradient-to-r from-primary-600 to-primary-500 px-4 py-3 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <button onclick="backToModeSelector()" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors" title="Ganti mode chat">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <div id="chatHeaderAvatar" class="w-9 h-9 bg-purple-500/30 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xs" id="chatHeaderIcon">AI</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-sm text-white" id="chatHeaderTitle">AI Assistant</h4>
                        <div class="flex items-center space-x-1.5">
                            <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="text-[11px] text-white/70" id="chatHeaderStatus">Online · Respon instan</span>
                        </div>
                    </div>
                </div>
                <button @click="chatOpen = false" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-lg flex items-center justify-center text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="chat-messages bg-gray-50 flex-1 overflow-y-auto" id="chatMessagesContainer" style="flex:1;">
                <div class="p-4 space-y-4" id="chatHistory"></div>
            </div>
            <div class="chat-input bg-white border-t border-gray-100 p-3">
                <div class="flex items-center space-x-2">
                    <input type="text" id="chatInput" placeholder="Ketik pesan..." class="flex-1 border-0 outline-none text-sm px-4 py-2.5 focus:ring-0 bg-gray-50 rounded-xl"
                        onkeydown="if(event.key==='Enter' && this.value.trim()) { sendChatMessage(this.value); this.value=''; }">
                    <button onclick="var inp=document.getElementById('chatInput'); if(inp.value.trim()) { sendChatMessage(inp.value); inp.value=''; }" class="w-10 h-10 bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-xl flex items-center justify-center hover:shadow-md transition-all flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite('resources/js/app.js')

    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 400,
                easing: 'ease-out-cubic',
                once: true,
                offset: 40,
                delay: 50,
                disable: window.innerWidth < 640 ? true : false
            });
            window.addEventListener('load', function() { AOS.refresh(); });
            document.addEventListener('scroll', function() { AOS.refresh(); });
        }
    </script>

    <script>
        let chatLastId = 0;
        let chatPollTimer = null;
        let currentChatType = 'ai';
        let aiMessages = [];
        let humanMessages = [];

        function selectChatMode(mode) {
            currentChatType = mode;
            document.getElementById('chatModeSelector').style.display = 'none';
            document.getElementById('chatScreen').style.display = 'flex';

            if (mode === 'ai') {
                document.getElementById('chatHeaderIcon').textContent = 'AI';
                document.getElementById('chatHeaderTitle').textContent = 'AI Assistant';
                document.getElementById('chatHeaderStatus').textContent = 'Online · Respon instan';
                document.getElementById('chatHeaderAvatar').className = 'w-9 h-9 bg-purple-500/30 rounded-xl flex items-center justify-center';
                document.getElementById('chatInput').placeholder = 'Tanya apa saja tentang rental mobil...';
                document.getElementById('chatInput').style.borderColor = '';
            } else {
                document.getElementById('chatHeaderIcon').textContent = 'CS';
                document.getElementById('chatHeaderTitle').textContent = 'Customer Service';
                document.getElementById('chatHeaderStatus').textContent = 'Menunggu admin merespon...';
                document.getElementById('chatHeaderAvatar').className = 'w-9 h-9 bg-white/20 rounded-xl flex items-center justify-center';
                document.getElementById('chatInput').placeholder = 'Ketik pesan untuk CS...';
                document.getElementById('chatInput').style.borderColor = '';
            }

            fetch('/chat/set-type', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ chat_type: mode })
            });

            chatLastId = 0;
            loadChatMessages();
        }

        function backToModeSelector() {
            document.getElementById('chatScreen').style.display = 'none';
            document.getElementById('chatModeSelector').style.display = 'flex';
        }

        function sendChatMessage(msg) {
            if (!msg.trim()) return;
            const fd = new FormData();
            fd.append('name', 'Pengunjung');
            fd.append('email', 'guest@example.com');
            fd.append('message', msg);
            fd.append('chat_type', currentChatType);

            addChatBubbleLocal(msg, false);

            if (currentChatType === 'human') {
                showTypingIndicator();
            }

            fetch('/chat/send', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: fd
            }).then(function(r) { return r.json(); }).then(function(data) {
                if (data.chat_type === 'ai') {
                    setTimeout(function() { loadChatMessages(); }, 300);
                }
            });
        }

        function showTypingIndicator() {
            var container = document.getElementById('chatHistory');
            if (!container) return;
            var existing = document.getElementById('typingIndicator');
            if (existing) existing.remove();
            var div = document.createElement('div');
            div.id = 'typingIndicator';
            div.className = 'flex items-start space-x-2 mb-3';
            div.innerHTML = '<div class="w-8 h-8 bg-primary-100 rounded-xl flex items-center justify-center flex-shrink-0"><span class="text-primary-500 font-bold text-xs">CS</span></div><div class="bg-white rounded-2xl rounded-tl-none px-4 py-3 shadow-sm"><div class="flex space-x-1"><div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0s;"></div><div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.15s;"></div><div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay:0.3s;"></div></div></div>';
            container.appendChild(div);
            var mc = document.getElementById('chatMessagesContainer');
            if (mc) mc.scrollTop = mc.scrollHeight;
        }

        function loadChatMessages() {
            fetch('/chat/messages').then(function(r) { return r.json(); }).then(function(data) {
                var container = document.getElementById('chatHistory');
                if (!container) return;
                var typingEl = document.getElementById('typingIndicator');
                if (typingEl) typingEl.remove();
                container.innerHTML = '';
                chatLastId = 0;

                data.forEach(function(msg) {
                    if (msg.chat_type !== currentChatType) return;
                    var isAI = msg.chat_type === 'ai' && msg.is_from_admin;
                    addChatBubble(msg.message, msg.is_from_admin, isAI);
                    if (msg.id > chatLastId) chatLastId = msg.id;
                });

                if (data.length === 0 || data.filter(function(m) { return m.chat_type === currentChatType; }).length === 0) {
                    if (currentChatType === 'ai') {
                        addChatBubbleLocal('Halo! Saya AI Assistant dari Bless Rent Car 🤖 Silakan tanyakan apa saja tentang layanan rental mobil kami!', true, true);
                    } else {
                        addChatBubbleLocal('Halo! Terima kasih sudah menghubungi Customer Service kami 👨‍💼 Mohon tunggu sebentar, admin kami akan segera merespon.', true, false);
                    }
                }
            });
        }

        function addChatBubble(text, isAdmin, isAI) {
            var container = document.getElementById('chatHistory');
            if (!container) return;
            var div = document.createElement('div');
            if (isAdmin) {
                var csLabel = isAI
                    ? '<div class="flex items-center space-x-1 mb-1"><span class="inline-block bg-purple-100 text-purple-600 text-[9px] font-bold px-1.5 py-0.5 rounded">AI</span></div>'
                    : '<div class="flex items-center space-x-1 mb-1"><span class="inline-block bg-primary-100 text-primary-600 text-[9px] font-bold px-1.5 py-0.5 rounded">CS</span></div>';
                var bgClass = isAI ? 'bg-purple-50 border border-purple-100' : 'bg-white border border-gray-100';
                var avatarBg = isAI ? 'bg-purple-100' : 'bg-primary-100';
                var avatarText = isAI ? 'text-purple-500' : 'text-primary-500';
                var avatarLabel = isAI ? 'AI' : 'CS';
                div.className = 'flex items-start space-x-2 mb-3';
                div.innerHTML = '<div class="w-8 h-8 ' + avatarBg + ' rounded-xl flex items-center justify-center flex-shrink-0"><span class="' + avatarText + ' font-bold text-xs">' + avatarLabel + '</span></div><div class="rounded-2xl rounded-tl-none px-4 py-3 max-w-[80%] shadow-sm ' + bgClass + '">' + csLabel + '<p class="text-sm text-gray-700 whitespace-pre-line">' + text + '</p></div>';
            } else {
                div.className = 'flex justify-end mb-3';
                div.innerHTML = '<div class="bg-gradient-to-r from-primary-500 to-primary-600 text-white rounded-2xl rounded-tr-none px-4 py-3 max-w-[80%] shadow-sm"><p class="text-sm whitespace-pre-line">' + text + '</p></div>';
            }
            container.appendChild(div);
            var mc = document.getElementById('chatMessagesContainer');
            if (mc) mc.scrollTop = mc.scrollHeight;
        }

        function addChatBubbleLocal(text, isAdmin, isAI) {
            addChatBubble(text, isAdmin, isAI);
        }

        function pollChatMessages() {
            if (currentChatType !== 'human') return;

            fetch('/chat/check-new-messages?last_id=' + chatLastId).then(function(r) { return r.json(); }).then(function(data) {
                if (data.messages && data.messages.length > 0) {
                    var typingEl = document.getElementById('typingIndicator');
                    if (typingEl) typingEl.remove();
                    data.messages.forEach(function(msg) {
                        var isAI = false;
                        addChatBubble(msg.message, true, isAI);
                        if (msg.id > chatLastId) chatLastId = msg.id;
                    });
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            chatPollTimer = setInterval(pollChatMessages, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>
