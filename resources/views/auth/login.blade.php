@extends('layouts.app')

@section('title', 'Login - Bless Rent Car')
@section('description', 'Masuk ke akun Bless Rent Car Anda untuk mengelola pemesanan dan profil.')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .login-section {
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        min-height: calc(100vh - 80px);
        width: 100%;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0a0e27;
        overflow: hidden;
        margin: -64px 0 -60px 0;
        padding: 80px 16px 60px;
    }

    .login-section * { box-sizing: border-box; }

    .login-section .login-bg {
        position: absolute;
        inset: 0;
        z-index: 0;
    }

    .login-section .login-bg::before {
        content: '';
        position: absolute;
        width: 800px; height: 800px;
        top: -200px; left: -200px;
        background: radial-gradient(circle, rgba(14,165,233,0.18) 0%, transparent 70%);
        animation: meshMove1 20s ease-in-out infinite alternate;
    }
    .login-section .login-bg::after {
        content: '';
        position: absolute;
        width: 700px; height: 700px;
        bottom: -150px; right: -150px;
        background: radial-gradient(circle, rgba(124,58,237,0.15) 0%, transparent 70%);
        animation: meshMove2 18s ease-in-out infinite alternate;
    }

    @keyframes meshMove1 {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(120px, 80px) scale(1.15); }
    }
    @keyframes meshMove2 {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(-100px, -60px) scale(1.1); }
    }

    .mesh-blob {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
    }
    .mesh-blob-1 {
        width: 500px; height: 500px;
        top: 50%; left: 30%;
        background: rgba(59,130,246,0.12);
        animation: blobA 14s ease-in-out infinite alternate;
    }
    .mesh-blob-2 {
        width: 400px; height: 400px;
        top: 20%; right: 10%;
        background: rgba(168,85,247,0.1);
        animation: blobB 16s ease-in-out infinite alternate;
    }
    .mesh-blob-3 {
        width: 350px; height: 350px;
        bottom: 10%; left: 10%;
        background: rgba(6,182,212,0.08);
        animation: blobC 12s ease-in-out infinite alternate;
    }

    @keyframes blobA {
        from { transform: translate(0, 0) scale(1); }
        to { transform: translate(60px, -40px) scale(1.2); }
    }
    @keyframes blobB {
        from { transform: translate(0, 0) scale(1); }
        to { transform: translate(-50px, 50px) scale(0.9); }
    }
    @keyframes blobC {
        from { transform: translate(0, 0) scale(1); }
        to { transform: translate(40px, -30px) scale(1.15); }
    }

    .login-section .grid-overlay {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255,255,255,0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.015) 1px, transparent 1px);
        background-size: 60px 60px;
        z-index: 0;
    }

    .login-section .particle {
        position: absolute;
        width: 3px; height: 3px;
        background: rgba(14,165,233,0.4);
        border-radius: 50%;
        z-index: 0;
    }
    .login-section .particle:nth-child(1) { top: 10%; left: 15%; animation: twinkle 3s ease-in-out infinite; }
    .login-section .particle:nth-child(2) { top: 25%; left: 70%; animation: twinkle 4s ease-in-out 0.5s infinite; width: 2px; height: 2px; }
    .login-section .particle:nth-child(3) { top: 60%; left: 25%; animation: twinkle 3.5s ease-in-out 1s infinite; }
    .login-section .particle:nth-child(4) { top: 80%; left: 80%; animation: twinkle 4.5s ease-in-out 1.5s infinite; width: 2px; height: 2px; }
    .login-section .particle:nth-child(5) { top: 45%; left: 50%; animation: twinkle 3s ease-in-out 0.8s infinite; background: rgba(124,58,237,0.4); }
    .login-section .particle:nth-child(6) { top: 15%; left: 85%; animation: twinkle 5s ease-in-out 2s infinite; width: 4px; height: 4px; background: rgba(14,165,233,0.25); }
    .login-section .particle:nth-child(7) { top: 70%; left: 10%; animation: twinkle 4s ease-in-out 0.3s infinite; }
    .login-section .particle:nth-child(8) { top: 90%; left: 45%; animation: twinkle 3.2s ease-in-out 1.2s infinite; width: 2px; height: 2px; }
    .login-section .particle:nth-child(9) { top: 35%; left: 92%; animation: twinkle 3.8s ease-in-out 0.7s infinite; background: rgba(124,58,237,0.3); }
    .login-section .particle:nth-child(10) { top: 55%; left: 5%; animation: twinkle 4.2s ease-in-out 1.8s infinite; }

    @keyframes twinkle {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.8); }
    }

    .login-section .hero-car-track {
        position: absolute;
        bottom: 18%;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, rgba(14,165,233,0.15) 50%, transparent 100%);
        z-index: 0;
    }
    .login-section .hero-car-track::before {
        content: '\f1b9';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        bottom: -14px;
        font-size: 28px;
        color: rgba(14,165,233,0.2);
        animation: carDrive 18s linear infinite;
    }
    .login-section .hero-car-track::after {
        content: '\f5e1';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: -20px;
        font-size: 18px;
        color: rgba(124,58,237,0.15);
        animation: carDrive 24s linear 4s infinite;
    }

    @keyframes carDrive {
        0% { left: -60px; opacity: 0; }
        5% { opacity: 1; }
        95% { opacity: 1; }
        100% { left: calc(100% + 60px); opacity: 0; }
    }

    .login-section .floating-ring {
        position: absolute;
        border: 1px solid rgba(14,165,233,0.08);
        border-radius: 50%;
        z-index: 0;
    }
    .floating-ring:nth-child(1) {
        width: 300px; height: 300px;
        top: -50px; right: -80px;
        animation: ringFloat 10s ease-in-out infinite alternate;
    }
    .floating-ring:nth-child(2) {
        width: 200px; height: 200px;
        bottom: -40px; left: -60px;
        animation: ringFloat 12s ease-in-out 2s infinite alternate;
        border-color: rgba(124,58,237,0.06);
    }
    .floating-ring:nth-child(3) {
        width: 150px; height: 150px;
        top: 30%; left: 5%;
        animation: ringFloat 8s ease-in-out 1s infinite alternate;
    }

    @keyframes ringFloat {
        from { transform: translate(0, 0) rotate(0deg); }
        to { transform: translate(20px, -15px) rotate(180deg); }
    }

    .login-glass {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 440px;
    }

    .glass-card {
        background: rgba(255,255,255,0.03);
        backdrop-filter: blur(40px);
        -webkit-backdrop-filter: blur(40px);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 44px 40px;
        box-shadow:
            0 0 0 1px rgba(255,255,255,0.03) inset,
            0 32px 64px -16px rgba(0,0,0,0.5),
            0 0 120px -20px rgba(14,165,233,0.1);
    }

    @media (max-width: 480px) {
        .glass-card { padding: 32px 24px; border-radius: 20px; }
        .login-section { padding: 70px 12px 50px; margin: -64px 0 -50px 0; }
    }

    .brand-center {
        text-align: center;
        margin-bottom: 36px;
    }

    .brand-logo {
        width: 64px; height: 64px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        animation: logoGlow 3s ease-in-out infinite;
    }
    .brand-logo::after {
        content: '';
        position: absolute;
        inset: -3px;
        border-radius: 23px;
        background: linear-gradient(135deg, rgba(14,165,233,0.4), rgba(99,102,241,0.4));
        z-index: -1;
        filter: blur(12px);
        opacity: 0.5;
    }
    .brand-logo i {
        font-size: 1.6rem;
        color: white;
    }

    @keyframes logoGlow {
        0%, 100% { box-shadow: 0 4px 20px rgba(14,165,233,0.3); transform: scale(1); }
        50% { box-shadow: 0 8px 40px rgba(14,165,233,0.45); transform: scale(1.03); }
    }

    .brand-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
        letter-spacing: -0.02em;
    }
    .brand-subtitle {
        font-size: 0.875rem;
        color: rgba(255,255,255,0.4);
        margin-top: 6px;
        font-weight: 400;
    }

    .field-group {
        margin-bottom: 20px;
    }
    .field-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: rgba(255,255,255,0.5);
        margin-bottom: 8px;
        letter-spacing: 0.03em;
        text-transform: uppercase;
    }
    .field-icon-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .field-icon-label i {
        font-size: 0.7rem;
        color: rgba(14,165,233,0.6);
    }

    .glass-input-wrap {
        position: relative;
    }
    .glass-input {
        width: 100%;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 14px;
        padding: 14px 16px;
        font-size: 0.9rem;
        color: white;
        outline: none;
        transition: all 0.3s ease;
    }
    .glass-input::placeholder {
        color: rgba(255,255,255,0.25);
    }
    .glass-input:focus {
        border-color: rgba(14,165,233,0.5);
        background: rgba(255,255,255,0.06);
        box-shadow: 0 0 0 4px rgba(14,165,233,0.08), 0 0 20px -4px rgba(14,165,233,0.15);
    }

    .input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255,255,255,0.2);
        font-size: 0.85rem;
        pointer-events: none;
        transition: color 0.3s ease;
    }
    .glass-input:focus ~ .input-icon {
        color: rgba(14,165,233,0.6);
    }

    .eye-toggle {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: rgba(255,255,255,0.3);
        cursor: pointer;
        padding: 4px;
        transition: color 0.2s ease;
        z-index: 2;
    }
    .eye-toggle:hover {
        color: rgba(14,165,233,0.8);
    }

    .field-error {
        color: #f87171;
        font-size: 0.75rem;
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .field-error i { font-size: 0.65rem; }

    .glass-checkbox {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        user-select: none;
    }
    .glass-checkbox input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 18px; height: 18px;
        border: 1.5px solid rgba(255,255,255,0.15);
        border-radius: 5px;
        background: rgba(255,255,255,0.03);
        cursor: pointer;
        position: relative;
        transition: all 0.2s ease;
        flex-shrink: 0;
    }
    .glass-checkbox input[type="checkbox"]:checked {
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        border-color: transparent;
    }
    .glass-checkbox input[type="checkbox"]:checked::after {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        font-size: 10px;
        color: white;
    }
    .glass-checkbox span {
        font-size: 0.82rem;
        color: rgba(255,255,255,0.45);
    }

    .forgot-link {
        font-size: 0.82rem;
        color: rgba(14,165,233,0.7);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }
    .forgot-link:hover {
        color: #38bdf8;
    }

    .btn-submit {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 14px;
        background: linear-gradient(135deg, #0ea5e9, #6366f1);
        color: white;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        margin-top: 4px;
    }
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 40px -8px rgba(14,165,233,0.4);
    }
    .btn-submit:active {
        transform: translateY(0);
    }
    .btn-submit .btn-shimmer {
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        animation: btnShimmer 4s ease-in-out infinite;
    }
    @keyframes btnShimmer {
        0%, 100% { left: -100%; }
        50% { left: 100%; }
    }

    .divider-line {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 28px 0;
    }
    .divider-line::before,
    .divider-line::after {
        content: '';
        flex: 1;
        height: 1px;
        background: rgba(255,255,255,0.06);
    }
    .divider-line span {
        font-size: 0.75rem;
        color: rgba(255,255,255,0.25);
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 500;
    }

    .social-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
        margin-bottom: 24px;
    }
    .social-item {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 12px;
        background: rgba(255,255,255,0.02);
        text-decoration: none;
        transition: all 0.25s ease;
    }
    .social-item:hover {
        background: rgba(255,255,255,0.06);
        border-color: rgba(255,255,255,0.12);
        transform: translateY(-2px);
    }
    .social-item i {
        font-size: 1.1rem;
        margin-right: 6px;
    }
    .social-item span {
        font-size: 0.78rem;
        font-weight: 500;
        color: rgba(255,255,255,0.5);
    }
    .social-google i { color: #ea4335; }
    .social-facebook i { color: #1877f2; }
    .social-wa i { color: #25d366; }

    .register-text {
        text-align: center;
        font-size: 0.85rem;
        color: rgba(255,255,255,0.35);
    }
    .register-text a {
        color: rgba(14,165,233,0.8);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
    }
    .register-text a:hover {
        color: #38bdf8;
    }

    .error-box {
        background: rgba(239,68,68,0.08);
        border: 1px solid rgba(239,68,68,0.2);
        border-radius: 12px;
        padding: 12px 16px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        color: #fca5a5;
        font-size: 0.82rem;
    }
    .error-box i { font-size: 0.9rem; color: #f87171; flex-shrink: 0; }

    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 0.5s ease forwards;
    }
    .fd1 { animation-delay: 0.05s; }
    .fd2 { animation-delay: 0.12s; }
    .fd3 { animation-delay: 0.2s; }
    .fd4 { animation-delay: 0.28s; }
    .fd5 { animation-delay: 0.36s; }
    .fd6 { animation-delay: 0.44s; }
    .fd7 { animation-delay: 0.52s; }
    .fd8 { animation-delay: 0.6s; }
    .fd9 { animation-delay: 0.68s; }

    @keyframes fadeIn {
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@section('content')
<section class="login-section" x-data="{ showPass: false }">
    <div class="login-bg">
        <div class="grid-overlay"></div>
        <div class="mesh-blob mesh-blob-1"></div>
        <div class="mesh-blob mesh-blob-2"></div>
        <div class="mesh-blob mesh-blob-3"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="floating-ring"></div>
        <div class="floating-ring"></div>
        <div class="floating-ring"></div>
        <div class="hero-car-track"></div>
    </div>

    <div class="login-glass">
        <div class="glass-card">
            <div class="brand-center fade-in fd1">
                <a href="/" style="text-decoration:none;">
                    <div class="brand-logo">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="brand-title">BLESS RENT CAR</div>
                    <div class="brand-subtitle">PT. Bless Trans Mandiri</div>
                </a>
            </div>

            <div class="fade-in fd2" style="text-align:center;margin-bottom:28px;">
                <h1 style="color:white;font-size:1.35rem;font-weight:700;margin:0 0 6px;">Selamat Datang Kembali</h1>
                <p style="color:rgba(255,255,255,0.35);font-size:0.85rem;margin:0;">Masuk untuk melanjutkan ke akun Anda</p>
            </div>

            @if ($errors->any())
                <div class="error-box fade-in fd2">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field-group fade-in fd3">
                    <label class="field-label">
                        <span class="field-icon-label"><i class="fas fa-envelope"></i> Email Address</span>
                    </label>
                    <div class="glass-input-wrap">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                            class="glass-input" placeholder="name@email.com" style="padding-left:44px;">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <div class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="field-group fade-in fd4">
                    <label class="field-label">
                        <span class="field-icon-label"><i class="fas fa-lock"></i> Password</span>
                    </label>
                    <div class="glass-input-wrap">
                        <input :type="showPass ? 'text' : 'password'" id="password" name="password" required autocomplete="current-password"
                            class="glass-input" placeholder="Enter your password" style="padding-left:44px;padding-right:44px;">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="eye-toggle" @click="showPass = !showPass">
                            <i :class="showPass ? 'fas fa-eye-slash' : 'fas fa-eye'" style="font-size:0.95rem;"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="field-error"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="fade-in fd5" style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
                    <label class="glass-checkbox">
                        <input type="checkbox" name="remember" @if(old('remember')) checked @endif>
                        <span>Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Lupa password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-submit fade-in fd6">
                    <span class="btn-shimmer"></span>
                    <i class="fas fa-arrow-right" style="margin-right:8px;"></i> Masuk
                </button>
            </form>

            <div class="divider-line fade-in fd7">
                <span>atau lanjutkan dengan</span>
            </div>

            <div class="social-row fade-in fd8">
                <a href="{{ route('social.login', 'google') }}" class="social-item social-google">
                    <i class="fab fa-google"></i>
                    <span>Google</span>
                </a>
                <a href="{{ route('social.login', 'facebook') }}" class="social-item social-facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </a>
                <a href="https://wa.me/6281225062153" target="_blank" class="social-item social-wa">
                    <i class="fab fa-whatsapp"></i>
                    <span>WhatsApp</span>
                </a>
            </div>

            <div class="register-text fade-in fd9">
                Belum punya akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>

        <div style="text-align:center;margin-top:20px;position:relative;z-index:10;" class="fade-in fd9">
            <a href="{{ route('home') }}" style="font-size:0.78rem;color:rgba(255,255,255,0.25);text-decoration:none;transition:color 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right:6px;"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection
