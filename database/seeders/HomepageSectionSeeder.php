<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageSectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            // Hero Section
            'hero' => [
                'badge'             => ['value' => 'Terpercaya Sejak 2019', 'type' => 'text'],
                'title_1'           => ['value' => 'Sewa Mobil', 'type' => 'text'],
                'title_2'           => ['value' => 'Berkualitas', 'type' => 'text'],
                'title_3'           => ['value' => '& Terpercaya', 'type' => 'text'],
                'description'       => ['value' => 'Nikmati pengalaman rental mobil terbaik dengan armada lengkap, harga terjangkau, dan layanan profesional 24 jam nonstop.', 'type' => 'textarea'],
                'cta1_text'         => ['value' => 'Booking Sekarang', 'type' => 'text'],
                'cta1_link'         => ['value' => '/booking', 'type' => 'text'],
                'cta2_text'         => ['value' => 'Hubungi WhatsApp', 'type' => 'text'],
                'cta2_link'         => ['value' => 'https://wa.me/6281225062153', 'type' => 'text'],
                'stat1_value'       => ['value' => '50', 'type' => 'text'],
                'stat1_label'       => ['value' => 'Unit Mobil', 'type' => 'text'],
                'stat2_value'       => ['value' => '1.000', 'type' => 'text'],
                'stat2_label'       => ['value' => 'Pelanggan Puas', 'type' => 'text'],
                'stat3_value'       => ['value' => '24/7', 'type' => 'text'],
                'stat3_label'       => ['value' => 'Layanan', 'type' => 'text'],
                'garansi_title'     => ['value' => 'Garansi Layanan', 'type' => 'text'],
                'garansi_subtitle'  => ['value' => '100% kepuasan', 'type' => 'text'],
                'rating_title'      => ['value' => 'Rating 4.9', 'type' => 'text'],
                'rating_subtitle'   => ['value' => 'Google Review', 'type' => 'text'],
            ],

            // Stats Section
            'stats' => [
                'stat1_icon'   => ['value' => 'car', 'type' => 'text'],
                'stat1_value'  => ['value' => '50', 'type' => 'text'],
                'stat1_label'  => ['value' => 'Unit Mobil', 'type' => 'text'],
                'stat1_suffix' => ['value' => '+', 'type' => 'text'],

                'stat2_icon'   => ['value' => 'users', 'type' => 'text'],
                'stat2_value'  => ['value' => '1000', 'type' => 'text'],
                'stat2_label'  => ['value' => 'Pelanggan Puas', 'type' => 'text'],
                'stat2_suffix' => ['value' => '+', 'type' => 'text'],

                'stat3_icon'   => ['value' => 'clock', 'type' => 'text'],
                'stat3_value'  => ['value' => '247', 'type' => 'text'],
                'stat3_label'  => ['value' => 'Layanan', 'type' => 'text'],
                'stat3_suffix' => ['value' => '', 'type' => 'text'],

                'stat4_icon'   => ['value' => 'building', 'type' => 'text'],
                'stat4_value'  => ['value' => '5', 'type' => 'text'],
                'stat4_label'  => ['value' => 'Area Layanan', 'type' => 'text'],
                'stat4_suffix' => ['value' => '', 'type' => 'text'],
            ],

            // Services Intro Section
            'services_intro' => [
                'subtitle'    => ['value' => 'Layanan', 'type' => 'text'],
                'title'       => ['value' => 'Apa yang Kami Tawarkan', 'type' => 'text'],
                'description' => ['value' => 'Pilih layanan yang Anda perlukan untuk memulai perjalanan Anda.', 'type' => 'textarea'],
            ],

            // CTA Section
            'cta' => [
                'heading'       => ['value' => 'Siap untuk Perjalanan Anda?', 'type' => 'text'],
                'description'   => ['value' => 'Hubungi kami sekarang dan dapatkan mobil terbaik untuk perjalanan Anda.', 'type' => 'textarea'],
                'button1_text'  => ['value' => 'Booking Sekarang', 'type' => 'text'],
                'button1_link'  => ['value' => '/booking', 'type' => 'text'],
                'button2_text'  => ['value' => 'Hubungi WhatsApp', 'type' => 'text'],
                'button2_link'  => ['value' => 'https://wa.me/6281225062153', 'type' => 'text'],
            ],

            // Locations Section
            'locations' => [
                'label'     => ['value' => 'Wilayah Layanan:', 'type' => 'text'],
                'locations' => ['value' => '["Jakarta","Bekasi","Tangerang","Depok","Bogor","Bandung"]', 'type' => 'json'],
            ],
        ];

        foreach ($sections as $section => $fields) {
            foreach ($fields as $key => $data) {
                HomepageSection::set($section, $key, $data['value'], $data['type']);
            }
        }
    }
}
