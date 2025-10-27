@extends('layouts.app')

@section('title', 'Verify Email - Invexa Inventory System')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="auth-card p-4 p-md-5 text-center">
                <div class="auth-header">
                    <div class="auth-logo">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                    <h2 class="auth-title">Verify Your Email</h2>
                    <p class="auth-subtitle">Please verify your email address to continue</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success floating-alert mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        A new verification link has been sent to your email address.
                    </div>
                @endif

                <div class="mb-4">
                    <p class="text-muted">
                        Before proceeding, please check your email for a verification link. 
                        If you didn't receive the email, we'll gladly send you another.
                    </p>
                </div>

                <div class="d-grid gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg py-3 w-100 fw-semibold">
                            <i class="fas fa-paper-plane me-2"></i>Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-lg py-3 w-100 fw-semibold">
                            <i class="fas fa-sign-out-alt me-2"></i>Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection