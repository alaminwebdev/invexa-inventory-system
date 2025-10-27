@extends('layouts.app')

@section('title', 'Register - Invexa Inventory System')

@section('content')
<div class="auth-card">
    <div class="auth-header">
        <h2 class="auth-title">Create Account</h2>
        <p class="auth-subtitle">Join thousands of businesses using Invexa</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <i class="fas fa-user form-icon"></i>
            <input 
                id="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus
                placeholder="Full Name"
            >
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <i class="fas fa-envelope form-icon"></i>
            <input 
                id="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email" 
                value="{{ old('email') }}" 
                required
                placeholder="Email Address"
            >
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <i class="fas fa-mobile-alt form-icon"></i>
            <input 
                id="mobile_no" 
                type="text" 
                class="form-control @error('mobile_no') is-invalid @enderror" 
                name="mobile_no" 
                value="{{ old('mobile_no') }}" 
                required
                placeholder="Mobile Number"
            >
            @error('mobile_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <i class="fas fa-lock form-icon"></i>
            <input 
                id="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password" 
                required 
                autocomplete="new-password"
                placeholder="Password"
            >
            <button type="button" class="password-toggle">
                <i class="fas fa-eye"></i>
            </button>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <i class="fas fa-lock form-icon"></i>
            <input 
                id="password_confirmation" 
                type="password" 
                class="form-control" 
                name="password_confirmation" 
                required
                placeholder="Confirm Password"
            >
            <button type="button" class="password-toggle">
                <i class="fas fa-eye"></i>
            </button>
        </div>

        <div class="form-options">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                <label class="form-check-label" for="terms">
                    I agree to the <a href="#" class="forgot-link">Terms</a> and <a href="#" class="forgot-link">Privacy Policy</a>
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-user-plus"></i>
            Create Account
        </button>
    </form>

    <div class="auth-footer">
        Already have an account? 
        <a href="{{ route('login') }}">Sign in here</a>
    </div>
</div>
@endsection