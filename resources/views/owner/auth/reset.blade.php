@extends('forntend.layouts.master')
@section('title', 'New Password')
@section('content')
    <section class="login_section">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('Password Forgot') }}</h4>
                <form method="POST" action="{{ route('owner.reset.password') }}">
                    @csrf
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Enter New Password') }}</label><br>
                        <div class="col-md-12">
                            <input type="password" id="password" name="password" placeholder="New password" class="form-control" required  style="padding-right: 40px;">

                            <span id="togglePassword"
                                style="position: absolute; top: 50%; right: 25px; transform: translateY(-50%); cursor: pointer;">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label">{{ __('Enter Confirm Password') }}</label><br>
                        <div class="col-md-12">
                            <input type="password" name="password_confirmation" placeholder="Confirm password"
                                class="form-control" value="{{ old('otp') }}" required>
                                <button type="submit" class="btn btn-danger w-100 mb-3 mt-3 login">{{ __('Submit') }}</button>
                        </div>

                        
                    </div>
                </form>
                <div class="text-center">
                    <a href="{{ route('owner.login') }}"
                        class="btn btn-dark mt-2 w-100 create_button">{{ __('Back') }}</a>
                </div>
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