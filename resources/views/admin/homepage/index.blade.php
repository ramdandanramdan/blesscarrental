@extends('admin.layouts.app')

@section('title', 'Homepage Content')

@section('content')
<div class="admin-page-header header-blue anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-home"></i></div>
            <div>
                <h4>Homepage Content</h4>
                <p>Kelola semua konten yang tampil di halaman utama website</p>
            </div>
        </div>
        <div class="d-none d-md-flex align-items-center gap-2" style="position:relative;z-index:1;">
            <span class="badge bg-white text-dark rounded-pill px-3 py-2" style="box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                <i class="fas fa-edit me-1"></i> Content Manager
            </span>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.homepage.update') }}" method="POST">
    @csrf

    <div class="admin-content-card anim-fade-up anim-delay-2">
        <div class="card-header p-0">
            <ul class="nav nav-tabs border-bottom-0 admin-tabs" id="homepageTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="hero-tab" data-bs-toggle="tab"
                            data-bs-target="#hero" type="button" role="tab">
                        <i class="fas fa-home me-2"></i>Hero
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="stats-tab" data-bs-toggle="tab"
                            data-bs-target="#stats" type="button" role="tab">
                        <i class="fas fa-chart-bar me-2"></i>Stats
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="services-tab" data-bs-toggle="tab"
                            data-bs-target="#services" type="button" role="tab">
                        <i class="fas fa-concierge-bell me-2"></i>Layanan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cta-tab" data-bs-toggle="tab"
                            data-bs-target="#cta" type="button" role="tab">
                        <i class="fas fa-bullhorn me-2"></i>CTA
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="locations-tab" data-bs-toggle="tab"
                            data-bs-target="#locations" type="button" role="tab">
                        <i class="fas fa-map-marker-alt me-2"></i>Lokasi
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body" style="padding:24px;">
            <div class="tab-content" id="homepageTabContent">

                {{-- ==================== HERO TAB ==================== --}}
                <div class="tab-pane fade show active" id="hero" role="tabpanel">
                    <div class="form-section mb-4">
                        <div class="form-section-title"><i class="fas fa-tag"></i> Badge & Heading</div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Badge Text</label>
                                <input type="text" name="hero_badge" class="form-control"
                                       value="{{ $sections['hero']['badge'] ?? '' }}" placeholder="e.g. Terpercaya Sejak 2019">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Title Baris 1</label>
                                <input type="text" name="hero_title_1" class="form-control"
                                       value="{{ $sections['hero']['title_1'] ?? '' }}" placeholder="e.g. Sewa Mobil">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Title Baris 2</label>
                                <input type="text" name="hero_title_2" class="form-control"
                                       value="{{ $sections['hero']['title_2'] ?? '' }}" placeholder="e.g. Berkualitas">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Title Baris 3</label>
                                <input type="text" name="hero_title_3" class="form-control"
                                       value="{{ $sections['hero']['title_3'] ?? '' }}" placeholder="e.g. & Terpercaya">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-medium">Deskripsi Hero</label>
                                <textarea name="hero_description" class="form-control" rows="2">{{ $sections['hero']['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-section mb-4">
                        <div class="form-section-title"><i class="fas fa-mouse-pointer"></i> Tombol CTA</div>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label fw-medium">CTA 1 Text</label>
                                <input type="text" name="hero_cta1_text" class="form-control"
                                       value="{{ $sections['hero']['cta1_text'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">CTA 1 Link</label>
                                <input type="text" name="hero_cta1_link" class="form-control"
                                       value="{{ $sections['hero']['cta1_link'] ?? '' }}" placeholder="/booking">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">CTA 2 Text</label>
                                <input type="text" name="hero_cta2_text" class="form-control"
                                       value="{{ $sections['hero']['cta2_text'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">CTA 2 Link</label>
                                <input type="text" name="hero_cta2_link" class="form-control"
                                       value="{{ $sections['hero']['cta2_link'] ?? '' }}" placeholder="https://wa.me/...">
                            </div>
                        </div>
                    </div>

                    <div class="form-section mb-4">
                        <div class="form-section-title"><i class="fas fa-hashtag"></i> Statistik Hero</div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Stat 1 Value</label>
                                <input type="text" name="hero_stat1_value" class="form-control"
                                       value="{{ $sections['hero']['stat1_value'] ?? '' }}" placeholder="50">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-medium">Stat 1 Label</label>
                                <input type="text" name="hero_stat1_label" class="form-control"
                                       value="{{ $sections['hero']['stat1_label'] ?? '' }}" placeholder="Unit Mobil">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Stat 2 Value</label>
                                <input type="text" name="hero_stat2_value" class="form-control"
                                       value="{{ $sections['hero']['stat2_value'] ?? '' }}" placeholder="1.000">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-medium">Stat 2 Label</label>
                                <input type="text" name="hero_stat2_label" class="form-control"
                                       value="{{ $sections['hero']['stat2_label'] ?? '' }}" placeholder="Pelanggan Puas">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Stat 3 Value</label>
                                <input type="text" name="hero_stat3_value" class="form-control"
                                       value="{{ $sections['hero']['stat3_value'] ?? '' }}" placeholder="24/7">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label fw-medium">Stat 3 Label</label>
                                <input type="text" name="hero_stat3_label" class="form-control"
                                       value="{{ $sections['hero']['stat3_label'] ?? '' }}" placeholder="Layanan">
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-title"><i class="fas fa-shield-alt"></i> Badges Kanan</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Garansi Title</label>
                                <input type="text" name="hero_garansi_title" class="form-control"
                                       value="{{ $sections['hero']['garansi_title'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Garansi Subtitle</label>
                                <input type="text" name="hero_garansi_subtitle" class="form-control"
                                       value="{{ $sections['hero']['garansi_subtitle'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Rating Title</label>
                                <input type="text" name="hero_rating_title" class="form-control"
                                       value="{{ $sections['hero']['rating_title'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Rating Subtitle</label>
                                <input type="text" name="hero_rating_subtitle" class="form-control"
                                       value="{{ $sections['hero']['rating_subtitle'] ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==================== STATS TAB ==================== --}}
                <div class="tab-pane fade" id="stats" role="tabpanel">
                    @php
                        $statColors = ['blue', 'green', 'purple', 'orange'];
                    @endphp
                    @for($i = 1; $i <= 4; $i++)
                    <div class="form-section mb-3" style="border-left:3px solid {{ ['var(--primary)','#10b981','#8b5cf6','#f59e0b'][$i-1] }};">
                        <div class="form-section-title">
                            <span class="status-dot dot-{{ $statColors[$i-1] }}"></span>
                            Stat {{ $i }}
                        </div>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Icon Name</label>
                                <input type="text" name="stats_stat{{ $i }}_icon" class="form-control"
                                       value="{{ $sections['stats']['stat'.$i.'_icon'] ?? '' }}"
                                       placeholder="e.g. car, users, clock">
                                <small class="text-muted">Font Awesome tanpa "fa-"</small>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Value</label>
                                <input type="text" name="stats_stat{{ $i }}_value" class="form-control"
                                       value="{{ $sections['stats']['stat'.$i.'_value'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Label</label>
                                <input type="text" name="stats_stat{{ $i }}_label" class="form-control"
                                       value="{{ $sections['stats']['stat'.$i.'_label'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Suffix</label>
                                <input type="text" name="stats_stat{{ $i }}_suffix" class="form-control"
                                       value="{{ $sections['stats']['stat'.$i.'_suffix'] ?? '' }}" placeholder="+">
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                {{-- ==================== SERVICES TAB ==================== --}}
                <div class="tab-pane fade" id="services" role="tabpanel">
                    <div class="form-section mb-4">
                        <div class="form-section-title"><i class="fas fa-heading"></i> Section Header Layanan</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Subtitle</label>
                                <input type="text" name="services_subtitle" class="form-control"
                                       value="{{ $sections['services_intro']['subtitle'] ?? '' }}" placeholder="Layanan">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Title</label>
                                <input type="text" name="services_title" class="form-control"
                                       value="{{ $sections['services_intro']['title'] ?? '' }}" placeholder="Apa yang Kami Tawarkan">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-medium">Deskripsi</label>
                                <textarea name="services_description" class="form-control" rows="2">{{ $sections['services_intro']['description'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-info" style="border-left:4px solid #0ea5e9;background:#f0f9ff;border-radius:12px;">
                        <i class="fas fa-info-circle me-2" style="color:#0ea5e9;"></i>
                        Kartu layanan (Booking Mobil, Lihat Armada, dll) dikelola dari menu <strong>Services</strong>.
                    </div>
                </div>

                {{-- ==================== CTA TAB ==================== --}}
                <div class="tab-pane fade" id="cta" role="tabpanel">
                    <div class="form-section">
                        <div class="form-section-title"><i class="fas fa-bullhorn"></i> Call To Action Section</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Heading</label>
                                <input type="text" name="cta_heading" class="form-control"
                                       value="{{ $sections['cta']['heading'] ?? '' }}" placeholder="Siap untuk Perjalanan Anda?">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Deskripsi</label>
                                <textarea name="cta_description" class="form-control" rows="2">{{ $sections['cta']['description'] ?? '' }}</textarea>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Button 1 Text</label>
                                <input type="text" name="cta_button1_text" class="form-control"
                                       value="{{ $sections['cta']['button1_text'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Button 1 Link</label>
                                <input type="text" name="cta_button1_link" class="form-control"
                                       value="{{ $sections['cta']['button1_link'] ?? '' }}" placeholder="/booking">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Button 2 Text</label>
                                <input type="text" name="cta_button2_text" class="form-control"
                                       value="{{ $sections['cta']['button2_text'] ?? '' }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Button 2 Link</label>
                                <input type="text" name="cta_button2_link" class="form-control"
                                       value="{{ $sections['cta']['button2_link'] ?? '' }}" placeholder="https://wa.me/...">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- ==================== LOCATIONS TAB ==================== --}}
                <div class="tab-pane fade" id="locations" role="tabpanel">
                    <div class="form-section">
                        <div class="form-section-title"><i class="fas fa-map-marker-alt"></i> Wilayah Layanan</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Label</label>
                                <input type="text" name="locations_label" class="form-control"
                                       value="{{ $sections['locations']['label'] ?? '' }}" placeholder="Wilayah Layanan:">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Daftar Lokasi <small class="text-muted">(satu per baris)</small></label>
                                @php
                                    $locs = json_decode($sections['locations']['locations'] ?? '[]', true);
                                    $locsText = is_array($locs) ? implode("\n", $locs) : '';
                                @endphp
                                <textarea name="locations_list" class="form-control" rows="6"
                                          placeholder="Jakarta&#10;Bekasi&#10;Tangerang&#10;Depok">{{ $locsText }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer bg-white border-top py-3">
            <div class="d-flex justify-content-end gap-2">
                <button type="reset" class="btn btn-outline-secondary">
                    <i class="fas fa-undo me-2"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary px-5" style="border-radius:10px;">
                    <i class="fas fa-save me-2"></i> Save Homepage
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
