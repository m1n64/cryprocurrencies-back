<?php

namespace Modules\Currencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fiat extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'code',
        'symbol',
        'currency_symbol',
        'icon',
    ];

    /**
     * @return HasMany
     */
    public function fiatRates(): HasMany
    {
        return $this->hasMany(FiatRate::class);
    }
}
