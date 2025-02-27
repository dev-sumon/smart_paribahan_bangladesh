@extends('forntend.layouts.master')
@section('title', $division_notice->division->division)
@section('content')
     <!-- president and members section start-->
     <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                {{-- <h5>সিলেট  বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</h5> --}}
                <h5>{{ $division_notice->division->division }}</h5>
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
                        <h5>{{ __('নোটিশ বোর্ড') }}</h5>
                    </div>
                      @foreach ($division_notice->notices->take(4) as $key=>$notice)
                          <div class="notice_list d-flex align-items-center">
                              <div class="icon-button">
                                  <i class="fa-solid fa-chevron-right"></i>
                              </div>
                              <div class="notice_head_line">
                                  <p class="p-0">{{ $notice->title }}</p>
                              </div>
                          </div>
                      @endforeach
                    <div class="all_notice_button text-end">
                        <a href="#" class="gradient-border-button">
                            <span>{{ __('সকল') }}</span>
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

    <section class="notice_bord_section pt-5 pb-5">
      <div class="container">
        <div class="head">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title">
                <h3 class="text-center text-lg-start">{{ __('বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী') }}</h3>
              </div>
              <div class="select_option row g-2 mt-3">
                <div class="year col-12 col-md-6">
                  <select name="" id="" class="form-select">
                    <option value="">{{ __('তারিখ নির্বাচন করুন') }}</option>
                      @foreach ($division_notice->notices as $notice)
                          <option value="{{ $notice->id }}">{{ $notice->date }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="notice_type col-12 col-md-6">
                  <select name="" id="" class="form-select">
                    <option value="">{{ __('বিভাগ') }}</option>
                      @foreach ($division_notice->notices as $notice)
                          <option value="{{ $notice->id }}">{{ $notice->category }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="notice_board pt-5">
          <div class="table-responsive">
            <table class="table table text-center">
              <thead class="custom-header">
                <tr>
                  <th>{{ __('সিরিয়াল নাম্বার') }}</th>
                  <th>{{ __('শিরোনাম') }}</th>
                  <th>{{ __('বছর') }}</th>
                  <th>{{ __('শ্রেণী') }}</th>
                  <th>{{ __('ফাইল') }}</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($division_notice->notices as $key=>$notice)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->date }}</td>
                    <td>{{ $notice->category }}</td>
                    <td>
                      <a href="{{ $notice->file ? asset('storage/' . $notice->file) : asset('forntend/images/Group.png') }}" target="_blank">
                        <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
@endsection