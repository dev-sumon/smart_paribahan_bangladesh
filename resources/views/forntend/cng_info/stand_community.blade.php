@extends('forntend.layouts.master')
@section('title', 'standCommunity')
@section('content')
     <!-- president and members section start-->
     <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                <h5>সিলেট  বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</h5>
            </div>
            <div class="member_list_title">
                <h2>সি এন জি স্টেশন সভাপতি <br class="d-none d-sm-inline">
                     ও সদস্য বৃন্দ তালিকা</h2>
            </div>
        </div>
    </section>
    <!-- president and members section end-->
    
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
                    <div class="advisement text-center">
                      <div class="add_image">
                        <a href="#">
                          <img class="text-center" src="images/add_banner.jpg" alt="add banner">
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- notice section end  -->
    <!-- deatils section start -->
    <section class="dealist pb-5">
        <div class="container">
            <div class="row d-flex align-content-center">
                <div class="col-sm-12 col-lg-4 d-flex flex-column align-items-center text-center stant_location_item">
                    <div class="row g-2 pt-5">
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
                    <div class="mt-5 d-lg-block d-md-none d-sm-block community_advisement">
                        <div class="advisement">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="images/add_banner.jpg" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-lg-block d-md-none d-sm-none community_advisement">
                        <div class="advisement">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="images/add_banner.jpg" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-lg-block d-md-none d-sm-none community_advisement">
                        <div class="advisement">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="images/add_banner.jpg" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-12 col-lg-12 pb-5">
                            <div class="content_nav">
                                <div class="nav1">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="stand_intro.html" class="active-link">স্ট্যান্ডের পরিচিতি</a></li>
                                        <li><a href="stand_map.html">মানচিত্রে স্ট্যান্ড</a></li>
                                        <li><a href="stand_community.html">সভাপতি ও সদস্য বৃন্দ তালিকা</a></li>
                                        <li><a href="cng_owner_list.html">বাইক মালিক এর তালিকা</a></li>
                                    </ul>
                                </div>
                                <div class="nav2 pt-4">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="cng_driver_list.html">বাইক ড্রাইভার এর তালিকা </a></li>
                                        <li><a href="notice_page.html">স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                     </div>
                      
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সভাপতি</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845 (2).png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="images/Rectangle 3845.png" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">সাধারণ <br> সম্পাদক</div>
                                <div class="profile-details">
                                    <h3>মুহাম্মদ নজরুল ইসলাম</h3>
                                    <p>nzrul@degmail.com</p>
                                    <p>+880 1777000000</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deatils section start -->
@endsection