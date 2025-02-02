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
                <p class="lead">
                  সময় কারও জন্য অপেক্ষা না করলেও আপনার জীবনের সময় বাঁচাতে স্মার্ট সল্যুশন নিয়ে আপনার পাশে আমরা আছি
                </p>
              </div>
              <div class="row g-2">
                <div class="col-4 col-md-6 col-xl-4">
                  <select class="form-select select_iteam">
                      <option>বিভাগ</option>
                      <option>ঢাকা</option>
                      <option>চট্টগ্রাম</option>
                      <option>রাজশাহী</option>
                      <option>খুলনা</option>
                      <option>বরিশাল</option>
                      <option>সিলেট</option>
                      <option>রংপুর</option>
                      <option>ময়মনসিংহ</option>
                  </select>
                </div>
                <div class="col-4 col-md-6 col-xl-4">
                    <select name="" id="" class="form-select select_iteam">
                      <option value="">জেলা</option>
                      <option value="">জেলা</option>
                      <option value="">জেলা</option>
                      <option value="">জেলা</option>
                      <option value="">জেলা</option>
                    </select>
                </div>
                <div class="col-4 col-md-6 col-xl-4">
                    <select name="" id="" class="form-select select_iteam">
                      <option value="">থানা</option>
                      <option value="">থানা</option>
                      <option value="">থানা</option>
                      <option value="">থানা</option>
                      <option value="">থানা</option>
                    </select>
                </div>
                <div class="col-4 col-md-6 col-xl-4">
                  <select name="" id="" class="form-select select_iteam">
                    <option value="">ইউনিয়ন</option>
                    <option value="">ইউনিয়ন</option>
                    <option value="">ইউনিয়ন</option>
                    <option value="">ইউনিয়ন</option>
                    <option value="">ইউনিয়ন</option>
                  </select>
                   
                </div>
                <div class="col-4 col-md-6 col-xl-4">
                    <select name="" id="" class="form-select select_iteam">
                      <option value="">স্ট্যান্ড</option>
                      <option value="">স্ট্যান্ড</option>
                      <option value="">স্ট্যান্ড</option>
                      <option value="">স্ট্যান্ড</option>
                      <option value="">স্ট্যান্ড</option>
                      <option value="">স্ট্যান্ড</option>
                    </select>
                </div>
                <div class="col-4 col-md-6 col-xl-4">
                    <select name="" id="" class="form-select select_iteam">
                      <option value="">গাড়ি</option>
                      <option value="">গাড়ি</option>
                      <option value="">গাড়ি</option>
                      <option value="">গাড়ি</option>
                      <option value="">গাড়ি</option>
                      <option value="">গাড়ি</option>
                    </select>
                </div>
                  <form action="{{ route('f.cng.index') }}">
                    <div class="col-12 submit">
                      <button class="btn btn-custom mt-3 w-100">এখানে সার্চ করুন</button>
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
            <!-- Each card now occupies 4 columns on medium and larger screens, 6 columns on small screens -->
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="{{ route('f.cng.index') }}">
                    <img src="{{ asset('forntend/images/Group (6).svg') }}" alt="সি এন জি">
                    <p>সি এন জি</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="hiace.html">
                    <img src="{{ asset('forntend/images/Group (7).svg') }}" alt="হায়েস">
                    <p>হায়েস</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="car.html">
                    <img src="{{ asset('forntend/images/Group (2).svg') }}" alt="কার">
                    <p>কার</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="micro.html">
                    <img src="{{ asset('forntend/images/Group (3).svg') }}" alt="মাইক্রো">
                    <p>মাইক্রো</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="bike.html">
                    <img src="{{ asset('forntend/images/Group (4).svg') }}" alt="বাইক">
                    <p>বাইক</p>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
              <div class="card p-3 text-center">
                <div class="details">
                  <a href="#">
                    <img src="{{ asset('forntend/images/Group (5).svg') }}" alt="পার্সেল">
                    <p>পার্সেল</p>
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
                <h2 class="section-title mb-5">আমাদের সাথে যুক্ত আছেন</h2>
                <!-- Card 1 -->
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="train" src="{{ asset('forntend/images/train.svg') }}" alt="Train Icon">
                        </div>
                        <p class="card-text">সর্বমোট গাড়ির স্টেশন</p>
                        <p class="price" data-original="78090">0</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="car" src="{{ asset('forntend/images/CAR 02 1.svg') }}" alt="Car Icon">
                        </div>
                        <p class="card-text">সর্বমোট গাড়ি</p>
                        <p class="price" data-original="90090">0</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="man" src="{{ asset('forntend/images/MAN 01 1.svg') }}" alt="Man Icon">
                        </div>
                        <p class="card-text">সর্বমোট গাড়ির মালিক</p>
                        <p class="price" data-original="78090">0</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-12 col-md-6 col-lg-3 mb-5 d-flex justify-content-center">
                    <div class="custom-card">
                        <div class="icon-container">
                            <img class="driver" src="{{ asset('forntend/images/DRIVER 1.svg') }}" alt="Driver Icon">
                        </div>
                        <p class="card-text">সর্বমোট অভিজ্ঞ ড্রাইভার</p>
                        <p class="price" data-original="78090">0</p>
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
                <h2>সরাসরি গাড়ি অথবা <span class="d-none d-md-inline"><br></span> ড্রাইভার কে খুঁজুন</h2>
              </div>
            </div>
            <div class="col-12 col-md-5">
              <form class="d-flex" role="search">
                <input class="form-control me-2 search" type="search" placeholder="গাড়ির অথবা ড্রাইভার নাম্বার" aria-label="Search">
              </form>
            </div>
            <div class="col-12 justify-content-sm-center col-md-3 d-flex justify-content-end form">
              <form class="d-flex align-items-end" role="search">
                <a href="error.html" class="btn btn-outline-success" type="submit">ক্লিক করুন</a>
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
              <h2>আমরা কিভাবে আপনাকে সহয়ায়তা করি</h2>
            </div>
            <div class="desc">
              <p>
                যেকোনো যাত্রী প্রয়োজনের সময় তার নিকটবর্তী স্টেশনে গাড়ির জন্য সিগন্যাল পাঠাতে <span class="d-none d-md-inline"><br></span> পারবেন।ফলে কাউকে ঘণ্টার পর ঘণ্টা গাড়ির জন্য অপেক্ষা করতে হবে না। 
              </p>
            </div>
          </div>
          <div class="car-container">
              <img src="{{ asset('forntend/images/Group 2.png') }}" alt="Car and Phone" class="car-image">
  
              <div class="feature-box feature-box-1">
                  <span class="icon-circle-1">1</span>
                  <p class="feature-text">আপনার কোনো কিছু গাড়িতে হারিয়ে গেলে আপনি এটা খুব সহজে খুঁজে বের করতে পারবেন।</p>
              </div>
      
              <div class="feature-box feature-box-2">
                  <span class="icon-circle-2">2</span>
                  <p class="feature-text">যাত্রীরা নিরাপদেও স্মার্ট প্রযুক্তির মাধ্যমে চলাচল করতে পারবে।</p>
              </div>
      
              <div class="feature-box feature-box-3">
                  <span class="icon-circle-3">3</span>
                  <p class="feature-text">যাত্রী যদি চায় তাহলে ড্রাইভারকে অনলাইনে পেমেন্ট করতে পারে যেমন বিকাশ, রকেট, নগদ অনলাইন সিস্টেমের মাধ্যমে।</p>
              </div>
      
              <div class="feature-box feature-box-4">
                  <span class="icon-circle-4">4</span>
                  <p class="feature-text">যাত্রীদের কোনো কিছু যদি গাড়ির মধ্যে ফেলে যায়। তাহলে ড্রাইভার হারানো বিজ্ঞপ্তি দিতে পারবে।</p>
              </div>
      
              <div class="feature-box feature-box-5">
                  <span class="icon-circle-5">5</span>
                  <p class="feature-text">প্রত্যেকটি গাড়ির মধ্যে QRকোড থাকবে।</p>
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
            <h2 class="heading_section">বাংলাদেশ স্মার্ট পরিবহন ব্লগ থেকে </h2>
            <p class="sub_text">সকল বিবৃতি, আপডেট, রিলিজ ও অন্যান্য</p>
          </div>
          <!-- Blog Post 1 -->
          <div class="col-md-12 col-lg-4 mb-4 pb-4">
            <div class="post_card pb-4">
              <img src="{{ asset('forntend/images/smart_car.png') }}" alt="Blog 1" class="post_image">
              <div class="post_content">
                <h4 class="post_title">স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h4>
                <p class="post_date"><i class="fa-regular fa-calendar mr-1" style="color: red;"></i>  জুন ৬, ২০২৪</p>
                <p class="post_description">সমৃদ্ধ বাংলাদেশ গড়ে তুলতে সবার আগে প্রয়োজন আধুনিক যোগাযোগ ব্যবস্থা। সেটা হোক সড়ক, রেলপথ, নৌপথ ও তথ্যপ্রযুক্তি ব্যবস্থা।</p>
              </div>
            </div>
          </div>
          <!-- Blog Post 2 -->
          <div class="col-md-12 col-lg-4 mb-4">
            <div class="post_card">
              <img src="{{ asset('forntend/images/Location tracking-pana 1.png') }}" alt="Blog 2" class="post_image">
              <div class="post_content">
                <h4 class="post_title">স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h4>
                <p class="post_date"><i class="fa-regular fa-calendar mr-1" style="color: red;"></i> জুন ৬, ২০২৪</p>
                <p class="post_description">সমৃদ্ধ বাংলাদেশ গড়ে তুলতে সবার আগে প্রয়োজন আধুনিক যোগাযোগ ব্যবস্থা। সেটা হোক সড়ক, রেলপথ, নৌপথ ও তথ্যপ্রযুক্তি ব্যবস্থা।</p>
              </div>
            </div>
          </div>
          <!-- Blog Post 3 -->
          <div class="col-md-12 col-lg-4 mb-4">
            <div class="post_card">
              <img src="{{ asset('forntend/images/squti_Take Away-pana 1.png') }}" alt="Blog 3" class="post_image">
              <div class="post_content">
                <h4 class="post_title">স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h4>
                <p class="post_date"><i class="fa-regular fa-calendar mr-1" style="color: red;"></i>  জুন ৬, ২০২৪</p>
                <p class="post_description">সমৃদ্ধ বাংলাদেশ গড়ে তুলতে সবার আগে প্রয়োজন আধুনিক যোগাযোগ ব্যবস্থা। সেটা হোক সড়ক, রেলপথ, নৌপথ ও তথ্যপ্রযুক্তি ব্যবস্থা।</p>
              </div>
            </div>
          </div>
          <div class="btn_section">
            <a href="{{ route('f.blog.index') }}" class="gradient-border-button">
              <span>সব গুলো ব্লগ</span>
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
              <div class="faq-title  py-5 pb-5">সচরাচর আপনার প্রশ্ন সমূহ</div>
          
              <div class="faq-item">
                  <div class="faq-question">বাংলাদেশ স্মার্ট পরিবহন কি কাজ করে?</div>
                  <div class="faq-answer">
                    যদি আপনার কোনো জিনিস গাড়িতে হারিয়ে যায়, তবে বাংলাদেশ স্মার্ট পরিবহনের মাধ্যমে তা সহজেই খুঁজে পাওয়া সম্ভব। সার্চ অপশনে গাড়ির নম্বর বা ফোন নম্বর দিয়ে সার্চ করলে আপনি সরাসরি ড্রাইভারের সাথে যোগাযোগ করতে পারবেন এবং প্রয়োজনীয় তথ্য পেয়ে হারানো জিনিসটি পুনরুদ্ধার করতে পারবেন।
                  </div>
              </div>
          
              <div class="faq-item">
                  <div class="faq-question">বাংলাদেশ স্মার্ট পরিবহন কেন প্রয়োজন?</div>
                  <div class="faq-answer">
                    বাংলাদেশ স্মার্ট পরিবহন মানুষের সেবায় কাজ করছে। এটি যাত্রীদের নিরাপদ, স্মার্ট, ও প্রযুক্তি-নির্ভর যাত্রা নিশ্চিত করে।
                  </div>
              </div>
          
              <div class="faq-item">
                  <div class="faq-question">বাংলাদেশ স্মার্ট পরিবহনের লক্ষ্য কি?</div>
                  <div class="faq-answer">
                    বাংলাদেশ স্মার্ট পরিবহন ডিজিটাল প্রযুক্তির ব্যবহার করে স্মার্ট ও নিরাপদ যাতায়াত নিশ্চিত করার লক্ষ্যে কাজ করছে, যাতে যাত্রীরা আরো সহজ ও নিরাপদে গন্তব্যে পৌঁছাতে পারেন।
                  </div>
              </div>
              <div class="faq-item">
                  <div class="faq-question">বাংলাদেশ স্মার্ট পরিবহন কিভাবে আমাদেরকে সাহায্য করে?</div>
                  <div class="faq-answer">
                    বাংলাদেশ স্মার্ট পরিবহন বিভিন্ন উপায়ে সহায়তা করে। উদাহরণস্বরূপ, যদি কোনো যাত্রী কোনো ড্রাইভার সম্পর্কে সন্দেহ করেন, তবে গাড়ির ভিতরে থাকা স্ক্যান কোড ব্যবহার করে ড্রাইভারের পরিচয় যাচাই করা যাবে। স্ক্যান করলে ড্রাইভারের ছবি ও বিস্তারিত তথ্য পাওয়া যাবে, যা যাত্রাকে আরো নিরাপদ ও নিশ্চিন্ত করবে।
                  </div>
              </div>
              <div class="faq-item">
                  <div class="faq-question">স্মার্ট বাংলাদেশ গাড়ির প্রধান সুবিধা কী?</div>
                  <div class="faq-answer">
                    স্মার্ট বাংলাদেশ গাড়ির মাধ্যমে যাত্রীরা খুব সহজে এবং নিরাপদে গন্তব্যে পৌঁছাতে পারবেন। আমাদের ড্রাইভারগণ অভিজ্ঞ এবং নির্ভরযোগ্য, যা যাত্রার সময় নিরাপত্তা নিশ্চিত করে।
                  </div>
              </div>
              <div class="faq-item">
                  <div class="faq-question">স্মার্ট বাংলাদেশ গাড়ির চালকরা কি প্রশিক্ষিত?</div>
                  <div class="faq-answer">
                    হ্যাঁ, আমাদের সব চালককে প্রশিক্ষণ প্রদান করা হয়েছে এবং তারা পরিবহন নীতিমালা সম্পর্কে সচেতন। নিরাপত্তা এবং সেবার মান বজায় রাখতে আমাদের চালকদের সবসময় পর্যবেক্ষণে রাখা হয়।
                  </div>
              </div>
              <div class="faq-item">
                  <div class="faq-question">আমি কি যাত্রার সময় কিছু হারিয়ে গেলে খুঁজে পাব?</div>
                  <div class="faq-answer">
                    হ্যাঁ, স্মার্ট বাংলাদেশে আপনি হারানো জিনিসপত্র খুঁজে পাওয়ার জন্য একটি বিশেষ সাপোর্ট সিস্টেম পাবেন। যাত্রার পরে, আপনি আমাদের কাস্টমার সাপোর্টে যোগাযোগ করে সাহায্য নিতে পারেন। 
                  </div>
              </div>
              <div class="faq-item last-faq">
                  <div class="faq-question">স্মার্ট বাংলাদেশ গাড়ির পেমেন্ট পদ্ধতি কী কী?</div>
                  <div class="faq-answer">
                    আপনি ক্যাশ, মোবাইল ব্যাংকিং, অথবা কার্ড ব্যবহার করে ভাড়া পরিশোধ করতে পারেন।
                  </div>
              </div>
          
            </div>
          </div>
      </div>
    </section>
    
    <!-- EAQ section end  -->
@endsection