@extends('forntend.layouts.master')
@section('title', 'Error')
@section('content')
{{-- <div class="alert alert-danger text-center">
    <h2>দুঃখিত, কোনো তথ্য পাওয়া যায়নি!</h2>
    <p>আপনি যে তথ্য খুঁজছেন তা আমাদের ডাটাবেসে নেই।</p>
    <a href="{{ url('/') }}" class="btn btn-primary">হোম পেজে ফিরে যান</a>
</div> --}}
<!-- error_section section design start -->
<section class="error_section pt-5 pb-5">
    <div class="container">
        <div class="error_image d-flex">
            <div class="error">
                <div class="alert alert-danger text-center">
                    <h2>দুঃখিত, কোনো তথ্য পাওয়া যায়নি!</h2>
                </div>
                {{-- <a href="{{ url('/') }}" class="btn btn-primary">হোম পেজে ফিরে যান</a> --}}
            </div>
            <div class="image">
                <img src="{{ asset('forntend/images/Frame.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- error_section section design end -->

@endsection
