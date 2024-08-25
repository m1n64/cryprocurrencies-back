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
        Schema::create('fiats', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('symbol');
            $table->string('currency_symbol')->nullable();
            $table->string('icon');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('fiats');
    }
};
