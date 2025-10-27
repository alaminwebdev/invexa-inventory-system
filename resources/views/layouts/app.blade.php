<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Invexa Inventory System')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.12);
            --glass-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            --text-primary: #ffffff;
            --text-secondary: rgba(255, 255, 255, 0.85);
            --text-light: rgba(255, 255, 255, 0.6);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle Background Animation */
        .background-shapes {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            filter: blur(40px);
            animation: gentleFloat 15s ease-in-out infinite;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 250px;
            height: 250px;
            top: 60%;
            right: 10%;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 200px;
            height: 200px;
            bottom: 20%;
            left: 15%;
            animation-delay: 10s;
        }

        @keyframes gentleFloat {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(10px, -15px) scale(1.05);
            }

            50% {
                transform: translate(-5px, 10px) scale(0.95);
            }

            75% {
                transform: translate(15px, 5px) scale(1.02);
            }
        }

        /* Main Layout */
        .main-wrapper {
            width: 100%;
        }

        /* Brand Section */
        .brand-section {
            padding: 2rem;
        }

        .brand-logo {
            width: 70px;
            height: 70px;
            background: var(--accent-gradient);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 15px 30px rgba(79, 172, 254, 0.3);
            position: relative;
            overflow: hidden;
        }

        .brand-logo::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s infinite;
        }

        .brand-logo i {
            font-size: 1.75rem;
            color: white;
            position: relative;
            z-index: 1;
        }

        .brand-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #fff, #e2e8f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-subtitle {
            font-size: 0.95rem;
            color: var(--text-secondary);
            line-height: 1.5;
            margin-bottom: 2.5rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.875rem;
            margin: 0 auto;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 1.25rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.1);
        }

        .feature-icon {
            width: 36px;
            height: 36px;
            background: var(--secondary-gradient);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.625rem;
        }

        .feature-icon i {
            color: white;
            font-size: 1rem;
        }

        .feature-text {
            color: var(--text-secondary);
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* Auth Form */
        .auth-container {
            padding: 2rem;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 18px;
            padding: 2rem;
            box-shadow: var(--glass-shadow);
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            transform: rotate(45deg);
            animation: cardShine 6s infinite;
        }

        .auth-header {
            text-align: center;
            margin-bottom: 1.75rem;
            position: relative;
            z-index: 2;
        }

        .auth-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.375rem;
        }

        .auth-subtitle {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 2;
        }

        .form-control {
            width: 100%;
            height: 46px;
            padding: 0.875rem 2.75rem 0.875rem 2.75rem;
            background: rgba(255, 255, 255, 0.08);
            border: 1.5px solid rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            color: var(--text-primary);
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: var(--text-light);
            font-size: 0.875rem;
        }

        .form-control:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .form-control:-webkit-autofill,
        .form-control:-webkit-autofill:hover,
        .form-control:-webkit-autofill:focus {
            -webkit-text-fill-color: var(--text-primary);
            -webkit-box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.05) inset;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            transition: background-color 5000s ease-in-out 0s;
            font-size: 0.875rem;
        }

        .form-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 0.875rem;
            z-index: 2;
        }

        .password-toggle {
            position: absolute;
            right: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
            padding: 0.375rem;
            transition: color 0.3s ease;
            z-index: 2;
            font-size: 0.875rem;
        }

        .password-toggle:hover {
            color: var(--text-primary);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.25rem;
            position: relative;
            z-index: 2;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-check-input {
            width: 16px;
            height: 16px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-check-input:checked {
            background: var(--accent-gradient);
            border-color: rgba(255, 255, 255, 0.5);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='m6 10 3 3 6-6'/%3e%3c/svg%3e");
        }

        .form-check-label {
            color: var(--text-secondary);
            font-size: 0.8rem;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.8rem;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--text-primary);
        }

        .btn-primary {
            width: 100%;
            height: 46px;
            background: var(--accent-gradient);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            position: relative;
            z-index: 2;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 172, 254, 0.4);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.25rem;
            color: var(--text-secondary);
            font-size: 0.8rem;
            position: relative;
            z-index: 2;
        }

        .auth-footer a {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .auth-footer a:hover {
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        }

        .alert {
            padding: 0.875rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            border: none;
            backdrop-filter: blur(10px);
            font-size: 0.8rem;
            position: relative;
            z-index: 2;
        }

        .alert-success {
            background: rgba(72, 187, 120, 0.15);
            color: #48bb78;
            border: 1px solid rgba(72, 187, 120, 0.3);
        }

        .alert-danger {
            background: rgba(245, 101, 101, 0.15);
            color: #f56565;
            border: 1px solid rgba(245, 101, 101, 0.3);
        }

        @keyframes shine {
            0% {
                transform: rotate(45deg) translateX(-100%);
            }

            100% {
                transform: rotate(45deg) translateX(100%);
            }
        }

        @keyframes cardShine {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .brand-section {
                padding: 1.5rem;
            }

            .brand-title {
                font-size: 1.75rem;
            }

            .brand-subtitle {
                font-size: 0.9rem;
                margin-bottom: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
                max-width: 280px;
            }

            .feature-item {
                padding: 1rem;
            }

            .auth-card {
                padding: 1.75rem 1.25rem;
            }

            .auth-title {
                font-size: 1.375rem;
            }

            .auth-subtitle {
                font-size: 0.85rem;
            }

            .form-options {
                flex-direction: column;
                gap: 0.875rem;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            .auth-card {
                padding: 1.5rem 1rem;
            }

            .brand-logo {
                width: 60px;
                height: 60px;
            }

            .brand-logo i {
                font-size: 1.5rem;
            }

            .brand-title {
                font-size: 1.5rem;
            }

            .form-control {
                height: 44px;
                font-size: 0.85rem;
            }

            .btn-primary {
                height: 44px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <!-- Subtle Background Shapes -->
    <div class="background-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="main-wrapper">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <!-- Left Side - Branding -->
                <div class="col-lg-5 col-md-6 mb-5 mb-md-0">
                    <div class="brand-section">
                        <div class="brand-logo">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div class="text-center">
                            <h1 class="brand-title">Invexa</h1>
                            <p class="brand-subtitle">Advanced Inventory Management System<br>Streamline your business operations</p>
                        </div>

                        <div class="features-grid">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-text">Real-time Analytics</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <div class="feature-text">Auto Sync</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div class="feature-text">Secure Data</div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <div class="feature-text">Fast Performance</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Auth Form -->
                <div class="col-lg-7 col-md-6">
                    <div class="auth-container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle functionality
            const passwordToggles = document.querySelectorAll('.password-toggle');
            passwordToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('.form-control');
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });

            // Fix autofill background
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                setTimeout(() => {
                    if (input.matches(':-webkit-autofill')) {
                        input.style.background = 'rgba(255, 255, 255, 0.12)';
                        input.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                    }
                }, 100);
            });
        });
    </script>
</body>

</html>
