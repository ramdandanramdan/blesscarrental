@extends('admin.layouts.app')

@section('title', 'Cars Management')

@section('content')
<div class="admin-page-header header-blue anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-car"></i></div>
            <div>
                <h4>Cars Management</h4>
                <p>Kelola armada kendaraan sewa Anda</p>
            </div>
        </div>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-light btn-lg" style="border-radius:12px;position:relative;z-index:1;">
            <i class="fas fa-plus me-2"></i>Add New Car
        </a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show anim-fade-up" role="alert" style="border-left:4px solid #ef4444;">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-header">
        <form action="{{ route('admin.cars.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border-color:#e2e8f0;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Search by name or brand..."
                           value="{{ request('search') }}" style="border-radius:0 10px 10px 0;">
                </div>
            </div>
            <div class="col-md-2">
                <select name="category_id" class="form-select form-select-sm">
                    <option value="">All Categories</option>
                    @foreach($categories ?? [] as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="transmission" class="form-select form-select-sm">
                    <option value="">All Transmissions</option>
                    <option value="automatic" {{ request('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                    <option value="manual" {{ request('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-primary w-100" style="border-radius:10px;">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width: 70px;">Image</th>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price/Day</th>
                        <th>Status</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cars ?? [] as $car)
                    <tr>
                        <td>
                            @if($car->main_image)
                                <img src="{{ asset('storage/' . $car->main_image) }}" alt="{{ $car->name }}"
                                     class="admin-thumb">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center admin-thumb">
                                    <i class="fas fa-car text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $car->name }}</span>
                            <small class="d-block text-muted">{{ $car->year ?? '' }}</small>
                        </td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->category->name ?? 'N/A' }}</td>
                        <td class="fw-semibold" style="color:#10b981;">Rp {{ number_format($car->price_per_day ?? 0, 0, ',', '.') }}</td>
                        <td>
                            <span class="admin-badge {{ $car->status === 'active' ? 'badge-active' : 'badge-inactive' }}">
                                <span class="status-dot {{ $car->status === 'active' ? 'dot-green' : 'dot-gray' }}"></span>
                                {{ ucfirst($car->status) }}
                            </span>
                            @if($car->is_featured)
                                <span class="admin-badge badge-featured ms-1">
                                    <i class="fas fa-star" style="font-size:9px;"></i> Featured
                                </span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="admin-action-btn btn-edit" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $car->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $car->id }}"
                                  action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="admin-empty-state">
                                <div class="empty-icon icon-blue"><i class="fas fa-car"></i></div>
                                <h5>Belum ada mobil</h5>
                                <p>Mulai tambahkan armada kendaraan pertama Anda.</p>
                                <a href="{{ route('admin.cars.create') }}" class="btn btn-primary" style="border-radius:10px;">
                                    <i class="fas fa-plus me-2"></i> Add Your First Car
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(($cars ?? collect())->hasPages())
    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $cars->total() }} total mobil</small>
            <div>{{ $cars->links() }}</div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this car? This action cannot be undone.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
