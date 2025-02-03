@extends('forntend.layouts.master')
@section('title', 'CNG')
@section('content')




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
    <section class="dealist pb-5">
        <div class="container">
            <div class="row d-flex align-content-center">
                <div class="col-sm-12 col-lg-4 d-flex flex-column align-items-center text-center location_item">
                <div class="row g-2">
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
                </div>
                    <button class="btn btn-outline-success mt-3 mb-5" type="submit">ক্লিক করুন</button>
                <div class="mt-5 d-lg-block d-md-none d-sm-none">
                    <div class="advisement">
                        <div class="add_image">
                            <a href="#">
                                <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row text-end">
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                        
                        <div class="card">
                            <a href="{{ route('f.cng.cng_stand') }}">
                                <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                <p class="pt-3">স্ট্যান্ডের পরিচিতি </p>
                            </a>
                        </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.map') }}">
                                    <img src="{{ asset('forntend/images/map 1.svg') }}" alt="">
                                    <p class="pt-3">মানচিত্রে স্ট্যান্ড  </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.community') }}">
                                    <img src="{{ asset('forntend/images/team 1.svg') }}" alt="">
                                    <p class="pt-3">সি এন জি স্টেশন সভাপতি ও সদস্য  বৃন্দ তালিকা </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.owner') }}">
                                    <img src="{{ asset('forntend/images/owner 1.svg') }}" alt="">
                                    <p class="pt-3">সি এন জি মালিক এর তালিকা </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.driver') }}">
                                    <img src="{{ asset('forntend/images/driver11 1.svg') }}" alt="">
                                    <p class="pt-3">সি এন জি  ড্রাইভার এর তালিকা </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.notice') }}">
                                    <img src="{{ asset('forntend/images/report 1.svg') }}" alt="">
                                    <p class="pt-3">সি এন জি স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী </p>
                                </a>
                            </div>
                        </div>

                        <div class="mt-5 d-lg-block d-md-block d-sm-none">
                        <div class="cover_advisement">
                            <div class="add_image">
                            <a href="#">
                                <img class="w-100" src="{{ asset('forntend/images/add_banner2.jpg') }}" alt="add banner">
                            </a>
                            </div>
                        </div>
                        </div>
                        <div class="mt-5 d-lg-none d-md-none d-sm-block">
                        <div class="advisement text-center">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection