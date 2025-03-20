@extends('forntend.layouts.master')
@section('title', 'Login')
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
            <a href="{{ route('driver.login') }}">{{ __('Driver Login') }}</a>
            <a href="{{ route('owner.login') }}">{{ __('Owner Login') }}</a>
            <a href="">{{ __('Field Worker Login') }}</a>
          </div>
        </div>
      </section>
@endsection