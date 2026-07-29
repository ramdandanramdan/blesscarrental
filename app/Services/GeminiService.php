<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private string $apiKey;
    private string $model;
    private string $baseUrl;

    private string $systemPrompt = <<<'PROMPT'
Kamu adalah customer service AI dari "Bless Rent Car" — perusahaan rental mobil di Medan, Sumatera Utara, Indonesia.

IDENTITAS:
- Nama: Bless Rent Car (AI Assistant)
- Lokasi: Medan, Sumatera Utara
- WhatsApp: 0812-2506-2153
- Email: info@blesstransmandiri.com
- Website: blesstransmandiri.com

LAYANAN:
- Sewa mobil lepas kunci (tanpa supir)
- Sewa mobil dengan supir
- Layanan antar jemput kendaraan
- Tersedia untuk dalam kota Medan dan luar kota
- Tersedia untuk event, pernikahan, dinas, wisata

KENDARAAN YANG TERSEDIA:
- Toyota Avanza (Manual & Automatic)
- Toyota Innova Reborn
- Toyota Fortuner
- Daihatsu Xenia
- Honda Brio
- Mitsubishi ELF (big car untuk rombongan)
- Toyota Hiace

HARGA (per hari, bisa berubah sewaktu-waktu):
- Mobil kecil (Avanza, Xenia, Brio): mulai Rp 250.000 - Rp 350.000
- MPV (Innova): mulai Rp 450.000 - Rp 600.000
- SUV (Fortuner): mulai Rp 700.000 - Rp 900.000
- Big car (ELF, Hiace): mulai Rp 800.000 - Rp 1.200.000
*Harga bisa berubah sesuai musim dan durasi sewa. Hubungi WhatsApp untuk harga pasti.

SYARAT SEWA:
- KTP atau SIM yang masih berlaku
- DP sesuai ketentuan
- Pengembalian tepat waktu, denda keterlambatan berlaku
- Kerusakan ditanggung penyewa

CARA BOOKING:
1. Hubungi via WhatsApp: 0812-2506-2153
2. Sebutkan tanggal, durasi, dan jenis kendaraan
3. Konfirmasi dan bayar DP
4. Kendaraan siap di hari H

ATURAN BERTINGKAH LAKU:
- Selalu sapa dengan ramah dan sopan
- Gunakan bahasa Indonesia yang baik dan natural
- Jawab pertanyaan dengan akurat berdasarkan data di atas
- Jika ditanya sesuatu di luar knowledge, arahkan ke WhatsApp admin
- Singkat, padat, dan jelas — tidak bertele-tele
- Gunakan emoji secukupnya untuk ramah (jangan berlebihan)
- Jangan mengarang informasi yang tidak ada
- Jika harga pasti ditanyakan, bilang "Untuk harga pasti, silakan hubungi admin kami di WhatsApp: 0812-2506-2153 ya 😊"
- Sapa pelanggan dengan sebutan yang ramah
PROMPT;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.api_key', '');
        $this->model = config('services.gemini.model', 'gemini-2.0-flash');
        $this->baseUrl = config('services.gemini.base_url', 'https://generativelanguage.googleapis.com/v1beta');

        Log::info('GeminiService initialized', [
            'key_empty' => empty($this->apiKey),
            'key_length' => strlen($this->apiKey),
            'model' => $this->model,
            'base_url' => $this->baseUrl,
        ]);
    }

    public function chat(string $userMessage, array $history = []): string
    {
        if (empty($this->apiKey)) {
            Log::warning('GeminiService: API key is empty');
            return $this->fallbackReply();
        }

        try {
            $contents = [];

            foreach ($history as $msg) {
                $role = $msg['role'] === 'user' ? 'user' : 'model';
                $contents[] = [
                    'role' => $role,
                    'parts' => [['text' => $msg['text']]],
                ];
            }

            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $userMessage]],
            ];

            $url = "{$this->baseUrl}/models/{$this->model}:generateContent?key={$this->apiKey}";

            Log::info('GeminiService: Sending request', [
                'model' => $this->model,
                'history_count' => count($history),
                'message' => substr($userMessage, 0, 100),
            ]);

            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, [
                    'system_instruction' => [
                        'parts' => [['text' => $this->systemPrompt]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'temperature' => 0.8,
                        'maxOutputTokens' => 1024,
                        'topP' => 0.95,
                        'topK' => 40,
                    ],
                    'safetySettings' => [
                        [
                            'category' => 'HARM_CATEGORY_HARASSMENT',
                            'threshold' => 'BLOCK_NONE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_HATE_SPEECH',
                            'threshold' => 'BLOCK_NONE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT',
                            'threshold' => 'BLOCK_NONE',
                        ],
                        [
                            'category' => 'HARM_CATEGORY_DANGEROUS_CONTENT',
                            'threshold' => 'BLOCK_NONE',
                        ],
                    ],
                ]);

            Log::info('GeminiService: Response received', [
                'status' => $response->status(),
            ]);

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $reply = $data['candidates'][0]['content']['parts'][0]['text'];
                    Log::info('GeminiService: Success', ['reply_length' => strlen($reply)]);
                    return $reply;
                }

                Log::warning('GeminiService: No text in response', ['data' => $data]);
            } else {
                Log::error('GeminiService: HTTP error', [
                    'status' => $response->status(),
                    'body' => substr($response->body(), 0, 500),
                ]);
            }

            return $this->fallbackReply();
        } catch (\Exception $e) {
            Log::error('GeminiService: Exception', ['message' => $e->getMessage()]);
            return $this->fallbackReply();
        }
    }

    private function fallbackReply(): string
    {
        $replies = [
            'Halo! 😊 Terima kasih atas pesan Anda. Untuk pertanyaan spesifik, silakan hubungi admin kami di WhatsApp: 0812-2506-2153 — kami siap membantu!',
            'Terima kasih! 🙏 Saat ini saya sedang dalam pemeliharaan. Silakan chat langsung ke WhatsApp: 0812-2506-2153 untuk bantuan langsung dari admin.',
            'Halo! 👋 Untuk info lengkap seputar sewa mobil, hubungi WhatsApp kami di 0812-2506-2153 ya. Admin kami online dan siap membantu!',
        ];

        return $replies[array_rand($replies)];
    }
}
