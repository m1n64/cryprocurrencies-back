<?php

namespace Modules\Coincap\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Coincap\Services\CoincapService;

class CoincapServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
	{
        $this->app->singleton('coincap', function ($app) {
            return new CoincapService();
        });
	}

    /**
     * @return void
     */
    public function boot(): void
	{
	}
}
