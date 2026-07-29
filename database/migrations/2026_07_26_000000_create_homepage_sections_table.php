<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->string('key');
            $table->text('value')->nullable();
            $table->string('type')->default('text');
            $table->timestamps();

            $table->unique(['section', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_sections');
    }
};
