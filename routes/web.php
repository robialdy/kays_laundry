<?php

use App\Http\Controllers\direktur\CabangController;
use App\Http\Controllers\direktur\DashboardController as DirekturDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template.template-direktur');
});

Route::prefix('direktur')->group(function() {
    // dashboard direktur
    Route::get('', [DirekturDashboardController::class, 'index'])->name('dashboard.direktur');

    // CABANG
    Route::prefix('cabang')->group(function() {
        Route::get('', [CabangController::class, 'index'])->name('cabang');
        // create
        Route::get('create', [CabangController::class, 'create'])->name('cabang.create');
        Route::post('store', [CabangController::class, 'store'])->name('cabang.store');
        // edit
        Route::get('edit/{kode}', [CabangController::class, 'edit'])->name('cabang.edit');
        Route::put('update/{id}', [CabangController::class, 'update'])->name('cabang.update');
        // delete
        Route::delete('delete/{id}', [CabangController::class, 'delete'])->name('cabang.delete');
    });
});
