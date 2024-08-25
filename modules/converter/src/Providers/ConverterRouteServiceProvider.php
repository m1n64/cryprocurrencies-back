<?php

namespace Modules\Converter\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class ConverterRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/v1')
                ->group(__DIR__ . '/../../routes/converter-api.php');
        });
    }
}
