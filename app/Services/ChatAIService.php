<?php

namespace App\Services;

use App\Models\Faq;
use App\Models\Car;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class ChatAIService
{
    private array $faqCache = [];
    private array $carCache = [];
    private array $serviceCache = [];
    private static ?string $chatMode = null;

    private array $greetings = [
        'hai', 'halo', 'hi', 'hello', 'hey', 'selamat pagi', 'selamat siang',
        'selamat sore', 'selamat malam', 'pagi', 'siang', 'sore', 'malam',
        'permisi', 'yo', 'oi', 'woi', 'sup', 'whats up', 'howdy',
    ];

    private array $goodbye = [
        'bye', 'dadah', 'selamat tinggal', 'sampai jumpa', 'udah', 'ok dah',
        'cukup', 'selesai', 'sudah itu saja', 'that\'s all', 'done',
    ];

    private array $greetingReplies = [
        'id' => [
            'Halo! Selamat datang di Bless Rent Car. Ada yang bisa dibantu?',
            'Hai, welcome to Bless Rent Car. Mau tanya-tanya soal mobil atau langsung mau sewa?',
            'Halo! Senang bisa bantu. Silakan tanya apa aja soal rental mobil di sini.',
        ],
        'en' => [
            'Hey there! Welcome to Bless Rent Car. How can I help you today?',
            'Hi! Welcome to Bless Rent Car. Got any questions about car rental?',
            'Hello! Thanks for reaching out. Feel free to ask anything about our car rental services.',
        ],
    ];

    private array $goodbyeReplies = [
        'id' => [
            'Oke, makasih ya! Kalau butuh lagi, chat aja kapanpun.',
            'Sip, terima kasih! Jangan ragu hubungi kami lagi ya.',
            'Siap, thanks! Sampai ketemu lagi.',
        ],
        'en' => [
            'Alright, thanks! Feel free to reach out anytime you need us.',
            'Great, thank you! Don\'t hesitate to contact us again.',
            'Thanks a lot! We\'re here whenever you need us.',
        ],
    ];

    private array $thankReplies = [
        'id' => [
            'Sama-sama! Senang bisa bantu.',
            'Siap, anytime!',
            'Dengan senang hati.',
        ],
        'en' => [
            'You\'re welcome! Happy to help.',
            'Anytime!',
            'My pleasure!',
        ],
    ];

    private array $complimentReplies = [
        'id' => [
            'Makasih banyak! Senang dengar gitu.',
            'Wah, terima kasih! Kalau butuh mobil lagi, ingat Bless ya.',
            'Haha makasih, appreciate it!',
        ],
        'en' => [
            'Thanks a lot! Glad you think so.',
            'Thank you! If you ever need a car, you know where to find us.',
            'That means a lot, thank you!',
        ],
    ];

    private array $keywordGroups = [
        // ============ HARGA ============
        [
            'keywords' => ['harga', 'price', 'biaya', 'tarif', 'cost', 'berapa', 'murah', 'cicilan'],
            'intent' => 'price',
            'reply' => [
                'id' => "Nah soal harga, ini kisarannya ya:\n\nMobil kecil kayak Avanza, Xenia, Brio itu mulai Rp 250.000 - 350.000/hari.\nInnova Reborn mulai Rp 450.000 - 600.000/hari.\nFortuner mulai Rp 700.000 - 900.000/hari.\nBig car kayak ELF sama Hiace mulai Rp 800.000 - 1.200.000/hari.\n\nHarga ini bisa berubah tergantung musim sama lama sewa. Mau yang pastinya? Chat langsung aja ke WhatsApp admin: 0812-2506-2153",
                'en' => "Here's a general idea of our pricing:\n\nSmall cars like Avanza, Xenia, and Brio start from Rp 250,000 - 350,000/day.\nInnova Reborn starts from Rp 450,000 - 600,000/day.\nFortuner starts from Rp 700,000 - 900,000/day.\nBig vehicles like ELF and Hiace start from Rp 800,000 - 1,200,000/day.\n\nPrices may vary depending on season and rental duration. For exact pricing, message our admin on WhatsApp: 0812-2506-2153",
            ],
        ],

        // ============ AVANZA ============
        [
            'keywords' => ['avanza', 'banza'],
            'intent' => 'avanza',
            'reply' => [
                'id' => "Avanza? Pilihan yang tepat nih, irit dan nyaman buat keluarga. Tersedia manual sama automatic. Harganya mulai Rp 250.000/hari buat manual, Rp 350.000/hari buat automatic. Mau booking? Hubungi admin: 0812-2506-2153",
                'en' => "Avanza? Great choice! It's fuel-efficient and comfortable for families. Available in manual and automatic. Starts from Rp 250,000/day for manual, Rp 350,000/day for automatic. Want to book? Contact our admin: 0812-2506-2153",
            ],
        ],

        // ============ INNOVA ============
        [
            'keywords' => ['innova', 'inova', 'reborn'],
            'intent' => 'innova',
            'reply' => [
                'id' => "Innova Reborn, mantap nih pilihannya. Nyaman banget, cocok buat perjalanan bisnis atau keluarga. Mulai Rp 450.000 - 600.000/hari, tersedia manual sama automatic. Mau pesan? Chat admin: 0812-2506-2153",
                'en' => "Innova Reborn, great choice. Super comfortable, perfect for business trips or family travel. Starts from Rp 450,000 - 600,000/day, available in manual and automatic. Want to book? Message our admin: 0812-2506-2153",
            ],
        ],

        // ============ FORTUNER ============
        [
            'keywords' => ['fortuner'],
            'intent' => 'fortuner',
            'reply' => [
                'id' => "Fortuner? Wah, ini mobil premium nih. Tangguh buat jarak jauh, cocok buat VIP. Mulai Rp 700.000 - 900.000/hari, tipe automatic. Info lebih lanjut: 0812-2506-2153",
                'en' => "Fortuner? That's a premium ride. Tough for long distances, perfect for VIP. Starts from Rp 700,000 - 900,000/day, automatic. More info: 0812-2506-2153",
            ],
        ],

        // ============ XENIA ============
        [
            'keywords' => ['xenia', 'zenia'],
            'intent' => 'xenia',
            'reply' => [
                'id' => "Xenia, mobil irit yang handal. Mulai Rp 250.000/hari, ada manual sama automatic. Cocok buat sehari-hari. Booking: 0812-2506-2153",
                'en' => "Xenia, a reliable and fuel-efficient car. Starts from Rp 250,000/day, available in manual and automatic. Great for daily use. Book at: 0812-2506-2153",
            ],
        ],

        // ============ BRIO ============
        [
            'keywords' => ['brio'],
            'intent' => 'brio',
            'reply' => [
                'id' => "Brio, city car yang gesit dan irit. Mulai Rp 250.000/hari, tipe automatic. Pas buat jalanan kota. Booking: 0812-2506-2153",
                'en' => "Brio, a nimble and fuel-efficient city car. Starts from Rp 250,000/day, automatic. Perfect for city driving. Book at: 0812-2506-2153",
            ],
        ],

        // ============ ELF / HIACE / BIG CAR ============
        [
            'keywords' => ['elf', 'hiace', 'big car', 'rombongan', 'group', 'bus', 'minibus', 'banyak orang', 'kapasitas'],
            'intent' => 'bigcar',
            'reply' => [
                'id' => "Kalau buat rombongan, kami punya Mitsubishi ELF (muat 10-15 orang) dan Toyota Hiace (muat 12-16 orang). Harganya mulai Rp 800.000 - 1.200.000/hari. Cocok buat wisata, acara kantor, atau gathering. Info: 0812-2506-2153",
                'en' => "For groups, we have the Mitsubishi ELF (seats 10-15 people) and Toyota Hiace (seats 12-16 people). Starting from Rp 800,000 - 1,200,000/day. Perfect for tours, company events, or gatherings. Info: 0812-2506-2153",
            ],
        ],

        // ============ KONTAK ============
        [
            'keywords' => ['kontak', 'contact', 'telepon', 'phone', 'telp', 'hubungi', 'whatsapp', 'wa', 'nomor', 'no hp', 'email', 'cs', 'customer service'],
            'intent' => 'contact',
            'reply' => [
                'id' => "Ini kontak kami:\nWhatsApp: 0812-2506-2153\nEmail: info@blesstransmandiri.com\nWebsite: blesstransmandiri.com\n\nAdmin kami online dan siap bantu kapanpun.",
                'en' => "Here's how to reach us:\nWhatsApp: 0812-2506-2153\nEmail: info@blesstransmandiri.com\nWebsite: blesstransmandiri.com\n\nOur admin is online and ready to help anytime.",
            ],
        ],

        // ============ LOKASI ============
        [
            'keywords' => ['lokasi', 'location', 'alamat', 'address', 'dimana', 'kantor', 'office', 'cabang', 'koordinat'],
            'intent' => 'location',
            'reply' => [
                'id' => "Kantor kami di Medan, Sumatera Utara. Kami melayani sewa mobil untuk area Medan dan sekitarnya. Kalau butuh antar jemput kendaraan, bisa banget. Info: 0812-2506-2153",
                'en' => "Our office is in Medan, North Sumatra. We serve car rentals for the Medan area and surrounding regions. Vehicle delivery and pickup is available too. Info: 0812-2506-2153",
            ],
        ],

        // ============ JAM OPERASIONAL ============
        [
            'keywords' => ['jam', 'buka', 'tutup', 'operasional', 'jam berapa', '24 jam', 'open', 'close', 'hour'],
            'intent' => 'hours',
            'reply' => [
                'id' => "Kami melayani 24 jam. Jadi kapanpun butuh, langsung hubungi aja: 0812-2506-2153",
                'en' => "We're available 24/7. So whenever you need us, just reach out: 0812-2506-2153",
            ],
        ],

        // ============ BOOKING ============
        [
            'keywords' => ['booking', 'pesan', 'reservasi', 'order', 'cara sewa', 'cara rental', 'cara order', 'gimana cara', 'bagaimana cara', 'proses', 'langkah', 'book', 'how to', 'process', 'steps'],
            'intent' => 'booking',
            'reply' => [
                'id' => "Gampang banget caranya:\n1. Pilih mobilnya\n2. Hubungi admin: 0812-2506-2153\n3. Sebutkan tanggal, durasi, sama jenis mobil\n4. Konfirmasi sama bayar DP\n5. Mobil siap di hari H\n\nMudah kan? Langsung aja mulai.",
                'en' => "Super easy:\n1. Pick your car\n2. Contact our admin: 0812-2506-2153\n3. Mention the date, duration, and car type\n4. Confirm and pay the down payment\n5. Your car is ready on the day\n\nSimple right? Let's get started.",
            ],
        ],

        // ============ LEPAS KUNCI ============
        [
            'keywords' => ['lepas kunci', 'lepaskunci', 'tanpa supir', 'self drive', 'sendiri'],
            'intent' => 'selfdrive',
            'reply' => [
                'id' => "Bisa kok lepas kunci. Syaratnya cuma KTP atau SIM yang masih berlaku sama DP. Mulai Rp 250.000/hari. Info lengkap: 0812-2506-2153",
                'en' => "Yes, self-drive is available. You just need a valid ID or driver's license plus a down payment. Starts from Rp 250,000/day. Full details: 0812-2506-2153",
            ],
        ],

        // ============ DENGAN SUPIR ============
        [
            'keywords' => ['supir', 'driver', 'dengan supir', 'pakai supir', 'chauffeur'],
            'intent' => 'withdriver',
            'reply' => [
                'id' => "Tersedia juga pakai supir. Supir kami berpengalaman dan tahu rute terbaik. Mulai Rp 350.000/hari belum termasuk biaya supir dan BBM. Info: 0812-2506-2153",
                'en' => "We also have drivers available. Our drivers are experienced and know the best routes. Starting from Rp 350,000/day plus driver fee and fuel. Info: 0812-2506-2153",
            ],
        ],

        // ============ SYARAT ============
        [
            'keywords' => ['syarat', 'ketentuan', 'terms', 'rules', 'ktp', 'sim', 'jaminan', 'persyaratan', 'wajib', 'requirement', 'requirements', 'condition', 'conditions'],
            'intent' => 'terms',
            'reply' => [
                'id' => "Syaratnya simpel: KTP atau SIM yang masih berlaku, DP, dan nomor telepon aktif. Pengembalian harus tepat waktu ya, kalau telat ada denda. Kerusakan juga ditanggung penyewa. Info detail: 0812-2506-2153",
                'en' => "The requirements are simple: valid ID or driver's license, down payment, and an active phone number. Return on time please, there's a late fee. Damage is the renter's responsibility. Full details: 0812-2506-2153",
            ],
        ],

        // ============ PEMBAYARAN ============
        [
            'keywords' => ['bayar', 'payment', 'transfer', 'cash', 'tunai', 'debit', 'kredit', 'ovo', 'gopay', 'dana', 'qris', 'va', 'virtual account', 'pelunasan'],
            'intent' => 'payment',
            'reply' => [
                'id' => "Bisa bayar pakai transfer bank (BCA, Mandiri, BRI, BNI), tunai, e-wallet (OVO, GoPay, Dana), atau QRIS. DP dibayar duluan, pelunasan saat ambil mobil. Info: 0812-2506-2153",
                'en' => "Payment options: bank transfer (BCA, Mandiri, BRI, BNI), cash, e-wallet (OVO, GoPay, Dana), or QRIS. DP is paid first, full payment when you pick up the car. Info: 0812-2506-2153",
            ],
        ],

        // ============ DP ============
        [
            'keywords' => ['dp', 'uang muka', 'down payment', 'bayar dp', 'berapa dp', 'dp berapa'],
            'intent' => 'dp',
            'reply' => [
                'id' => "DP-nya bervariasi. Mobil kecil mulai Rp 100.000, MPV mulai Rp 200.000, SUV mulai Rp 300.000, big car mulai Rp 400.000. Catatan: DP gak dikembalikan kalau pembatalan mendadak. Info: 0812-2506-2153",
                'en' => "DP varies by car type. Small cars from Rp 100,000, MPVs from Rp 200,000, SUVs from Rp 300,000, big cars from Rp 400,000. Note: DP is non-refundable for last-minute cancellations. Info: 0812-2506-2153",
            ],
        ],

        // ============ DURASI ============
        [
            'keywords' => ['durasi', 'berapa hari', 'sehari', 'semalam', 'mingguan', 'bulanan', 'long term', 'harian', 'minggu', 'bulan', 'weekly', 'monthly'],
            'intent' => 'duration',
            'reply' => [
                'id' => "Kami terima sewa harian, mingguan, bulanan, bahkan long term. Makin lama, makin hemat. Mau tanya harga spesifik? Chat admin: 0812-2506-2153",
                'en' => "We offer daily, weekly, monthly, and even long-term rentals. The longer you rent, the more you save. Want specific pricing? Chat with our admin: 0812-2506-2153",
            ],
        ],

        // ============ LUAR KOTA ============
        [
            'keywords' => ['luar kota', 'out of town', 'intercity', 'antarkota', 'medan', 'toba', 'parapat', 'berastagi', 'tanjung balai'],
            'intent' => 'outoftown',
            'reply' => [
                'id' => "Bisa banget buat luar kota. Rute populer: Medan - Toba, Medan - Berastagi, Medan - Parapat. Dengan atau tanpa supir tersedia. Info rute dan harga: 0812-2506-2153",
                'en' => "Absolutely, we do out-of-town rentals. Popular routes: Medan - Toba, Medan - Berastagi, Medan - Parapat. With or without a driver available. Route and pricing info: 0812-2506-2153",
            ],
        ],

        // ============ EVENT / WISATA / PERNIKAHAN ============
        [
            'keywords' => ['event', 'acara', 'nikah', 'pernikahan', 'wedding', 'wisata', 'travel', 'tour', 'kantor', 'corporate', 'dinas', 'bisnis'],
            'intent' => 'event',
            'reply' => [
                'id' => "Kami layani sewa buat berbagai acara: pernikahan, wisata, acara kantor, dinas, gathering. Untuk wedding juga tersedia dekorasi. Info dan booking: 0812-2506-2153",
                'en' => "We serve rentals for various events: weddings, tours, corporate events, official trips, gatherings. Wedding decoration is also available. Info and booking: 0812-2506-2153",
            ],
        ],

        // ============ ASURANSI ============
        [
            'keywords' => ['asuransi', 'insurance', 'proteksi', 'kerusakan', 'kecelakaan', 'tanggung', 'klaim'],
            'intent' => 'insurance',
            'reply' => [
                'id' => "Setiap kendaraan kami sudah dilengkapi asuransi all-risk. Klaim sesuai ketentuan polis. Tapi kalau kerusakan karena kelalaian penyewa, itu ditanggung penyewa ya. Info detail: 0812-2506-2153",
                'en' => "Every vehicle comes with all-risk insurance. Claims are subject to policy terms. However, damage due to renter's negligence is the renter's responsibility. Full details: 0812-2506-2153",
            ],
        ],

        // ============ BBM ============
        [
            'keywords' => ['bbm', 'bensin', 'fuel', 'minyak', 'pertalite', 'pertamax', 'solar', 'isi bensin'],
            'intent' => 'fuel',
            'reply' => [
                'id' => "Mobil diserahkan dengan BBM penuh, dan harus dikembalikan BBM penuh juga. BBM jadi tanggung jawab penyewa ya. Info lebih lanjut: 0812-2506-2153",
                'en' => "Cars are handed over with a full tank and must be returned with a full tank. Fuel is the renter's responsibility. More info: 0812-2506-2153",
            ],
        ],

        // ============ ANTAR JEMPUT ============
        [
            'keywords' => ['antar', 'jemput', 'delivery', 'pick up', 'pickup', 'drop'],
            'intent' => 'delivery',
            'reply' => [
                'id' => "Kami sediakan antar jemput kendaraan. Antar ke lokasi kamu atau jemput dari lokasi kamu. Biaya tambahan tergantung jarak. Info: 0812-2506-2153",
                'en' => "We provide vehicle delivery and pickup. We can deliver to your location or pick up from yours. Additional fee depends on distance. Info: 0812-2506-2153",
            ],
        ],

        // ============ LAYANAN ============
        [
            'keywords' => ['layanan', 'service', 'fasilitas', 'include', 'bonus', 'benefit', 'keunggulan', 'kelebihan', 'kenapa'],
            'intent' => 'services',
            'reply' => [
                'id' => "Kenapa Bless? Karena kami kasih:\n- Mobil terawat dan bersih\n- Pilihan lepas kunci atau dengan supir\n- Antar jemput kendaraan\n- Bisa dalam dan luar kota\n- Cocok buat wisata, dinas, pernikahan, event\n- Layanan 24 jam\n- Harga bersaing\n\nInfo: 0812-2506-2153",
                'en' => "Why Bless? Because we offer:\n- Well-maintained and clean cars\n- Self-drive or with driver options\n- Vehicle delivery and pickup\n- Domestic and intercity rentals\n- Perfect for tours, business, weddings, events\n- 24-hour service\n- Competitive pricing\n\nInfo: 0812-2506-2153",
            ],
        ],

        // ============ KETERSEDIAAN ============
        [
            'keywords' => ['ketersediaan', 'available', 'stok', 'stock', 'ready', 'ready stock', 'kosong', 'habis'],
            'intent' => 'availability',
            'reply' => [
                'id' => "Untuk cek ketersediaan terkini, langsung hubungi admin aja: 0812-2506-2153. Mereka bisa kasih info real-time soal mobil yang available.",
                'en' => "To check real-time availability, just contact our admin: 0812-2506-2153. They can give you up-to-date info on available cars.",
            ],
        ],

        // ============ TESTIMONI ============
        [
            'keywords' => ['testimoni', 'review', 'ulasan', 'penilaian', 'rating', 'puas', 'recommended'],
            'intent' => 'testimonials',
            'reply' => [
                'id' => "Terima kasih atas kepercayaan para pelanggan kami. Bless Rent Car selalu berusaha kasih pelayanan terbaik. Mau jadi pelanggan kami juga? Hubungi: 0812-2506-2153",
                'en' => "Thanks to our customers for their trust. Bless Rent Car always strives to provide the best service. Want to be our customer too? Contact us: 0812-2506-2153",
            ],
        ],

        // ============ CANCEL ============
        [
            'keywords' => ['batal', 'cancel', 'batalkan', 'urungkan', 'refund', 'kembalikan uang'],
            'intent' => 'cancel',
            'reply' => [
                'id' => "Untuk pembatalan, hubungi admin minimal 24 jam sebelum jadwal. Ketentuan refund berlaku. DP bisa dikembalikan sesuai kebijakan. Info: 0812-2506-2153",
                'en' => "For cancellations, contact our admin at least 24 hours before the schedule. Refund terms apply. DP may be refunded per our policy. Info: 0812-2506-2153",
            ],
        ],

        // ============ PENGEMBALIAN ============
        [
            'keywords' => ['kembalikan', 'pengembalian', 'return', 'drop off', 'telat', 'terlambat'],
            'intent' => 'return',
            'reply' => [
                'id' => "Kendaraan harus dikembalikan sesuai waktu yang disepakati. Kalau telat, ada denda. Mobil harus bersih dan BBM penuh saat dikembalikan. Info: 0812-2506-2153",
                'en' => "The vehicle must be returned on the agreed time. Late returns incur a fee. Car must be clean and with a full tank upon return. Info: 0812-2506-2153",
            ],
        ],

        // ============ WEBSITE ============
        [
            'keywords' => ['website', 'situs', 'web', 'link', 'url', 'laman'],
            'intent' => 'website',
            'reply' => [
                'id' => "Website kami: blesstransmandiri.com. Di sana bisa lihat katalog kendaraan dan info lengkap lainnya. Atau langsung hubungi: 0812-2506-2153",
                'en' => "Our website: blesstransmandiri.com. You can see our car catalog and other complete information there. Or contact us directly: 0812-2506-2153",
            ],
        ],

        // ============ EMAIL ============
        [
            'keywords' => ['email', 'surat', 'mail'],
            'intent' => 'email',
            'reply' => [
                'id' => "Email kami: info@blesstransmandiri.com. Untuk respon lebih cepat, pakai WhatsApp aja: 0812-2506-2153",
                'en' => "Our email: info@blesstransmandiri.com. For a faster response, use WhatsApp: 0812-2506-2153",
            ],
        ],

        // ============ HUMAN / ADMIN ============
        [
            'keywords' => ['manusia', 'human', 'orang', 'bicara orang', 'ngomong sama orang', 'sama admin', 'cs beneran'],
            'intent' => 'human',
            'reply' => [
                'id' => "Mau bicara langsung sama admin? Chat aja ke WhatsApp: 0812-2506-2153. Admin kami ramah dan fast response.",
                'en' => "Want to talk to a real person? Just message our WhatsApp: 0812-2506-2153. Our admin is friendly and responds quickly.",
            ],
        ],

        // ============ AI / BOT ============
        [
            'keywords' => ['ai', 'bot', 'robot', 'otomatis', 'artificial intelligence', 'kecerdasan buatan', 'siapa kamu', 'kamu siapa', 'namamu'],
            'intent' => 'about_ai',
            'reply' => [
                'id' => "Saya AI assistant dari Bless Rent Car. Saya bisa bantu jawab pertanyaan soal harga, armada, cara booking, syarat, dan info rental mobil lainnya. Kalau pertanyaannya di luar itu, hubungi admin aja: 0812-2506-2153",
                'en' => "I'm an AI assistant from Bless Rent Car. I can help answer questions about pricing, fleet, booking process, requirements, and other rental info. For anything else, reach out to our admin: 0812-2506-2153",
            ],
        ],

        // ============ PROMO / DISKON ============
        [
            'keywords' => ['promo', 'diskon', 'potongan', 'hemat', 'spesial', 'special', 'deal', 'tawaran', 'penawaran'],
            'intent' => 'promo',
            'reply' => [
                'id' => "Sewa 3 hari bisa GRATIS hari ke-3. Syarat dan ketentuan berlaku ya. Untuk penawaran terbaik, langsung chat admin: 0812-2506-2153",
                'en' => "Rent 3 days and get the 3rd day FREE. Terms and conditions apply. For the best deals, chat our admin: 0812-2506-2153",
            ],
        ],

        // ============ KELUHAN ============
        [
            'keywords' => ['keluhan', 'complain', 'kecewa', 'marah', 'jelek', 'buruk', 'parah', 'tidak puas', 'masalah', 'problem', 'error'],
            'intent' => 'complaint',
            'reply' => [
                'id' => "Maaf banget kalau ada yang kurang berkenan. Kami serius terima setiap masukan. Silakan sampaikan langsung ke admin kami: 0812-2506-2153 atau email ke info@blesstransmandiri.com. Kami akan segera respons.",
                'en' => "We're really sorry for any inconvenience. We take all feedback seriously. Please reach out directly to our admin: 0812-2506-2153 or email info@blesstransmandiri.com. We'll respond ASAP.",
            ],
        ],

        // ============ SEWA (general) ============
        [
            'keywords' => ['sewa', 'rent', 'rental'],
            'intent' => 'rent',
            'reply' => [
                'id' => "Kami Bless Rent Car, spesialis rental mobil di Medan. Mulai Rp 250.000/hari, banyak pilihan mobil. Lepas kunci atau dengan supir, bisa dalam dan luar kota. Info: 0812-2506-2153",
                'en' => "We're Bless Rent Car, a car rental specialist in Medan. Starting from Rp 250,000/day with various car options. Self-drive or with driver, domestic and intercity. Info: 0812-2506-2153",
            ],
        ],

        // ============ MOBIL (general) ============
        [
            'keywords' => ['mobil', 'kendaraan', 'armada', 'vehicle', 'car', 'unit', 'pilihan'],
            'intent' => 'vehicles',
            'reply' => [
                'id' => "Armada kami: Toyota Avanza, Innova Reborn, Fortuner, Daihatsu Xenia, Honda Brio, Mitsubishi ELF, Toyota Hiace. Mulai Rp 250.000/hari. Info lengkap: 0812-2506-2153",
                'en' => "Our fleet: Toyota Avanza, Innova Reborn, Fortuner, Daihatsu Xenia, Honda Brio, Mitsubishi ELF, Toyota Hiace. Starting from Rp 250,000/day. Full details: 0812-2506-2153",
            ],
        ],
    ];

    public static function getChatMode(): string
    {
        if (self::$chatMode === null) {
            $setting = Setting::where('key', 'chat_mode')->first();
            self::$chatMode = $setting?->value ?? 'ai';
        }
        return self::$chatMode;
    }

    public static function setChatMode(string $mode): void
    {
        Setting::updateOrCreate(
            ['key' => 'chat_mode'],
            ['value' => $mode, 'type' => 'text']
        );
        self::$chatMode = $mode;
    }

    public function getReply(string $message): string
    {
        $lang = $this->detectLanguage($message);
        $messageLower = mb_strtolower(trim($message));
        $words = $this->tokenize($messageLower);

        if (empty($words) && empty($messageLower)) {
            return $this->randomPick([
                'id' => 'Ada yang bisa dibantu?',
                'en' => 'How can I help you?',
            ], $lang);
        }

        if ($this->matchAny($words, $this->greetings) && mb_strlen($messageLower) < 25) {
            return $this->randomPick($this->greetingReplies, $lang);
        }

        if ($this->matchAny($words, $this->goodbye)) {
            return $this->randomPick($this->goodbyeReplies, $lang);
        }

        if ($this->matchAny($words, ['terima kasih', 'thanks', 'thx', 'makasih', 'thank'])) {
            return $this->randomPick($this->thankReplies, $lang);
        }

        $bestScore = 0;
        $bestGroup = null;

        foreach ($this->keywordGroups as $group) {
            $matchCount = 0;
            $totalKeywordLen = 0;
            foreach ($group['keywords'] as $kw) {
                if (mb_strpos($messageLower, $kw) !== false) {
                    $matchCount++;
                    $totalKeywordLen += mb_strlen($kw);
                }
            }

            if ($matchCount > 0) {
                $score = $totalKeywordLen / (mb_strlen($messageLower) + 1);
                $scoreBonus = $matchCount > 1 ? ($matchCount * 0.15) : 0;
                $finalScore = $score + $scoreBonus;

                if ($finalScore > $bestScore || ($finalScore == $bestScore && $totalKeywordLen > ($bestTotalKeywordLen ?? 0))) {
                    $bestScore = $finalScore;
                    $bestGroup = $group;
                    $bestTotalKeywordLen = $totalKeywordLen;
                }
            }
        }

        if ($bestGroup && $bestScore >= 0.08) {
            return $this->getLocalizedReply($bestGroup, $lang);
        }

        if ($this->matchAny($words, ['bagus', 'hebat', 'keren', 'mantap', 'juara', 'top', 'great', 'nice', 'awesome'])) {
            return $this->randomPick($this->complimentReplies, $lang);
        }

        $faqReply = $this->findFaqMatch($messageLower, $words);
        if ($faqReply) {
            return $faqReply;
        }

        foreach ($this->keywordGroups as $group) {
            foreach ($group['keywords'] as $keyword) {
                if (mb_strpos($messageLower, $keyword) !== false) {
                    return $this->getLocalizedReply($group, $lang);
                }
            }
        }

        $carReply = $this->searchCars($messageLower, $lang);
        if ($carReply) {
            return $carReply;
        }

        $serviceReply = $this->searchServices($messageLower, $lang);
        if ($serviceReply) {
            return $serviceReply;
        }

        return $this->outOfScope($lang);
    }

    private function detectLanguage(string $text): string
    {
        $text = mb_strtolower(trim($text));

        $englishWords = [
            'the', 'is', 'are', 'was', 'were', 'have', 'has', 'had',
            'do', 'does', 'did', 'will', 'would', 'could', 'should',
            'can', 'may', 'might', 'shall', 'what', 'where', 'when',
            'how', 'why', 'who', 'which', 'this', 'that', 'these',
            'those', 'here', 'there', 'very', 'much', 'many', 'some',
            'any', 'all', 'each', 'every', 'both', 'few', 'more',
            'most', 'other', 'such', 'than', 'then', 'also', 'just',
            'only', 'not', 'no', 'yes', 'and', 'or', 'but', 'if',
            'because', 'about', 'with', 'from', 'for', 'to', 'in',
            'on', 'at', 'by', 'of', 'your', 'our', 'their', 'its',
            'my', 'me', 'you', 'he', 'she', 'it', 'we', 'they',
            'want', 'need', 'like', 'looking', 'check', 'know', 'tell',
            'help', 'please', 'hi', 'hello', 'hey', 'hey',
            'car', 'rent', 'price', 'book', 'available', 'driver', 'self',
            'drive', 'fuel', 'insurance', 'payment', 'cancel', 'thanks',
            'thank', 'nice', 'good', 'great', 'awesome', 'service',
            'lot', 'a', 'an', 'the', 'i', 'do', 'does', 'is',
            'requirement', 'requirements', 'need', 'method', 'methods',
            'much', 'cost', 'money', 'today', 'now', 'info', 'information',
            'sorry', 'hello', 'hey', 'yo', 'sure', 'yes', 'no',
            'recommend', 'recommendation', 'suggestion', 'idea',
        ];

        $indonesianWords = [
            'apa', 'yang', 'dimana', 'bagaimana', 'gimana', 'berapa',
            'kenapa', 'kapan', 'siapa', 'mengapa', 'ini', 'itu',
            'saya', 'kamu', 'dia', 'kami', 'mereka', 'kita',
            'mau', 'ingin', 'bisa', 'tidak', 'bukan', 'ada',
            'untuk', 'dengan', 'dari', 'ke', 'di', 'pada',
            'sama', 'juga', 'atau', 'tapi', 'namun', 'karena',
            'kalau', 'kalau', 'kalau', 'sudah', 'belum', 'lagi',
            'dong', 'nih', 'yah', 'sih', 'kan', 'kok',
            'banget', 'sekali', 'sangat', 'cukup', 'agak',
            'harga', 'sewa', 'rental', 'mobil', 'supir',
            'berapa', 'murah', 'mahal', 'bagus', 'jelek',
            'iya', 'oh', 'ok', 'sip', 'oke', 'gas',
        ];

        $words = preg_split('/\s+/', $text);
        $englishCount = 0;
        $indonesianCount = 0;

        foreach ($words as $word) {
            if (in_array($word, $englishWords)) {
                $englishCount++;
            }
            if (in_array($word, $indonesianWords)) {
                $indonesianCount++;
            }
        }

        if ($englishCount > 0 && $englishCount >= $indonesianCount) {
            return 'en';
        }

        return 'id';
    }

    private function getLocalizedReply(array $group, string $lang): string
    {
        if (isset($group['reply'][$lang])) {
            return $group['reply'][$lang];
        }
        return $group['reply']['id'] ?? $group['reply'][array_key_first($group['reply'])];
    }

    private function randomPick(array $replies, string $lang = 'id'): string
    {
        if (isset($replies[$lang])) {
            return $replies[$lang][array_rand($replies[$lang])];
        }
        return $replies['id'][array_rand($replies['id'])];
    }

    private function matchAny(array $words, array $targets): bool
    {
        foreach ($words as $word) {
            if (in_array($word, $targets)) {
                return true;
            }
        }
        return false;
    }

    private function findFaqMatch(string $message, array $messageWords): ?string
    {
        if (empty($this->faqCache)) {
            $this->faqCache = Faq::where('is_active', true)->get()->toArray();
        }

        if (empty($this->faqCache)) {
            return null;
        }

        $bestScore = 0;
        $bestAnswer = null;

        foreach ($this->faqCache as $faq) {
            $questionLower = mb_strtolower($faq['question'] ?? '');
            $questionWords = $this->tokenize($questionLower);

            if (empty($questionWords)) {
                continue;
            }

            $intersection = array_intersect($messageWords, $questionWords);
            $union = array_unique(array_merge($messageWords, $questionWords));

            $score = count($union) > 0 ? count($intersection) / count($union) : 0;

            if ($score > $bestScore) {
                $bestScore = $score;
                $bestAnswer = $faq['answer'] ?? null;
            }
        }

        if ($bestScore >= 0.15) {
            return $bestAnswer;
        }

        return null;
    }

    private function searchCars(string $message, string $lang): ?string
    {
        if (empty($this->carCache)) {
            $this->carCache = Cache::remember('chat_cars', 300, function () {
                return Car::where('is_available', true)
                    ->select('name', 'brand', 'model', 'price_per_day', 'transmission', 'seat_count', 'capacity')
                    ->limit(20)
                    ->get()
                    ->toArray();
            });
        }

        if (empty($this->carCache)) {
            return null;
        }

        $matched = [];
        foreach ($this->carCache as $car) {
            $carName = mb_strtolower(($car['brand'] ?? '') . ' ' . ($car['name'] ?? ''));
            $carWords = explode(' ', $carName);

            foreach ($carWords as $cw) {
                if (mb_strlen($cw) > 2 && mb_strpos($message, $cw) !== false) {
                    $matched[] = $car;
                    break;
                }
            }
        }

        if (!empty($matched)) {
            if ($lang === 'en') {
                $lines = ["Here's what we found:\n"];
                foreach (array_slice($matched, 0, 5) as $car) {
                    $price = $car['price_per_day'] ? 'Rp ' . number_format($car['price_per_day'], 0, ',', '.') . '/day' : 'Contact admin';
                    $trans = $car['transmission'] ?? '-';
                    $seats = $car['seat_count'] ?? $car['capacity'] ?? '-';
                    $lines[] = "{$car['brand']} {$car['name']}";
                    $lines[] = "{$trans} | {$seats} seats | {$price}\n";
                }
                $lines[] = "Book now: 0812-2506-2153";
            } else {
                $lines = ["Ini kendaraan yang kami temukan:\n"];
                foreach (array_slice($matched, 0, 5) as $car) {
                    $price = $car['price_per_day'] ? 'Rp ' . number_format($car['price_per_day'], 0, ',', '.') . '/hari' : 'Hubungi admin';
                    $trans = $car['transmission'] ?? '-';
                    $seats = $car['seat_count'] ?? $car['capacity'] ?? '-';
                    $lines[] = "{$car['brand']} {$car['name']}";
                    $lines[] = "{$trans} | {$seats} kursi | {$price}\n";
                }
                $lines[] = "Booking: 0812-2506-2153";
            }
            return implode("\n", $lines);
        }

        return null;
    }

    private function searchServices(string $message, string $lang): ?string
    {
        if (empty($this->serviceCache)) {
            $this->serviceCache = Cache::remember('chat_services', 300, function () {
                return Service::where('is_active', true)
                    ->select('name', 'description', 'slug')
                    ->limit(10)
                    ->get()
                    ->toArray();
            });
        }

        if (empty($this->serviceCache)) {
            return null;
        }

        foreach ($this->serviceCache as $svc) {
            $svcName = mb_strtolower($svc['name'] ?? '');
            $svcWords = explode(' ', $svcName);

            foreach ($svcWords as $sw) {
                if (mb_strlen($sw) > 3 && mb_strpos($message, $sw) !== false) {
                    if ($lang === 'en') {
                        return "{$svc['name']}\n\n{$svc['description']}\n\nMore info: 0812-2506-2153";
                    }
                    return "{$svc['name']}\n\n{$svc['description']}\n\nInfo: 0812-2506-2153";
                }
            }
        }

        return null;
    }

    private function outOfScope(string $lang): string
    {
        if ($lang === 'en') {
            $replies = [
                "Hmm, that's outside my expertise. For that kind of question, it's better to chat directly with our admin on WhatsApp: 0812-2506-2153. They'll be able to help you better.",
                "I'm not sure about that, but our admin can definitely help. Just message WhatsApp: 0812-2506-2153",
                "That's beyond what I can answer, but our team is ready to help on WhatsApp: 0812-2506-2153",
            ];
        } else {
            $replies = [
                "Hmm, itu di luar bidang saya nih. Untuk pertanyaan seperti itu, lebih baik chat langsung ke admin WhatsApp: 0812-2506-2153. Mereka bisa bantu lebih baik.",
                "Wah, saya kurang paham soal itu. Tapi admin kami pasti bisa bantu. Chat aja ke WhatsApp: 0812-2506-2153",
                "Itu di luar kemampuan saya, tapi tim kami siap bantu di WhatsApp: 0812-2506-2153",
            ];
        }

        return $replies[array_rand($replies)];
    }

    private function smartDefault(string $message, string $lang): string
    {
        if ($lang === 'en') {
            return "Thanks for your message! I can help with questions about our car rental services - pricing, fleet, booking process, requirements, and more. For other topics, please contact our admin on WhatsApp: 0812-2506-2153";
        }

        return "Makasih pesannya! Saya bisa bantu jawab soal rental mobil - harga, armada, cara booking, syarat, dan info lainnya. Kalau pertanyaannya di luar itu, hubungi admin: 0812-2506-2153";
    }

    private function tokenize(string $text): array
    {
        $stopWords = [
            'yang', 'di', 'ke', 'dan', 'dari', 'ini', 'itu', 'untuk', 'dengan',
            'pada', 'adalah', 'akan', 'tidak', 'sudah', 'bisa',
            'apakah', 'saya', 'kami', 'anda', 'mereka', 'dia', 'kita', 'atau',
            'juga', 'dalam', 'oleh', 'sebagai', 'tentang', 'saja', 'tolong',
            'ya', 'mau', 'aku', 'kak', 'mas', 'nih',
            'mbak', 'pak', 'bu', 'bang', 'dong', 'yah', 'sih',
            'deh', 'donk', 'ges', 'min', 'gan', 'sis',
            'mohon', 'izin', 'please', 'help', 'kalo', 'kalau',
            'kok', 'kan', 'lho', 'coba', 'gitu', 'gt',
            'the', 'is', 'are', 'was', 'a', 'an', 'and', 'or', 'but',
            'in', 'on', 'at', 'to', 'for', 'of', 'with', 'by',
            'it', 'its', 'my', 'your', 'his', 'her', 'our', 'their',
            'do', 'does', 'did', 'have', 'has', 'had',
            'that', 'this', 'these', 'those', 'i', 'you', 'he', 'she', 'we', 'they',
        ];

        $words = preg_split('/[\s,\.!\?\:\;\(\)\[\]\{\}\/\\\\@#\$%\^&\*\+=\-_\'\"<>~`\|]+/u', $text);

        return array_values(array_unique(array_filter(array_map('trim', $words), function ($word) use ($stopWords) {
            return mb_strlen($word) > 1 && !in_array($word, $stopWords) && !is_numeric($word);
        })));
    }
}
