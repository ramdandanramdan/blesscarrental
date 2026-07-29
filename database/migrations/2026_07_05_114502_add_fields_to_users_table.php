<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('company_name')->nullable()->after('phone');
            $table->text('company_address')->nullable()->after('company_name');
            $table->string('avatar')->nullable()->after('company_address');
            $table->string('google_id')->nullable()->after('avatar');
            $table->string('facebook_id')->nullable()->after('google_id');
            $table->string('role')->default('customer')->after('facebook_id');
            $table->string('status')->default('pending')->after('role');
            $table->string('auth_type')->default('email')->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'company_name',
                'company_address',
                'avatar',
                'google_id',
                'facebook_id',
                'role',
                'status',
                'auth_type',
            ]);
        });
    }
};
