@extends('forntend.layouts.master')
@section('title', 'Driver Profile')
@section('content')
    <!-- president and members section start-->
    <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                {{-- <h5>Sylhet Division - Moulvibazar District - Barlekha Thana - Nijbahadurpur Union</h5> --}}

                <h2 class="ml-4">{{ $driver->district->district }} - {{ $driver->thana->thana }} -
                    {{ $driver->union->union }} - {{ $driver->stand->name }}</h2>
            </div>
            <div class="member_list_title">
                <h2>{{ $driver->vehicle->name }} {{ __('Driver Details') }} </h2>
            </div>
        </div>
    </section>
    <!-- president and members section end-->


    <!-- CNG Owner profile section start -->
    <div class="profile_section pt-5 pb-4">
        <div class="container">
            <div class="profile_deatils d-lg-flex d-md-block column-gap-5">
                <div class="profile_image text-center">
                    <img src="{{ $driver->image ? asset('storage/' . $driver->image) : asset('frontend/images/Ellipse 199.png') }}"
                        alt="Profile Image" class="profile-image mb-3 rounded-2">
                </div>
                <div class="profile_info">
                    <span class="owner">{{ __('I am the driver') }}</span>
                    <h3>{{ $driver->name }}</h3>
                    <span class="desc">
                        {{ $driver->description }}
                    </span>
                    {{-- <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                        <div class="designation">{{ __('Designation') }} -  </div>
                        <div class="designation_name">{{ __('Vice President') }} -</div>
                    </div> --}}
                    <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                        <div class="email">{{ __('Email') }} - </div>
                        <div class="email_address">{{ $driver->email }}</div>
                    </div>
                    <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                        <div class="phone">{{ __('Phone Number') }} - </div>
                        <div class="number">{{ $driver->phone }}</div>
                    </div>
                    <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                        <div class="car">{{ __('Vehicle Number') }} - </div>
                        <div class="car_number">
                            {{-- {{ $driver->vehicle->vehicle_licence }} --}}
                            {{ $driver->vehicle ? $driver->vehicle->vehicle_licence : 'No License Available' }}
                            {{-- @foreach ($driver->vehicles as $vehicle) --}}
                            {{-- {{ $driver->vehicles->vehicle_licence }} --}}
                            {{-- @endforeach --}}

                        </div>
                    </div>
                    <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                        <div class="blood">{{ __('Blood Group') }} - </div>
                        <div class="blood_group">{{ $driver->blood_group->blood_group }}</div>
                    </div>
                    <div class="book_now d-none">
                        <a href="">গাড়ি বুক করুন</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CNG Owner profile section start -->

    <!-- video section start -->

    <div class="video_section">
        <div class="container text-center">
            {{-- <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/qk7pZnxCX2o?si=sesWVnvaOcdsWI7h" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div> --}}
            <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach (json_decode(json: $driver->vehicle->image) as $key => $img)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $img) }}" class="d-block w-100"
                                style="max-height: 400px; object-fit: contain;">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageSlider"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
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
                    <h3 class="ml-4">{{ $driver->district->district }} - {{ $driver->thana->thana }} -
                        {{ $driver->union->union }} - {{ $driver->stand->name }} {{ __("Stand") }} {{ $driver->vehicle->name }} ইমেজ</h3>
                </div>

                <div class="row gallery_image g-3">
                    @foreach (json_decode($driver->vehicle->image, true) as $img)
                        <div class="col-6 col-md-4">
                            <div class="">
                                <img src="{{ asset('storage/' . $img) }}" alt="gallery_image" class="img-fluid">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection
