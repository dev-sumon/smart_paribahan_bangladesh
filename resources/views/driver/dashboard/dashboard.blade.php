{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Document') }}</title>
</head>
<body>
    <h1>{{ __('Driver Dashbaord') }}</h1>
    <li class="nav-item dropdown">
        <a class="dropdown-item" href="{{ route('driver.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </li>
</body>
</html> --}}

@extends('forntend.layouts.master')
@section('title', 'Driver Dashboard')
@section('content')
     <!-- error_section section design start -->
     <section class="error_section pt-5 pb-5">
        <div class="container">
            <div class="error_image d-flex">
                <div class="error">
                    <h3>{{ __('Driver Dashbaord') }}</h3>
                </div>
                <div class="image">
                    <img src="images/Frame.png" alt="">
                </div>
            </div>
            <a class="dropdown-item" href="{{ route('driver.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </section>
    <!-- error_section section design end -->
@endsection