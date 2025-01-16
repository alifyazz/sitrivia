@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">{{ __('Create Account') }}</h2>
                        <p class="text-muted">{{ __('Join us today! Please fill in your information') }}</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-muted">{{ __('Full Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-muted"></i>
                                </span>
                                <input id="name" 
                                    type="text" 
                                    class="form-control bg-light border-start-0 @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    placeholder="Enter your full name"
                                    required 
                                    autocomplete="name" 
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" 
                                    type="email" 
                                    class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="Enter your email"
                                    required 
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" 
                                    type="password" 
                                    class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="Choose a password"
                                    required 
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-text small mt-2">
                                {{ __('Password must be at least 8 characters long') }}
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-muted">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password-confirm" 
                                    type="password" 
                                    class="form-control bg-light border-start-0" 
                                    name="password_confirmation" 
                                    placeholder="Confirm your password"
                                    required 
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Terms Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label text-muted" for="terms">
                                    {{ __('I agree to the') }} 
                                    <a href="#" class="text-decoration-none">{{ __('Terms of Service') }}</a> 
                                    {{ __('and') }} 
                                    <a href="#" class="text-decoration-none">{{ __('Privacy Policy') }}</a>
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                {{ __('Create Account') }}
                            </button>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center mt-4">
                            <span class="text-muted">{{ __('Already have an account?') }}</span>
                            <a href="{{ route('login') }}" class="text-decoration-none ms-1">{{ __('Login here') }}</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Social Registration -->
            <div class="text-center mt-4">
                <p class="text-muted mb-4">{{ __('Or register with') }}</p>
                <div class="d-flex justify-content-center gap-2">
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-google text-danger"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-facebook text-primary"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light border p-2 rounded-circle">
                        <i class="fab fa-github text-dark"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add this to your layout file if not already present -->
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush
@endsection
