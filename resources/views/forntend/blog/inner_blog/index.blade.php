@extends('forntend.layouts.master')

@section('title', 'InnerBlog')

@section('content')
    <section class="blog_hero py-5">
        <div class="container">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 col-sm-12 text-md-start text-center mb-4 mb-md-0">
                    <div class="banner_head pt-3">
                        <h2>{{ __('Bangladesh Smart') }} <br class="d-none d-sm-inline">{{ __('Transport Blog') }}</h2>
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
    <section class="blog_inner">
        <div class="container my-5">
            <div class="row g-4">
                <div class="col-lg-7 left_card">
                    <div class="blog_card_form d-block d-sm-none">
                        <div class="sidebar shadow mt-5">
                            <div class="search-bar mb-4 ">
                                <h6 class="text-start">{{ __('Search here') }}</h6>
                                <hr class="blog_hr">
                                {{-- <div class="input-container">
                                    <input type="text" class="form-control search-input" placeholder="{{ __('Search') }}">
                                    <i class="fas fa-search search-icon"></i>
                                </div> --}}
                                <form action="{{ route('f.blog.index') }}" method="GET" class="mb-3">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search blog title..." value="{{ request('search') }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn search-icon"><i
                                                class="fas fa-search search-icon"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        <div class="card_link d-flex gap-4 align-content-center mt-3 mb-3">
                            <div class="left_link d-flex text-center">
                                <i class="fa-solid fa-user"></i>
                                <h5 class="ml-2">{{ $blog->creator()->title ?? 'N/A' }}</h5>
                                {{-- <h5 class="ml-2">By Admin</h5> --}}
                            </div>
                            <div class="right_link d-flex text-center">
                                <i class="fa-solid fa-folder-open"></i>
                                <h5 class="ml-2">{{ __('Division') }}</h5>
                            </div>
                        </div>
                        {{-- <h1>Will the transportation sector<br class="d-none d-sm-inline">remain unsmart in Smart Bangladesh?</h1> --}}
                        <h1>{{ $blog->title }}</h1>
                        <div class="card shadow mt-5">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Card Image">
                            <div class="card-body ms-2 me-2">
                                <p class="card_text text-start text-justify mt-4 mb-4">
                                    {{ $blog->description }}
                                </p>
                                <div class="second_part">
                                    <div class="card-body inner_buttom">
                                        <div class="d-lg-flex d-sm-block justify-content-between align-items-center mt-4">
                                            <div>
                                                <a class="tag mr-4" href="#">{{ __('Tag') }}</a>
                                                <a class="a_bike mr-2" href="#">{{ __('Bike Ride') }}</a>
                                                <a class="a_bike" href="#">{{ __('Bike Ride') }}</a>
                                            </div>
                                            <div class="d-flex gap-4 pt-3">
                                                <a href="#" class="inner_icon "><i
                                                        class="fa-brands fa-square-facebook"></i></a>
                                                <a href="#" class="inner_icon"><i
                                                        class="fa-brands fa-square-instagram"></i></a>
                                                <a href="#" class="inner_icon"><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="inner_icon"><i
                                                        class="fa-brands fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    {{-- <input type="text" class="form-control search-input"
                                        placeholder="{{ __('Search') }}">
                                    <i class="fas fa-search search-icon"></i> --}}
                                    <form action="{{ route('f.blog.index') }}" method="GET" class="mb-3">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search blog title..." value="{{ request('search') }}">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn search-icon"><i
                                                    class="fas fa-search search-icon"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        <div class="sidebar shadow">
                            <div class="search-bar mb-4">
                                <h6 class="text-start">{{ __('Division') }} </h6>
                                <hr class="blog_hr">
                                <div class="input-container">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Various cars') }} ">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Promotions') }} ">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Newsroom') }}">
                                    <input type="text" class="form-control search-input mt-4"
                                        placeholder="{{ __('Various cars') }}  ">
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
                                        <a href="{{ route('f.blog.inner_blog', $blog->slug) }}"
                                            class="new_blog_text fw-bold"
                                            style="color: #141F39">{{ Str::limit($blog->title, 70, '...') }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="blog_card_form">
                        <div class="sidebar shadow">
                            <div class="search-bar mb-4">
                                <h6 class="text-start ">{{ __('Popular Tags') }}</h6>
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
