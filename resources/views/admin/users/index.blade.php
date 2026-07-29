@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
<div class="admin-page-header header-orange anim-fade-up">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <div class="page-icon"><i class="fas fa-users"></i></div>
            <div>
                <h4>Users</h4>
                <p>Kelola semua pengguna dan role mereka</p>
            </div>
        </div>
        <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#createUserModal" style="border-radius:12px;">
            <i class="fas fa-plus me-2"></i>Tambah User
        </button>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #10b981;">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm anim-fade-up" role="alert" style="border-left:4px solid #ef4444;">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="admin-content-card anim-fade-up anim-delay-2">
    <div class="card-header">
        <form action="{{ route('admin.users.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-white" style="border-radius:10px 0 0 10px;border-color:#e2e8f0;">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control" placeholder="Search by name or email..."
                           value="{{ request('search') }}" style="border-radius:0 10px 10px 0;">
                </div>
            </div>
            <div class="col-md-2">
                <select name="role" class="form-select form-select-sm">
                    <option value="">All Roles</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="partner" {{ request('role') == 'partner' ? 'selected' : '' }}>Partner</option>
                    <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Registered</th>
                        <th style="width: 120px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users ?? [] as $user)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle bg-primary text-white me-2">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @php
                                $roleBadges = [
                                    'admin' => 'danger',
                                    'partner' => 'primary',
                                    'customer' => 'success',
                                ];
                            @endphp
                            <span class="badge bg-{{ $roleBadges[$user->role] ?? 'secondary' }}">
                                {{ ucfirst($user->role ?? 'customer') }}
                            </span>
                        </td>
                        <td>
                            @php
                                $statusMap = [
                                    'active' => ['class' => 'badge-active', 'dot' => 'dot-green'],
                                    'suspended' => ['class' => 'badge-inactive', 'dot' => 'dot-gray'],
                                    'pending' => ['class' => 'badge-pending', 'dot' => 'dot-yellow'],
                                ];
                                $current = $statusMap[$user->status ?? 'pending'] ?? ['class' => 'badge-pending', 'dot' => 'dot-yellow'];
                            @endphp
                            <span class="admin-badge {{ $current['class'] }}">
                                <span class="status-dot {{ $current['dot'] }}"></span>
                                {{ ucfirst($user->status ?? 'pending') }}
                            </span>
                        </td>
                        <td>
                            <small class="text-muted">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</small>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="admin-action-btn btn-view" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if($user->status === 'active')
                                    <form action="{{ route('admin.users.suspend', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Suspend this user?');" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="admin-action-btn btn-edit" title="Suspend">
                                            <i class="fas fa-pause"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.users.activate', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Activate this user?');" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="admin-action-btn btn-view" title="Activate">
                                            <i class="fas fa-play"></i>
                                        </button>
                                    </form>
                                @endif
                                <button type="button" class="admin-action-btn btn-delete" title="Delete"
                                        onclick="confirmDelete({{ $user->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form id="delete-form-{{ $user->id }}"
                                  action="{{ route('admin.users.destroy', $user->id) }}"
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
                                <div class="empty-icon icon-orange"><i class="fas fa-users"></i></div>
                                <h5>Belum ada pengguna</h5>
                                <p>Mulai tambahkan pengguna pertama Anda.</p>
                                <button type="button" class="btn btn-primary" style="border-radius:10px;" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                    <i class="fas fa-plus me-2"></i> Add Your First User
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(($users ?? collect())->hasPages())
    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $users->total() }} total users</small>
            <div>{{ $users->links() }}</div>
        </div>
    </div>
    @endif
</div>

<!-- Create User Modal -->
<div class="modal fade admin-modal modal-orange" id="createUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.users.store') }}" method="POST" id="createUserForm" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-user-plus me-2"></i>Tambah User Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Validation Errors -->
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-3" style="border-left:4px solid #ef4444;">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- Section: Akun -->
                    <div class="modal-form-section">
                        <div class="section-label"><i class="fas fa-shield-alt me-2"></i>Akun Login</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" required placeholder="email@contoh.com">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                           id="createPassword" required minlength="6" placeholder="Minimal 6 karakter">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                            onclick="togglePasswordVisibility('createPassword', this)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Konfirmasi Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                           id="createPasswordConfirm" required minlength="6" placeholder="Ulangi password">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                            onclick="togglePasswordVisibility('createPasswordConfirm', this)">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Role & Status -->
                    <div class="modal-form-section">
                        <div class="section-label"><i class="fas fa-id-badge me-2"></i>Role & Status</div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Role / Jabatan <span class="text-danger">*</span></label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror" required id="roleSelect" onchange="togglePartnerFields()">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Administrator)</option>
                                    <option value="partner" {{ old('role') == 'partner' ? 'selected' : '' }}>Partner (Mitra Bisnis)</option>
                                    <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer (Pelanggan)</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required id="statusSelect">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active (Aktif)</option>
                                    <option value="pending" {{ old('status', 'pending') == 'pending' ? 'selected' : '' }}>Pending (Menunggu)</option>
                                    <option value="suspended" {{ old('status') == 'suspended' ? 'selected' : '' }}>Suspended (Ditangguhkan)</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-medium">No. Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Role preview badges -->
                        <div class="role-preview mt-3" id="rolePreview" style="{{ old('role') ? '' : 'display:none;' }}">
                            <span class="role-preview-label">Ditampilkan sebagai:</span>
                            <span class="badge role-badge-admin" id="previewAdmin" style="{{ old('role') == 'admin' ? '' : 'display:none;' }}">Admin</span>
                            <span class="badge role-badge-partner" id="previewPartner" style="{{ old('role') == 'partner' ? '' : 'display:none;' }}">Partner</span>
                            <span class="badge role-badge-customer" id="previewCustomer" style="{{ old('role') == 'customer' ? '' : 'display:none;' }}">Customer</span>
                        </div>
                    </div>

                    <!-- Section: Partner Info (conditional) -->
                    <div class="modal-form-section partner-fields" style="{{ old('role') == 'partner' ? '' : 'display:none;' }}">
                        <div class="section-label"><i class="fas fa-building me-2"></i>Informasi Mitra</div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Nama Perusahaan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                    <input type="text" name="company_name" class="form-control"
                                           value="{{ old('company_name') }}" placeholder="PT. Contoh Rental">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Alamat Perusahaan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    <input type="text" name="company_address" class="form-control"
                                           value="{{ old('company_address') }}" placeholder="Jl. Contoh No. 123, Jakarta">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary" id="submitCreateUser" style="border-radius:10px;">
                        <i class="fas fa-user-plus me-2"></i>Simpan User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }

    function togglePartnerFields() {
        var role = document.getElementById('roleSelect').value;
        var partnerFields = document.querySelectorAll('.partner-fields');
        partnerFields.forEach(function(el) {
            el.style.display = role === 'partner' ? '' : 'none';
        });

        document.getElementById('rolePreview').style.display = role ? '' : 'none';
        document.getElementById('previewAdmin').style.display = role === 'admin' ? '' : 'none';
        document.getElementById('previewPartner').style.display = role === 'partner' ? '' : 'none';
        document.getElementById('previewCustomer').style.display = role === 'customer' ? '' : 'none';
    }

    function togglePasswordVisibility(inputId, btn) {
        var input = document.getElementById(inputId);
        var icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var modalEl = document.getElementById('createUserModal');
        var hasErrors = {{ $errors->any() ? 'true' : 'false' }};

        if (hasErrors) {
            var modal = new bootstrap.Modal(modalEl);
            modal.show();
        }

        modalEl.addEventListener('hidden.bs.modal', function () {
            var form = document.getElementById('createUserForm');
            if (!hasErrors) {
                form.reset();
                togglePartnerFields();
            }
        });

        var submitBtn = document.getElementById('submitCreateUser');
        var form = document.getElementById('createUserForm');
        if (submitBtn && form) {
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
            });
        }
    });
</script>
@endsection
