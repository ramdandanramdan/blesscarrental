<div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <h4 class="fw-bold mb-0">{{ isset($car) ? 'Edit Car' : 'Add New Car' }}</h4>
    <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Cars
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> Please fix the following errors:
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<form action="{{ isset($car) ? route('admin.cars.update', $car->id) : route('admin.cars.store') }}"
      method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @if(isset($car))
        @method('PUT')
    @endif

    <div class="row g-4">
        <!-- Basic Information -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Basic Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Car Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required
                                   value="{{ old('name', $car->name ?? '') }}" placeholder="e.g. Toyota Camry">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Brand <span class="text-danger">*</span></label>
                            <input type="text" name="brand" class="form-control" required
                                   value="{{ old('brand', $car->brand ?? '') }}" placeholder="e.g. Toyota">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Model Year</label>
                            <input type="number" name="year" class="form-control"
                                   value="{{ old('year', $car->year ?? date('Y')) }}"
                                   min="2000" max="{{ date('Y') + 2 }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Model</label>
                            <input type="text" name="model" class="form-control"
                                   value="{{ old('model', $car->model ?? '') }}" placeholder="e.g. Camry">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select" required>
                                <option value="">Select Category</option>
                                @foreach($categories ?? [] as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $car->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Transmission <span class="text-danger">*</span></label>
                            <div class="mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="transmission"
                                           value="automatic" id="transAuto"
                                           {{ old('transmission', $car->transmission ?? '') == 'automatic' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="transAuto">
                                        <i class="fas fa-cog me-1"></i> Automatic
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="transmission"
                                           value="manual" id="transManual"
                                           {{ old('transmission', $car->transmission ?? '') == 'manual' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="transManual">
                                        <i class="fas fa-hand me-1"></i> Manual
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications & Features -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Specifications & Features</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Engine Capacity (CC)</label>
                            <input type="text" name="capacity" class="form-control"
                                   value="{{ old('capacity', $car->capacity ?? '') }}" placeholder="e.g. 2000">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Seat Count</label>
                            <input type="number" name="seat_count" class="form-control"
                                   value="{{ old('seat_count', $car->seat_count ?? 5) }}" min="1" max="50">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Door Count</label>
                            <input type="number" name="door_count" class="form-control"
                                   value="{{ old('door_count', $car->door_count ?? 4) }}" min="2" max="6">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Luggage Capacity</label>
                            <input type="text" name="luggage" class="form-control"
                                   value="{{ old('luggage', $car->luggage ?? '') }}" placeholder="e.g. 2 bags">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Fuel Type</label>
                            <select name="fuel_type" class="form-select">
                                <option value="">Select Fuel Type</option>
                                <option value="petrol" {{ old('fuel_type', $car->fuel_type ?? '') == 'petrol' ? 'selected' : '' }}>Petrol</option>
                                <option value="diesel" {{ old('fuel_type', $car->fuel_type ?? '') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="electric" {{ old('fuel_type', $car->fuel_type ?? '') == 'electric' ? 'selected' : '' }}>Electric</option>
                                <option value="hybrid" {{ old('fuel_type', $car->fuel_type ?? '') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                <option value="lpg" {{ old('fuel_type', $car->fuel_type ?? '') == 'lpg' ? 'selected' : '' }}>LPG</option>
                            </select>
                        </div>
                    </div>

                    <hr class="my-3">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Description</label>
                        <textarea name="description" class="form-control" rows="4"
                                  placeholder="Describe the car...">{{ old('description', $car->description ?? '') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Specifications <small class="text-muted">(one key:value per line)</small></label>
                        @php
                            $specValue = old('specifications', $car->specifications ?? '');
                            if (is_array($specValue)) $specValue = implode("\n", $specValue);
                        @endphp
                        <textarea name="specifications" class="form-control" rows="4"
                                  placeholder="Engine: 2.0L Turbo&#10;Horsepower: 250 HP&#10;Drivetrain: AWD">{{ $specValue }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Features <small class="text-muted">(comma separated)</small></label>
                        @php
                            $featValue = old('features', $car->features ?? '');
                            if (is_array($featValue)) $featValue = implode("\n", $featValue);
                        @endphp
                        <textarea name="features" class="form-control" rows="2"
                                  placeholder="Bluetooth, GPS, Backup Camera, Sunroof">{{ $featValue }}</textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Terms & Conditions</label>
                        <textarea name="terms" class="form-control" rows="3"
                                  placeholder="Rental terms and conditions...">{{ old('terms', $car->terms ?? '') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Pricing -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Pricing</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Price Per Day <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price_per_day" class="form-control" required step="1000" min="0"
                                   value="{{ old('price_per_day', $car->price_per_day ?? '') }}" placeholder="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Price Per Week</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price_per_week" class="form-control" step="1000" min="0"
                                   value="{{ old('price_per_week', $car->price_per_week ?? '') }}" placeholder="0">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Price Per Month</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="price_per_month" class="form-control" step="1000" min="0"
                                   value="{{ old('price_per_month', $car->price_per_month ?? '') }}" placeholder="0">
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Discount Percent (%)</label>
                        <input type="number" name="discount_percent" class="form-control" min="0" max="100"
                               value="{{ old('discount_percent', $car->discount_percent ?? 0) }}">
                    </div>
                </div>
            </div>

            <!-- Images -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Images & Documents</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Main Image</label>
                        @if(isset($car) && $car->main_image)
                            <div class="mb-2">
                                @if(pathinfo($car->main_image, PATHINFO_EXTENSION) === 'pdf')
                                    <div class="d-flex align-items-center gap-2 p-2 border rounded bg-light">
                                        <i class="fas fa-file-pdf text-danger fa-2x"></i>
                                        <div>
                                            <small class="fw-medium">{{ basename($car->main_image) }}</small><br>
                                            <small class="text-muted">PDF Document</small>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ asset('storage/' . $car->main_image) }}" alt="Current image"
                                         id="mainImagePreview"
                                         class="img-fluid rounded" style="max-height:150px;object-fit:cover;">
                                    <div id="mainImageInfo" class="mt-1"></div>
                                @endif
                            </div>
                        @endif
                        <input type="file" name="main_image" class="form-control" accept="image/jpeg,image/png,image/webp,application/pdf"
                               onchange="previewMainImage(this)">
                        <small class="text-muted">JPG, PNG, WebP, or PDF. Max 5MB. Recommended image: 800x600px</small>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Gallery <small class="text-muted">(multiple files)</small></label>
                        @if(isset($car) && !empty($car->gallery) && is_array($car->gallery))
                            <div class="row g-2 mb-2">
                                @foreach($car->gallery as $img)
                                <div class="col-4">
                                    @if(pathinfo($img, PATHINFO_EXTENSION) === 'pdf')
                                        <div class="d-flex align-items-center gap-1 p-2 border rounded bg-light h-100">
                                            <i class="fas fa-file-pdf text-danger"></i>
                                            <small class="text-truncate">{{ basename($img) }}</small>
                                        </div>
                                    @else
                                        <img src="{{ asset('storage/' . $img) }}" alt="Gallery"
                                             class="img-fluid rounded" style="height:60px;object-fit:cover;">
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @endif
                        <input type="file" name="gallery[]" class="form-control" multiple accept="image/jpeg,image/png,image/webp,application/pdf">
                        <small class="text-muted">You can select multiple images or PDFs</small>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Status & Options</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Status</label>
                        <select name="status" class="form-select">
                            <option value="active" {{ old('status', $car->status ?? 'active') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $car->status ?? 'active') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" name="is_featured" class="form-check-input" value="1" id="isFeatured"
                               {{ old('is_featured', $car->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isFeatured">Featured Car</label>
                    </div>
                    <div class="form-check mb-2">
                        <input type="checkbox" name="is_available" class="form-check-input" value="1" id="isAvailable"
                               {{ old('is_available', $car->is_available ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isAvailable">Available for Booking</label>
                    </div>
                    <div class="form-check mb-0">
                        <input type="checkbox" name="is_popular" class="form-check-input" value="1" id="isPopular"
                               {{ old('is_popular', $car->is_popular ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPopular">Popular Car</label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                    <i class="fas fa-save me-2"></i> {{ isset($car) ? 'Update Car' : 'Save Car' }}
                </button>
                <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                    <i class="fas fa-times me-2"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</form>

<script>
function previewMainImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const infoDiv = document.getElementById('mainImageInfo');
        const preview = document.getElementById('mainImagePreview');

        if (file.type === 'application/pdf') {
            if (preview) preview.style.display = 'none';
            if (infoDiv) {
                infoDiv.innerHTML = '<div class="d-flex align-items-center gap-2 p-2 border rounded bg-light">' +
                    '<i class="fas fa-file-pdf text-danger fa-2x"></i>' +
                    '<div><small class="fw-medium">' + file.name + '</small><br>' +
                    '<small class="text-muted">PDF Document (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)</small></div></div>';
            }
            return;
        }

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (preview) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                const img = new Image();
                img.onload = function() {
                    const ratio = (img.width / img.height).toFixed(2);
                    if (infoDiv) {
                        infoDiv.innerHTML = '<small class="text-muted"><i class="fas fa-ruler-combined me-1"></i>' +
                            img.width + ' x ' + img.height + 'px (Ratio ' + ratio + ':1) | ' +
                            (file.size / 1024).toFixed(0) + ' KB</small>';
                    }
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
}
</script>
