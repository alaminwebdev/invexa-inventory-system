<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Invexa Inventory System')</title>

    <!-- Include Vite for Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .animate-section {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.5s ease forwards;
            animation-delay: calc(var(--animation-order, 0) * 0.1s);
        }


        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center p-4">
    <div class="w-full max-w-6xl">
        <!-- Single Unified Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">

                <!-- Left Side - Branding -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 p-8 lg:p-12 text-white">
                    <!-- Brand Logo -->
                    <div class="flex justify-center mb-8 animate-section" data-animation-order="0">
                        <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/30">
                            <i class="fas fa-cubes text-3xl text-white"></i>
                        </div>
                    </div>

                    <!-- Brand Text -->
                    <div class="text-center mb-12">
                        <h1 class="text-4xl font-bold mb-4 animate-section" data-animation-order="1">Invexa</h1>
                        <p class="text-blue-100 text-lg leading-relaxed animate-section">
                            Advanced Inventory Management System<br>
                            Streamline your business operation
                        </p>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 animate-section" data-animation-order="2">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <span class="font-semibold text-sm">Real-time Analytics</span>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 animate-section" data-animation-order="3">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-sync"></i>
                            </div>
                            <span class="font-semibold text-sm">Auto Sync</span>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 animate-section" data-animation-order="4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <span class="font-semibold text-sm">Secure Data</span>
                        </div>
                        <div class="flex items-center space-x-3 p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 animate-section" data-animation-order="5">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <span class="font-semibold text-sm">Fast Performance</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Auth Form -->
                <div class="p-8 lg:p-12 flex items-center justify-center">
                    <div class="w-full max-w-md mx-auto">
                        <!-- Mobile Branding (only shown on small screens) -->
                        <div class="lg:hidden text-center mb-8">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-cubes text-2xl text-white"></i>
                            </div>
                            <h1 class="text-2xl font-bold text-gray-800 mb-2">Invexa</h1>
                            <p class="text-gray-600">Inventory Management System</p>
                        </div>

                        <!-- Form Header -->
                        <div class="text-center mb-8 animate-section" data-animation-order="1">
                            <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
                            <p class="text-gray-600">Sign in to continue to Invexa</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-lg flex items-center space-x-3 animate-fade-in">
                                <i class="fas fa-check-circle text-green-500 text-lg"></i>
                                <span class="text-green-800 font-medium">{{ session('status') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg animate-fade-in">
                                <div class="flex items-center space-x-3 mb-3">
                                    <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                                    <span class="text-red-800 font-semibold">Please check the following:</span>
                                </div>
                                <div class="space-y-2">
                                    @foreach ($errors->all() as $error)
                                        <div class="flex items-center space-x-3 text-red-700 bg-red-100/50 py-2 px-3 rounded-lg">
                                            <div class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0"></div>
                                            <span class="text-sm">{{ $error }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="space-y-6">
                            @csrf
                            <!-- Email/Mobile Field -->
                            <div class="relative animate-section" data-animation-order="2">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input id="login" type="text"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline focus:outline-blue-500 focus:border-blue-500 transition duration-200 @error('login') border-red-500 @enderror" name="login"
                                    value="{{ old('login') }}" required autofocus placeholder="Email or Mobile Number">
                                @error('login')
                                    <div class="absolute right-0 top-0 mt-3 mr-3 text-red-500">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="relative animate-section" data-animation-order="3">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" type="password"
                                    class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-xl focus:outline focus:outline-blue-500 focus:border-blue-500 transition duration-200 @error('password') border-red-500 @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password">
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition duration-200 password-toggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <div class="absolute right-8 top-0 mt-3 mr-3 text-red-500">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me & Options -->
                            <div class="flex items-center justify-between animate-section" data-animation-order="4">
                                <div class="flex items-center">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-xl" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="ml-2 text-sm text-gray-700">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white py-3 px-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center justify-center space-x-2 cursor-pointer animate-section" data-animation-order="4">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Sign In</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function initializeAnimations() {
            const sections = document.querySelectorAll('.animate-section[data-animation-order]');

            sections.forEach(section => {
                const order = section.getAttribute('data-animation-order');
                section.style.setProperty('--animation-order', order);
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            initializeAnimations();

            // Password toggle functionality
            const passwordToggles = document.querySelectorAll('.password-toggle');
            passwordToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const input = this.closest('.relative').querySelector('input');
                    const icon = this.querySelector('i');

                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
        });
    </script>
</body>

</html>
