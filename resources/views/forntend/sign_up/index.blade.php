{{-- @extends('forntend.layouts.master')
@section('title', 'SignUp')
@section('content')
<section class="register_section pt-5 py-5">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
        <h4 class="mb-4">অ্যাকাউন্ট তৈরী করুন</h4>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">নাম</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="আপনার নাম লিখুন" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">ইমেইল অথবা মোবাইল নাম্বার লিখুন</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন" required />
          </div>
          <div class="mb-3">
              <label for="phone" class="form-label">মোবাইল নাম্বার</label>
              <input type="tel" id="phone" name="phone" class="form-control w-100" placeholder="" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">পাসওয়ার্ড</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড লিখুন" required />
            <span>ন্যূনতম ৮ অক্ষরে লিখুন</span>
            
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="আবার পাসওয়ার্ড লিখুন" required />
            <span>ন্যূনতম ৮ অক্ষরে লিখুন</span>
          </div>
          <div class="mb-3">
              <p>
                  রেজিস্ট্রেশন করার মাধ্যমে আপনি আমাদের ব্যবহারকারীর শর্তাবলি মেনে নিচ্ছেন।
              </p>
          </div>
          <button type="submit" class="btn btn-danger w-100 mb-3 login">এ অ্যাকাউন্ট তৈরী করুন</button>
          <div class="text-center mb-3">
            <div class="divider">
              <hr>
              <span>অথবা</span>
              <hr>
            </div>
          </div>
          <button type="button" class="btn btn-light border w-100 mb-3 google_button">
            <img src="{{ asset('forntend/images/google.png') }}" alt="Google logo" width="20" class="me-2" />
            গুগল দিয়ে এগিয়ে যান
          </button>
          <div class="text-center back_login">
             <span class="no_account">ইতিমধ্যে একটি অ্যাকাউন্ট আছে?</span>
            <br />
            <div class="back_login_page">
              <button type="button" id="loginButton" class="btn btn-light w-100 mb-3">আপনার অ্যাকাউন্টে লগইন করুন</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection --}}


@extends('forntend.layouts.master')
@section('title', 'SignUp')
@section('content')
    @push('css')
       <style>
             html, body {
                height: 100%;
            }
            body {
                display: flex;
                flex-direction: column;
            }
            .footer_gray {
                margin-top: auto;
            }
       </style>
    @endpush
    <section class="select_iteam">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
          <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
            <a href="{{ route('signup.signup') }}">{{ __('ড্রাইভার সাইন আপ') }}</a>
            <a href="{{ route('owner.signup.signup') }}">{{ __('মালিক সাইন আপ') }}</a>
            <a href="">{{ __('মাঠ কর্মী সাইন আপ') }}</a>
          </div>
        </div>
      </section>
@endsection