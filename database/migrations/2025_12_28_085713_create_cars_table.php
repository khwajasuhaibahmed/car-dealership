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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->decimal('price', 15, 2);
            $table->integer('mileage');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('body_type');
            $table->string('color');
            $table->text('description');
            $table->json('images')->nullable();
            $table->string('status')->default('available');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
