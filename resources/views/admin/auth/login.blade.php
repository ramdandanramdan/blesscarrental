<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --primary-gradient: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
        }
        * { font-family: 'Inter', -apple-system, sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 20% 50%, rgba(14,165,233,0.08) 0%, transparent 50%),
                        radial-gradient(ellipse at 80% 50%, rgba(59,130,246,0.06) 0%, transparent 50%);
            animation: glow 8s ease-in-out infinite alternate;
        }
        @keyframes glow {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-2%, -2%); }
        }
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            padding: 40px;
            background: rgba(255,255,255,0.98);
            border-radius: 16px;
            box-shadow: 0 24px 48px -12px rgba(0,0,0,0.3);
        }
        .login-card .brand {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-card .brand i {
            font-size: 2.5rem;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .login-card .brand h4 {
            font-weight: 700;
            margin-top: 8px;
            color: #1e293b;
        }
        .login-card .brand p {
            color: #94a3b8;
            font-size: 0.875rem;
        }
        .form-control {
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(14,165,233,0.15);
        }
        .btn-primary {
            background: var(--primary-gradient) !important;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(14,165,233,0.3);
        }
        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(14,165,233,0.4);
        }
        .input-group-text {
            border: 1.5px solid #e2e8f0;
            border-radius: 10px 0 0 10px;
            background: #f8fafc;
        }
        .form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }
        .alert { border-radius: 10px; border: none; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <i class="fas fa-car-side"></i>
            <h4>Admin Panel</h4>
            <p>{{ config('app.name') }}</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i> {{ $errors->first('email') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-medium text-sm">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="admin@blesstransmandiri.com" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label fw-medium text-sm">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-lock text-muted"></i></span>
                    <input type="password" name="password" class="form-control border-start-0" id="password" placeholder="Enter password" required>
                    <button type="button" class="input-group-text bg-white border-start-0" onclick="togglePassword()">
                        <i class="fas fa-eye text-muted" id="toggleIcon"></i>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label small" for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="small text-decoration-none" style="color:var(--primary);">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-sign-in-alt me-2"></i> Sign In
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="small text-muted text-decoration-none">
                <i class="fas fa-arrow-left me-1"></i> Back to Home
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                pwd.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
