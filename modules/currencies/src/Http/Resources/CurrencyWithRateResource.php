<?php

namespace Modules\Currencies\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyWithRateResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $latestRate = $this->rates()->latest()->first();

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'symbol' => $this->symbol,
            'icon' => $this->icon,
            'price' => (double) $latestRate->price_usd,
            'change_24hr' => (double) $latestRate->change_percent_24_hr,
        ];
    }
}
