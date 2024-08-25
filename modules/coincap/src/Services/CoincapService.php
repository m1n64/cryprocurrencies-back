<?php
declare(strict_types=1);

namespace Modules\Coincap\Services;

use Modules\Coincap\Services\Core\AbstractCoincapCore;
use Modules\Coincap\Traits\Coincap\Assets\AssetsTrait;
use Modules\Coincap\Traits\Coincap\Rates\RatesTrait;

class CoincapService extends AbstractCoincapCore
{
    use AssetsTrait, RatesTrait;
}
