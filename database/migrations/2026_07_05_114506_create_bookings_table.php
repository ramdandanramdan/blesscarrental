<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->datetime('pickup_date');
            $table->datetime('return_date');
            $table->string('pickup_location')->nullable();
            $table->string('return_location')->nullable();
            $table->string('rental_type');
            $table->boolean('with_driver')->default(false);
            $table->decimal('driver_price', 12, 2)->nullable();
            $table->decimal('total_price', 12, 2);
            $table->string('status');
            $table->string('payment_status')->default('unpaid');
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
