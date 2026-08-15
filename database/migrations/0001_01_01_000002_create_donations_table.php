<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('amount_cents');
            $table->string('currency', 10)->default('usd');
            $table->string('frequency', 20)->default('one_time'); // one_time | monthly
            $table->string('stripe_session_id')->nullable()->index();
            $table->string('stripe_customer_id')->nullable();
            $table->string('status', 20)->default('pending'); // pending | paid | failed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
