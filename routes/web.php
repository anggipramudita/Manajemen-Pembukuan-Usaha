<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ReceivableController;
use App\Http\Controllers\CashController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('incomes', IncomeController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('debts', DebtController::class);
    Route::resource('receivables', ReceivableController::class);
    Route::resource('cash', CashController::class);
    Route::resource('banks', BankController::class);
    Route::resource('reports', ReportController::class);
    
    Route::middleware(['role:Owner|Admin'])->group(function() {
        Route::resource('company', CompanyController::class);
    });
    
    Route::middleware(['role:Owner'])->group(function() {
        Route::resource('users', UserController::class);
    });
});
