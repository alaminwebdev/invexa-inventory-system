@extends('layouts.app')

@section('title', 'Login - Invexa Inventory System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="auth-card p-4 p-md-5">
                <div class="auth-header">
                    <div class="auth-logo">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h2 class="auth-title">Welcome Back</h2>
                    <p class="auth-subtitle">Sign in to your Invexa account</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success floating-alert mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger floating-alert mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="floating-label">
                        <input 
                            id="login" 
                            type="text" 
                            class="form-control @error('login') is-invalid @enderror" 
                            name="login" 
                            value="{{ old('login') }}" 
                            required
                            autofocus
                            placeholder=" "
                        >
                        <label for="login">
                            <i class="fas fa-user me-2"></i>Email or Mobile Number
                        </label>
                        @error('login')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="floating-label">
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            placeholder=" "
                        >
                        <label for="password">
                            <i class="fas fa-lock me-2"></i>Password
                        </label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </div>
                </form>

                @if (Route::has('register'))
                    <div class="auth-footer mt-4">
                        Don't have an account? 
                        <a href="{{ route('register') }}">Create one here</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection