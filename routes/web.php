<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;

// 🌐 Root
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard.index')
        : redirect()->route('login');
});


Route::post('/login', [AuthController::class, 'login'])->name('login.post');
//  Auth routes
Route::view('/login', 'auth.login')->name('login');
Route::view('/change-password', 'auth.change-password')->name('password.request');

//  Protected routes (semua harus login)
Route::middleware(['auth'])->group(function () {

    //  Dashboard (bisa diakses semua)
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/notifications', [DashboardController::class, 'notifications'])->name('dashboard.notifications');
        Route::get('/spareparts', [DashboardController::class, 'spareparts'])->name('dashboard.spareparts');
        
    });

    //  Parts & Spareparts (khusus admin)
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('parts', PartController::class);
        Route::resource('spareparts', SparePartController::class);
    });

    //  Transactions
    Route::prefix('transactions')->group(function () {
        // Semua role bisa lihat transaksi
        Route::get('/', [TransactionController::class, 'index'])->name('dashboard.transactions');
        Route::get('/{id}', [TransactionController::class, 'show'])->name('transactions.show');

        // Kasir & admin bisa tambah transaksi
        Route::middleware(['role:admin,kasir'])->group(function () {
            Route::post('/', [TransactionController::class, 'store'])->name('transactions.store');
            Route::post('/{id}/status', [TransactionController::class, 'updateStatus'])->name('transactions.updateStatus');
        });

        // Mekanik & admin bisa tambah / hapus detail sparepart
        Route::middleware(['role:admin,mekanik'])->group(function () {
            Route::post('/{id}/details', [TransactionController::class, 'addDetail'])->name('transactions.addDetail');
            Route::delete('/{id}/details/{detail_id}', [TransactionController::class, 'deleteDetail'])->name('transactions.deleteDetail');
        });

        // Hapus transaksi hanya admin
        Route::middleware(['role:admin'])->delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    });

    //  Password Change
    Route::get('/password/change', [PasswordController::class, 'showChangeForm'])->name('password.change');
    Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

    //  Logout
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');
});
