<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DefaultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Default Controller routes
    Route::get('/get-products-by-type', [DefaultController::class, 'getProductsByType'])->name('get.products.by.type');
    Route::get('/get-sections-by-department', [DefaultController::class, 'getSectionsByDepartment'])->name('get.sections.by.department');
    Route::get('/get-products-by-section-requisition', [DefaultController::class, 'getProductsBySectionRequisition'])->name('get.products.by.section.requisition');
    Route::get('/get-employee-by-id', [DefaultController::class, 'getEmployeeById'])->name('get.employee.by.id');


    Route::prefix('admin')->name('admin.')->group(function () {
        require __DIR__ . '/admin.php';
    });
});

require __DIR__ . '/auth.php';
