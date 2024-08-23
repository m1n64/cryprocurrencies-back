<?php

namespace Modules\Currencies\Providers;

use Illuminate\Support\ServiceProvider;

class CurrenciesServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
	{
	}

    /**
     * @return void
     */
    public function boot(): void
	{
        $this->app->register(CurrenciesRouteServiceProvider::class);
	}
}
