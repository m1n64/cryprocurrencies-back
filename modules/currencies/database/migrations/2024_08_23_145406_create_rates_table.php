<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('currency_id')
                ->constrained('currencies');

            $table->decimal('supply', 30, 8);
            $table->decimal('max_supply', 30, 8)->nullable();
            $table->decimal('market_cap_usd', 35, 8);
            $table->decimal('volume_usd_24_hr', 35, 8);
            $table->decimal('price_usd', 30, 10);
            $table->decimal('change_percent_24_hr', 15, 8);
            $table->decimal('vwap_24_hr', 30, 10)->nullable();
            $table->timestamp('check_time');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
