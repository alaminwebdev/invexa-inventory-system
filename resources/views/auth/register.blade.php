@extends('layouts.app')

@section('title', 'Register - Invexa Inventory System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="auth-card p-4 p-md-5">
                <div class="auth-header">
                    <div class="auth-logo">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h2 class="auth-title">Create Account</h2>
                    <p class="auth-subtitle">Join Invexa Inventory System today</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autofocus
                                    placeholder=" "
                                >
                                <label for="name">
                                    <i class="fas fa-user me-2"></i>Full Name
                                </label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required
                                    placeholder=" "
                                >
                                <label for="email">
                                    <i class="fas fa-envelope me-2"></i>Email Address
                                </label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="floating-label">
                        <input 
                            id="mobile_no" 
                            type="text" 
                            class="form-control @error('mobile_no') is-invalid @enderror" 
                            name="mobile_no" 
                            value="{{ old('mobile_no') }}" 
                            required
                            placeholder=" "
                        >
                        <label for="mobile_no">
                            <i class="fas fa-mobile-alt me-2"></i>Mobile Number
                        </label>
                        @error('mobile_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
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
                        </div>
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required
                                    placeholder=" "
                                >
                                <label for="password_confirmation">
                                    <i class="fas fa-lock me-2"></i>Confirm Password
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </div>
                </form>

                <div class="auth-footer mt-4">
                    Already have an account? 
                    <a href="{{ route('login') }}">Sign in here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection