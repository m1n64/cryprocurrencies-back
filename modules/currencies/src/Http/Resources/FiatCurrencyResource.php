<?php

namespace Modules\Currencies\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FiatCurrencyResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'symbol' => $this->symbol,
            'currency_symbol' => $this->currency_symbol,
            'icon' => $this->icon,
            //'price' => $this->fiatRates,
        ];
    }
}
