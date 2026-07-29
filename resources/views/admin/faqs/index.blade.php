@extends('admin.layouts.app')

@section('title', 'FAQs')

@section('content')
<div class="admin-page-header header-blue anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-question-circle"></i></div>
            <div>
                <h4>FAQs</h4>
                <p>Kelola pertanyaan yang sering ditanyakan</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createFaqModal" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add FAQ
        </button>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@php
    $grouped = ($faqs ?? collect())->groupBy('category');
@endphp

@forelse($grouped as $category => $categoryFaqs)
<div class="admin-content-card anim-fade-up anim-delay-2 mb-4">
    <div class="card-header bg-white border-bottom py-3">
        <h5 class="fw-semibold mb-0">
            <i class="fas fa-folder me-2 text-primary"></i>
            {{ $category ?: 'Uncategorized' }}
            <span class="badge bg-primary ms-2">{{ $categoryFaqs->count() }}</span>
        </h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Question</th>
                        <th>Sort Order</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoryFaqs as $faq)
                    <tr>
                        <td class="text-muted">{{ $loop->iteration }}</td>
                        <td>
                            <span class="fw-semibold">{{ $faq->question }}</span>
                            <small class="d-block text-muted">{{ Str::limit(strip_tags($faq->answer), 80) }}</small>
                        </td>
                        <td>{{ $faq->sort_order ?? 0 }}</td>
                        <td>
                            @if($faq->is_active)
                                <span class="admin-badge badge-active"><span class="status-dot dot-green"></span> Active</span>
                            @else
                                <span class="admin-badge badge-inactive"><span class="status-dot dot-gray"></span> Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-edit"
                                        onclick="editFaq({{ $faq->id }})" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $faq->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $faq->id }}"
                                  action="{{ route('admin.faqs.destroy', $faq->id) }}"
                                  method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@empty
<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-body">
        <div class="admin-empty-state">
            <div class="empty-icon icon-blue"><i class="fas fa-question-circle"></i></div>
            <h5>No FAQs Found</h5>
            <p>Create your first FAQ to help customers find answers quickly.</p>
            <button class="btn btn-primary" style="border-radius:10px;" data-bs-toggle="modal" data-bs-target="#createFaqModal">Add FAQ</button>
        </div>
    </div>
</div>
@endforelse

<!-- Create Modal -->
<div class="modal fade admin-modal modal-blue" id="createFaqModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.faqs.store') }}" method="POST">
                @csrf
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Add FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Category</label>
                            <input type="text" name="category" class="form-control" placeholder="e.g. Booking, Payment">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_active" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade admin-modal modal-blue" id="editFaqModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editFaqForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-semibold">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="edit_question" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Answer <span class="text-danger">*</span></label>
                        <textarea name="answer" id="edit_answer" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Category</label>
                            <input type="text" name="category" id="edit_category" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort_order" class="form-control" min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Status</label>
                            <select name="is_active" id="edit_status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function editFaq(id) {
        $.get('/admin/faqs/' + id + '/edit', function(faq) {
            $('#edit_question').val(faq.question);
            $('#edit_answer').val(faq.answer);
            $('#edit_category').val(faq.category);
            $('#edit_sort_order').val(faq.sort_order);
            $('#edit_status').val(faq.is_active ? '1' : '0');
            $('#editFaqForm').attr('action', '/admin/faqs/' + id);
            $('#editFaqModal').modal('show');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this FAQ?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
