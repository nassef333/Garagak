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
        Schema::create('user_car_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('models');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('price');
            $table->decimal('old_price');
            $table->unsignedInteger('no_passengers')->nullable();
            $table->string('status');
            $table->unsignedInteger('mileage')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('gearbox')->nullable();
            $table->text('description')->nullable();
            $table->string('class')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_car_sales');
    }
};
