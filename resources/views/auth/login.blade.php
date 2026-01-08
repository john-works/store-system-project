@extends('layouts.public')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('assets/images/geometric-blue.svg') }}'); background-size: cover; background-position: center; background-attachment: fixed;">
     {{-- style="background: linear-gradient(135deg, #007bff 0%, #6610f2 100%);"> --}}

    <div class="card shadow-lg border-0 rounded-4" style="width: 420px;">
        <div class="card-body p-4">

            {{-- Logo & Title --}}
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="60" class="mb-2">
                <h4 class="fw-bold text-primary">{{ __('Welcome Back') }}</h4>
                <p class="text-muted small mb-0">{{ __('Please sign in to continue') }}</p>
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

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                    <input id="email" type="email"
                           class="form-control rounded-pill @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback d-block small">{{ $message }}</span>
                    @enderror
                </div>

               {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>

                <div class="input-group">
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>

                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye" id="passwordIcon"></i>
                    </button>
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>


                {{-- Remember Me --}}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label small" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                {{-- Submit --}}
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary rounded-pill fw-semibold">
                        <i class="bi bi-box-arrow-in-right"></i> {{ __('Login') }}
                    </button>
                </div>

                {{-- Links --}}
                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a class="small d-block mb-2 text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                 {{-- Links --}}
               
            </form>
            

        </div>
    </div>
    </div>

    {{-- Show/Hide Password Script --}}
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toggleBtn = document.getElementById('togglePassword');
                    const passwordInput = document.getElementById('password');
                    const icon = document.getElementById('passwordIcon');

                    toggleBtn.addEventListener('click', function () {
                        const isPassword = passwordInput.type === 'password';

                        passwordInput.type = isPassword ? 'text' : 'password';
                        icon.classList.toggle('bi-eye');
                        icon.classList.toggle('bi-eye-slash');
                    });
                });
            </script>
    @endpush

@endsection
