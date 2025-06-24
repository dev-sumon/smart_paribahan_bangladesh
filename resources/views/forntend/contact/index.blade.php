@extends('forntend.layouts.master')
@section('title', 'Contact Us')
@section('content')
    <!-- contact deatils section design strat -->
    <section class="contact_deatils pt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="details d-flex column-gap-2 column_reverse">
                    <div class="conatact_info col-lg-6">
                        {{-- <h3>যোগাযোগ করুন</h3> --}}
                        @foreach ($contacts as $contact)
                            <h3>{{ $contact->title }}</h3>
                            <p>
                                {{ $contact->description }}
                            </p>
                        @endforeach
                        {{-- <h3>যোগাযোগ করুন</h3> --}}
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
                @foreach ($contacts as $contact)
                    <div class="col-lg-4 col-sm-12">
                        <h4>{{ __('Office Address') }}</h4>

                        <a href="https://www.google.com/maps/search/?api=1&query=Section+11,+Block+A+(Main+road),+Plot+5+(beside+shopno+super+shop),+Pallabi,+Dhaka+1221"
                            target="_blank">
                            {{ $contact->address }}
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <h4>{{ __('Phone Number') }}</h4>
                        <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a><br>
                        <a href="tel:{{ $contact->optional_number }}">{{ $contact->optional_number }}</a>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <h4>{{ __('Email') }}</h4>
                        <a href="mailto:bangladeshsmartparibahan@gmail.com">{{ $contact->email }}</a>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-sm-12">
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
                  </div> --}}
            </div>
        </div>
    </section>
    <!-- contact section design end -->

    <!-- conact form section design start -->
    <section class="form-container-section pt-5 pb-5">
        <div class="container">
            <h5 class="mb-4">{{ __('Send us your queries in the inbox.') }}</h5>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="{{ __('Your Name') }}">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="{{ __('Your Email') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="{{ __('Your Phone Number') }}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject"
                        placeholder="{{ __('Your Subject') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" name="message" id="message" placeholder="{{ __('Write in Detail') }}"></textarea>
                </div>
                <button type="submit" class="btn btn-submit btn-sm">{{ __('Submit') }}</button>
            </form>
        </div>
    </section>
    <!-- conact form section design end -->
@endsection
