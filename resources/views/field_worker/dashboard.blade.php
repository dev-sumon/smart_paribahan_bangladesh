@extends('backend.layouts.master', ['page_slug' => 'dashboard'])

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ __('Dashboard') }}</h1>
      </div>
    </div>
  </div>
@endsection


{{-- 
<section class="logout">
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 m-auto">
                    <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="logout_form">
                        @csrf
                        <div class="form-group">
                        <a class="dropdown-item text-center" href="{{ route('driver.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</section> --}}