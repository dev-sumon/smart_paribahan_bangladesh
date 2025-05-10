
@extends('forntend.layouts.master')
@section('title', 'Verify')
@section('content')
    <section class="login_section">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('Password Forgot') }}</h4>
                <form method="POST" action="{{ route('admin.check.otp') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Enter OTP') }}</label><br>

                        <div class="col-md-12">
                            <input type="text" name="otp" placeholder="Enter OTP" class="form-control" value="{{ old('otp') }}" placeholder="Enter OTP" required>
                            <button type="submit"
                                class="btn btn-danger w-100 mb-3 mt-3 login">{{ __('Verify OTP') }}</button>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                    </div>
                    
                </form>
                <div class="text-center">
                    <a href="{{ route('admin.login') }}"
                        class="btn btn-dark mt-2 w-100 create_button">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection