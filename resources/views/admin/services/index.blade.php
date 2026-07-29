@extends('admin.layouts.app')

@section('title', 'Services')

@section('content')
<div class="admin-page-header header-green anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-cogs"></i></div>
            <div>
                <h4>Services</h4>
                <p>Kelola layanan yang ditawarkan kepada pelanggan</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createServiceModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Service
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
                        <th>Name</th>
                        <th>Icon</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services ?? [] as $service)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $service->name }}</span>
                            @if($service->description)
                                <small class="d-block text-muted">{{ Str::limit($service->description, 60) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($service->icon)
                                @if(str_starts_with($service->icon, '<svg'))
                                    {!! $service->icon !!}
                                @else
                                    <span class="badge bg-light text-dark px-2 py-1" style="border-radius:8px;">{{ $service->icon }}</span>
                                @endif
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $service->sort_order ?? 0 }}</td>
                        <td>
                            <span class="admin-badge {{ $service->is_active ? 'badge-active' : 'badge-inactive' }}">
                                <span class="status-dot {{ $service->is_active ? 'dot-green' : 'dot-gray' }}"></span>
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editService({{ $service->id }})" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $service->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $service->id }}"
                                  action="{{ route('admin.services.destroy', $service->id) }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-green"><i class="fas fa-cogs"></i></div>
                                <h5>Belum ada layanan</h5>
                                <p>Tambahkan layanan pertama yang ditawarkan.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createServiceModal" style="border-radius:10px;">
                                    <i class="fas fa-plus me-2"></i> Add First Service
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
<div class="modal fade admin-modal modal-green" id="createServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Icon <small class="text-muted">(SVG code or icon name)</small></label>
                            <textarea name="icon" class="form-control" rows="2" placeholder="Paste SVG code or enter icon name"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Recommended: 600x400px</small>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-green" id="editServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editServiceForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Description</label>
                            <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Icon <small class="text-muted">(SVG code or name)</small></label>
                            <textarea name="icon" id="edit_icon" class="form-control" rows="2"></textarea>
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
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_active" id="edit_status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editService(id) {
        $.get('/admin/services/' + id + '/edit', function(service) {
            $('#edit_name').val(service.name);
            $('#edit_description').val(service.description);
            $('#edit_icon').val(service.icon);
            $('#edit_sort_order').val(service.sort_order);
            $('#edit_status').val(service.is_active ? '1' : '0');
            if (service.image) {
                var imgUrl = service.image.startsWith('http')
                    ? service.image
                    : '/storage/' + service.image;
                $('#edit_image_preview img').attr('src', imgUrl);
                $('#edit_image_preview').show();
            } else {
                $('#edit_image_preview').hide();
            }
            $('#editServiceForm').attr('action', '/admin/services/' + id);
            $('#editServiceModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this service?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
