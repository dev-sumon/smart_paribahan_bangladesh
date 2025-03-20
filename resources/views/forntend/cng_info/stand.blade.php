@extends('forntend.layouts.master')
@section('title', 'District')
@section('content')
    <section class="notice">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 col-lg-9">
                    <div class="title pt-2">
                        <h5>{{ __('Notice Board') }}</h5>
                    </div>
                    @foreach ($stand->notices->take(4) as $key=>$notice)
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">{{ $notice->title }}</p>
                        </div>
                    </div>
                @endforeach
                    {{-- <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">{{ __('Smart Bangladesh refers to the development of a smart citizen, smart society, smart economy, and smart government.') }}</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">{{ __('Smart Bangladesh refers to the development of a smart citizen, smart society, smart economy, and smart government.') }}</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">{{ __('Smart Bangladesh refers to the development of a smart citizen, smart society, smart economy, and smart government.') }}</p>
                        </div>
                    </div>
                    <div class="notice_list d-flex align-items-center">
                        <div class="icon-button">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                        <div class="notice_head_line">
                            <p class="p-0">{{ __('Smart Bangladesh refers to the development of a smart citizen, smart society, smart economy, and smart government.') }}</p>
                        </div>
                    </div> --}}
                    <div class="all_notice_button text-end">
                        <a href="{{ route('f.home.standNotice', $stand->id) }}" class="gradient-border-button">
                            <span>{{ __('All') }}</span>
                            <i class="fa-solid fa-arrow-right arrow"></i>
                        </a>
                    </div>
                    {{-- <div class="all_notice_button text-end">
                        <a href="notice_page.html" class="gradient-border-button">
                            <span>{{ __('সকল') }}</span>
                            <i class="fa-solid fa-arrow-right arrow"></i>
                        </a>
                    </div> --}}

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
                        @include('forntend.cng_info.partials.search_bar')
                    </div>
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
                    <div class="row ">
                        <div class="col-md-6 col-12 pb-5 iteam text-center right_side">
                            <h1 class="pt-3 text-start">{{ __('Division Information') }}</h1>
                            <div class="card">
                                <a href="">
                                    <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                    <p class="pt-3">{{ $stand->division->division }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam text-center right_side">
                            <h1 class="pt-3 text-start">{{ __('District Information') }}</h1>
                            <div class="card">
                                <a href="">
                                    <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                    <p class="pt-3">{{ $stand->district->district }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam text-center right_side">
                            <h1 class="pt-3 text-start">{{ __('Thana Introduction') }}</h1>
                            <div class="card">
                                <a href="">
                                    <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                    <p class="pt-3">{{ $stand->thana->thana }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam text-center right_side">
                            <h1 class="pt-3 text-start">{{ __('Union Introduction') }}</h1>
                            <div class="card">
                                <a href="">
                                    <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                    <p class="pt-3">{{ $stand->union->union }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam text-center right_side">
                            <h1 class="pt-3 text-start">{{ __('Stand Introduction') }}</h1>
                            <div class="card">
                                <a href="">
                                    <img src="{{ asset('forntend/images/stop 1.svg') }}" alt="">
                                    <p class="pt-3">{{ $stand->name }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.map') }}">
                                    <img src="{{ asset('forntend/images/map 1.svg') }}" alt="">
                                    <p class="pt-3">{{ __('Stand on Map') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.community') }}">
                                    <img src="{{ asset('forntend/images/team 1.svg') }}" alt="">
                                    <p class="pt-3">{{ __('CNG Station President and Members List') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.owner') }}">
                                    <img src="{{ asset('forntend/images/owner 1.svg') }}" alt="">
                                    <p class="pt-3">{{ __('CNG Owner List') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.driver') }}">
                                    <img src="{{ asset('forntend/images/driver11 1.svg') }}" alt="">
                                    <p class="pt-3">{{ __('List of CNG drivers') }}</p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 pb-5 iteam d-flex justify-content-center text-center right_side">
                            <div class="card">
                                <a href="{{ route('f.cng.notice') }}">
                                    <img src="{{ asset('forntend/images/report 1.svg') }}" alt="">
                                    <p class="pt-3">{{ __('CNG Stand Annual Budget, Development Plan, and Financial Statement') }}</p>
                                </a>
                            </div>
                        </div> --}}

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


@push('script')
  <script>
      $(document).ready(function () {
          // Fetch districts based on selected division
          $('#division').on('change', function () {
              var division_id = $(this).val();
              if (division_id) {
                  $.ajax({
                      url: '/home/get-districts/' + division_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#district').empty();
                          $('#district').append('<option value="">জেলা</option>');
                          $.each(data, function (key, value) {
                              $('#district').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#district').empty();
              }
          });

          // Fetch thanas based on selected district
          $('#district').on('change', function () {
              var district_id = $(this).val();
              if (district_id) {
                  $.ajax({
                      url: '/home/get-thanas/' + district_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#thana').empty();
                          $('#thana').append('<option value="">থানা</option>');
                          $.each(data, function (key, value) {
                              $('#thana').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#thana').empty();
              }
          });

          // Fetch unions based on selected thana
          $('#thana').on('change', function () {
              var thana_id = $(this).val();
              if (thana_id) {
                  $.ajax({
                      url: '/home/get-unions/' + thana_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#union').empty();
                          $('#union').append('<option value="">ইউনিয়ন</option>');
                          $.each(data, function (key, value) {
                              $('#union').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#union').empty();
              }
          });

          // Fetch stands based on selected union
          $('#union').on('change', function () {
              var union_id = $(this).val();
              if (union_id) {
                  $.ajax({
                      url: '/home/get-stands/' + union_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#stand').empty();
                          $('#stand').append('<option value="">স্ট্যান্ড</option>');
                          $.each(data, function (key, value) {
                              $('#stand').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#stand').empty();
              }
          });

          // Fetch vehicles based on selected stand
          $('#stand').on('change', function () {
              var stand_id = $(this).val();
              if (stand_id) {
                  $.ajax({
                      url: '/home/get-vehicles/' + stand_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#vehicle').empty();
                          $('#vehicle').append('<option value="">গাড়ি</option>');
                          $.each(data, function (key, value) {
                              $('#vehicle').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#vehicle').empty();
              }
          });
      });
  </script>
@endpush
