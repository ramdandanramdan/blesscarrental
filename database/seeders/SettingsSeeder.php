<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'company_name', 'value' => 'PT. BLESS TRANS MANDIRI', 'type' => 'text'],
            ['key' => 'company_tagline', 'value' => 'Rental Mobil Terpercaya di Jakarta, Bekasi, Tangerang, Depok', 'type' => 'text'],
            ['key' => 'company_description', 'value' => 'Bless Rent Car merupakan perusahaan rental mobil terpercaya yang melayani wilayah Jakarta, Bekasi, Tangerang, dan Depok. Kami menyediakan berbagai jenis armada mulai dari city car, MPV keluarga, SUV, hingga mobil mewah dengan harga terjangkau.', 'type' => 'textarea'],
            ['key' => 'company_address', 'value' => 'Jakarta Barat, Jakarta Timur, Jakarta Selatan, Jakarta Utara, Bekasi, Tangerang, Depok', 'type' => 'text'],
            ['key' => 'company_phone', 'value' => '(021) xxxx-xxxx', 'type' => 'text'],
            ['key' => 'company_whatsapp', 'value' => '6281225062153', 'type' => 'text'],
            ['key' => 'company_email', 'value' => 'info@blesstransmandiri.com', 'type' => 'text'],
            ['key' => 'company_google_maps', 'value' => 'https://maps.google.com/?q=jakarta', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/blesstransmandiri', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/blesstransmandiri', 'type' => 'text'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/blesstransmandiri', 'type' => 'text'],
            ['key' => 'social_youtube', 'value' => 'https://youtube.com/@blesstransmandiri', 'type' => 'text'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@blesstransmandiri', 'type' => 'text'],
            ['key' => 'meta_title', 'value' => 'Bless Rent Car - Rental Mobil Terbaik di Jakarta, Bekasi, Tangerang, Depok', 'type' => 'text'],
            ['key' => 'meta_description', 'value' => 'Sewa mobil berkualitas di Jakarta, Bekasi, Tangerang, Depok. Armada lengkap, harga terjangkau, proses cepat. Hubungi 081225062153.', 'type' => 'textarea'],
            ['key' => 'meta_keywords', 'value' => 'rental mobil, sewa mobil, bless rent car, rental jakarta, rental bekasi, sewa mobil murah', 'type' => 'text'],
            ['key' => 'operational_hours', 'value' => 'Senin - Minggu, 24 Jam', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
