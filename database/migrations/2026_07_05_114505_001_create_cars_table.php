<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->string('transmission');
            $table->integer('capacity');
            $table->string('fuel_type')->nullable();
            $table->decimal('price_per_day', 12, 2);
            $table->decimal('price_per_week', 12, 2)->nullable();
            $table->decimal('price_per_month', 12, 2)->nullable();
            $table->integer('discount_percent')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_available')->default(true);
            $table->boolean('is_popular')->default(false);
            $table->text('description')->nullable();
            $table->longText('specifications')->nullable();
            $table->longText('features')->nullable();
            $table->text('terms')->nullable();
            $table->string('main_image')->nullable();
            $table->longText('gallery')->nullable();
            $table->integer('seat_count')->default(4);
            $table->integer('door_count')->default(4);
            $table->string('luggage')->nullable();
            $table->integer('minimum_rent_days')->default(1);
            $table->string('status')->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
