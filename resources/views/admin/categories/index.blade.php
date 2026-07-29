@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
<div class="admin-page-header header-pink anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-tags"></i></div>
            <div>
                <h4>Categories</h4>
                <p>Kelola kategori kendaraan</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createCategoryModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Category
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
                        <th>Slug</th>
                        <th>Icon</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories ?? [] as $category)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $category->name }}</span>
                        </td>
                        <td><code>{{ $category->slug }}</code></td>
                        <td>
                            @if($category->icon)
                                @if(str_starts_with($category->icon, '<svg'))
                                    {!! $category->icon !!}
                                @else
                                    <span class="badge bg-light text-dark px-2 py-1">{{ $category->icon }}</span>
                                @endif
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $category->sort_order ?? 0 }}</td>
                        <td>
                            @if($category->is_active)
                                <span class="admin-badge badge-active"><span class="status-dot dot-green"></span> Active</span>
                            @else
                                <span class="admin-badge badge-inactive"><span class="status-dot dot-gray"></span> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editCategory({{ $category->id }})" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $category->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $category->id }}"
                                  action="{{ route('admin.categories.destroy', $category->id) }}"
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
                                <div class="empty-icon icon-pink"><i class="fas fa-tags"></i></div>
                                <h5>No Categories Found</h5>
                                <p>Get started by creating your first vehicle category.</p>
                                <button class="btn btn-primary" style="border-radius:10px;" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Add Category</button>
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
<div class="modal fade admin-modal modal-pink" id="createCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Leave empty to auto-generate">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Icon <small class="text-muted">(SVG code or icon name)</small></label>
                        <textarea name="icon" class="form-control" rows="2" placeholder="Paste SVG code or enter icon name"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="0" min="0">
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
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-pink" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editCategoryForm" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Slug</label>
                        <input type="text" name="slug" id="edit_slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Icon <small class="text-muted">(SVG code or name)</small></label>
                        <textarea name="icon" id="edit_icon" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Image</label>
                        <div id="edit_image_preview" class="mb-2" style="display:none;">
                            <img src="" alt="Current image" class="img-fluid rounded"
                                 style="max-height:80px;object-fit:cover;">
                        </div>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small class="text-muted">Leave empty to keep current image</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Sort Order</label>
                        <input type="number" name="sort_order" id="edit_sort_order" class="form-control" min="0">
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
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editCategory(id) {
        $.get('/admin/categories/' + id + '/edit', function(category) {
            $('#edit_name').val(category.name);
            $('#edit_slug').val(category.slug);
            $('#edit_icon').val(category.icon);
            $('#edit_sort_order').val(category.sort_order);
            $('#edit_status').val(category.is_active ? '1' : '0');
            if (category.image) {
                var imgUrl = category.image.startsWith('http')
                    ? category.image
                    : '/storage/' + category.image;
                $('#edit_image_preview img').attr('src', imgUrl);
                $('#edit_image_preview').show();
            } else {
                $('#edit_image_preview').hide();
            }
            $('#editCategoryForm').attr('action', '/admin/categories/' + id);
            $('#editCategoryModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this category?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
