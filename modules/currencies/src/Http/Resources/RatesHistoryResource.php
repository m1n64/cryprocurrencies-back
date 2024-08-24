<?php

namespace Modules\Currencies\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class RatesHistoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'currency_id' => $this->currency_id,
            'check_time' => Carbon::createFromTimestamp($this->check_time)->toDateTimeString(),
            'price' => (float) $this->price_usd,
        ];
    }
}
