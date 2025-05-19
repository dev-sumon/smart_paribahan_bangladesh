@extends('forntend.layouts.master')
@section('title', 'Owner Profile')
@section('content')
    <section class="profile_section">
        <div class="container">
            <div class="profile-container">
                <!-- প্রোফাইল হেডার -->
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center text-md-start">
                            @if ($owner->image)
                                <img src="{{ asset('storage/' . $owner->image) }}" alt="{{ $owner->name }}"
                                    class="profile-img">
                            @else
                                <p>{{ __('No image available') }}</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h1 class="profile-name">{{ $owner->name }}</h1>
                            <p class="profile-designation">{{ __('পদবি:') }} <span>সিনিয়র ড্রাইভার</span></p>
                            <p>
                                {{ $owner->description }}
                            </p>

                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $owner->email }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $owner->phone }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-tint"></i>
                                    <span>{{ __('ব্লাড গ্রুপ:') }} <span
                                            class="badge badge-custom">{{ $owner->blood_group->blood_group }}</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- প্রোফাইল বিস্তারিত -->
                <div class="profile-details">
                    <div class="info d-flex justify-content-between align-items-center">
                        <div class="section-title left_column">
                            <h2>{{ __('ব্যক্তিগত তথ্য') }}</h2>
                        </div>
                        <div class="right_column d-flex justify-content-between ">
                            <div class="edit">
                                <a href="{{ route('owner.owner_update', $owner->slug) }}">{{ __('Edit') }}</a>
                            </div>
                            <div class="add">
                                <a href="{{ route('owner.addVehicle') }}">Add Vehicle</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- ঠিকানা বিভাগ -->
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h3 class="mb-4 fw-bold"><i class="fas fa-map-marker-alt me-2"></i> {{ __('ঠিকানা') }}
                                </h3>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('বিভাগ') }}</div>
                                    <div class="detail-value">{{ $owner->division->division }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('জেলা') }}</div>
                                    <div class="detail-value">{{ $owner->district->district }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('থানা') }}</div>
                                    <div class="detail-value">{{ $owner->thana->thana }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('ইউনিয়ন') }}</div>
                                    <div class="detail-value">{{ $owner->union->union }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('স্ট্যান্ড') }}</div>
                                    <div class="detail-value">{{ $owner->stand->title }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- গাড়ি বিভাগ -->
                        <div class="col-md-6">
                            <div class="detail-card">
                                <h3 class="mb-4 fw-bold"><i class="fas fa-car me-2"></i> {{ __('গাড়ির তথ্য') }}</h3>
                                <div class="detail-row">
                                    <div class="detail-title">{{ __('গাড়ির নাম ও নম্বর') }}</div>
                                    <div class="detail-value">
                                        @foreach ($owner->vehicles as $vehicle)
                                            <b>{{ $vehicle->name }}</b> - {{ $vehicle->vehicle_licence }} <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="logout">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 m-auto">
                        <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" class="logout_form">
                            @csrf
                            <div class="form-group">
                                <a class="dropdown-item text-center" href="{{ route('owner.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
