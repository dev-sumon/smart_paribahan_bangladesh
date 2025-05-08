@extends('forntend.layouts.master')
@section('title', 'Field Worker Profile')
@section('content')
    <section class="field_worker_profile">
        <div class="main-wrapper">
            <div class="profile-wrapper">
                <!-- Profile Card -->
                <div class="worker-card">
                    <!-- Profile Header -->
                    <div class="card-header">
                        <div class="avatar-container">
                            <div class="avatar-wrapper">
                                @if ($worker->image)
                                    <img src="{{ asset('storage/' . $worker->image) }}" alt="{{ $worker->name }}"
                                        class="avatar-wrapper">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                            </div>
                            <button class="btn-camera">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                        <h2 class="worker-name">{{ $worker->name }}</h2>
                        <h4 class="worker-role">মাঠকর্মী</h4>
                    </div>

                    <!-- Profile Info -->
                    <div class="card-body">
                        <div class="info-container">
                            <!-- Personal Info -->
                            <div class="info-block">
                                <h3 class="block-title">ব্যক্তিগত তথ্য</h3>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">মোবাইল নাম্বার</p>
                                        <p class="value">{{ $worker->phone }}</p>
                                    </div>
                                </div>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">ইমেইল</p>
                                        <p class="value">{{ $worker->email }}</p>
                                    </div>
                                </div>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">জাতীয় পরিচয়পত্র নম্বর</p>
                                        <p class="value">{{ $worker->nid }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Family Info -->
                            <div class="info-block">
                                <h3 class="block-title">পারিবারিক তথ্য</h3>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">পিতার নাম</p>
                                        <p class="value">{{ $worker->father_name }}</p>
                                    </div>
                                </div>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">মায়ের নাম</p>
                                        <p class="value">{{ $worker->mother_name }}</p>
                                    </div>
                                </div>

                                <div class="data-row">
                                    <div class="data-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="data-content">
                                        <p class="label">ঠিকানা</p>
                                        <p class="value">{{ $worker->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    {{-- <div class="card-footer">
                        <div class="btn-group">
                            <button class="btn-primary">
                                <a href="">
                                    <i class="fas fa-edit"></i> 
                                সম্পাদনা
                                </a>
                            </button>
                            <button class="btn-secondary">
                                <a href="{{ route('field_worker.logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                লগআউট
                                </a>
                            </button>
                        </div>
                    </div> --}}
                    <div class="card-footer">
                        <div class="btn-group">
                            <button class="btn-primary">
                                <a href="{{ route('field_worker.field_worker_update', $worker->id) }}">
                                    <i class="fas fa-edit"></i>
                                    সম্পাদনা
                                </a>
                            </button>

                            <form id="logout-form" action="{{ route('field_worker.logout') }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <button type="submit" class="btn-secondary">
                                    <i class="fas fa-sign-out-alt"></i> লগআউট
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



















@endsection
