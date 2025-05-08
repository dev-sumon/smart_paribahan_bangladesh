@extends('forntend.layouts.master')
@section('title', 'Field Worker Update')
@section('content')
    <section class="profile_update_section">
        <header class="page-header">
            <div class="container">
                <h1 class="page-title">ড্রাইভার প্রোফাইল এডিট</h1>
            </div>
        </header>

        <div class="container profile-container">
            <div class="profile-card">
                <div class="profile-header">
                    <h3><i class="fas fa-user-edit me-2"></i> প্রোফাইল তথ্য আপডেট করুন</h3>
                </div>

                <div class="profile-body">
                    <form id="profileForm" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}

                        <!-- Profile Image Section -->
                        <div class="profile-image-container">
                            @if ($worker->image)
                                <img src="{{ asset('storage/' . $worker->image) }}" alt="{{ $worker->name }}" height="180"
                                    width="180" class="profile-image">
                            @else
                                <p>{{ __('No image available') }}</p>
                            @endif

                            <div class="image-upload-container">
                                <label for="profileImage" class="custom-file-upload">
                                    <i class="fas fa-camera"></i> প্রোফাইল ছবি আপলোড করুন
                                </label>
                                <input type="file" id="image" name="image" class="file-input" accept="image/*">
                                @if ($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="text-danger" id="imageError"></div>
                        </div>

                        <!-- Personal Information Section -->
                        <div class="form-section">
                            <h4 class="section-title">ব্যক্তিগত তথ্য</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="required-field">নাম</label>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="নাম" value="{{ old('name') ?? $worker->name }}">

                                    </div>
                                    <div class="text-danger" id="nameError"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="designation" class="required-field">পদবি</label>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            placeholder="পদবি" value="">

                                    </div>
                                    <div class="text-danger" id="designationError"></div>
                                </div>
                            </div>
                            <label for="description" class="required-field">বিবরণ</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="description" name="description" placeholder="বিবরণ" style="height: 100px"></textarea>

                                @if ($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif

                            </div>
                            <div class="text-danger" id="descriptionError"></div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="form-section">
                            <h4 class="section-title">যোগাযোগের তথ্য</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="required-field">ইমেইল</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" name="email" value="{{ old('email') ?? $worker->email }}"
                                            class="form-control" placeholder="Enter Driver Email">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="text-danger" id="emailError"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="name" class="required-field">ফোন নম্বর</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="Enter Driver Phone" value="{{ old('phone') ?? $worker->phone }}">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="text-danger" id="phoneError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="driving_license" class="required-field">ড্রাইভিং লাইসেন্স নম্বর</label>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="driving_license" name="driving_license"
                                            placeholder="ড্রাইভিং লাইসেন্স নম্বর" value="">

                                    </div>
                                    <div class="text-danger" id="designationError"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for="blood_group_id" class="form-label required-field">রক্তের গ্রুপ</label>
                                    <select name="blood_group_id" id="blood_group_id" class="form-select">
                                        <option value="" selected hidden>{{ __('Blood Group') }}</option>
                                        {{-- @foreach ($bloods as $blood)
                                            <option value="{{ $blood->id }}"
                                                {{ old('blood_group_id', $driver->blood_group_id ?? '') == $blood->id ? 'selected' : '' }}>
                                                {{ $blood->blood_group }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    @if ($errors->has('blood_group_id'))
                                        <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                    @endif
                                    <div class="text-danger" id="bloodGroupError"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div class="form-section">
                            <h4 class="section-title">ঠিকানার তথ্য</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="division_id" class="form-label required-field">বিভাগ</label>
                                    <select name="division_id" id="division" class="form-select">
                                        <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                        {{-- @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ old('division_id', $driver->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                                {{ $division->division }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    @if ($errors->has('division_id'))
                                        <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                    @endif
                                    <div class="text-danger" id="divisionError"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="district_id" class="form-label required-field">জেলা</label>
                                    <select name="district_id" id="district" class="form-select">
                                        <option value="" hidden>Select District</option>
                                        {{-- @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $driver->district_id == $district->id ? 'selected' : '' }}>
                                                {{ $district->district }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="text-danger" id="districtError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="thana_id" class="form-label required-field">থানা</label>
                                    <select name="thana_id" id="thana" class="form-select">
                                        <option value="" hidden>Select Thana</option>
                                        {{-- @foreach ($thanas as $thana)
                                            <option value="{{ $thana->id }}"
                                                {{ $driver->thana_id == $thana->id ? 'selected' : '' }}>
                                                {{ $thana->thana }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="text-danger" id="thanaError"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="union_id" class="form-label required-field">ইউনিয়ন</label>
                                    <select name="union_id" id="union" class="form-select">
                                        <option value="" hidden>Select Union</option>
                                        {{-- @foreach ($unions as $union)
                                            <option value="{{ $union->id }}"
                                                {{ $driver->union_id == $union->id ? 'selected' : '' }}>
                                                {{ $union->union }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="text-danger" id="unionError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="stand_id" class="form-label required-field">স্ট্যান্ড</label>
                                    <select name="stand_id" id="stand" class="form-select">
                                        <option value="" hidden>Select Stand</option>
                                        {{-- @foreach ($stands as $stand)
                                            <option value="{{ $stand->id }}"
                                                {{ $driver->stand_id == $stand->id ? 'selected' : '' }}>
                                                {{ $stand->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    <div class="text-danger" id="standError"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="fas fa-undo me-2"></i> রিসেট করুন
                            </button>

                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary" id="saveButton">
                                    <i class="fas fa-save me-2"></i> আপডেট করুন
                                </button>

                                <div class="save-indicator" id="saveIndicator">
                                    <i class="fas fa-check-circle"></i> সফলভাবে সংরক্ষিত হয়েছে
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="logout-section">
            <div class="container">
                <a href="" class="logout-btn"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> লগআউট করুন
                </a>

                <form id="logout-form" action="" method="POST" style="display: none;">
                    <!-- CSRF Token would go here in Laravel -->
                </form>
            </div>
        </div>
    </section>
@endsection


@push('script')
@endpush
