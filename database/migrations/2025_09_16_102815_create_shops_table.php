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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->boolean('delivery')->default(false);
            $table->boolean('pickup')->default(false);
            $table->string('whatsapp')->nullable();
            $table->text('description')->nullable();
            $table->double('price')->nullable();
            $table->double('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
