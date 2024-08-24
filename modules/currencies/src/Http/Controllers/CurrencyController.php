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
     *
     * @return AnonymousResourceCollection
     */
    public function all(Request $request)
    {
        $page = $request->get('page', 1);

        $q = $request->get('q', null);

        $currencies = Currency::query();
        if ($q) {
            $query = \Str::ucfirst($q);

            $currencies = $currencies->where('name', 'ILIKE', "%{$query}%");
        }

        $currencies = $currencies->paginate(15);

        return CurrencyWithRateResource::collection($currencies);
    }

    /**
     * @param Request $request
     * @param Currency $currency
     * @return AnonymousResourceCollection
     */
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
