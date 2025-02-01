@extends('forntend.layouts.master')
@section('title', 'ContactUs')
@section('content')
     <!-- contact deatils section design strat -->
     <section class="contact_deatils pt-5 py-5">
        <div class="container">
          <div class="row">
            <div class="details d-flex column-gap-2 column_reverse">
              <div class="conatact_info col-lg-6">
                <h3>যোগাযোগ করুন</h3>
                <p>
                  আপনার যেকোনো প্রশ্ন বা পরামর্শের জন্য আমাদের সাথে সরাসরি যোগাযোগ
                  করতে পারেন। আমরা আপনাকে সেরা সেবা দেওয়ার জন্য সবসময় প্রস্তুত। 
                  নির্দিষ্ট প্রয়োজনের জন্য আমাদের হটলাইন নম্বরে ফোন করুন অথবা 
                  ইমেইলের মাধ্যমে আপনার বার্তা পাঠান।
                </p>
              </div>
              <div class="map order-lg-2 col-lg-6">
                <img src="{{ asset('forntend/images/Group 66.png') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- contact deatils section design end -->
  
      <!-- contact section design start -->
       <section class="contact pt-5 py-5">
          <div class="container">
              <div class="row g-5">
                  <div class="col-lg-4 col-sm-12">
                      <h4>অফিসের ঠিকানা</h4>
                    
                      <a href="https://www.google.com/maps/search/?api=1&query=Section+11,+Block+A+(Main+road),+Plot+5+(beside+shopno+super+shop),+Pallabi,+Dhaka+1221" target="_blank">
                          Section -11, Block -A ( Main road), Plot-5 (beside shopno super shop), Pallabi, Dhaka-1221
                      </a>                    
                  </div>
                  <div class="col-lg-4 col-sm-12">
                      <h4>ফোন নাম্বার</h4>
                      <a href="tel:+880 1308282653">+880 1308282653</a>
                      <a href="tel:+880 1308282688">+880 1308282688</a>
                  </div>
                  <div class="col-lg-4 col-sm-12">
                      <h4>ই-মেইল</h4>
                      <a href="mailto:bangladeshsmartparibahan@gmail.com">bangladeshsmartparibahan@gmail.com</a>
                  </div>
              </div>
          </div>
       </section>
      <!-- contact section design end -->
  
      <!-- conact form section design start -->
      <section class="form-container-section pt-5 pb-5">
          <div class="container">
              <h5 class="mb-4">আপনাদের জিজ্ঞাসা ইনবক্স করুন</h5>
              <form>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="আপনার নাম">
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <input type="email" class="form-control" placeholder="আপনার ইমেইল">
                      </div>
                      <div class="form-group col-md-6">
                          <input type="text" class="form-control" placeholder="আপনার ফোন নাম্বার">
                      </div>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="আপনার বিষয়">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" rows="4" placeholder="বিস্তারিত লিখুন"></textarea>
                  </div>
                  <button type="submit" class="btn btn-submit btn-sm">সাবমিট</button>
              </form>
          </div>
      </section>
      <!-- conact form section design end -->
@endsection