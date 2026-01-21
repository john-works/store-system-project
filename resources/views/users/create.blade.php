@extends('layouts.app')

@section('content')

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Add New User</h3>
                    <p class="text-subtitle text-muted">Create a new user account</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Information</h4>
                        </div>
                        <div class="card-body">

                            {{-- Alerts --}}
                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h6 class="fw-semibold mb-2">Errors:</h6>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="name" class="form-label fw-semibold">Full Name</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="email" class="form-label fw-semibold">Email Address</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="phone" class="form-label fw-semibold">Phone</label>
                                        <input id="phone" type="text"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <div class="input-group">
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" required>
                                            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Role --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="role" class="form-label fw-semibold">Role</label>
                                        <select id="role" class="form-select @error('role') is-invalid @enderror"
                                                name="role" required>
                                            <option value="">Select Role</option>
                                            <option value="officer" {{ old('role') == 'officer' ? 'selected' : '' }}>Officer</option>
                                            <option value="senior_officer" {{ old('role') == 'senior_officer' ? 'selected' : '' }}>Senior Officer</option>
                                            <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Department --}}
                                    <div class="col-md-6 col-12 mb-3">
                                        <label for="department" class="form-label fw-semibold">Department</label>
                                        <select id="department" class="form-select @error('department') is-invalid @enderror"
                                                name="department" required>
                                            <option value="">Select Department</option>
                                            <option value="Finance" {{ old('department') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                            <option value="Stores" {{ old('department') == 'Stores' ? 'selected' : '' }}>Stores</option>
                                            <option value="Planning" {{ old('department') == 'Planning' ? 'selected' : '' }}>Planning</option>
                                            <option value="Hr" {{ old('department') == 'Hr' ? 'selected' : '' }}>HR</option>
                                            <option value="Operations" {{ old('department') == 'Operations' ? 'selected' : '' }}>Operations</option>
                                            <option value="ICT" {{ old('department') == 'ICT' ? 'selected' : '' }}>ICT</option>
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback d-block small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Buttons --}}
                                <div class="row mt-3">
                                    <div class="col-12 d-flex justify-content-end gap-2">
                                        <a href="{{ route('users.index') }}" class="btn btn-light-secondary">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-person-plus"></i> Create User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

{{-- Show/Hide Password Script --}}
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.innerHTML = type === 'password'
            ? '<i class="bi bi-eye"></i>'
            : '<i class="bi bi-eye-slash"></i>';
    });
</script>

@endsection

