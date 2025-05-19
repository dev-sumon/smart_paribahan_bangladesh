@extends('forntend.layouts.master')
@section('title', 'Driver Profile')
@section('content')
    <section class="profile_section">
        <div class="container">
            <div class="profile-container">
                <!-- প্রোফাইল হেডার -->
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-md-4 text-center text-md-start">
                            @if ($driver->image)
                                <img src="{{ asset('storage/' . $driver->image) }}" alt="{{ $driver->title }}"
                                    class="profile-img">
                            @else
                                <p>{{ __('No image available') }}</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h1 class="profile-name">{{ $driver->title }}</h1>
                            <p class="profile-designation">{{ __('পদবি:') }} <span>{{ $driver->designation }}</span></p>
                            <p>
                                {{ $driver->description }}
                            </p>
                            <div class="contact-info">
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $driver->email }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $driver->phone }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-tint"></i>
                                    <span>{{ __('ব্লাড গ্রুপ:') }} <span
                                            class="badge badge-custom">{{ $driver->blood_group->blood_group }}</span></span>
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
                                <a href="{{ route('driver.driver_update', $driver->slug) }}">{{ __('Edit') }}</a>
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
                                    <div class="detail-value">{{ $driver->division->division }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('জেলা') }}</div>
                                    <div class="detail-value">{{ $driver->district->district }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('থানা') }}</div>
                                    <div class="detail-value">{{ $driver->thana->thana }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('ইউনিয়ন') }}</div>
                                    <div class="detail-value">{{ $driver->union->union }}</div>
                                </div>

                                <div class="detail-row">
                                    <div class="detail-title">{{ __('স্ট্যান্ড') }}</div>
                                    <div class="detail-value">{{ $driver->stand->title }}</div>
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
                                        {{ $driver->vehicle->name }} - {{ $driver->vehicle->vehicle_licence }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="logout-section">
        <div class="container">
            <a href="{{ route('driver.logout') }}" class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> লগআউট করুন
            </a>

            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
@endsection

@push('script')
@endpush