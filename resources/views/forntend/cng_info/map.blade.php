@extends('forntend.layouts.master', ['page_slug'=>'map'])
@section('title', 'Stand Map')
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
                        <h2>{{ __('Stand on Map') }}</h2>
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

    <!-- dealist section design start -->
    <section class="dealist">
        <div class="container">
            <div class="row d-flex align-content-center">
                <div class="col-sm-12 col-lg-4 d-flex flex-column align-items-center text-center cng_owner_location_item">
                    <div class="row g-4">
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
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="row d-flex justify-content-between">
                        <div class="col-md-12 col-lg-12 pb-5">
                            @include('forntend.cng_info.partials.inner_menu')
                        </div>
                        <div class="content_text">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('Map') }}  -</h2>
                                    </div>
                                </div>
                                <div class="col-md-8 col-12">
                                    <div class="normal_content text-start">
                                        <p>{{ $stand->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="map">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="{{ $stand->location }}" width="780" height="440"  style="border-radius:10px; allowfullscreen=" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    {{-- width="780" height="440" style="border:0;" allowfullscreen="" loading="lazy" --}}
                                </div>
                            </div>
                        </div>
                        <div class="content_text mt-5">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="bold_content text-start">
                                        <h2>{{ __('Stand Name') }}  -</h2>
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
                                        <h2>{{ __('Naming') }}  -</h2>
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
                                        <h2>{{ __('Location') }}  -</h2>
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
                                        <h2>{{__('Location') }}  -</h2>
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
                                        <h2>{{ __('Location') }}  -</h2>
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
                                        <h2>{{ __('Location') }}  -</h2>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- dealist section design start -->


    <!-- gallery section start -->
    {{-- <section class="gallery_section">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="d-none d-sm-flex mb-3">
                    <h3>{{ __('Image Gallery') }} -  </h3> 
                    <h3> {{ $stand->division->division }} - {{ $stand->district->district }} - {{ $stand->thana->thana }} - {{ $stand->union->union }} - {{ __("Stand's") }}</h3>
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
    </section> --}}
    <section class="gallery_section">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="d-none d-sm-flex mb-3">
                    <h3>{{ __('Image Gallery') }} -</h3> 
                    <h3>{{ $stand->division->division }} - {{ $stand->district->district }} - {{ $stand->thana->thana }} - {{ $stand->union->union }} - {{ __("Stand's") }}</h3>
                </div>
    
                <div class="row gallery_image g-3">
                    @foreach(json_decode($stand->image, true) as $img)
                        <div class="col-6 col-md-4">
                            <div class="">
                                <img src="{{ asset('storage/' . $img) }}" alt="gallery_image" class="img-fluid">
                            </div>
                        </div>
                    @endforeach
                </div>
    
            </div>
        </div>
    </section>
    
    <!-- gallery section end -->
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