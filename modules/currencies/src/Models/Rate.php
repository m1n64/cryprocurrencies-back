<?php

namespace Modules\Currencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'currency_id',
        'supply',
        'max_supply',
        'market_cap_usd',
        'volume_usd_24_hr',
        'price_usd',
        'change_percent_24_hr',
        'vwap_24_hr',
        'check_time',
    ];

    /**
     * @return BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    protected function casts()
    {
        return [
            'check_time' => 'timestamp',
        ];
    }
}
