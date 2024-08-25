<?php

namespace Modules\Currencies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FiatRate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fiat_id',
        'rate_usd',
        'check_time',
    ];

    /**
     * @return string[]
     */
    protected function casts(): array
    {
        return [
            'check_time' => 'timestamp',
        ];
    }

    /**
     * @return BelongsTo
     */
    public function fiat(): BelongsTo
    {
        return $this->belongsTo(Fiat::class);
    }
}
