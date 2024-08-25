<?php
declare(strict_types=1);

namespace Modules\Coincap\Traits\Coincap\Rates;

use Modules\Coincap\Services\CoincapService;

/**
 * @mixin CoincapService
 */
trait RatesTrait
{
    const string API_PATH_RATES = '/rates';

    /**
     * @return array
     */
    public function rates(): array
    {
        return $this->request(self::API_PATH_RATES);
    }
}
