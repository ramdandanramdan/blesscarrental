<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@blesstransmandiri.com'], [
            'name' => 'Admin Bless Rent Car',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '081225062153',
            'auth_type' => 'email',
        ]);
    }
}
