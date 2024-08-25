<?php

namespace Modules\Converter\Providers;

use Illuminate\Support\ServiceProvider;

class ConverterServiceProvider extends ServiceProvider
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
        $this->app->register(ConverterRouteServiceProvider::class);
	}
}
