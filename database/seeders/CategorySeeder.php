<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'City Car / Hatchback', 'description' => 'Cocok untuk mobilitas dalam kota yang irit bahan bakar', 'icon' => 'fa-car', 'sort_order' => 1],
            ['name' => 'MPV / Keluarga', 'description' => 'Pilihan paling populer untuk perjalanan keluarga', 'icon' => 'fa-car-side', 'sort_order' => 2],
            ['name' => 'SUV', 'description' => 'Untuk yang membutuhkan kenyamanan lebih atau medan jalan yang lebih variatif', 'icon' => 'fa-truck', 'sort_order' => 3],
            ['name' => 'Mobil Mewah (Luxury)', 'description' => 'Khusus untuk acara pernikahan, VVIP, atau business meeting', 'icon' => 'fa-gem', 'sort_order' => 4],
            ['name' => 'Commercial / Bus', 'description' => 'Untuk rombongan besar', 'icon' => 'fa-bus', 'sort_order' => 5],
            ['name' => 'Mobil Listrik (EV)', 'description' => 'Ramah lingkungan dan modern', 'icon' => 'fa-bolt', 'sort_order' => 6],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
                'icon' => $cat['icon'],
                'sort_order' => $cat['sort_order'],
                'is_active' => true,
            ]);
        }
    }
}
