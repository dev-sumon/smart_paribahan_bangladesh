@extends('forntend.layouts.master')

@section('title', 'Blog')

@section('content')
        <section class="blog_hero py-5">
            <div class="container">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 col-sm-12 text-md-start text-center mb-4 mb-md-0">
                <div class="banner_head pt-3">
                    <h2>
                    বাংলাদেশ স্মার্ট 
                    <br class="d-none d-sm-inline"> 
                    পরিবহন ব্লগ
                    </h2>
                </div>
                <div class="banner_title">
                    <p>
                    সকল বিবৃতি, আপডেট, রিলিজ ও অন্যান্য
                    </p>
                </div>
                </div>
                <div class="col-md-6 col-sm-12 d-flex justify-content-lg-end justify-content-sm-center banner_image">
                <img src="{{ asset('forntend/images/3534059 1.png') }}" alt="Bangladesh Smart Transport Blog" class="img-fluid">
                </div>
            </div>
            </div>
        </section>

        <!-- blog_intro hero End!-->  

        <!-- blog_side bar start -->
        <section class="dealist">
            <div class="container">
                <div class="row d-flex align-content-center">
                    <div class="col-7">
                    <div class="row">
                        <div class="container mt-4">
                            
                        </div>
                    </div>
                    </div>
                    <div class="col-5 d-flex flex-column align-items-center text-center location_item">
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- blog_side bar End! -->

        <!-- blog_card & form Start -->
        <section class="body-body">
        <div class="container my-5">
            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="blog_card_form d-block d-sm-none">
                    <div class="sidebar shadow mt-5">
                        <div class="search-bar mb-4 ">
                            <h6 class="text-start"> এখানে অনুসন্ধান করুন </h6>
                            <hr class="blog_hr">
                            <div class="input-container">
                                <input type="text" class="form-control search-input" placeholder="অনুসন্ধান">
                                <i class="fas fa-search search-icon"></i> 
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="blog_card_form">
                    <div class="card shadow mt-5">
                        <img src="{{ asset('forntend/images/Rectangle 3867.png') }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                        <div class="card_link d-flex gap-4 align-content-center mt-3 mb-3">
                            <div class="left_link d-flex text-center">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="ml-2">অ্যাডমিন দ্বারা</h5>
                            </div>
                            <div class="right_link d-flex text-center">
                            <i class="fa-solid fa-folder-open"></i>
                            <h5 class="ml-2">বিভাগ</h5>
                            </div>
                        </div>
                        <h1>স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h1>
                        <p class="card_text mt-4 mb-4">
                            ডাকে কেয়াবনে ফুল-মঞ্জরি ঘন-দেয়া সম্পাতে, মাটির বুকেতে তমাল তাহার ফুল-বাহুখানি পাতে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে।
                        </p>
                        <a href="{{ route('f.blog.inner_blog') }}">
                            <button class="custom_btn">
                            <span> বিস্তারিত পড়ুন </span>
                            <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                        </div>
                    </div>
                    <div class="card shadow mt-5">
                        <img src="{{ asset('forntend/images/Rectangle 3867 (1).png') }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                        <div class="card_link d-flex gap-4 align-content-center mt-3 mb-3">
                            <div class="left_link d-flex text-center">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="ml-2">অ্যাডমিন দ্বারা</h5>
                            </div>
                            <div class="right_link d-flex text-center">
                            <i class="fa-solid fa-folder-open"></i>
                            <h5 class="ml-2">বিভাগ</h5>
                            </div>
                        </div>
                        <h1>স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h1>
                        <p class="card_text mt-4 mb-4">
                            ডাকে কেয়াবনে ফুল-মঞ্জরি ঘন-দেয়া সম্পাতে, মাটির বুকেতে তমাল তাহার ফুল-বাহুখানি পাতে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে।
                        </p>
                        <a href="{{ route('f.blog.inner_blog') }}">
                        <button class="custom_btn">
                            <span> বিস্তারিত পড়ুন</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        </a>
                        </div>
                    </div>
                    <div class="card shadow mt-5">
                        <img src="{{ asset('forntend/images/Rectangle 3867 (2).png') }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                        <div class="card_link d-flex gap-4 align-content-center mt-3 mb-3">
                            <div class="left_link d-flex text-center">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="ml-2">অ্যাডমিন দ্বারা</h5>
                            </div>
                            <div class="right_link d-flex text-center">
                            <i class="fa-solid fa-folder-open"></i>
                            <h5 class="ml-2">বিভাগ</h5>
                            </div>
                        </div>
                        <h1>স্মার্ট বাংলাদেশে পরিবহন খাত আনস্মার্টই থাকবে?</h1>
                        <p class="card_text mt-4 mb-4">
                            ডাকে কেয়াবনে ফুল-মঞ্জরি ঘন-দেয়া সম্পাতে, মাটির বুকেতে তমাল তাহার ফুল-বাহুখানি পাতে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে। মোদের মথুরা টরমল করে পাপ-লালসার ভারে, ভোগের সমিধ জ্বালিয়া আমরা পুড়িতেছি বারে বারে।
                        </p>
                        <a href="{{ route('f.blog.inner_blog') }}">
                            <button class="custom_btn">
                            <span> বিস্তারিত পড়ুন</span>
                            <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </a>
                        </div>
                    </div>
                    <div aria-label="Page navigation " class="mt-5">
                        <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link bg-light text-danger" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-danger text-white" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-danger text-white" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-danger text-white" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-light text-danger" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-5">
                <div class="blog_card_form d-none d-sm-block">
                    <div class="sidebar shadow mt-5">
                    <div class="search-bar mb-4 ">
                        <h6 class="text-start"> এখানে অনুসন্ধান করুন </h6>
                        <hr class="blog_hr">
                        <div class="input-container">
                            <input type="text" class="form-control search-input" placeholder="অনুসন্ধান">
                            <i class="fas fa-search search-icon"></i> 
                        </div>
                    </div>
                    </div>
                </div>
                <div class="blog_card_form d-none d-sm-block">
                    <div class="sidebar shadow">
                    <div class="search-bar mb-4">
                        <h6 class="text-start"> বিভাগ </h6>
                        <hr class="blog_hr">
                        <div class="input-container">
                            <input type="text" class="form-control search-input mt-4" placeholder="বিভিন্ন গাড়ি নিয়ে ">
                            <input type="text" class="form-control search-input mt-4" placeholder="প্রোমোশনসমূহ">
                            <input type="text" class="form-control search-input mt-4" placeholder="নিউজরুম">
                            <input type="text" class="form-control search-input mt-4" placeholder="বিভিন্ন গাড়ি নিয়ে ">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="blog_card_form">
                    <div class="sidebar shadow">
                    <div class="search-bar mb-4">
                        <h6 class="text-start new_blog"> নতুন ব্লগ </h6>
                        <hr class="blog_hr">
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-4">
                                <span class="date me-2">
                                <i class="fa-regular fa-calendar mr-1"></i> জুন 6, 2024
                                </span>
                            </div>
                            <a href="#" class="new_blog_text fw-bold">স্মার্ট বাংলাদেশের পরিবহন খাত আনস্মার্টই থাকবে?</a>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-4">
                                <span class="date me-2">
                                <i class="fa-regular fa-calendar mr-1"></i> জুন 6, 2024
                                </span>
                            </div>
                            <a href="#" class="new_blog_text fw-bold">স্মার্ট বাংলাদেশের পরিবহন খাত আনস্মার্টই থাকবে?</a>
                        </div>
                        <div>
                            <div class="d-flex align-items-center mb-4">
                                <span class="date me-2">
                                <i class="fa-regular fa-calendar mr-1"></i> জুন 6, 2024
                                </span>
                            </div>
                            <a href="#" class="new_blog_text fw-bold">স্মার্ট বাংলাদেশের পরিবহন খাত আনস্মার্টই থাকবে?</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="blog_card_form">
                    <div class="sidebar shadow">
                    <div class="search-bar mb-4">
                        <h6 class="text-start">জনপ্রিয় ট্যাগ</h6>
                        <hr class="blog_hr" />
                        <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                            <a href="#" class="btn popular_a btn-sm mb-2">বাইক রাইড</a>
                            <a href="#" class="btn popular_a btn-sm mb-2">কার রাইড</a>
                            </div>
                            <div class="col-md-4 mb-3">
                            <a href="#" class="btn popular_a btn-sm mb-2">বাইক রাইড</a>
                            <a href="#" class="btn popular_a btn-sm mb-2">কার রাইড</a>
                            </div>
                            <div class="col-md-4 mb-3">
                            <a href="#" class="btn popular_a btn-sm d-block mb-2">বাইক রাইড</a>
                            <a href="#" class="btn popular_a btn-sm d-block mb-2">কার রাইড</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </section>
@endsection