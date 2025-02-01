@extends('forntend.layouts.master')
@section('title', 'Login')
@section('content')
    <section class="login_section">
        <div class="container d-flex justify-content-center align-items-center pt-5 py-5">
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
            <h4 class="mb-4">একাউন্টে লগইন করুন</h4>
            <form>
            <div class="mb-3">
                <label for="email" class="form-label">ইমেইল অথবা মোবাইল নাম্বার লিখুন</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ইমেইল অথবা মোবাইল নাম্বার লিখুন" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">পাসওয়ার্ড</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="পাসওয়ার্ড লিখুন" required />
                
            </div>
            <div class="form-check mb-3 d-flex justify-content-between">
                <input class="form-check-input" type="checkbox" id="rememberMe" />
                <label class="form-check-label" for="rememberMe">মনে রাখুন</label>
                <a class="forget_password" href="">পাসওয়ার্ড ভুলে গেছেন?</a>
            </div>
            <button type="submit" class="btn btn-danger w-100 mb-3 login">লগইন করুন</button>
            <div class="text-center mb-3">
                <div class="divider">
                <hr>
                <span>অথবা</span>
                <hr>
                </div>
            </div>
            <button type="button" class="btn btn-light border w-100 mb-3 google_button">
                <img src="{{ asset('forntend/images/google.png') }}" alt="Google logo" width="20" class="me-2" />
                গুগল দিয়ে প্রবেশ করুন 
            </button>
            <div class="text-center">
                <span class="no_account">আপনার কোন একাউন্ট নেই?</span>
                <br />
                <a href="signup_page .html" class="btn btn-dark mt-2 w-100 create_button">একাউন্ট তৈরি করুন</a>
            </div>
            </form>
        </div>
        </div>
    </section>
@endsection