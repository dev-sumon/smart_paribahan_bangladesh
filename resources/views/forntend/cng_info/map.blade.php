@extends('forntend.layouts.master', ['page_slug'=>'map'])
@section('title', 'StandMap')
@section('content')
    <!-- inner_page_hero section start-->
    <section class="inner_page_hero mt-5">
        <div class="container">
            <div class="row">
                <div class="hero_details">
                    <div class="desc">
                        {{-- <h5>সিলেট বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা - নিজবাহাদুরপুর ইউনিয়ন</h5> --}}
                        <h5>{{ $stand->division->division }} - {{ $stand->district->district }} - {{ $stand->thana->thana }} - {{ $stand->union->union }}</h5>
                    </div>
                    <div class="title pt-3">
                        <h2>{{ __('মানচিত্রে স্ট্যান্ড') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- inner_page_hero section start-->

    <!-- notice section start  -->
    <section class="notice">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="title pt-2">
                        <h5>নোটিশ বোর্ড</h5>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">স্মার্ট বাংলাদেশ’ বলতে স্মার্ট নাগরিক, স্মার্ট সমাজ, স্মার্ট অর্থনীতি ও স্মার্ট সরকার গড়ে তোলাকে বুঝানো হয়েছে।</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">স্মার্ট বাংলাদেশ’ বলতে স্মার্ট নাগরিক, স্মার্ট সমাজ, স্মার্ট অর্থনীতি ও স্মার্ট সরকার গড়ে তোলাকে বুঝানো হয়েছে।</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">স্মার্ট বাংলাদেশ’ বলতে স্মার্ট নাগরিক, স্মার্ট সমাজ, স্মার্ট অর্থনীতি ও স্মার্ট সরকার গড়ে তোলাকে বুঝানো হয়েছে।</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">স্মার্ট বাংলাদেশ’ বলতে স্মার্ট নাগরিক, স্মার্ট সমাজ, স্মার্ট অর্থনীতি ও স্মার্ট সরকার গড়ে তোলাকে বুঝানো হয়েছে।</p>
                        </div>
                    </div>
                    <div class="all_notice_button text-end">
                        <a href="notice_page.html" class="gradient-border-button">
                            <span>সকল</span>
                            <i class="fa-solid fa-arrow-right arrow"></i>
                            </a>
                    </div>
                                        
                </div>
                <div class="col-md-12 col-lg-3 mt-sm-5 mt-md-5 custom-margin">
                    <div class="advisement text-center">
                        <div class="add_image">
                        <a href="#">
                            <img class="text-center" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- notice section end  -->

    <!-- dealist section design start -->
    <section class="dealist">
        <div class="container">
            <div class="row d-flex align-content-center">
                <div class="col-sm-12 col-lg-4 d-flex flex-column align-items-center text-center cng_owner_location_item">
                    <div class="row g-4">
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option value="1">বিভাগ</option>
                                    <option value="2">বিভাগ</option>
                                    <option value="3">বিভাগ</option>
                                    <option value="4">বিভাগ</option>
                                    <option value="5">বিভাগ</option>
                                    <option value="6">বিভাগ</option>
                                    <option value="7">বিভাগ</option>
                                    <option value="8">বিভাগ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option>জেলা</option>
                                    <option value="1">জেলা</option>
                                    <option value="2">জেলা</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option>থানা</option>
                                    <option value="1">থানা</option>
                                    <option value="2">থানা</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option>ইউনিয়ন</option>
                                    <option value="1">ইউনিয়ন</option>
                                    <option value="2">ইউনিয়ন</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option>স্ট্যান্ড</option>
                                    <option value="1">স্ট্যান্ড</option>
                                    <option value="2">স্ট্যান্ড</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                            <div class="dropdown">
                                <select>
                                    <option>গাড়ি</option>
                                    <option value="1">গাড়ি</option>
                                    <option value="2">গাড়ি</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-success mt-3 mb-5" type="submit">ক্লিক করুন</button>
                        </div>
                        <div class="mt-5 d-lg-block d-md-none d-sm-block community_advisement">
                            <div class="advisement">
                                <div class="add_image">
                                    <a href="#">
                                        <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-12 col-lg-12 pb-5">
                            <div class="content_nav">
                                <div class="nav1">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="{{ route('f.cng.cng_stand') }}" class="">স্ট্যান্ডের পরিচিতি</a></li>
                                        <li><a href="{{ route('f.cng.map') }}" class="active-link">মানচিত্রে স্ট্যান্ড</a></li>
                                        <li><a href="{{ route('f.cng.community') }}">সভাপতি ও সদস্য বৃন্দ তালিকা</a></li>
                                        <li><a href="{{ route('f.cng.owner') }}">সি এন জি মালিক এর তালিকা</a></li>
                                    </ul>
                                </div>
                                <div class="nav2 pt-4">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="{{ route('f.cng.driver') }}">সি এন জি ড্রাইভার এর তালিকা </a></li>
                                        <li><a href="{{ route('f.cng.notice') }}">স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content_text">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('মানচিত্র  -') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        {{-- <p>মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</p> --}}
                                        <p>{{ $stand->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="map">
                                    <div class="ratio ratio-16x9">
                                        <iframe class="stand_map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509207!2d144.95373631590477!3d-37.81627974257151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5773e92707ab4f0!2sMelbourne%20Central!5e0!3m2!1sen!2sau!4v1635515338986!5m2!1sen!2sau"  width="780" height="440" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content_text mt-5">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('স্ট্যান্ডের নাম - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>{{ $stand->name }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('নামকরণ - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>
                                            {{ $stand->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('অবস্থান  - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>
                                            {{ $stand->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{__('অবস্থান  - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>
                                            {{-- সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন।  --}}
                                            {{ $stand->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('অবস্থান  - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>
                                            {{-- সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন।  --}}
                                            {{ $stand->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('অবস্থান  - ') }}</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>
                                            {{-- সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন।  --}}
                                            {{ $stand->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dealist section design start -->


    <!-- gallery section start -->
    <section class="gallery_section">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="d-none d-sm-flex mb-3">
                    <h3>{{ __('ইমেজ গ্যালারী - ') }}</h3>
                    <p class="ml-4">{{ __('মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন সি এন জি স্ট্যান্ড এর') }}</p> 
                </div>
                
                <div class="row gallery_image g-3">
                    <div class="col-6 col-md-4">
                        <div class="">
                            <img src="{{ asset('forntend/images/Rectangle 3842.png') }}" alt="gallery_image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="">
                            <img src="{{ asset('forntend/images/Rectangle 3844.png') }}" alt="gallery_image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class=""></div>
                        <img src="{{ asset('forntend/images/Rectangle 3846.png') }}" alt="gallery_image" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row pt-3">
                <div class="row gallery_image g-3">
                    <div class="col-6 col-md-4">
                        <img src="{{ asset('forntend/images/Rectangle 3847.png') }}" alt="gallery_image" class="img-fluid">
                    </div>
                    <div class="col-6 col-md-4">
                        <img src="{{ asset('forntend/images/Rectangle 3843.png') }}" alt="gallery_image" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-4">
                        <img src="{{ asset('forntend/images/Rectangle 3845 (1).png') }}" alt="gallery_image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection