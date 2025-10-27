@extends('layouts.app')

@section('title', 'Reset Password - Invexa Inventory System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="auth-card p-4 p-md-5">
                <div class="auth-header">
                    <div class="auth-logo">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2 class="auth-title">Set New Password</h2>
                    <p class="auth-subtitle">Create a new secure password for your account</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="floating-label">
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email', $request->email) }}" 
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

                    <div class="floating-label">
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            placeholder=" "
                        >
                        <label for="password">
                            <i class="fas fa-lock me-2"></i>New Password
                        </label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

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
                            <i class="fas fa-lock me-2"></i>Confirm New Password
                        </label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                            <i class="fas fa-save me-2"></i>Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection