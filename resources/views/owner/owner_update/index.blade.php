@extends('forntend.layouts.master')
@section('title', 'Owner Update')
@section('content')
    {{-- <section class="owner_update pt-5 pb-5">
        <div class="container">
            <div class="card-header">
                <div class="top d-flex justify-content-between pb-3">
                    <h3>{{ __('Owner Profile Update') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                       
                        
                        <form action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" style="border: 2px solid #ea1827"
                                    placeholder="Enter The Driver Name" name="name"
                                    value="{{ old('name') ?? $owner->name }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="description"
                                    style="border: 2px solid #ea1827" placeholder="Enter The Description" name="description"
                                    value="{{ old('description') ?? $owner->description }}">
                                @if ($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="designation">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation"
                                    style="border: 2px solid #ea1827" placeholder="Enter The Designation" name="designation"
                                    value="{{ old('designation') ?? $owner->designation }}">
                                @if ($errors->has('designation'))
                                    <div class="text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('Email') }} <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" style="border: 2px solid #ea1827"
                                    value="{{ old('email') ?? $owner->email }}" class="form-control"
                                    placeholder="Enter Driver Email">
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-3">{{ __('Phone No.') }} <span
                                        class="text-danger">*</span></label>
                                <input type="tel" name="phone" style="border: 2px solid #ea1827" class="form-control"
                                    placeholder="Enter Driver Phone" value="{{ old('phone') ?? $owner->phone }}">
                                @if ($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                @if ($owner->image)
                                    <img src="" alt="" class="display-image"
                                        style="width: 100%; height: auto; object-fit: cover;">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                                <input type="file" class="form-control h-auto" id="image"
                                    placeholder="Enter Driver Image" name="image" style="border: 2px solid #ea1827">
                                @if ($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mt-3" for="blood_group_id">{{ __('Blood Group') }} <span
                                        class="text-danger">*</span></label>
                                <select name="blood_group_id" id="blood_group_id"
                                    class="form-control form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('Blood Group') }}</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}"
                                            {{ old('blood_group_id', $owner->blood_group_id ?? '') == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_group }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('blood_group_id'))
                                    <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="mt-3" for="division_id">{{ __('Division') }} <span
                                        class="text-danger">*</span></label>
                                <select name="division_id" id="division" class="form-control form-select select_iteam"
                                    style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}"
                                            {{ old('division_id', $owner->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                            {{ $division->division }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('division_id'))
                                    <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="district">{{ __('District') }}<span class="text-danger">*</span></label>
                                <select name="district_id" id="district" class="form-control"
                                    style="border: 2px solid #ea1827">
                                    <option value="" hidden>Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}"
                                            {{ $owner->district_id == $district->id ? 'selected' : '' }}>
                                            {{ $district->district }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thana">{{ __('Thana') }}<span class="text-danger">*</span></label>
                                <select name="thana_id" id="thana" class="form-control"
                                    style="border: 2px solid #ea1827">
                                    <option value="" hidden>Select Thana</option>
                                    @foreach ($thanas as $thana)
                                        <option value="{{ $thana->id }}"
                                            {{ $owner->thana_id == $thana->id ? 'selected' : '' }}>
                                            {{ $thana->thana }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="union">{{ __('Union') }}<span class="text-danger">*</span></label>
                                <select name="union_id" id="union" class="form-control"
                                    style="border: 2px solid #ea1827">
                                    <option value="" hidden>Select Union</option>
                                    @foreach ($unions as $union)
                                        <option value="{{ $union->id }}"
                                            {{ $owner->union_id == $union->id ? 'selected' : '' }}>
                                            {{ $union->union }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stand">{{ __('Stand') }}<span class="text-danger">*</span></label>
                                <select name="stand_id" id="stand" class="form-control"
                                    style="border: 2px solid #ea1827">
                                    <option value="" hidden>Select Stand</option>
                                    @foreach ($stands as $stand)
                                        <option value="{{ $stand->id }}"
                                            {{ $owner->stand_id == $stand->id ? 'selected' : '' }}>
                                            {{ $stand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn w-100 submitBtn"
                                    style="background-color: #ea1827; color: #FFFFFF;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
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
    </section> --}}




    <section class="profile_update_section">
        <header class="page-header">
            <div class="container">
                <h1 class="page-title">মালিক প্রোফাইল এডিট</h1>
            </div>
        </header>

        <div class="container profile-container">
            <div class="profile-card">
                <div class="profile-header">
                    <h3><i class="fas fa-user-edit me-2"></i> প্রোফাইল তথ্য আপডেট করুন</h3>
                </div>

                <div class="profile-body">
                    <form id="profileForm" action="{{ route('owner.owner_update', $owner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}

                        <!-- Profile Image Section -->
                        <div class="profile-image-container">
                            @if ($owner->image)
                                <img src="{{ asset('storage/' . $owner->image) }}" alt="{{ $owner->name }}" height="180"
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
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="required-field">নাম</label>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="নাম" value="{{ old('name') ?? $owner->name }}">
                                    </div>
                                    <div class="text-danger" id="nameError"></div>
                                </div>

                                {{-- <div class="col-md-6 mb-3">
                                    <label for="designation" class="required-field">পদবি</label>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            placeholder="পদবি" value="{{ old('designation') ?? $owner->designation }}">
                                        @if ($errors->has('designation'))
                                            <div class="text-danger">{{ $errors->first('designation') }}</div>
                                        @endif

                                    </div>
                                    <div class="text-danger" id="designationError"></div>
                                </div> --}}
                            </div>
                            <label for="description" class="required-field">বিবরণ</label>
                            <div class="form-floating">
                                <textarea class="form-control" id="description" name="description" placeholder="বিবরণ" style="height: 100px">{{ $owner->description ?? 'description' }}</textarea>

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
                                        <input type="email" name="email" value="{{ old('email') ?? $owner->email }}"
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
                                        {{-- <input type="tel" class="form-control" id="phone" name="phone"
                                            placeholder="" value=""> --}}

                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="Enter Driver Phone" value="{{ old('phone') ?? $owner->phone }}">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="text-danger" id="phoneError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="blood_group_id" class="form-label required-field">রক্তের গ্রুপ</label>
                                    {{-- <select class="form-select" id="blood_group_id" name="blood_group_id">
                                        <option value="" selected hidden>রক্তের গ্রুপ নির্বাচন করুন</option>
                                        <option value="1">A+</option>
                                        <option value="2">A-</option>
                                        <option value="3">B+</option>
                                        <option value="4">B-</option>
                                        <option value="5">AB+</option>
                                        <option value="6">AB-</option>
                                        <option value="7">O+</option>
                                        <option value="8">O-</option>
                                    </select> --}}
                                    <select name="blood_group_id" id="blood_group_id" class="form-select">
                                        <option value="" selected hidden>{{ __('Blood Group') }}</option>
                                        @foreach ($bloods as $blood)
                                            <option value="{{ $blood->id }}"
                                                {{ old('blood_group_id', $owner->blood_group_id ?? '') == $blood->id ? 'selected' : '' }}>
                                                {{ $blood->blood_group }}
                                            </option>
                                        @endforeach
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
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}"
                                                {{ old('division_id', $owner->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                                {{ $division->division }}
                                            </option>
                                        @endforeach
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
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}"
                                                {{ $owner->district_id == $district->id ? 'selected' : '' }}>
                                                {{ $district->district }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="districtError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="thana_id" class="form-label required-field">থানা</label>
                                    <select name="thana_id" id="thana" class="form-select">
                                        <option value="" hidden>Select Thana</option>
                                        @foreach ($thanas as $thana)
                                            <option value="{{ $thana->id }}"
                                                {{ $owner->thana_id == $thana->id ? 'selected' : '' }}>
                                                {{ $thana->thana }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="thanaError"></div>
                                </div>

                                <div class="col-md-6">
                                    <label for="union_id" class="form-label required-field">ইউনিয়ন</label>
                                    <select name="union_id" id="union" class="form-select">
                                        <option value="" hidden>Select Union</option>
                                        @foreach ($unions as $union)
                                            <option value="{{ $union->id }}"
                                                {{ $owner->union_id == $union->id ? 'selected' : '' }}>
                                                {{ $union->union }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="unionError"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="stand_id" class="form-label required-field">স্ট্যান্ড</label>
                                    <select name="stand_id" id="stand" class="form-select">
                                        <option value="" hidden>Select Stand</option>
                                        @foreach ($stands as $stand)
                                            <option value="{{ $stand->id }}"
                                                {{ $owner->stand_id == $stand->id ? 'selected' : '' }}>
                                                {{ $stand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger" id="standError"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Preferences (Optional) -->
                        {{-- <div class="form-section">
                            <h4 class="section-title">নোটিফিকেশন সেটিংস</h4>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="emailNotifications"
                                    name="email_notifications" checked>
                                <label class="form-check-label" for="emailNotifications">
                                    ইমেইল নোটিফিকেশন গ্রহণ করুন
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="smsNotifications"
                                    name="sms_notifications" checked>
                                <label class="form-check-label" for="smsNotifications">
                                    এসএমএস নোটিফিকেশন গ্রহণ করুন
                                </label>
                            </div>
                        </div> --}}

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
                <a href="#" class="logout-btn"
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
    <script>
        $(document).ready(function() {
            // Fetch districts based on selected division
            $('#division').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: '/home/get-districts/' + division_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#district').empty();
                            $('#district').append('<option value="">জেলা</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').empty();
                }
            });

            // Fetch thanas based on selected district
            $('#district').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: '/home/get-thanas/' + district_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#thana').empty();
                            $('#thana').append('<option value="">থানা</option>');
                            $.each(data, function(key, value) {
                                $('#thana').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#thana').empty();
                }
            });

            // Fetch unions based on selected thana
            $('#thana').on('change', function() {
                var thana_id = $(this).val();
                if (thana_id) {
                    $.ajax({
                        url: '/home/get-unions/' + thana_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#union').empty();
                            $('#union').append('<option value="">ইউনিয়ন</option>');
                            $.each(data, function(key, value) {
                                $('#union').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#union').empty();
                }
            });

            // Fetch stands based on selected union
            $('#union').on('change', function() {
                var union_id = $(this).val();
                if (union_id) {
                    $.ajax({
                        url: '/home/get-stands/' + union_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#stand').empty();
                            $('#stand').append('<option value="">স্ট্যান্ড</option>');
                            $.each(data, function(key, value) {
                                $('#stand').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#stand').empty();
                }
            });

            // Fetch vehicles based on selected stand
            //   $('#stand').on('change', function () {
            //       var stand_id = $(this).val();
            //       if (stand_id) {
            //           $.ajax({
            //               url: '/home/get-vehicles/' + stand_id,
            //               type: 'GET',
            //               dataType: 'json',
            //               success: function (data) {
            //                   $('#vehicle').empty();
            //                   $('#vehicle').append('<option value="">গাড়ি</option>');
            //                   $.each(data, function (key, value) {
            //                       $('#vehicle').append('<option value="' + key + '">' + value + '</option>');
            //                   });
            //               }
            //           });
            //       } else {
            //           $('#vehicle').empty();
            //       }
            //   });
            $('#stand').on('change', function() {
                var stand_id = $(this).val();
                if (stand_id) {
                    $.ajax({
                        url: '/home/get-vehicles/' + stand_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // এখানে JSON ডাটা চেক করুন
                            $('#vehicle').empty();
                            $('#vehicle').append('<option value="">গাড়ি</option>');
                            $.each(data, function(key, value) {
                                $('#vehicle').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#vehicle').empty();
                }
            });

        });
    </script>
@endpush
