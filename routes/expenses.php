<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Expenses\MainExpensesController;

Route::middleware(['auth'])->group(function () {

    Route::prefix('/expenses')->group(function () {
        Route::get('/expenses/home', [MainExpensesController::class, 'index'])->name('mainexpense.index');
        Route::get('/expenses/record/add', [MainExpensesController::class, 'recordExpence'])->name('mainexpense.add.record');
        Route::get('/expenses/record/import', [MainExpensesController::class, 'importExpence'])->name('mainexpense.import.record');
    });
});
