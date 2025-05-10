@extends('forntend.layouts.master', ['page_slug'=>'commitee'])
@section('title', 'Stand Commitee')
@section('content')
     <!-- president and members section start-->
     <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                <h5>{{ $stand->division->division }} - {{ $stand->district->district }} - {{ $stand->thana->thana }} - {{ $stand->union->union }}</h5>
            </div>
            <div class="member_list_title">
                <h2>{{ $stand->name }} {{ __('Station President') }} <br class="d-none d-sm-inline">
                {{ __('and Members List') }}</h2>
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
                    <div class="all_notice_button text-end">
                        <a href="{{ route('f.home.standNotice', $stand->id) }}" class="gradient-border-button">
                            <span>{{ __('All') }}</span>
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
                    @include('forntend.cng_info.partials.search_bar')
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
                            @include('forntend.cng_info.partials.inner_menu')
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
                            $('#vehicle').append('<option value="' + value.id + '">' + value.name + '</option>');
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