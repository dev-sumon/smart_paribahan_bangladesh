@extends('forntend.layouts.master')
@section('title', 'search profile')
@section('content')
<!-- president and members section start-->
@foreach ($vehicles as $key=>$vehicle)
<section class="president_and_members pt-5 pb-4">
    <div class="container">
        <div class="stand_location">
            <h5>{{ $vehicle->driver->district->district }} - {{ $vehicle->driver->thana->thana }} - {{ $vehicle->driver->union->union }}</h5>
        </div>
        <div class="member_list_title">
            <h2>{{ $vehicle->name }} {{ __('Driver Details') }}</h2>
        </div>
    </div>
</section>

<!-- CNG Owner profile section start -->
<div class="profile_section pt-5 pb-4">
    <div class="container">
        <div class="profile_deatils d-lg-flex d-md-block column-gap-5">
            <div class="profile_image text-center">
                <img src="{{ $vehicle->image ? asset('storage/' . $vehicle->image) : asset('forntend/images/Ellipse 199.png') }}" alt="Profile Image" class="profile-image mb-3 rounded-2">
            </div>
            <div class="profile_info">
                <span class="owner">{{ __('I am the driver') }}</span>
                <h3>{{ $vehicle->driver->name }}</h3>
                <span class="desc">
                  {{ $vehicle->driver->description }}
                </span>
                <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                    <div class="email">{{ __('Email') }} - </div>
                    <div class="number">{{ $vehicle->driver->email ?? {{ __('Email number not found.') }} }}</div>
                </div>
                <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                    <div class="phone">{{ __('Mobile number') }} - </div>
                    <div class="number">{{ $vehicle->driver->phone ?? {{ __('Email number not found.') }} }}</div>
                </div>
                <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                    <div class="car">{{ __('Vehicle Number') }}  - </div>
                    <div class="car_number">
                        {{ $vehicle->vehicle_licence }}
                    </div>
                </div>
                <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                    <div class="blood">{{ __('Blood Group') }} - </div>
                    <div class="blood_group">{{ $vehicle->driver->blood_group->blood_group }}</div>
                </div>
                <div class="book_now d-none">
                    <a href="">{{ __('Book a car.') }}</a>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- CNG Owner profile section start -->
<!-- video section start -->
     
<div class="video_section">
    <div class="container text-center">
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.youtube.com/embed/qk7pZnxCX2o?si=sesWVnvaOcdsWI7h" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
            </iframe>
        </div>
      </div>
  </div>

  <!-- video section start -->

  <!-- gallery section start -->
  <section class="gallery_section">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="d-none d-sm-flex mb-3">
                <h3>{{ __('Image Gallery') }} - </h3>
                <p class="ml-4">{{ $vehicle->driver->district->district }} - {{ $vehicle->driver->thana->thana }} - {{ $vehicle->driver->union->union }} - {{ $vehicle->driver->stand->name }} {{ __('স্ট্যান্ড এর') }}</p> 
            </div>
            
            <div class="row gallery_image g-3">
                <div class="col-6 col-md-4">
                    <div class="">
                        <img src="{{ asset('forntend/images/Rectangle 3842.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="">
                        <img src="{{ asset('forntend/images/Rectangle 3844.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class=""></div>
                    <img src="{{ asset('forntend/images/Rectangle 3846.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row pt-3">
            <div class="row gallery_image g-3">
                <div class="col-6 col-md-4">
                    <img src="{{ asset('forntend/images/Rectangle 3847.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-6 col-md-4">
                    <img src="{{ asset('forntend/images/Rectangle 3843.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-4">
                    <img src="{{ asset('forntend/images/Rectangle 3845 (1).png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
   <!-- gallery section end -->

@endforeach
@endsection