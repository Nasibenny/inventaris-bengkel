<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SparePartController;

Route::get('/', function () {
    return redirect()->route('parts.index');
});

// Dashboard routes
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/spareparts', [DashboardController::class, 'spareparts'])->name('dashboard.spareparts');
    Route::get('/notifications', [DashboardController::class, 'notifications'])->name('dashboard.notifications');
});

// Parts routes
Route::resource('parts', PartController::class);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



Route::resource('spareparts', SparePartController::class);
