<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pemesanan - {{ config('app.name') }}</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;">
        <tr>
            <td align="center" style="padding:24px 16px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;">

                    <!-- Logo + Brand -->
                    <tr>
                        <td style="padding:0 0 16px;text-align:center;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 auto;">
                                <tr>
                                    <td style="vertical-align:middle;padding-right:10px;">
                                        <svg width="38" height="38" viewBox="0 0 40 40" fill="none" style="display:block;">
                                            <rect width="40" height="40" rx="10" fill="#0ea5e9"/>
                                            <path d="M28 24H12l-2-8h20l-2 8z" fill="#fff" opacity="0.95"/>
                                            <circle cx="14" cy="26" r="2.5" fill="#fff"/>
                                            <circle cx="26" cy="26" r="2.5" fill="#fff"/>
                                            <rect x="8" y="15" width="24" height="3" rx="1.5" fill="#fff" opacity="0.7"/>
                                        </svg>
                                    </td>
                                    <td style="vertical-align:middle;">
                                        <span style="font-size:22px;font-weight:800;color:#0c4a6e;letter-spacing:1px;">BLESS</span>
                                        <span style="font-size:22px;font-weight:300;color:#0ea5e9;letter-spacing:1px;">RENT CAR</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Main Card -->
                    <tr>
                        <td style="background:#ffffff;border-radius:12px;overflow:hidden;">

                            <!-- Accent Line -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr><td height="4" style="background:linear-gradient(90deg,#0ea5e9,#06b6d4,#0ea5e9);font-size:0;line-height:0;">&nbsp;</td></tr>
                            </table>

                            <!-- Hero Section -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:36px 40px 24px;text-align:center;">
                                        <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 auto 16px;">
                                            <tr>
                                                <td style="width:56px;height:56px;background:#dcfce7;border-radius:50%;text-align:center;vertical-align:middle;">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block;vertical-align:middle;">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </td>
                                            </tr>
                                        </table>
                                        <h1 style="margin:0;font-size:24px;color:#0c4a6e;font-weight:700;letter-spacing:-0.5px;">Pemesanan Berhasil</h1>
                                        <p style="margin:8px 0 0;font-size:15px;color:#64748b;line-height:1.5;">Yth. <strong style="color:#334155;">{{ $booking->customer_name ?? 'Saudara/i' }}</strong>,<br>Terima kasih telah melakukan pemesanan di Bless Rent Car. Berikut detail pemesanan Anda:</p>
                                    </td>
                                </tr>
                            </table>

                            <!-- Booking ID Ribbon -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="background:#f8fafc;padding:16px 40px;border-top:1px solid #e2e8f0;border-bottom:1px solid #e2e8f0;">
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="vertical-align:middle;">
                                                    <span style="font-size:12px;color:#94a3b8;text-transform:uppercase;letter-spacing:1.5px;font-weight:600;">Kode Booking</span>
                                                    <div style="font-size:24px;font-weight:800;color:#0c4a6e;letter-spacing:2px;margin-top:2px;">#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</div>
                                                </td>
                                                <td align="right" style="vertical-align:middle;">
                                                    <span style="display:inline-block;padding:5px 16px;border-radius:20px;font-size:12px;font-weight:600;background:#fef3c7;color:#b45309;">Menunggu Konfirmasi</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Body Content -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:8px 40px 0;">

                                        <!-- Mobil -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;">
                                            <tr>
                                                <td style="padding-bottom:14px;">
                                                    <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1.2px;color:#94a3b8;">Mobil</span>
                                                    <div style="height:2px;width:24px;background:#0ea5e9;margin-top:6px;"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f8fafc;border-radius:8px;padding:16px 20px;border:1px solid #e2e8f0;">
                                                    <table role="presentation" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="vertical-align:middle;width:36px;">
                                                                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="display:block;">
                                                                    <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"/>
                                                                    <circle cx="6.5" cy="16.5" r="2.5"/><circle cx="16.5" cy="16.5" r="2.5"/>
                                                                </svg>
                                                            </td>
                                                            <td style="vertical-align:middle;padding-left:14px;">
                                                                <div style="font-size:16px;font-weight:600;color:#1e293b;">{{ $booking->car?->name ?? 'Mobil' }}</div>
                                                                <div style="font-size:13px;color:#64748b;margin-top:2px;">{{ $booking->car?->brand ?? '' }}{{ $booking->car?->model ? ' · ' . $booking->car->model : '' }}{{ $booking->car?->year ? ' · ' . $booking->car->year : '' }} · {{ $booking->car?->transmission ?? '' }}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Data Penyewa -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;border-top:1px solid #e2e8f0;">
                                            <tr>
                                                <td style="padding-bottom:14px;">
                                                    <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1.2px;color:#94a3b8;">Data Penyewa</span>
                                                    <div style="height:2px;width:24px;background:#0ea5e9;margin-top:6px;"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="33%" style="padding:0 16px 12px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Nama Lengkap</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ $booking->customer_name ?? '-' }}</div>
                                                            </td>
                                                            <td width="33%" style="padding:0 16px 12px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">No. Telepon</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ $booking->customer_phone ?? '-' }}</div>
                                                            </td>
                                                            <td width="33%" style="padding:0 0 12px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Email</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ $booking->customer_email ?? '-' }}</div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Jadwal & Lokasi -->
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;border-top:1px solid #e2e8f0;">
                                            <tr>
                                                <td style="padding-bottom:14px;">
                                                    <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1.2px;color:#94a3b8;">Jadwal &amp; Lokasi</span>
                                                    <div style="height:2px;width:24px;background:#0ea5e9;margin-top:6px;"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="50%" style="padding:0 16px 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Ambil</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ \Carbon\Carbon::parse($booking->pickup_date)->format('d M Y H:i') }} WIB</div>
                                                            </td>
                                                            <td width="50%" style="padding:0 0 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Kembali</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y H:i') }} WIB</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" style="padding:0 16px 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Lokasi Ambil</div>
                                                                <div style="font-size:13px;color:#475569;margin-top:2px;">{{ $booking->pickup_location ? str_replace('-', ' ', ucwords($booking->pickup_location, '-')) : '-' }}</div>
                                                            </td>
                                                            <td width="50%" style="padding:0 0 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Lokasi Kembali</div>
                                                                <div style="font-size:13px;color:#475569;margin-top:2px;">{{ $booking->return_location ? str_replace('-', ' ', ucwords($booking->return_location, '-')) : 'Sama dengan lokasi ambil' }}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="50%" style="padding:0 16px 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Tipe Sewa</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ $booking->rental_type === 'daily' ? 'Harian' : ($booking->rental_type === 'weekly' ? 'Mingguan' : 'Bulanan') }}</div>
                                                            </td>
                                                            <td width="50%" style="padding:0 0 10px 0;vertical-align:top;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Driver</div>
                                                                <div style="font-size:14px;color:#1e293b;font-weight:500;">{{ $booking->with_driver ? 'Dengan Driver' : 'Tanpa Driver' }}</div>
                                                            </td>
                                                        </tr>
                                                        @if($booking->notes)
                                                        <tr>
                                                            <td colspan="2" style="padding:0;">
                                                                <div style="font-size:11px;color:#94a3b8;margin-bottom:2px;">Catatan</div>
                                                                <div style="font-size:13px;color:#475569;">{{ $booking->notes }}</div>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <!-- Rincian Pembayaran -->
                                        @php
                                            $days = max(1, ceil(\Carbon\Carbon::parse($booking->pickup_date)->diffInDays(\Carbon\Carbon::parse($booking->return_date), false)));
                                            $carPrice = $booking->car?->price_per_day ?? 0;
                                            $basePrice = $carPrice * $days;
                                            $driverFee = $booking->driver_price ?? 0;
                                        @endphp
                                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;border-top:1px solid #e2e8f0;">
                                            <tr>
                                                <td style="padding-bottom:14px;">
                                                    <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:1.2px;color:#94a3b8;">Rincian Pembayaran</span>
                                                    <div style="height:2px;width:24px;background:#0ea5e9;margin-top:6px;"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="background:#f8fafc;border-radius:8px;padding:20px 24px;border:1px solid #e2e8f0;">
                                                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="padding:6px 0;">
                                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td style="font-size:14px;color:#64748b;">Harga Sewa ({{ $days }} hari)</td>
                                                                        <td align="right" style="font-size:14px;color:#334155;font-weight:500;">Rp {{ number_format($basePrice, 0, ',', '.') }}</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        @if($driverFee > 0)
                                                        <tr>
                                                            <td style="padding:6px 0;">
                                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td style="font-size:14px;color:#64748b;">Biaya Driver ({{ $days }} hari)</td>
                                                                        <td align="right" style="font-size:14px;color:#334155;font-weight:500;">Rp {{ number_format($driverFee, 0, ',', '.') }}</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td style="padding:0;border-top:2px solid #e2e8f0;margin-top:8px;padding-top:14px;">
                                                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td style="font-size:15px;font-weight:600;color:#1e293b;">Total Pembayaran</td>
                                                                        <td align="right" style="font-size:22px;font-weight:800;color:#0ea5e9;">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>

                            <!-- Divider -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr><td style="padding:0 40px;"><div style="height:1px;background:#e2e8f0;font-size:0;line-height:0;">&nbsp;</div></td></tr>
                            </table>

                            <!-- Actions -->
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:24px 40px 32px;text-align:center;">
                                        <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 auto;">
                                            <tr>
                                                <td style="padding-bottom:10px;">
                                                    <a href="{{ route('booking.confirmation', $booking->id) }}" style="display:block;padding:13px 40px;border-radius:8px;font-size:14px;font-weight:600;text-decoration:none;color:#ffffff;background:#0c4a6e;letter-spacing:0.3px;">Lihat Detail Pemesanan</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding-bottom:10px;">
                                                    <a href="https://wa.me/6281225062153?text=Halo%20saya%20ingin%20konfirmasi%20pemesanan%20{{ $booking->id }}" style="display:block;padding:13px 40px;border-radius:8px;font-size:14px;font-weight:600;text-decoration:none;color:#ffffff;background:#25d366;letter-spacing:0.3px;">Konfirmasi via WhatsApp</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('home') }}" style="display:block;padding:13px 40px;border-radius:8px;font-size:14px;font-weight:600;text-decoration:none;color:#ffffff;background:#64748b;letter-spacing:0.3px;">Kunjungi Website</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:24px 0 0;text-align:center;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="margin:0 auto;">
                                <tr>
                                    <td style="padding:0 24px 8px;text-align:center;">
                                        <span style="font-size:12px;color:#94a3b8;text-transform:uppercase;letter-spacing:1px;">PT. BLESS TRANS MANDIRI</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 24px 4px;text-align:center;">
                                        <span style="font-size:13px;color:#64748b;">
                                            <a href="tel:6281225062153" style="color:#0ea5e9;text-decoration:none;">+62 812-2506-2153</a>
                                            &nbsp;·&nbsp;
                                            <a href="mailto:info@blesstransmandiri.com" style="color:#0ea5e9;text-decoration:none;">info@blesstransmandiri.com</a>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0 24px 4px;text-align:center;">
                                        <span style="font-size:12px;color:#94a3b8;">Jakarta · Bekasi · Tangerang · Depok</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:16px 24px 0;text-align:center;border-top:1px solid #e2e8f0;">
                                        <p style="margin:0 0 4px;font-size:11px;color:#94a3b8;">Email ini dikirim secara otomatis oleh sistem Bless Rent Car.</p>
                                        <p style="margin:0;font-size:11px;color:#94a3b8;">Mohon tidak membalas email ini. Hubungi kami via WhatsApp atau telepon jika ada pertanyaan.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
