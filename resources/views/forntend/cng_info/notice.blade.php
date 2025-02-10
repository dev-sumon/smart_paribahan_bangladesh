@extends('forntend.layouts.master')
@section('title', 'CNGnotice')
@section('content')
     <!-- president and members section start-->
     <section class="president_and_members pt-5 pb-4">
        <div class="container">
            <div class="stand_location">
                <h5>সিলেট  বিভাগ - মৌলভীবাজার জেলা - বড়লেখা থানা -নিজবাহাদুরপুর ইউনিয়ন</h5>
            </div>
            <div class="member_list_title">
                <h2>সি এন জি স্ট্যান্ড এর বার্ষিক বাজেট <br>
                     উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী </h2>
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

    <section class="notice_bord_section pt-5 pb-5">
      <div class="container">
        <div class="head">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title">
                <h3 class="text-center text-lg-start">বার্ষিক বাজেট উন্নয়ন পরিকল্পনা ও আর্থিক বিবরণী</h3>
              </div>
              <div class="select_option row g-2 mt-3">
                <div class="year col-12 col-md-6">
                  <select name="" id="" class="form-select">
                    <option value="">২০২১-২০২২</option>
                    <option value="">২০২১-২০২২</option>
                    <option value="">২০২১-২০২২</option>
                  </select>
                </div>
                <div class="notice_type col-12 col-md-6">
                  <select name="" id="" class="form-select">
                    <option value="">উন্নয়ন পলিকল্পনা</option>
                    <option value="">উন্নয়ন পলিকল্পনা</option>
                    <option value="">উন্নয়ন পলিকল্পনা</option>
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
                  <th>সিরিয়াল নাম্বার</th>
                  <th>শিরোনাম</th>
                  <th>বছর</th>
                  <th>শ্রেণী</th>
                  <th>ফাইল</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>
                  <td>১</td>
                  <td>বার্ষিক বাজেট উন্নয়ন পরিকল্পনা</td>
                  <td>২০২১-২০২২</td>
                  <td>বাজেট</td>
                  <td>
                    <a href="AFS_00_E.pdf" target="_blank">
                      <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>২</td>
                  <td>বার্ষিক বাজেট উন্নয়ন পরিকল্পনা</td>
                  <td>২০২১-২০২২</td>
                  <td>বাজেট</td>
                  <td>
                    <a href="AFS_00_E.pdf" target="_blank">
                      <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>৩</td>
                  <td>বার্ষিক বাজেট উন্নয়ন পরিকল্পনা</td>
                  <td>২০২১-২০২২</td>
                  <td>বাজেট</td>
                  <td>
                    <a href="AFS_00_E.pdf" target="_blank">
                      <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>৪</td>
                  <td>বার্ষিক বাজেট উন্নয়ন পরিকল্পনা</td>
                  <td>২০২১-২০২২</td>
                  <td>বাজেট</td>
                  <td>
                    <a href="AFS_00_E.pdf" target="_blank">
                      <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>৫</td>
                  <td>বার্ষিক বাজেট উন্নয়ন পরিকল্পনা</td>
                  <td>২০২১-২০২২</td>
                  <td>বাজেট</td>
                  <td>
                    <a href="AFS_00_E.pdf" target="_blank">
                      <img src="{{ asset('forntend/images/Group.png') }}" alt="PDF Icon" style="width: 24px;">
                    </a>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
@endsection