@extends('admin.layouts.app')

@section('title', 'Articles / News')

@section('content')
<div class="admin-page-header header-indigo anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-newspaper"></i></div>
            <div>
                <h4>Articles / News</h4>
                <p>Kelola artikel dan berita untuk website Anda</p>
            </div>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-light btn-lg" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add Article
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-header">
        <form action="{{ route('admin.articles.index') }}" method="GET" class="row g-2">
            <div class="col-md-8">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border-color:#e2e8f0;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Search by title or author..."
                           value="{{ request('search') }}" style="border-radius:0 10px 10px 0;">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-primary w-100" style="border-radius:10px;">
                    <i class="fas fa-search me-1"></i> Search
                </button>
            </div>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Date</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles ?? [] as $article)
                    <tr>
                        <td>
                            <span class="fw-semibold">{{ $article->title }}</span>
                            <span class="admin-badge {{ $article->is_published ? 'badge-active' : 'badge-pending' }} ms-1">
                                <span class="status-dot {{ $article->is_published ? 'dot-green' : 'dot-yellow' }}"></span>
                                {{ $article->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td><span class="badge bg-light text-dark" style="border-radius:8px;">{{ $article->category ?? 'Uncategorized' }}</span></td>
                        <td>{{ $article->author->name ?? $article->author_name ?? 'N/A' }}</td>
                        <td>
                            @if($article->is_published)
                                <i class="fas fa-check-circle" style="color:#10b981;"></i>
                            @else
                                <i class="fas fa-times-circle text-muted"></i>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $article->created_at ? $article->created_at->format('M d, Y') : 'N/A' }}</small>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="admin-action-btn btn-edit" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $article->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $article->id }}"
                                  action="{{ route('admin.articles.destroy', $article->id) }}"
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
                                <div class="empty-icon icon-purple"><i class="fas fa-newspaper"></i></div>
                                <h5>Belum ada artikel</h5>
                                <p>Mulai tulis artikel pertama untuk website Anda.</p>
                                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary" style="border-radius:10px;">
                                    <i class="fas fa-plus me-2"></i> Write First Article
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(($articles ?? collect())->hasPages())
    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $articles->total() }} total articles</small>
            <div>{{ $articles->links() }}</div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this article?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
