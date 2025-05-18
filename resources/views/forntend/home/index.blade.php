@extends('forntend.layouts.master')

@section('title', 'Homapage')

@section('content')
    <!-- hero section end -->
    <section class="hero">
        <div class="container">
            <div class="row d-flex align-items-center column_reverse">
                <div class="col-12 mb-5 col-md-5">
                    <div class="title">
                        <h3>{{ __('Have a safe journey') }}</h3>
                        <h2>{{ __('Smart Solution') }}</h2>
                        <p class="lead">
                            {{ __('Even though time waits for no one, we are here to help you save time in your life with smart solutions.') }}
                        </p>
                    </div>
                    <div class="row g-2">
                        <form action="{{ route('f.home.search') }}" method="post">
                            @csrf

                            <div class="row">
                                <div class="form-group col-4">
                                    <select name="division_id" id="division" class="form-select select_iteam">
                                        <option value="">{{ __('Division') }}</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('division_id'))
                                        <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-4">
                                    <select name="district_id" id="district" class="form-select select_iteam">
                                        <option value="">{{ __('District') }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <select name="thana_id" id="thana" class="form-select select_iteam">
                                        <option value="">{{ __('Thana') }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <select name="union_id" id="union" class="form-select select_iteam">
                                        <option value="">{{ __('Union') }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <select name="stand_id" id="stand" class="form-select select_iteam">
                                        <option value="">{{ __('Stand') }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-4">
                                    <select name="vehicle_type_id" id="vehicle_type" class="form-select select_iteam">
                                        <option value="">{{ __('Vehicle') }}</option>
                                    </select>
                                </div>

                                <div class="submit col-12">
                                    <button class="btn btn-custom mt-3 w-100">{{ __('Search here') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-7 mb-5 text-center">
                    <div class="hero_image">
                        <img src="{{ asset('forntend/images/Order ride-amico.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- hero section end -->

    <!-- vehicles_list section start -->

    <section class="vehicles_list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="{{ route('f.cng.index') }}">
                                <img src="{{ asset('forntend/images/Group (6).svg') }}" alt="সি এন জি">
                                <p>{{ __('C N G') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="hiace.html">
                                <img src="{{ asset('forntend/images/Group (7).svg') }}" alt="হায়েস">
                                <p>{{ __('Hiace') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="car.html">
                                <img src="{{ asset('forntend/images/Group (2).svg') }}" alt="কার">
                                <p>{{ __('Car') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="micro.html">
                                <img src="{{ asset('forntend/images/Group (3).svg') }}" alt="মাইক্রো">
                                <p>{{ __('Micro') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="bike.html">
                                <img src="{{ asset('forntend/images/Group (4).svg') }}" alt="বাইক">
                                <p>{{ __('Bike') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="card p-3 text-center">
                        <div class="details">
                            <a href="#">
                                <img src="{{ asset('forntend/images/Group (5).svg') }}" alt="পার্সেল">
                                <p>{{ __('Parcel') }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- vehicles_list section end -->

    <!-- Connected with us section Start -->
    <section class="connected_us" id="price-section">
        <div class="container py-5 pb-5">
            <div class="row g-2">
                <h2 class="section-title mb-5">{{ __('Connected with us') }}</h2>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="train" src="{{ asset('forntend/images/train.svg') }}" alt="Train Icon">
                        </div>
                        <p class="card-text">{{ __('Total Car Stations') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="car" src="{{ asset('forntend/images/CAR 02 1.svg') }}" alt="Car Icon">
                        </div>
                        <p class="card-text">{{ __('Total Cars') }}</p>
                        <p class="price" data-original="90090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="man" src="{{ asset('forntend/images/MAN 01 1.svg') }}" alt="Man Icon">
                        </div>
                        <p class="card-text">{{ __('Total Car Owners') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="driver" src="{{ asset('forntend/images/DRIVER 1.svg') }}" alt="Driver Icon">
                        </div>
                        <p class="card-text">{{ __('Total Experienced Drivers') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Connected with us section End! -->

    <!-- search driver section start  -->
    <section class="search_section py-5">
        <div class="image mb-4">
            <img src="{{ asset('forntend/images/Group 39894.svg') }}" alt="Driver Image" class="img-fluid">
        </div>
        <div class="container">
            <div class="row justify-content-center align-items-center text-center text-md-start">
                <div class="col-12 col-md-4 mb-3 mb-md-0">
                    <div class="text">
                        <h2 class="fw-bold">
                            {{ __('Directly to the car or') }}
                            <span class="d-block d-md-inline"><br></span>
                            {{ __('Find a driver') }}
                        </h2>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <form class="d-flex justify-content-center justify-content-md-start" role="search"
                        action="{{ route('f.home.driverProfileSearch') }}" method="GET">
                        <input class="form-control me-2 search" type="search" name="query"
                            placeholder="{{ __('Vehicle or driver number') }}" aria-label="Search" required>
                        <button type="submit" class="btn btn-outline-success" style="white-space: nowrap;">
                            {{ __('Click') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- search driver section end  -->

    <!-- help_us section start  -->
    <section class="help_us">
        <div class="container">
            <div class="row">
                <div class="help_us_headr text-center">
                    <div class="title">
                        <h2>{{ __('How we help you') }}</h2>
                    </div>
                    <div class="desc">
                        <p>{{ __('Any passenger can send a signal for a car to the nearest station when needed.') }}<span
                                class="d-none d-md-inline"><br></span>{{ __('As a result, no one has to wait for hours for a car.') }}
                        </p>
                    </div>
                </div>
                <div class="car-container">
                    <img src="{{ asset('forntend/images/Group 2.png') }}" alt="Car and Phone" class="car-image">

                    <div class="feature-box feature-box-1">
                        <span class="icon-circle-1">{{ __('1') }}</span>
                        <p class="feature-text">{{ __('If you lose something in the vehicle, you can easily find it.') }}
                        </p>
                    </div>

                    <div class="feature-box feature-box-2">
                        <span class="icon-circle-2">{{ __('2') }}</span>
                        <p class="feature-text">{{ __('Passengers can travel safely using smart technology.') }}</p>
                    </div>

                    <div class="feature-box feature-box-3">
                        <span class="icon-circle-3">{{ __('3') }}</span>
                        <p class="feature-text">
                            {{ __('Passengers can make online payments to the driver if they wish, using platforms like bKash, Rocket, or Nagad.') }}
                        </p>
                    </div>

                    <div class="feature-box feature-box-4">
                        <span class="icon-circle-4">{{ __('4') }}</span>
                        <p class="feature-text">
                            {{ __('If passengers leave something behind in the vehicle, the driver can issue a lost-and-found notice.') }}
                        </p>
                    </div>

                    <div class="feature-box feature-box-5">
                        <span class="icon-circle-5">{{ __('5') }}</span>
                        <p class="feature-text">{{ __('Each vehicle will have a QR code.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- help_us section end  -->

    <!-- BD Smart vehicles Blog section Start -->
    <section class="bd_smart_vehicle_part">
        <div class="container pt-5 pb-5">
            <div class="row d-flex align-items-stretch">
                <div class="head-text">
                    <h2 class="heading_section">{{ __('From the Bangladesh Smart Transport Blog') }}</h2>
                    <p class="sub_text">{{ __('All Statements, Updates, Releases, and Others') }}</p>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-md-12 col-lg-4 mb-4 pb-4">
                        <div class="post_card pb-4">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Card Image">
                            <div class="post_content">
                                <h4 class="post_title"><a href="{{ route('f.blog.inner_blog', $blog->slug) }}"
                                        style="color: #141F39">{{ Str::limit($blog->title, 40, '...') }}</a></h4>
                                <p class="post_date"><i class="fa-regular fa-calendar mr-1"
                                        style="color: red;"></i>{{ $blog->created_at->format('d M, Y') }}</p>
                                <p class="post_description">{!! Str::limit(strip_tags($blog->description), 250, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="btn_section">
                    <a href="{{ route('f.blog.index') }}" class="gradient-border-button">
                        <span>{{ __('All Blogs') }}</span>
                        <i class="fa-solid fa-arrow-right arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- BD Smart vehicles Blog section End! -->

    <!-- FAQ section start  -->
    <section class="faq pb-5" id="faq">
        <div class="container d-flex justify-content-center">
            <div class="row w-100">
                <div class="faq-section">
                    <div class="faq-title  py-5 pb-5">{{ __('Frequently Asked Questions (FAQ)') }}</div>

                    @foreach ($faqs as $faq)
                        <div class="faq-item">
                            <div class="faq-question">{{ $faq->question }}</div>
                            <div class="faq-answer">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!-- EAQ section end  -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: '/home/get-districts/' + division_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty();
                            $('#district').append('<option value="">জেলা</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                }
            });
            $('#district').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: '/home/get-thanas/' + district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#thana').empty();
                            $('#thana').append('<option value="">থানা</option>');
                            $.each(data, function(key, value) {
                                $('#thana').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#thana').empty();
                }
            });
            $('#thana').on('change', function() {
                var thana_id = $(this).val();
                if (thana_id) {
                    $.ajax({
                        url: '/home/get-unions/' + thana_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#union').empty();
                            $('#union').append('<option value="">ইউনিয়ন</option>');
                            $.each(data, function(key, value) {
                                $('#union').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty();
                }
            });
            $('#union').on('change', function() {
                var union_id = $(this).val();
                if (union_id) {
                    $.ajax({
                        url: '/home/get-stands/' + union_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#stand').empty();
                            $('#stand').append('<option value="">স্ট্যান্ড</option>');
                            $.each(data, function(key, value) {
                                $('#stand').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#stand').empty();
                }
            });
            $('#stand').change(function() {
                var standId = $(this).val();
                if (standId) {
                    $.ajax({
                        url: '/home/get-vehicles/' + standId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#vehicle_type').empty();
                            $('#vehicle_type').append('<option value="">গাড়ি</option>');
                            $.each(data, function(key, vehicleType) {
                                $('#vehicle_type').append('<option value="' +
                                    vehicleType.id + '">' + vehicleType.name +
                                    '</option>');
                            });
                            $('#vehicle_type').prop('disabled', false);
                        }
                    });
                } else {
                    $('#vehicle_type').empty();
                    $('#vehicle_type').append('<option value="">গাড়ি</option>');
                    $('#vehicle_type').prop('disabled', true);
                }
            });

        });
    </script>
@endpush
