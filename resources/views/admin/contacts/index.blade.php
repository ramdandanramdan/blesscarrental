@extends('admin.layouts.app')

@section('title', 'Contacts')

@section('content')
<div class="admin-page-header header-red anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-envelope"></i></div>
            <div>
                <h4>Contact Messages</h4>
                <p>Pesan dan inquiry dari pelanggan</p>
            </div>
        </div>
        <form action="{{ route('admin.contacts.index') }}" method="GET" class="d-flex gap-2" style="position:relative;z-index:1;">
            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="border-radius:10px;background:#fff;">
                <option value="">All Messages</option>
                <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Unread</option>
                <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
            </select>
        </form>
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
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts ?? [] as $contact)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $contact->name }}</span>
                        </td>
                        <td>
                            <a href="mailto:{{ $contact->email }}" class="text-decoration-none" style="color:var(--primary);">{{ $contact->email }}</a>
                        </td>
                        <td>{{ $contact->subject ?? 'No Subject' }}</td>
                        <td>
                            <small class="text-muted">{{ $contact->created_at ? $contact->created_at->format('M d, Y h:i A') : 'N/A' }}</small>
                        </td>
                        <td>
                            @if($contact->status === 'unread')
                                <span class="admin-badge badge-pending">
                                    <span class="status-dot dot-yellow"></span> Unread
                                </span>
                            @else
                                <span class="admin-badge badge-active">
                                    <span class="status-dot dot-green"></span> Read
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button" class="admin-action-btn btn-view" title="View"
                                        onclick="viewMessage({{ $contact->id }})">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @if($contact->status === 'unread')
                                    <form action="{{ route('admin.contacts.read', $contact->id) }}" method="POST" class="d-inline">
                                        @csrf @method('PUT')
                                        <button type="submit" class="admin-action-btn btn-edit" title="Mark as Read">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $contact->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $contact->id }}"
                                  action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                  method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-red"><i class="fas fa-envelope"></i></div>
                                <h5>Belum ada pesan</h5>
                                <p>Pesan dari pelanggan akan muncul di sini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(($contacts ?? collect())->hasPages())
    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $contacts->total() }} total messages</small>
            <div>{{ $contacts->links() }}</div>
        </div>
    </div>
    @endif
</div>

<!-- View Message Modal -->
<div class="modal fade admin-modal" id="viewMessageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(135deg, #ef4444, #f97316);">
                <h5 class="modal-title"><i class="fas fa-envelope me-2"></i>Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="messageContent">
                <div class="text-center py-4 text-muted">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p class="mt-2">Loading message...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" id="replyBtn" class="btn btn-primary" target="_blank" style="border-radius:10px;">
                    <i class="fas fa-reply me-2"></i> Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function viewMessage(id) {
        $('#messageContent').html('<div class="text-center py-4 text-muted"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Loading message...</p></div>');
        $('#viewMessageModal').modal('show');

        $.get('/admin/contacts/' + id, function(contact) {
            const html = `
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-section mb-0">
                            <div class="form-section-title"><i class="fas fa-user"></i> Pengirim</div>
                            <p class="mb-1 fw-semibold">${contact.name}</p>
                            <p class="mb-1"><a href="mailto:${contact.email}" style="color:var(--primary);">${contact.email}</a></p>
                            <p class="mb-0 text-muted">${contact.phone || '—'}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-section mb-0">
                            <div class="form-section-title"><i class="fas fa-info-circle"></i> Detail</div>
                            <p class="mb-1"><strong>Subject:</strong> ${contact.subject || 'No Subject'}</p>
                            <p class="mb-0"><strong>Date:</strong> ${new Date(contact.created_at).toLocaleString()}</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-section mb-0">
                            <div class="form-section-title"><i class="fas fa-comment-dots"></i> Pesan</div>
                            <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:16px;">${contact.message || 'No content'}</div>
                        </div>
                    </div>
                </div>
            `;
            $('#messageContent').html(html);
            $('#replyBtn').attr('href', 'mailto:' + contact.email + '?subject=Re: ' + encodeURIComponent(contact.subject || ''));
        }).fail(function() {
            $('#messageContent').html('<div class="text-center py-4 text-danger"><i class="fas fa-exclamation-circle fa-2x"></i><p class="mt-2">Failed to load message.</p></div>');
        });
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this message?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
