@extends('layouts.app')

@section('title', 'Forgot Password - Invexa Inventory System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="auth-card p-4 p-md-5">
                <div class="auth-header">
                    <div class="auth-logo">
                        <i class="fas fa-key"></i>
                    </div>
                    <h2 class="auth-title">Reset Password</h2>
                    <p class="auth-subtitle">Enter your email to receive reset instructions</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success floating-alert mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="floating-label">
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autofocus
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

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                            <i class="fas fa-paper-plane me-2"></i>Send Reset Link
                        </button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-decoration-none text-primary">
                            <i class="fas fa-arrow-left me-2"></i>Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection