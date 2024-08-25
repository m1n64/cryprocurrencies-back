<?php

namespace Modules\Converter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Converter\Http\Requests\Converter\ConvertRequest;
use Modules\Currencies\Models\Currency;
use Modules\Currencies\Models\Fiat;

class ConverterController extends Controller
{
    /**
     * @param ConvertRequest $request
     * @return JsonResponse
     */
    public function convert(ConvertRequest $request)
    {
        $fiatCurrency = Fiat::findOrFail($request->fiat);
        $cryptoCurrency = Currency::findOrFail($request->crypto);

        $amount = $request->amount;

        if ($request->is_crypto) {
            $amountInUSD = $cryptoCurrency->rates()->latest()->first()->price_usd * $amount;

            $result = $amountInUSD / $fiatCurrency->fiatRates()->latest()->first()->rate_usd;
        } else {
            $amountInUSD = $amount / $fiatCurrency->fiatRates()->latest()->first()->rate_usd;

            $result = $amountInUSD / $cryptoCurrency->rates()->latest()->first()->price_usd;
        }

        return response()
            ->json([
                'is_crypto' => $request->is_crypto,
                'result' => $result
            ]);
    }
}
