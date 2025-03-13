@extends('forntend.layouts.master')

@section('title', 'Homapage')

@section('content')
       <!-- hero section end -->
       <section class="hero">
        <div class="container">
          <div class="row d-flex align-items-center column_reverse">
            <div class="col-12 mb-5 col-md-5">
              <div class="title">
                <h3>{{ __('আপনার নিরাপদ যাত্রার') }}</h3>
                <h2>{{ __('স্মার্ট সলিউশন') }}</h2>
                <p class="lead">{{ __('সময় কারও জন্য অপেক্ষা না করলেও আপনার জীবনের সময় বাঁচাতে স্মার্ট সল্যুশন নিয়ে আপনার পাশে আমরা আছি') }}</p>
              </div>
              <div class="row g-2">
                <form action="{{ route('f.home.search') }}" method="post" >
                  @csrf

                  <div class="row">
                    <div class="form-group col-4">
                      <select name="division_id" id="division" class="form-select select_iteam">
                        <option value="">{{ __('বিভাগ') }}</option>
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}">{{ $division->division }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('division_id'))
                        <div class="text-danger">{{ $errors->first('division_id') }}</div>
                      @endif
                    </div>

                    <div class="form-group col-4">
                      <select name="district_id" id="district" class="form-select select_iteam">
                        <option value="">{{ __('জেলা') }}</option>
                      </select>
                    </div>

                    <div class="form-group col-4">
                      <select name="thana_id" id="thana" class="form-select select_iteam">
                        <option value="">{{ __('থানা') }}</option>
                      </select>
                    </div>

                    <div class="form-group col-4">
                      <select name="union_id" id="union" class="form-select select_iteam">
                        <option value="">{{ __('ইউনিয়ন') }}</option>
                      </select>
                    </div>

                    <div class="form-group col-4">
                      <select name="stand_id" id="stand" class="form-select select_iteam">
                        <option value="">{{ __('স্ট্যান্ড') }}</option>
                      </select>
                    </div>

                    <div class="form-group col-4">
                      <select name="vehicle_type_id" id="vehicle_type" class="form-select select_iteam">
                        <option value="">{{ __('গাড়ি') }}</option>
                      </select>
                    </div>

                    <div class="submit col-12">
                      <button class="btn btn-custom mt-3 w-100">{{ __('এখানে সার্চ করুন') }}</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-md-7 mb-5 text-center">
              <div class="hero_image">
                <img src="{{ asset('forntend/images/Order ride-amico.png') }}" alt="">
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- hero section end -->

      <!-- vehicles_list section start -->

      <section class="vehicles_list">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="{{ route('f.cng.index') }}">
                    <img src="{{ asset('forntend/images/Group (6).svg') }}" alt="সি এন জি">
                    <p>{{ __('সি এন জি') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="hiace.html">
                    <img src="{{ asset('forntend/images/Group (7).svg') }}" alt="হায়েস">
                    <p>{{ __('হায়েস') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="car.html">
                    <img src="{{ asset('forntend/images/Group (2).svg') }}" alt="কার">
                    <p>{{ __('কার') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="micro.html">
                    <img src="{{ asset('forntend/images/Group (3).svg') }}" alt="মাইক্রো">
                    <p>{{ __('মাইক্রো') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="bike.html">
                    <img src="{{ asset('forntend/images/Group (4).svg') }}" alt="বাইক">
                    <p>{{ __('বাইক') }}</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="#">
                    <img src="{{ asset('forntend/images/Group (5).svg') }}" alt="পার্সেল">
                    <p>{{ __('পার্সেল') }}</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- vehicles_list section end -->

      <!-- Connected with us section Start -->
      <section class="connected_us" id="price-section">
        <div class="container py-5 pb-5">
            <div class="row g-2">
                <h2 class="section-title mb-5">{{ __('আমাদের সাথে যুক্ত আছেন') }}</h2>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="train" src="{{ asset('forntend/images/train.svg') }}" alt="Train Icon">
                        </div>
                        <p class="card-text">{{ __('সর্বমোট গাড়ির স্টেশন') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="car" src="{{ asset('forntend/images/CAR 02 1.svg') }}" alt="Car Icon">
                        </div>
                        <p class="card-text">{{ __('সর্বমোট গাড়ি') }}</p>
                        <p class="price" data-original="90090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="man" src="{{ asset('forntend/images/MAN 01 1.svg') }}" alt="Man Icon">
                        </div>
                        <p class="card-text">{{ __('সর্বমোট গাড়ির মালিক') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="driver" src="{{ asset('forntend/images/DRIVER 1.svg') }}" alt="Driver Icon">
                        </div>
                        <p class="card-text">{{ __('সর্বমোট অভিজ্ঞ ড্রাইভার') }}</p>
                        <p class="price" data-original="78090">{{ __('0') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- Connected with us section End! -->

      <!-- search driver section start  -->
      <section class="search_section">
        <div class="image">
          <img src="{{ asset('forntend/images/Group 39894.svg') }}" alt="">
        </div>
        <div class="container">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-4 d-flex align-items-center justify-content-sm-center">
              <div class="text">
                <h2>{{ __('সরাসরি গাড়ি অথবা') }}<span class="d-none d-md-inline"><br></span>{{ __('ড্রাইভার কে খুঁজুন') }}</h2>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <form class="d-flex" role="search">
                <input class="form-control me-2 search" type="search" placeholder="গাড়ির অথবা ড্রাইভার নাম্বার" aria-label="Search">
              </form>
            </div>
            <div class="col-12 justify-content-sm-center col-md-3 d-flex justify-content-end form">
              <form class="d-flex align-items-end" role="search">
                <a href="error.html" class="btn btn-outline-success" type="submit">{{ __('ক্লিক করুন') }}</a>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- search driver section end  -->

      <!-- help_us section start  -->
      <section class="help_us">
        <div class="container">
         <div class="row">
          <div class="help_us_headr text-center">
            <div class="title">
              <h2>{{ __('আমরা কিভাবে আপনাকে সহয়ায়তা করি') }}</h2>
            </div>
            <div class="desc">
              <p>{{ __('যেকোনো যাত্রী প্রয়োজনের সময় তার নিকটবর্তী স্টেশনে গাড়ির জন্য সিগন্যাল পাঠাতে') }}<span class="d-none d-md-inline"><br></span>{{ __('পারবেন।ফলে কাউকে ঘণ্টার পর ঘণ্টা গাড়ির জন্য অপেক্ষা করতে হবে না।') }}</p>
            </div>
          </div>
          <div class="car-container">
              <img src="{{ asset('forntend/images/Group 2.png') }}" alt="Car and Phone" class="car-image">

              <div class="feature-box feature-box-1">
                  <span class="icon-circle-1">{{ __('1') }}</span>
                  <p class="feature-text">{{ __('আপনার কোনো কিছু গাড়িতে হারিয়ে গেলে আপনি এটা খুব সহজে খুঁজে বের করতে পারবেন।') }}</p>
              </div>

              <div class="feature-box feature-box-2">
                  <span class="icon-circle-2">{{ __('2') }}</span>
                  <p class="feature-text">{{ __('যাত্রীরা নিরাপদেও স্মার্ট প্রযুক্তির মাধ্যমে চলাচল করতে পারবে।') }}</p>
              </div>

              <div class="feature-box feature-box-3">
                  <span class="icon-circle-3">{{ __('3') }}</span>
                  <p class="feature-text">{{ __('যাত্রী যদি চায় তাহলে ড্রাইভারকে অনলাইনে পেমেন্ট করতে পারে যেমন বিকাশ, রকেট, নগদ অনলাইন সিস্টেমের মাধ্যমে।') }}</p>
              </div>

              <div class="feature-box feature-box-4">
                  <span class="icon-circle-4">{{ __('4') }}</span>
                  <p class="feature-text">{{ __('যাত্রীদের কোনো কিছু যদি গাড়ির মধ্যে ফেলে যায়। তাহলে ড্রাইভার হারানো বিজ্ঞপ্তি দিতে পারবে।') }}</p>
              </div>

              <div class="feature-box feature-box-5">
                  <span class="icon-circle-5">{{ __('5') }}</span>
                  <p class="feature-text">{{ __('প্রত্যেকটি গাড়ির মধ্যে QRকোড থাকবে।') }}</p>
              </div>
          </div>
         </div>
      </div>
    </section>
    <!-- help_us section end  -->

    <!-- BD Smart vehicles Blog section Start -->
    <section class="bd_smart_vehicle_part">
      <div class="container pt-5 pb-5">
        <div class="row d-flex align-items-stretch">
          <div class="head-text">
            <h2 class="heading_section">{{ __('বাংলাদেশ স্মার্ট পরিবহন ব্লগ থেকে') }}</h2>
            <p class="sub_text">{{ __('সকল বিবৃতি, আপডেট, রিলিজ ও অন্যান্য') }}</p>
          </div>
          @foreach ($blogs as $blog)
          <div class="col-md-12 col-lg-4 mb-4 pb-4">
            <div class="post_card pb-4">
              <img src="{{ asset('storage/'. $blog->image) }}" class="card-img-top" alt="Card Image">
              <div class="post_content">
                <h4 class="post_title"><a href="{{ route('f.blog.inner_blog', $blog->id) }}" style="color: #141F39">{{ Str::limit($blog->title, 40, '...') }}</a></h4>
                <p class="post_date"><i class="fa-regular fa-calendar mr-1" style="color: red;"></i>{{ $blog->created_at->format('d M, Y') }}</p>
                <p class="post_description">{!! Str::limit(strip_tags($blog->description), 250, '...') !!}</p>
              </div>
            </div>
          </div>
          @endforeach
          <div class="btn_section">
            <a href="{{ route('f.blog.index') }}" class="gradient-border-button">
              <span>{{ __('সব গুলো ব্লগ') }}</span>
              <i class="fa-solid fa-arrow-right arrow"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- BD Smart vehicles Blog section End! -->

    <!-- FAQ section start  -->
    <section class="faq pb-5" id="faq">
      <div class="container d-flex justify-content-center">
          <div class="row w-100">
            <div class="faq-section">
              <div class="faq-title  py-5 pb-5">{{ __('সচরাচর আপনার প্রশ্ন সমূহ') }}</div>

              @foreach ($faqs as $faq)
                <div class="faq-item">
                  <div class="faq-question">{{ $faq->question }}</div>
                  <div class="faq-answer">
                    {{ $faq->answer }}
                  </div>
                </div>
              @endforeach

            </div>
          </div>
      </div>
    </section>

    <!-- EAQ section end  -->
@endsection

@push('script')
  <script>
      $(document).ready(function () {
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
          $('#stand').change(function() {
            var standId = $(this).val();
            if(standId) {
                $.ajax({
                    url: '/home/get-vehicles/' + standId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#vehicle_type').empty();
                        $('#vehicle_type').append('<option value="">গাড়ি</option>');
                        $.each(data, function(key, vehicleType) {
                            $('#vehicle_type').append('<option value="'+ vehicleType.id +'">'+ vehicleType.name +'</option>');
                        });
                        $('#vehicle_type').prop('disabled', false);
                    }
                });
            } else {
                $('#vehicle_type').empty();
                $('#vehicle_type').append('<option value="">গাড়ি</option>');
                $('#vehicle_type').prop('disabled', true);
            }
        });

      });
  </script>
@endpush
