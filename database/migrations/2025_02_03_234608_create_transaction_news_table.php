<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_news', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id');
            $table->dateTime('transaction_date');
            $table->string('operation');
            $table->string('flag')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('gross_value', 10, 2);
            $table->decimal('net_value', 10, 2);
            $table->decimal('fee_value', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_news');
    }
};
