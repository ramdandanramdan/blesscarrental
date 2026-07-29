@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="admin-page-header header-orange anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-star"></i></div>
            <div>
                <h4>Testimonials</h4>
                <p>Kelola review dan testimoni pelanggan</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createTestimonialModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Testimonial
        </button>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
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
                        <th>Content</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials ?? [] as $testimonial)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $testimonial->name }}</span>
                            @if($testimonial->position)
                                <small class="d-block text-muted">{{ $testimonial->position }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted">{{ Str::limit($testimonial->content, 80) }}</span>
                        </td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star text-warning"></i>
                                @else
                                    <i class="far fa-star text-muted"></i>
                                @endif
                            @endfor
                        </td>
                        <td>
                            @if($testimonial->is_active)
                                <span class="admin-badge badge-active"><span class="status-dot dot-green"></span> Active</span>
                            @else
                                <span class="admin-badge badge-inactive"><span class="status-dot dot-gray"></span> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editTestimonial({{ $testimonial->id }})" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $testimonial->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $testimonial->id }}"
                                  action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
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
                                <div class="empty-icon icon-orange"><i class="fas fa-star"></i></div>
                                <h5>No Testimonials Found</h5>
                                <p>Add your first customer testimonial to build trust with visitors.</p>
                                <button class="btn btn-primary" style="border-radius:10px;" data-bs-toggle="modal" data-bs-target="#createTestimonialModal">Add Testimonial</button>
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
<div class="modal fade admin-modal modal-orange" id="createTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Position / Title</label>
                        <input type="text" name="position" class="form-control" placeholder="e.g. CEO, Company">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Content <span class="text-danger">*</span></label>
                        <textarea name="content" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Rating</label>
                        <select name="rating" class="form-select">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Avatar</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Status</label>
                        <select name="is_active" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-orange" id="editTestimonialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editTestimonialForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Edit Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Position / Title</label>
                        <input type="text" name="position" id="edit_position" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="edit_content" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Rating</label>
                        <select name="rating" id="edit_rating" class="form-select">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Avatar</label>
                        <div id="edit_avatar_preview" class="mb-2" style="display:none;">
                            <img src="" alt="Current avatar" class="rounded-circle"
                                 style="width:60px;height:60px;object-fit:cover;">
                        </div>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Status</label>
                        <select name="is_active" id="edit_status" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editTestimonial(id) {
        $.get('/admin/testimonials/' + id + '/edit', function(testimonial) {
            $('#edit_name').val(testimonial.name);
            $('#edit_position').val(testimonial.position);
            $('#edit_content').val(testimonial.content);
            $('#edit_rating').val(testimonial.rating);
            $('#edit_status').val(testimonial.is_active ? '1' : '0');
            if (testimonial.avatar) {
                var avatarUrl = testimonial.avatar.startsWith('http')
                    ? testimonial.avatar
                    : '/storage/' + testimonial.avatar;
                $('#edit_avatar_preview img').attr('src', avatarUrl);
                $('#edit_avatar_preview').show();
            } else {
                $('#edit_avatar_preview').hide();
            }
            $('#editTestimonialForm').attr('action', '/admin/testimonials/' + id);
            $('#editTestimonialModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this testimonial?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
