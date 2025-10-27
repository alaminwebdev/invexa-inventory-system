<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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


// Include sub-routes
include __DIR__.'/admin/system_setup.php';
include __DIR__.'/admin/employee_management.php';
include __DIR__.'/admin/product_management.php';
include __DIR__.'/admin/requisition_management.php';
include __DIR__.'/admin/report_management.php';
