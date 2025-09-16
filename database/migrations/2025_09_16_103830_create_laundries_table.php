<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laundries', function (Blueprint $table) {
            $table->id();
            $table->string('claim_code');
            $table->bigInteger('user_id');
            $table->bigInteger('shop_id');
            $table->double('weight');
            $table->boolean('with_pickup')->default(false);
            $table->boolean('with_delivery')->default(false);
            $table->text('pickup_address')->nullable();
            $table->text('delivery_address')->nullable();
            $table->double('total');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundries');
    }
};
