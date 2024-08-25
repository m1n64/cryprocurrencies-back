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
        Schema::create('fiat_rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fiat_id')
                ->constrained();

            $table->decimal('rate_usd', 30, 10);
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
        Schema::dropIfExists('fiat_rates');
    }
};
