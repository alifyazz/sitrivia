@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">{{ __('Welcome Back!') }}</h2>
                        <p class="text-muted">{{ __('Please login to your account') }}</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-muted">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-muted"></i>
                                </span>
                                <input id="email" type="email" 
                                    class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="Enter your email"
                                    required 
                                    autocomplete="email" 
                                    autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label text-muted">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none small" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-muted"></i>
                                </span>
                                <input id="password" 
                                    type="password" 
                                    class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="Enter your password"
                                    required 
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">
                                {{ __('Sign In') }}
                            </button>
                        </div>

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center mt-4">
                                <span class="text-muted">{{ __("Don't have an account?") }}</span>
                                <a href="{{ route('register') }}" class="text-decoration-none ms-1">{{ __('Register here') }}</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Social Login -->
            <div class="text-center mt-4">
                <p class="text-muted mb-4">{{ __('Or sign in with') }}</p>
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

@endsection
