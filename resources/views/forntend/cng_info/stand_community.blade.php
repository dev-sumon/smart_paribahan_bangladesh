@extends('forntend.layouts.master', ['page_slug'=>'commitee'])
@section('title', 'Stand Commitee')
@section('content')
     <!-- president and members section start-->
     <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                <h5>{{ $stand->division->division }} - {{ $stand->district->district }} - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</h5>
            </div>
            <div class="member_list_title">
                <h2>{{ $stand->name }} স্টেশন সভাপতি <br class="d-none d-sm-inline">
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
                          <img class="text-center" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
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
                    {{-- <div class="row g-2 pt-5">
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
                      <button class="btn btn-outline-success mt-3 mb-5" type="submit">ক্লিক করুন</button> --}}
                      <form action="{{ route('f.home.search') }}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                {{-- <div class="dropdown">
                                    <select name="division_id" id="division">
                                        <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                        @foreach ($stand->divisions as $division)
                                            <option value="{{ $division->id }}" {{ $division->id == old( 'division_id', $division->id) ? 'selected' : '' }}>{{ $division->division }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('division_id'))
                                    <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                    @endif
                                </div> --}}
                                <div class="dropdown">
                                    <select name="division_id" id="division">
                                        <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                
                                        @if($stand->division)
                                            <option value="{{ $stand->division->id }}" {{ old('division_id') == $stand->division->id ? 'selected' : '' }}>
                                                {{ $stand->division->division }}
                                            </option>
                                        @endif
                                
                                    </select>
                                
                                    @error('division_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                <div class="dropdown">
                                    <select name="district_id" id="district">
                                        <option value="">{{ __('জেলা') }}</option>
                                    </select>
                                    {{-- <select name="district_id" id="district">
                                        <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" {{ $district->id == old( 'district_id', $district->id) ? 'selected' : '' }}>{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('division_id'))
                                    <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                    @endif --}}
                                </div>
                            </div>
                            
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                <div class="dropdown">
                                    <select name="thana_id" id="thana">
                                        <option value="">{{ __('থানা') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                <div class="dropdown">
                                    <select name="union_id" id="union">
                                        <option value="">{{ __('ইউনিয়ন') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                <div class="dropdown">
                                    <select name="stand_id" id="stand">
                                        <option value="">{{ __('স্ট্যান্ড') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
                                <div class="dropdown">
                                    <select name="vehicle_id" id="vehicle">
                                        <option value="">{{ __('গাড়ি') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="submit">
                                <button class="btn btn-outline-success mt-3 mb-5" type="submit">{{ __('ক্লিক করুন') }}</button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="mt-5 d-lg-block d-md-none d-sm-block community_advisement">
                        <div class="advisement">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-lg-block d-md-none d-sm-none community_advisement">
                        <div class="advisement">
                            <div class="add_image">
                                <a href="#">
                                    <img class="" src="{{ asset('forntend/images/add_banner.jpg') }}" alt="add banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-lg-block d-md-none d-sm-none community_advisement">
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
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-12 col-lg-12 pb-5">
                            <div class="content_nav">
                                <div class="nav1">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="{{ route('f.home.standIntro', $stand->id) }}">{{ __('স্ট্যান্ডের পরিচিতি') }}</a></li>
                                        <li><a href="{{ route('f.home.stand', $stand->id) }}">{{ __('মানচিত্রে স্ট্যান্ড') }}</a></li>
                                        <li><a href="{{ route('f.home.standCommitee', $stand->id) }}"  class="active-link">{{ __('সভাপতি ও সদস্য বৃন্দ তালিকা') }}</a></li>
                                        <li><a href="{{ route('f.cng.owner') }}">{{ __('সি এন জি মালিক এর তালিকা') }}</a></li>
                                    </ul>
                                </div>
                                <div class="nav2 pt-4">
                                    <ul class="d-flex flex-md-row flex-column gap-3 p-0 m-0 list-unstyled">
                                        <li><a href="{{ route('f.cng.driver') }}">{{ __('সি এন জি ড্রাইভার এর তালিকা') }}</a></li>
                                        <li><a href="{{ route('f.cng.notice') }}">{{ __('স্ট্যান্ড এর বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                     </div>
                      
                    <div class="row d-flex justify-content-between">
                        @foreach ($stand->commitees as $key=>$commitee)
                        <div class="col-md-6 col-12 pb-5">
                            <div class="profile-card">
                                <img src="{{ asset('forntend/images/Rectangle 3845.png') }}" alt="Profile Image" class="profile-image mb-3">
                                <div class="badge">{{ $commitee->designation }}</div>
                                <div class="profile-details">
                                    <h3>{{ $commitee->name }}</h3>
                                    <p>{{ $commitee->email }}</p>
                                    <p>{{ $commitee->phone }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deatils section start -->
@endsection