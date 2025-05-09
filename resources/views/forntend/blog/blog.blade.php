@extends('forntend.layouts.master')

@section('title', 'Blog')

@section('content')
    <section class="blog_hero py-5">
        <div class="container">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 col-sm-12 text-md-start text-center mb-4 mb-md-0">
                    <div class="banner_head pt-3">
                        <h2>{{ __('Bangladesh Smart') }}<br class="d-none d-sm-inline"> {{ __('Transport Blog') }}</h2>
                    </div>
                    <div class="banner_title">
                        <p>{{ __('All Statements, Updates, Releases, and Others') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 d-flex justify-content-lg-end justify-content-sm-center banner_image">
                    <img src="{{ asset('forntend/images/3534059 1.png') }}" alt="Bangladesh Smart Transport Blog"
                        class="img-fluid">
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
                                <h6 class="text-start">{{ __('Search here') }}</h6>
                                <hr class="blog_hr">
                                <div class="input-container">
                                    <input type="text" class="form-control search-input" placeholder="Search">
                                    <i class="fas fa-search search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        @foreach ($blogs as $key => $blog)
                            <div class="card shadow mt-5">
                                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Card Image">
                                <div class="card-body">
                                    <div class="card_link d-flex gap-4 align-content-center mt-3 mb-3">
                                        <div class="left_link d-flex text-center">
                                            <i class="fa-solid fa-user"></i>
                                            <h5 class="ml-2">{{ $blog->creator }}</h5>
                                        </div>
                                        <div class="right_link d-flex text-center">
                                            <i class="fa-solid fa-folder-open"></i>
                                            <h5 class="ml-2">{{ __('Division') }}</h5>
                                        </div>
                                    </div>
                                    {{-- <h1>{{ $blog->title }}</h1> --}}
                                    <h1><a href="{{ route('f.blog.inner_blog', $blog->id) }}"
                                            style="color: #141F39">{{ Str::limit($blog->title, 40, '...') }}</a></h1>
                                    <p class="card_text mt-4 mb-4">{!! Str::limit(strip_tags($blog->description), 300, '...') !!}</p>
                                    <a href="{{ route('f.blog.inner_blog', $blog->id) }}">
                                        <button class="custom_btn">
                                            <span>{{ __('Read More') }}</span>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination mt-4">
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="blog_card_form d-none d-sm-block">
                        <div class="sidebar shadow mt-5">
                            <div class="search-bar mb-4 ">
                                <h6 class="text-start">{{ __('Search here') }}</h6>
                                <hr class="blog_hr">
                                <div class="input-container">
                                    <input type="text" class="form-control search-input"
                                        placeholder="{{ __('Search') }}">
                                    <i class="fas fa-search search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form d-none d-sm-block">
                        <div class="sidebar shadow">
                            <div class="search-bar mb-4">
                                <h6 class="text-start"> {{ __('Division') }} </h6>
                                <hr class="blog_hr">
                                <div class="input-container">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Various cars') }}">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Promotions') }}">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Newsroom') }}">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Various cars') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        <div class="sidebar shadow">
                            <div class="search-bar mb-4">
                                <h6 class="text-start new_blog"> {{ __('New Blog') }}</h6>
                                <hr class="blog_hr">
                                @foreach ($blogs as $key => $blog)
                                    <div class="mb-3">
                                        <div class="d-flex align-items-center mb-4">
                                            <span class="date me-2">
                                                <i
                                                    class="fa-regular fa-calendar mr-1"></i>{{ $blog->created_at->format('d M, Y') }}
                                            </span>
                                        </div>
                                        {{-- <a href="#"
                                        class="new_blog_text fw-bold">{{ __('Will the Transport Sector of Smart Bangladesh Remain UnsMart?') }}</a> --}}
                                        <a href="{{ route('f.blog.inner_blog', $blog->id) }}" class="new_blog_text fw-bold"
                                            style="color: #141F39">{{ Str::limit($blog->title, 70, '...') }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        <div class="sidebar shadow">
                            <div class="search-bar mb-4">
                                <h6 class="text-start">{{ __('Popular Tags') }}</h6>
                                <hr class="blog_hr" />
                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <a href="#" class="btn popular_a btn-sm mb-2">{{ __('Bike Ride') }}</a>
                                            <a href="#" class="btn popular_a btn-sm mb-2">{{ __('Bike Ride') }}</a>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <a href="#" class="btn popular_a btn-sm mb-2">{{ __('Bike Ride') }}</a>
                                            <a href="#" class="btn popular_a btn-sm mb-2">{{ __('Bike Ride') }}</a>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <a href="#"
                                                class="btn popular_a btn-sm d-block mb-2">{{ __('Bike Ride') }}</a>
                                            <a href="#"
                                                class="btn popular_a btn-sm d-block mb-2">{{ __('Bike Ride') }}</a>
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
