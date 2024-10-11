<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Subscriptions\SubscriptionsController;

Route::middleware(['auth'])->group(function () {

    Route::prefix('/subscription')->group(function () {
        Route::get('/subscription/media', [SubscriptionsController::class, 'index'])->name('subscription.index');

        Route::get('/subscription/create', [SubscriptionsController::class, 'create'])->name('subscription.create');
        Route::post('/subscription/store', [SubscriptionsController::class, 'store'])->name('subscription.store');
    });
});
