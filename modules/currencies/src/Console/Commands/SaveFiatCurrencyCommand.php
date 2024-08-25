<?php

namespace Modules\Currencies\Console\Commands;

use Illuminate\Console\Command;
use Modules\Currencies\Models\Fiat;
use Str;

class SaveFiatCurrencyCommand extends Command
{
    protected $signature = 'save:fiat-currency';

    protected $description = 'Command description';

    public function handle(): void
    {
        $currencyRates = \Coincap::rates();

        foreach ($currencyRates['data'] as $currencyRate) {
            if ($currencyRate['type'] === 'fiat') {
                $this->info("Set currency {$currencyRate['symbol']} with id {$currencyRate['id']}...");

                $currency = Fiat::firstOrCreate([
                    'code' => $currencyRate['id'],
                ],[
                    'code' => $currencyRate['id'],
                    'symbol' => $currencyRate['symbol'],
                    'currency_symbol' => $currencyRate['currencySymbol'],
                    'icon' => config('app.url').'/icons/fiat/'.Str::lower($currencyRate['symbol']).'.png',
                ]);

                $currency->fiatRates()->create([
                    'rate_usd' => $currencyRate['rateUsd'],
                    'check_time' => \Carbon\Carbon::createFromTimestampMs($currencyRates['timestamp'])->toDateTimeString(),
                ]);
            }
        }
    }
}
