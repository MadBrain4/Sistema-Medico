<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Medical\VisitController;
use App\Http\Controllers\Medicine\MedicineController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('companies', CompanyController::class)->except(['show']);
    
    Route::resource('employees', EmployeeController::class)->except(['show']);
    
    Route::resource('visits', VisitController::class);
    
    Route::resource('medicines', MedicineController::class)->except(['show']);
});