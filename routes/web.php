<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('parts.index');
});

use App\Http\Controllers\PartController;

Route::resource('parts', PartController::class);
