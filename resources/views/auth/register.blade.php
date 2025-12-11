@extends('layouts.public')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="card shadow-lg border-0 rounded-4" style="width: 420px;">
        <div class="card-body p-4">

            {{-- Logo & Title --}}
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="60" class="mb-2">
                <h4 class="fw-bold text-primary">{{ __('Create Account') }}</h4>
                <p class="text-muted small mb-0">{{ __('Please fill in the details to register') }}</p>
            </div>

            {{-- Alerts --}}
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger small">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Registration Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">{{ __('Full Name') }}</label>
                    <input id="name" type="text"
                           class="form-control rounded-pill @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                           class="form-control rounded-pill @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Phone --}}
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">{{ __('Phone') }}</label>
                    <input id="phone" type="text"
                           class="form-control rounded-pill @error('phone') is-invalid @enderror"
                           name="phone" value="{{ old('phone') }}" required autofocus>
                    @error('phone')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Role --}}
                <div class="mb-3">
                    <label for="role" class="form-label fw-semibold">{{ __('Role') }}</label>
                    <select id="role" class="form-select rounded-pill @error('role') is-invalid @enderror"
                            name="role" required>
                        <option value="">{{ __('Select Role') }}</option>
                        <option value="officer" {{ old('role') == 'officer' ? 'selected' : '' }}>{{ __('Officer') }}</option>
                        <option value="senior_officer" {{ old('role') == 'senior_officer' ? 'selected' : '' }}>{{ __('Senior Officer') }}</option>
                        <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>{{ __('Manager') }}</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- DEpartment --}}
                <div class="mb-3">
                    <label for="department" class="form-label fw-semibold">{{ __('Department') }}</label>
                    <select id="department" class="form-select rounded-pill @error('department') is-invalid @enderror"
                            name="department" required>
                        <option value="">{{ __('Select Department') }}</option>
                        <option value="hr" {{ old('department') == 'hr' ? 'selected' : '' }}>{{ __('HR') }}</option>
                        <option value="finance" {{ old('department') == 'finance' ? 'selected' : '' }}>{{ __('Finance') }}</option>
                        

                    </select>
                    @error('role')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                    <div class="input-group">
                        <input id="password" type="password"
                               class="form-control rounded-start-pill @error('password') is-invalid @enderror"
                               name="password" required>
                        <button type="button" class="btn btn-outline-secondary rounded-end-pill" id="togglePassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                    <div class="input-group">
                        <input id="password_confirmation" type="password"
                               class="form-control rounded-start-pill @error('password_confirmation') is-invalid @enderror"
                               name="password_confirmation" required>
                        <button type="button" class="btn btn-outline-secondary rounded-end-pill" id="toggleConfirmPassword">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary rounded-pill fw-semibold">
                        <i class="bi bi-person-plus"></i> {{ __('Register') }}
                    </button>
                </div>

                {{-- Links --}}
                <div class="text-center">
                    <a class="small fw-semibold" href="{{ route('login') }}">
                        {{ __('Already have an account? Login') }}
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- Show/Hide Password Script --}}
@push('scripts')
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

    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const confirmPassword = document.querySelector('#password_confirmation');
    toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.innerHTML = type === 'password'
            ? '<i class="bi bi-eye"></i>'
            : '<i class="bi bi-eye-slash"></i>';
    });
</script>
@endpush
@endsection
