<?php

use Illuminate\Support\Facades\Route;

Route::prefix('currencies')->group(function () {
    Route::get('/rate', [\Modules\Currencies\Http\Controllers\CurrencyController::class, 'all'])->name('currency.rate');
    Route::get('/{currency}/history', [\Modules\Currencies\Http\Controllers\CurrencyController::class, 'ratesHistory'])->name('currency.rates.history');
    Route::get('/', [\Modules\Currencies\Http\Controllers\CurrencyController::class, 'currencies'])->name('currency.all');
});
