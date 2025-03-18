@extends('forntend.layouts.master')
 @section('title', 'Field Worker Login')
 @section('content')
     <section class="login_section">
         <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
         <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
             <h4 class="mb-4">{{ __('মাঠকর্মী লগইন') }}</h4>
             <form method="POST" action="{{ route('field_worker.login') }}">
                 @csrf
                 <div class="row mb-3">
                     <label for="email" class="col-md-12 col-form-label">{{ __('ইমেইল লিখুন') }}</label><br>
 
                     <div class="col-md-12">
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                 </div>
                 <div class="row mb-3">
                     <label for="password" class="col-md-12 col-form-label">{{ __('পাসওয়ার্ড') }}</label>
                     <div class="col-md-12">
                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="পাসওয়ার্ড" name="password" required autocomplete="current-password">
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
             </form>
         </div>
         </div>
     </section>
 @endsection
