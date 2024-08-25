<?php

Route::prefix('converter')->group(function () {
    Route::post('/convert', [\Modules\Converter\Http\Controllers\ConverterController::class, 'convert'])->name('converter.convert');
});
