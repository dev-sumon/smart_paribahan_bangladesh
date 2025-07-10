@extends('forntend.layouts.master')
@section('title', 'Instruction')
@section('content')
    <section class="faq pb-5" id="faq">
        <div class="container d-flex justify-content-center">
            <div class="row w-100">
                <div class="faq-section">
                    <div class="faq-title  py-5 pb-5">{{ __('Frequently Asked Questions (FAQ)') }}</div>

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
@endsection
