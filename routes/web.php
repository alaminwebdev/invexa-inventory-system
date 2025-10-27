<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Storage link helper
Route::get('storage-link', function () {
    \Artisan::call('storage:link');
});

// Default redirect to admin login
Route::get('/', function () {
    return redirect()->route('admin.login');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('login-as-viewer', [LoginController::class, 'loginAsViewer'])->name('admin.login-as-viewer');

    Route::get('change-password', [ChangePasswordController::class, 'changePassword'])
        ->name('admin.change-password');
    Route::post('change-password', [ChangePasswordController::class, 'updatePassword'])
        ->middleware('checkUserRole')
        ->name('admin.update-password');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])
        ->name('admin.password.update');

    // Include all other admin routes from admin.php
    Route::group([], base_path('routes/admin.php'));
});
