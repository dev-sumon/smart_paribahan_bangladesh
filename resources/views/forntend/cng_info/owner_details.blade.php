@extends('forntend.layouts.master')
@section('title', 'Owner Details')
@section('content')
        <!-- president and members section start-->
        <section class="president_and_members pt-5 pb-4">
            <div class="container">
                <div class="stand_location">
                    {{-- <h5>সিলেট  বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</h5> --}}
                    <h5>{{ $owner->division->division }} - {{ $owner->district->district }} - {{ $owner->thana->thana }} - {{ $owner->union->union }}</h5>
                </div>
                <div class="member_list_title">
                    <h2>{{ $owner->vehicle->name }} {{ __('মালিক এর বিস্তারিত') }}</h2>
                </div>
            </div>
        </section>
        <!-- president and members section end-->
            
        <!-- CNG Owner profile section start -->
        <div class="profile_section pt-5 pb-4">
          <div class="container">
              <div class="profile_deatils d-lg-flex d-md-block column-gap-5">
                  <div class="profile_image text-center">
                      <img src="{{ $owner->image ? asset('storage/' . $owner->image) : asset('frontend/images/Ellipse 199.png') }}" alt="Profile Image" class="rounded-2">
                  </div>
                  <div class="profile_info">
                      <span class="owner">{{ __('আমি') }} {{ $owner->vehicle->name }} {{ __('এর মালিক') }}</span>
                      <h3>{{ $owner->name }}</h3>
                      
                      <span class="desc">
                          {{ $owner->description }}
                      </span>
                      {{-- <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                          <div class="designation">পদবি -  </div>
                          <div class="designation_name"> সহ সভাপতি</div>
                      </div> --}}
                      <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                          <div class="email">{{ __('ইমেল - ') }}</div>
                          <div class="email_address">{{ $owner->email }}</div>
                      </div>
                      <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                          <div class="phone">{{ __('মোবাইল নাম্বার - ') }}</div>
                          <div class="number">{{ $owner->phone }}</div>
                      </div>
                      <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                          <div class="car">{{ __('গাড়ির নাম্বার - ') }}</div>
                          <div class="car_number">{{ $owner->vehicle ? $owner->vehicle->vehicle_licence : 'No License Available' }}</div>
                          
                      </div>
                      <div class="deatils d-flex column-gap-3 pt-3 align-items-center">
                          <div class="blood">{{ __('ব্লাড গ্রুপ - ') }}</div>
                          <div class="blood_group">{{ $owner->blood_group->blood_group }}</div>
                      </div>
                      <div class="book_now d-none">
                          <a href="">{{ __('গাড়ি বুক করুন') }}</a>
                      </div>
                  </div>
              </div>
          </div>
       </div>
        <!-- CNG Owner profile section start -->
    
        <!-- video section start -->
        <section class="video_section">
          <div class="container text-center">
              <div class="row justify-content-center">
                  <div class="col-12 col-md-10">
                      <div class="ratio ratio-16x9">
                          <iframe 
                              src="https://www.youtube.com/embed/ekgUjyWe1Yc?si=4ZaLWPXr6q7eAX9u" 
                              title="YouTube video player" 
                              frameborder="0" 
                              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                              referrerpolicy="strict-origin-when-cross-origin" 
                              allowfullscreen>
                          </iframe>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
        <!-- video section start -->
    
        <!-- gallery section start -->
        <section class="gallery_section">
          <div class="container pt-5 pb-5">
              <div class="row">
                  <div class="d-none d-sm-flex mb-3">
                      <h3>{{ __('ইমেজ গ্যালারী - ') }}</h3>
                      <p class="ml-4">{{ $owner->district->district }} - {{ $owner->thana->thana }} - {{ $owner->union->union }} {{ $owner->vehicle->name }} স্ট্যান্ড এর</p> 
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
    
@endsection