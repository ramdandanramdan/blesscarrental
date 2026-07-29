@extends('admin.layouts.app')

@section('title', isset($article) ? 'Edit Article' : 'Add Article')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <h4 class="fw-bold mb-0">{{ isset($article) ? 'Edit Article' : 'Add Article' }}</h4>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left me-2"></i>Back to Articles
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

<form action="{{ isset($article) ? route('admin.articles.update', $article->id) : route('admin.articles.store') }}"
      method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
    @csrf
    @if(isset($article))
        @method('PUT')
    @endif

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Article Details</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg" required
                               value="{{ old('title', $article->title ?? '') }}" placeholder="Enter article title">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Slug</label>
                            <input type="text" name="slug" class="form-control"
                                   value="{{ old('slug', $article->slug ?? '') }}" placeholder="Auto-generated if empty">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Category</label>
                            <select name="category" class="form-select">
                                <option value="">Select Category</option>
                                <option value="news" {{ old('category', $article->category ?? '') == 'news' ? 'selected' : '' }}>News</option>
                                <option value="guide" {{ old('category', $article->category ?? '') == 'guide' ? 'selected' : '' }}>Guide</option>
                                <option value="tips" {{ old('category', $article->category ?? '') == 'tips' ? 'selected' : '' }}>Tips</option>
                                <option value="events" {{ old('category', $article->category ?? '') == 'events' ? 'selected' : '' }}>Events</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Author</label>
                            <input type="text" name="author" class="form-control"
                                   value="{{ old('author', $article->author ?? auth()->user()->name ?? '') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Content</label>
                        <textarea name="content" class="form-control" rows="12"
                                  placeholder="Write your article content here...">{{ old('content', $article->content ?? '') }}</textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Excerpt <small class="text-muted">(short summary)</small></label>
                        <textarea name="excerpt" class="form-control" rows="3"
                                  placeholder="Brief summary of the article...">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Meta Fields -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Meta Information (SEO)</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-medium">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ old('meta_title', $article->meta_title ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $article->meta_description ?? '') }}</textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ old('meta_keywords', $article->meta_keywords ?? '') }}" placeholder="keyword1, keyword2, keyword3">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Publish Settings -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Publish Settings</h5>
                </div>
                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input type="checkbox" name="is_published" class="form-check-input" value="1"
                               id="isPublished" role="switch"
                               {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPublished">Published</label>
                    </div>
                    <div class="mb-0">
                        <label class="form-label fw-medium">Publish Date</label>
                        <input type="datetime-local" name="published_at" class="form-control"
                               value="{{ old('published_at', isset($article) && $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '') }}">
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="fw-semibold mb-0">Featured Image</h5>
                </div>
                <div class="card-body">
                    @if(isset($article) && $article->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                 class="img-fluid rounded">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Recommended: 1200x630px</small>
                </div>
            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                    <i class="fas fa-save me-2"></i> {{ isset($article) ? 'Update Article' : 'Save Article' }}
                </button>
                <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                    <i class="fas fa-times me-2"></i> Cancel
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
