<?php
declare(strict_types=1);

namespace Modules\Coincap\Traits\Coincap\Assets;

use Modules\Coincap\Enums\HistoryIntervalEnum;
use Modules\Coincap\Services\CoincapService;

/**
 * @mixin CoincapService
 */
trait AssetsTrait
{
    const string API_PATH = '/assets';

    /**
     * @return array
     */
    public function assets(): array
    {
        return $this->request(self::API_PATH);
    }

    /**
     * @param string $code
     * @param HistoryIntervalEnum $interval
     * @return array
     */
    public function assetsHistory(string $code, HistoryIntervalEnum $interval = HistoryIntervalEnum::DAY): array
    {
        return $this->request(self::API_PATH . '/' . $code . '/history?interval=' . $interval->value);
    }
}
