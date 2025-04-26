{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

<!-- CSRF Token -->
{{-- <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title> --}}

<!-- Fonts -->
{{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

<!-- Scripts -->
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Driver Login') }}</div>
            
                            <div class="card-body">
                                <form method="POST" action="{{ route('driver.login') }}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html> --}}

@extends('forntend.layouts.master')
@section('title', 'Driver Login')
@section('content')
    <section class="login_section">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('Driver লগইন করুন') }}</h4>
                <form method="POST" action="{{ route('driver.login') }}">
                    {{-- <div class="mb-3">
                    <label for="email" class="form-label">ইমেইল অথবা মোবাইল নাম্বার লিখুন</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন" required />
                </div> --}}
                    @csrf
                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-12 col-form-label">{{ __('ইমেইল অথবা মোবাইল নাম্বার লিখুন') }}</label><br>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                    <label for="password" class="form-label">পাসওয়ার্ড</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড লিখুন" required />
                    
                </div> --}}
                    {{-- <div class="row mb-3">
                    <label for="password" class="col-md-12 col-form-label">{{ __('পাসওয়ার্ড') }}</label>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="পাসওয়ার্ড" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                    <div class="row mb-3">
                        <label for="password" class="col-md-12 col-form-label">{{ __('পাসওয়ার্ড') }}</label>
                        <div class="col-md-12" style="position: relative;">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="পাসওয়ার্ড" required autocomplete="current-password"
                                style="padding-right: 40px;">
                            <span id="togglePassword"
                                style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%); cursor: pointer;">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check mb-3 d-flex justify-content-between">
                        <input class="form-check-input" type="checkbox" id="rememberMe" />
                        <label class="form-check-label" for="rememberMe">{{ __('মনে রাখুন') }}</label>
                        <a class="forget_password" href="">{{ __('পাসওয়ার্ড ভুলে গেছেন?') }}</a>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 mb-3 login">{{ __('লগইন করুন') }}</button>
                    <div class="text-center mb-3">
                        <div class="divider">
                            <hr>
                            <span>{{ __('অথবা') }}</span>
                            <hr>
                        </div>
                    </div>
                    <button type="button" class="btn btn-light border w-100 mb-3 google_button">
                        <img src="{{ asset('forntend/images/google.png') }}" alt="Google logo" width="20"
                            class="me-2" />
                        {{ __('গুগল দিয়ে প্রবেশ করুন') }}
                    </button>
                    <div class="text-center">
                        <span class="no_account">{{ __('আপনার কোন একাউন্ট নেই?') }}</span>
                        <br />
                        <a href="{{ route('signup.signup') }}"
                            class="btn btn-dark mt-2 w-100 create_button">{{ __('একাউন্ট তৈরি করুন') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



@push('script')
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // আইকন চেঞ্জ
            if (type === 'text') {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
                eyeIcon.style.color = '#ea1827';
            } else {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
                eyeIcon.style.color = '';
            }
        });
    </script>
@endpush
