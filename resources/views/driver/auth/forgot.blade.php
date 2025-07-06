@extends('forntend.layouts.master')
@section('title', 'Forgot Password')
@section('content')
    <section class="login_section">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('Password Forgot') }}</h4>
                <form method="POST" action="{{ route('driver.send.otp') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('ইমেইল') }}</label><br>

                        <div class="col-md-12">
                            <input type="email" name="email" placeholder="Enter your email" class="form-control" value="{{ old('email') }}" required>
                            <button type="submit"
                                class="btn btn-danger w-100 mb-3 mt-3 login">{{ __('Send OTP') }}</button>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                    </div>
                </form>
                <div class="text-center">
                    <a href="{{ route('signup.signup') }}"
                        class="btn btn-dark mt-2 w-100 create_button">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
