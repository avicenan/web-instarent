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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id');
            $table->foreignId('brand_id');
            $table->foreignId('type_id');
            $table->string('slug')->unique();
            $table->string('transmission');
            $table->integer('capacity');
            $table->integer('power');
            $table->integer('price');
            $table->string('plate_num')->unique();
            $table->string('color');
            $table->string('extras')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
