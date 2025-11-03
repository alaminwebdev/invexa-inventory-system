<?php

use App\Http\Controllers\SiteSettingManagement\SiteSettingController;
use App\Http\Controllers\SiteSettingManagement\MenuController;
use App\Http\Controllers\SiteSettingManagement\ModuleController;
use Illuminate\Support\Facades\Route;

// Site Setting Routes
Route::prefix('site-setting')->name('site_setting.')->group(function () {
	Route::get('/', [SiteSettingController::class, 'list'])->name('list');
	Route::post('/update', [SiteSettingController::class, 'update'])->name('update')->middleware('checkUserRole');
});

// Menu Routes
Route::prefix('menu')->name('menu.')->group(function () {
	Route::get('/', [MenuController::class, 'list'])->name('list');
	Route::get('/add', [MenuController::class, 'add'])->name('add');
	Route::post('/store', [MenuController::class, 'store'])->name('store')
		->middleware('checkUserRole');
	Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
	Route::post('/update/{id}', [MenuController::class, 'update'])->name('update')
		->middleware('checkUserRole');
	Route::get('/sub-menu', [MenuController::class, 'getSubMenu'])->name('sub_menu');
});

// Module Routes
Route::prefix('module')->name('module.')->middleware('checkUserRole')->group(function () {
	Route::get('/', [ModuleController::class, 'list'])->name('list');
	Route::get('/sorting', [ModuleController::class, 'sorting'])->name('sorting');
	Route::get('/add', [ModuleController::class, 'add'])->name('add');
	Route::get('/duplicate-name', [ModuleController::class, 'duplicateNameCheck'])->name('duplicate_name');
	Route::post('/store', [ModuleController::class, 'store'])->name('store');
	Route::get('/edit/{id}', [ModuleController::class, 'edit'])->name('edit');
	Route::post('/update/{id}', [ModuleController::class, 'update'])->name('update');
	Route::post('/delete', [ModuleController::class, 'destroy'])->name('delete');
});
