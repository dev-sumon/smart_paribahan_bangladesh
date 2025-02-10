@extends('forntend.layouts.master')
@section('title', 'SignUp')
@section('content')
  <section class="register_section pt-5 py-5">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
          <h4 class="mb-4">{{ __('অ্যাকাউন্ট তৈরী করুন') }}</h4>
          <form action="{{ route('owner.signup.register') }}"  method="POST" enctype="multipart/form-data">
              @csrf
            <div class="form-group">
                  <label for="name">{{ __('নাম') }} <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="name" placeholder="আপনার নাম লিখুন" name="name" value="{{ old('name') }}">
                  @if($errors->has('name'))
                      <div class="text-danger">{{ $errors->first('name') }}</div>
                  @endif
              </div>
            <div class="form-group">
                  <label for="email" class="mt-3">{{ __('মেইল লিখুন') }} <span class="text-danger">*</span></label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="মেইল লিখুন">
                  @if($errors->has('email'))
                      <div class="text-danger">{{ $errors->first('email') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="phone" class="mt-3">{{ __('মোবাইল নাম্বার') }} <span class="text-danger">*</span></label>
                  <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="মোবাইল নাম্বার">
                  @if($errors->has('phone'))
                      <div class="text-danger">{{ $errors->first('phone') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="password" class="mt-3">{{ __('পাসওয়ার্ড') }} <span class="text-danger">*</span></label>
                  <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="পাসওয়ার্ড">
                  @if($errors->has('password'))
                      <div class="text-danger">{{ $errors->first('password') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="password_confirmation" class="mt-3">{{ __('আবার পাসওয়ার্ড লিখুন') }} <span class="text-danger">*</span></label>
                  <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="আবার পাসওয়ার্ড লিখুন">
                  @if($errors->has('password_confirmation'))
                      <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                  @endif
              </div>
              {{-- <div class="mb-3">
                <p>
                    {{ __('রেজিস্ট্রেশন করার মাধ্যমে আপনি আমাদের ব্যবহারকারীর শর্তাবলি মেনে নিচ্ছেন।') }}
                </p>
              </div> --}}
              <div class="form-group">
                  <button type="submit" class="btn btn-success w-100 submitBtn">
                      {{ __('অ্যাকাউন্ট তৈরী করুন') }}
                  </button>
              </div>
            {{-- <button type="submit" class="btn btn-danger w-100 mb-3 login">{{ __('এ অ্যাকাউন্ট তৈরী করুন') }}</button> --}}
            {{-- <div class="text-center mb-3">
              <div class="divider">
                <hr>
                <span>{{ __('অথবা') }}</span>
                <hr>
              </div>
            </div>
            <button type="button" class="btn btn-light border w-100 mb-3 google_button">
              <img src="{{ asset('forntend/images/google.png') }}" alt="Google logo" width="20" class="me-2" />
              {{ __('গুগল দিয়ে এগিয়ে যান') }}
            </button>
            <div class="text-center back_login">
              <span class="no_account">{{ __('ইতিমধ্যে একটি অ্যাকাউন্ট আছে?') }}</span>
              <br />
              <div class="back_login_page">
                <button type="button" id="loginButton" class="btn btn-light w-100 mb-3">{{ __('আপনার অ্যাকাউন্টে লগইন করুন') }}</button>
              </div>
            </div> --}}
          </form>
        </div>
      </div>
    </section>
@endsection