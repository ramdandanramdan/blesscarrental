@extends('admin.layouts.app')

@section('title', 'Settings')

@section('content')
<div class="admin-page-header header-dark anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-cog"></i></div>
            <div>
                <h4>Settings</h4>
                <p>Konfigurasi pengaturan aplikasi</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-fade-up mt-3" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="admin-content-card anim-fade-up anim-delay-2 mt-3">
        <div class="card-header bg-white border-bottom p-0">
            <ul class="nav nav-tabs border-bottom-0" id="settingsTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active px-4 py-3" id="general-tab" data-bs-toggle="tab"
                            data-bs-target="#general" type="button" role="tab">
                        <i class="fas fa-building me-2"></i>General
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 py-3" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact" type="button" role="tab">
                        <i class="fas fa-address-card me-2"></i>Contact
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 py-3" id="social-tab" data-bs-toggle="tab"
                            data-bs-target="#social" type="button" role="tab">
                        <i class="fas fa-share-alt me-2"></i>Social Media
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-4 py-3" id="seo-tab" data-bs-toggle="tab"
                            data-bs-target="#seo" type="button" role="tab">
                        <i class="fas fa-search me-2"></i>SEO
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="settingsTabContent">
                <!-- General Tab -->
                <div class="tab-pane fade show active" id="general" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Company Name</label>
                            <input type="text" name="company_name" class="form-control form-control-lg"
                                   value="{{ old('company_name', $settings['company_name'] ?? config('app.name')) }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Tagline</label>
                            <input type="text" name="tagline" class="form-control form-control-lg"
                                   value="{{ old('tagline', $settings['tagline'] ?? '') }}" placeholder="Your company tagline">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $settings['description'] ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Logo</label>
                            @if(isset($settings['logo']) && $settings['logo'])
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo"
                                         class="admin-thumb">
                                </div>
                            @endif
                            <input type="file" name="logo" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended: 200x60px</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Favicon</label>
                            @if(isset($settings['favicon']) && $settings['favicon'])
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon"
                                         class="admin-thumb">
                                </div>
                            @endif
                            <input type="file" name="favicon" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended: 32x32px</small>
                        </div>
                    </div>
                </div>

                <!-- Contact Tab -->
                <div class="tab-pane fade" id="contact" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address', $settings['address'] ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{ old('phone', $settings['phone'] ?? '') }}" placeholder="+1 (555) 123-4567">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $settings['email'] ?? '') }}" placeholder="info@example.com">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">WhatsApp Number</label>
                            <input type="text" name="whatsapp" class="form-control"
                                   value="{{ old('whatsapp', $settings['whatsapp'] ?? '') }}" placeholder="+1234567890">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Google Maps Embed URL</label>
                            <input type="url" name="google_maps" class="form-control"
                                   value="{{ old('google_maps', $settings['google_maps'] ?? '') }}"
                                   placeholder="https://www.google.com/maps/embed?pb=...">
                        </div>
                    </div>
                </div>

                <!-- Social Media Tab -->
                <div class="tab-pane fade" id="social" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                <i class="fab fa-facebook text-primary me-2"></i>Facebook
                            </label>
                            <input type="url" name="facebook_url" class="form-control"
                                   value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}"
                                   placeholder="https://facebook.com/yourpage">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                <i class="fab fa-instagram text-danger me-2"></i>Instagram
                            </label>
                            <input type="url" name="instagram_url" class="form-control"
                                   value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}"
                                   placeholder="https://instagram.com/yourpage">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                <i class="fab fa-twitter text-info me-2"></i>Twitter / X
                            </label>
                            <input type="url" name="twitter_url" class="form-control"
                                   value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}"
                                   placeholder="https://twitter.com/yourpage">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                <i class="fab fa-youtube text-danger me-2"></i>YouTube
                            </label>
                            <input type="url" name="youtube_url" class="form-control"
                                   value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}"
                                   placeholder="https://youtube.com/@yourchannel">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">
                                <i class="fab fa-tiktok me-2"></i>TikTok
                            </label>
                            <input type="url" name="tiktok_url" class="form-control"
                                   value="{{ old('tiktok_url', $settings['tiktok_url'] ?? '') }}"
                                   placeholder="https://tiktok.com/@yourpage">
                        </div>
                    </div>
                </div>

                <!-- SEO Tab -->
                <div class="tab-pane fade" id="seo" role="tabpanel">
                    <div class="row g-4">
                        <div class="col-12">
                            <label class="form-label fw-medium">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control form-control-lg"
                                   value="{{ old('meta_title', $settings['meta_title'] ?? '') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control"
                                   value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}"
                                   placeholder="car rental, rent a car, ...">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Google Analytics ID</label>
                            <input type="text" name="google_analytics_id" class="form-control"
                                   value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? '') }}"
                                   placeholder="G-XXXXXXXXXX">
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
                <button type="submit" class="btn btn-primary px-5">
                    <i class="fas fa-save me-2"></i> Save Settings
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
