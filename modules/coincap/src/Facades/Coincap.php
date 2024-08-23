<?php
declare(strict_types=1);

namespace Modules\Coincap\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Modules\Coincap\Services\CoincapService
 * @method static array assets()
 */
class Coincap extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'coincap';
    }
}
