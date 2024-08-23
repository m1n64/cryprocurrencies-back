<?php

namespace Modules\Currencies\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Currencies\Http\Resources\CurrencyResource;
use Modules\Currencies\Http\Resources\CurrencyWithRateResource;
use Modules\Currencies\Http\Resources\RatesHistoryResource;
use Modules\Currencies\Models\Currency;

class CurrencyController extends Controller
{
    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function all(Request $request)
    {
        return CurrencyWithRateResource::collection(Currency::all());
    }

    public function ratesHistory(Request $request, Currency $currency)
    {
        return RatesHistoryResource::collection($currency->rates()->where('check_time', '>=', now()->subHours(24))->get());
    }

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function currencies(Request $request)
    {
        return CurrencyResource::collection(Currency::all());
    }
}
