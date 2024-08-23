<?php

namespace Modules\Currencies\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Modules\Currencies\Models\Currency;

class SaveCryptoCurrencyCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'save:crypto-currency';

    /**
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @return void
     */
    public function handle(): void
    {
        $currencyAssets = \Coincap::assets();

        foreach ($currencyAssets['data'] as $currencyAsset) {
            $this->info("Set currency {$currencyAsset['name']} with id {$currencyAsset['id']}...");

            $currency = Currency::firstOrCreate([
                'code' => $currencyAsset['id'],
            ],[
                'code' => $currencyAsset['id'],
                'rank' => $currencyAsset['rank'],
                'symbol' => $currencyAsset['symbol'],
                'name' => $currencyAsset['name'],
                'explorer' => $currencyAsset['explorer'],
                'icon' => config('app.url').'/icons/128/'.Str::lower($currencyAsset['symbol']).'.png',
            ]);

            $currency->rates()->create([
                'supply' => $currencyAsset['supply'],
                'max_supply' => $currencyAsset['maxSupply'] ?? null,
                'market_cap_usd' => $currencyAsset['marketCapUsd'],
                'volume_usd_24_hr' => $currencyAsset['volumeUsd24Hr'],
                'price_usd' => $currencyAsset['priceUsd'],
                'change_percent_24_hr' => $currencyAsset['changePercent24Hr'],
                'vwap_24_hr' => $currencyAsset['vwap24Hr'],
                'check_time' => \Carbon\Carbon::createFromTimestampMs($currencyAssets['timestamp'])->toDateTimeString(),
            ]);
        }
    }
}
