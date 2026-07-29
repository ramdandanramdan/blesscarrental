@extends('admin.layouts.app')

@section('title', 'Pages')

@section('content')
<div class="admin-page-header header-teal anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-file-alt"></i></div>
            <div>
                <h4>Pages</h4>
                <p>Kelola halaman statis website</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createPageModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Page
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
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pages ?? [] as $page)
                    <tr>
                        <td><span class="fw-semibold">{{ $page->title }}</span></td>
                        <td><code style="background:#f1f5f9;padding:3px 8px;border-radius:6px;font-size:12px;">{{ $page->slug }}</code></td>
                        <td>
                            <span class="admin-badge {{ $page->is_published ? 'badge-active' : 'badge-inactive' }}">
                                <span class="status-dot {{ $page->is_published ? 'dot-green' : 'dot-gray' }}"></span>
                                {{ $page->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editPage({{ $page->id }})" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $page->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $page->id }}"
                                  action="{{ route('admin.pages.destroy', $page->id) }}"
                                  method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-blue"><i class="fas fa-file-alt"></i></div>
                                <h5>Belum ada halaman</h5>
                                <p>Buat halaman statis pertama untuk website.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPageModal" style="border-radius:10px;">
                                    <i class="fas fa-plus me-2"></i> Add First Page
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
<div class="modal fade admin-modal modal-teal" id="createPageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.pages.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus-circle me-2"></i>Add Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-medium">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Leave empty to auto-generate">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_published" class="form-select">
                                <option value="1">Published</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Content</label>
                            <textarea name="content" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Save Page</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-teal" id="editPageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editPageForm" action="" method="POST">
                @csrf @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-medium">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="edit_title" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Slug</label>
                            <input type="text" name="slug" id="edit_slug" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_published" id="edit_status" class="form-select">
                                <option value="1">Published</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-medium">Content</label>
                            <textarea name="content" id="edit_content" class="form-control" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="border-radius:10px;">Update Page</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editPage(id) {
        $.get('/admin/pages/' + id + '/edit', function(page) {
            $('#edit_title').val(page.title);
            $('#edit_slug').val(page.slug);
            $('#edit_content').val(page.content);
            $('#edit_status').val(page.is_published ? '1' : '0');
            $('#editPageForm').attr('action', '/admin/pages/' + id);
            $('#editPageModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this page?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
