@extends('admin.layouts.app')

@section('title', 'Sliders')

@section('content')
<div class="admin-page-header header-purple anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-images"></i></div>
            <div>
                <h4>Sliders</h4>
                <p>Kelola hero slider banner di halaman utama</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createSliderModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Slider
        </button>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px;">Image</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders ?? [] as $slider)
                    <tr>
                        <td>
                            @if($slider->image)
                                <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}"
                                     class="admin-thumb admin-thumb-lg">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center admin-thumb admin-thumb-lg">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $slider->title }}</span>
                            @if($slider->subtitle)
                                <small class="d-block text-muted">{{ Str::limit($slider->subtitle, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($slider->link)
                                <a href="{{ $slider->link }}" target="_blank" class="small" style="color:var(--primary);">
                                    <i class="fas fa-external-link-alt me-1"></i>{{ Str::limit($slider->link, 35) }}
                                </a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td><span class="badge bg-light text-dark" style="border-radius:8px;">{{ $slider->sort_order ?? 0 }}</span></td>
                        <td>
                            <span class="admin-badge {{ $slider->is_active ? 'badge-active' : 'badge-inactive' }}">
                                <span class="status-dot {{ $slider->is_active ? 'dot-green' : 'dot-gray' }}"></span>
                                {{ $slider->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editSlider({{ $slider->id }})" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $slider->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $slider->id }}"
                                  action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-purple"><i class="fas fa-images"></i></div>
                                <h5>Belum ada slider</h5>
                                <p>Tambahkan hero slider pertama untuk website Anda.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSliderModal" style="border-radius:10px;">
                                    <i class="fas fa-plus me-2"></i> Add First Slider
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade admin-modal modal-purple" id="createSliderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Add Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Link URL</label>
                            <input type="url" name="link" class="form-control" placeholder="https://example.com">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Button Text</label>
                            <input type="text" name="button_text" class="form-control" placeholder="e.g. Learn More">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" required accept="image/*">
                            <small class="text-muted">Recommended: 1920x800px</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Save Slider</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-purple" id="editSliderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editSliderForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Subtitle</label>
                            <input type="text" name="subtitle" id="edit_subtitle" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Link URL</label>
                            <input type="url" name="link" id="edit_link" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_active" id="edit_status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Button Text</label>
                            <input type="text" name="button_text" id="edit_button_text" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Image</label>
                            <div id="edit_image_preview" class="mb-2" style="display:none;">
                                <img src="" alt="Current image" class="img-fluid rounded"
                                     style="max-height:100px;object-fit:cover;">
                            </div>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Update Slider</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editSlider(id) {
        $.get('/admin/sliders/' + id + '/edit', function(slider) {
            $('#edit_title').val(slider.title);
            $('#edit_subtitle').val(slider.subtitle);
            $('#edit_link').val(slider.link);
            $('#edit_sort_order').val(slider.sort_order);
            $('#edit_status').val(slider.is_active ? '1' : '0');
            $('#edit_button_text').val(slider.button_text);
            if (slider.image) {
                var imgUrl = slider.image.startsWith('http')
                    ? slider.image
                    : '/storage/' + slider.image;
                $('#edit_image_preview img').attr('src', imgUrl);
                $('#edit_image_preview').show();
            } else {
                $('#edit_image_preview').hide();
            }
            $('#editSliderForm').attr('action', '/admin/sliders/' + id);
            $('#editSliderModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this slider?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
