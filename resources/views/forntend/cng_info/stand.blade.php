@extends('forntend.layouts.master', ['page_slug' => 'stand'])
@section('title', 'CNGstand')
@section('content')
     <!-- inner_page_hero section start-->
     <section class="inner_page_hero mt-5">
        <div class="container">
            <div class="row">
                <div class="hero_details">
                    <div class="desc">
                        <h5>সিলেট বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা - নিজবাহাদুরপুর ইউনিয়ন</h5>
                    </div>
                    <div class="title pt-3">
                        <h2>স্ট্যান্ডের পরিচিতি</h2>
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
                        <a href="#" class="gradient-border-button">
                            <span>সকল</span>
                            <i class="fa-solid fa-arrow-right arrow"></i>
                        </a>
                    </div>
                                        
                </div>
                <div class="col-md-12 col-lg-3 mt-sm-5 mt-md-5 custom-margin">
                    <div class="advisement">
                        <div class="add_image text-center">
                            <a href="#">
                                <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- notice section end  -->
  
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
                                        <li><a href="{{ route('f.cng.cng_stand') }}" class="active-link">স্ট্যান্ডের পরিচিতি</a></li>
                                        <li><a href="{{ route('f.cng.map') }}">মানচিত্রে স্ট্যান্ড</a></li>
                                        <li><a href="{{ route('f.cng.community') }}">সভাপতি ও সদস্য বৃন্দ তালিকা</a></li>
                                        <li><a href="{{ route('f.cng.owner') }}">বাইক মালিক এর তালিকা</a></li>
                                    </ul>
                                </div>
                                <div class="nav2 pt-4">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="{{ route('f.cng.driver') }}">বাইক ড্রাইভার এর তালিকা </a></li>
                                        <li><a href="notice_page.html">স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="video-responsive">
                            <iframe width="725" height="408" src="https://www.youtube.com/embed/eHJnEHyyN1Y?si=tYCENquNCQV1e60P" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>                        
                        <!-- Content Description start-->
                       
                        <div class="content_text ">
                            
                            <div class="row mt-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>স্ট্যান্ডের নাম - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>নিজবাহাদুরপুর সি এন জি স্ট্যান্ড</p>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row mt-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>নামকরণ - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন। এ কারণে ‘শীলাহাট’ থেকে সিলট বা সিলেট নামের পরিচিতি হতে পারে বলে অনেকে মনে করেন। এছাড়াও অনেকের মতে হিন্দু পুরাণ মতে সতীদেবীর হাড় বা হড্ড উপমহাদেশের ৫১ টি স্থানে পতিত হয়েছিল। সতীর দু’টি হাড় সিলেটেও পড়েছিল। সতীর অপর নাম ‘শ্রী’; তাই ‘শ্রী + হড্ড’ থেকে শ্রীহট্ট নাম হতে পারে। হযরত শাহজালাল (রঃ) কর্তৃক ‘সিল হট্ যাহ্’ আদেশ থেকে ‘সিল্হট্’ নামের উৎপত্তি বলেও অনেকে মনে করেন।</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>অবস্থান  - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন। </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>অবস্থান  - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন। </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>অবস্থান  - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন। </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 mb-5">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>অবস্থান  - </h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>সিলেট নামের উৎপত্তি নিয়ে নানা মতবাদ রয়েছে। প্রাচীন গৌড়ের রাজা ‘গুহক’ তার কন্যা শীলাদেবীর নামে একটি হাট স্থাপন করেন। </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Content Description End-->
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- stand_intro section End!-->

@endsection