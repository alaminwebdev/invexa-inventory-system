<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DefaultController;
use App\Http\Controllers\Admin\DashboardController;
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


    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/received-products', [DashboardController::class, 'receivedProducts'])->name('dashboard.received-products');
    Route::get('/stock-in-products', [DashboardController::class, 'stockInProducts'])->name('dashboard.stock-in-products');

    // AJAX / POST routes
    Route::post('/total-products-in-requisition-by-section', [DashboardController::class, 'getProductsInRequisitionBySection'])->name('dashboard.total-products-in-requisition-by-section');
    Route::post('/requisition-info-by-department', [DashboardController::class, 'getRequisitionInfoByDepartment'])->name('dashboard.requisition-info-by-department');
    Route::post('/total-requisition-products', [DashboardController::class, 'getTotalRequisitionProducts'])->name('dashboard.total-requisition-products');
    Route::post('/total-stock-products', [DashboardController::class, 'getTotalStockProducts'])->name('dashboard.total-stock-products');
    Route::post('/get-distributed-products', [DashboardController::class, 'getDistributedProducts'])->name('dashboard.get-distributed-products');


    // Default Controller routes
    Route::get('/get-products-by-type', [DefaultController::class, 'getProductsByType'])->name('get.products.by.type');
    Route::get('/get-sections-by-department', [DefaultController::class, 'getSectionsByDepartment'])->name('get.sections.by.department');
    Route::get('/get-products-by-section-requisition', [DefaultController::class, 'getProductsBySectionRequisition'])->name('get.products.by.section.requisition');
    Route::get('/get-employee-by-id', [DefaultController::class, 'getEmployeeById'])->name('get.employee.by.id');
    Route::get('/get-sections-requisitions-by-department', [DefaultController::class, 'getSectionsRequisitionsByDepartment'])->name('get.sections.requisitions.by.department');
    Route::get('/get-stock-in-details-by-stock-id', [DefaultController::class, 'getStockInDetailsByStockId'])->name('get.stock.in.details.by.stock.id');
    Route::get('/get-requistion-details-by-id', [DefaultController::class, 'getRequistionDetailsById'])->name('get.requistion.details.by.id');
    Route::get('/get-distribute-requistion-by-status', [DefaultController::class, 'getDistributeRequistionByStatus'])->name('get.distribute.requistion.by.status');
    Route::get('/get-requistion-by-status', [DefaultController::class, 'getRequistionByStatus'])->name('get.requistion.by.status');
    Route::get('/get-requistion-by-status-for-recommender', [DefaultController::class, 'getRequistionByStatusForRecommender'])->name('get.requistion.by.status.for.recommender');


    require __DIR__ . '/admin.php';
});

require __DIR__ . '/auth.php';
