@extends('forntend.layouts.master')
@section('title', 'SignUp')
@section('content')
  <section class="register_section pt-5 py-5">
      <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
          <h4 class="mb-4">{{ __('অ্যাকাউন্ট তৈরী করুন') }}</h4>
          <form action="{{ route('field_worker.driver.store') }}"  method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="name">{{ __('নাম') }}</label>
                  <input type="text" class="form-control" id="name" placeholder="আপনার নাম লিখুন" name="name" value="{{ old('name') }}">
                  @if($errors->has('name'))
                      <div class="text-danger">{{ $errors->first('name') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="description">{{ __('ডেসক্রিপশন') }}</label>
                  <input type="text" class="form-control" id="description" placeholder="আপনার সম্পর্কে লিখুন" name="description" value="{{ old('description') }}">
                  @if($errors->has('description'))
                      <div class="text-danger">{{ $errors->first('description') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="designation">{{ __('পদবি ') }}</label>
                  <input type="text" class="form-control" id="designation" placeholder="আপনার পদবি লিখুন" name="designation" value="{{ old('designation') }}">
                  @if($errors->has('designation'))
                      <div class="text-danger">{{ $errors->first('designation') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="driving_license">{{ __('ড্রাইভিং লাইসেন্স ') }}</label>
                  <input type="text" class="form-control" id="driving_license" placeholder="আপনার ড্রাইভিং লাইসেন্স নাম্বার লিখুন" name="driving_license" value="{{ old('driving_license') }}">
                  @if($errors->has('driving_license'))
                      <div class="text-danger">{{ $errors->first('driving_license') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="email" class="mt-3">{{ __('মেইল লিখুন') }}</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="মেইল লিখুন">
                  @if($errors->has('email'))
                      <div class="text-danger">{{ $errors->first('email') }}</div>
                  @endif
              </div>
              <div class="form-group">
                  <label for="phone" class="mt-3">{{ __('মোবাইল নাম্বার') }}</label>
                  <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="মোবাইল নাম্বার">
                  @if($errors->has('phone'))
                      <div class="text-danger">{{ $errors->first('phone') }}</div>
                  @endif
              </div>
              <div class="form-group">
                <label for="image">{{ __('ছবি') }}</label>
                <input type="file" class="form-control h-auto" id="image" name="image" value="{{ old('image') }}">
                @if($errors->has('image'))
                    <div class="text-danger">{{ $errors->first('image') }}</div>
                @endif
            </div>
            <div class="form-group">
              <label  class="mt-3" for="blood_group_id">{{ __('রক্তের গ্রুপ') }}</label>
              <select name="blood_group_id" id="blood_group_id" class="form-control">
                  <option value=" " selected hidden>{{ __('রক্তের গ্রুপ নির্বাচন করুন') }}</option>
                  @foreach ($bloods as $blood)
                      <option value="{{ $blood->id }}" {{ $blood->id==old('blood_group_id') ? 'selected': '' }}>{{ $blood->blood_group}}</option>
                  @endforeach
              </select>
              @if($errors->has('blood_group'))
                <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
              @endif
            </div>
            <div class="form-group">
                <label for="division">{{ __('বিভাগ') }}</label>
                <select name="division_id" id="division" class="form-control">
                    <option value="" selected hidden>{{ __('বিভাগ নির্বাচন করুন') }}</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->division }}</option>
                    @endforeach
                </select>
                @if($errors->has('division_id'))
                <div class="text-danger">{{ $errors->first('division_id') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="district">{{ __('জেলা') }}</label>
                <select name="district_id" id="district" class="form-control">
                    <option value="" selected hidden>{{ __('জেলা নির্বাচন করুন') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="thana">{{ __('থানা ') }}</label>
                <select name="thana_id" id="thana" class="form-control">
                    <option value="" selected hidden>{{ __('থানা নির্বাচন করুন') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="union">{{ __(('ইউনিয়ন')) }} </label>
                <select name="union_id" id="union" class="form-control">
                    <option value="" selected hidden>{{ __('ইউনিয়ন নির্বাচন করুন') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stand">{{ __('স্ট্যান্ড') }}</label>
                <select name="stand_id" id="stand" class="form-control">
                    <option value="" selected hidden>{{ __('স্ট্যান্ড নির্বাচন করুন') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="vehicle">{{ __('গাড়ি') }}</label>
                <select name="vehicle_id" id="vehicle" class="form-control">
                    <option value="" selected hidden>{{ __('গাড়ি নির্বাচন করুন') }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password" class="mt-3">{{ __('পাসওয়ার্ড') }}</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="পাসওয়ার্ড">
                <span>{{ __('ন্যূনতম ৮ অক্ষরে লিখুন') }}</span>
                @if($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="mt-3">{{ __('আবার পাসওয়ার্ড লিখুন') }}</label>
                <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="আবার পাসওয়ার্ড লিখুন">
                <span>{{ __('ন্যূনতম ৮ অক্ষরে লিখুন') }}</span>
                @if($errors->has('password_confirmation'))
                    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>
            <div class="mb-3">
              <p>
                  {{ __('রেজিস্ট্রেশন করার মাধ্যমে আপনি আমাদের ব্যবহারকারীর শর্তাবলি মেনে নিচ্ছেন।') }}
              </p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger w-100 mb-3 login">
                    {{ __('অ্যাকাউন্ট তৈরী করুন') }}
                </button>
            </div>
            <div class="text-center back_login">
              <span class="no_account">{{ __('ইতিমধ্যে একটি অ্যাকাউন্ট আছে?') }}</span>
              <br />
              <div class="back_login_page">
                <a href="{{ route('signup.signup') }}" class="btn btn-light w-100 mb-3 mt-3" style="background-color: #e2e6ea;">{{ __('আপনার অ্যাকাউন্টে লগইন করুন') }}</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                let divisionId = $(this).val();
                let _url = '{{ route("ajax.division", ":id") }}'.replace(':id', divisionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let districts = response.data;
                        let districtSelect = $('#district');
                        districtSelect.empty();
                        districtSelect.append('<option value="">জেলা নির্বাচন করুন</option>');

                        $.each(districts, function(index, district) {
                            districtSelect.append('<option value="' + district.id + '">' + district.district + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#district').on('change', function() {
                let districtId = $(this).val();
                let _url = '{{ route("ajax.thana", ":id") }}'.replace(':id', districtId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let thanas = response.data;
                        let thanaSelect = $('#thana');
                        thanaSelect.empty();
                        thanaSelect.append('<option value="">থানা নির্বাচন করুন</option>');

                        $.each(thanas, function(index, thana) {
                            thanaSelect.append('<option value="' + thana.id + '">' + thana.thana + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#thana').on('change', function() {
                let unionId = $(this).val();
                let _url = '{{ route("ajax.union", ":id") }}'.replace(':id', unionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let unions = response.data;
                        let unionSelect = $('#union');
                        unionSelect.empty();
                        unionSelect.append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');

                        $.each(unions, function(index, union) {
                            unionSelect.append('<option value="' + union.id + '">' + union.union + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#union').on('change', function() {
                let standId = $(this).val();
                let _url = '{{ route("ajax.stand", ":id") }}'.replace(':id', standId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let stands = response.data;
                        let standSelect = $('#stand');
                        standSelect.empty();
                        standSelect.append('<option value="">স্ট্যান্ড নির্বাচন করুন</option>');

                        $.each(stands, function(index, stand) {
                            standSelect.append('<option value="' + stand.id + '">' + stand.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#stand').on('change', function () {
                let standId = $(this).val();
                let url = '{{ route("ajax.standVehicles", ":id") }}'.replace(':id', standId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (response) {
                        let vehicleSelect = $('#vehicle');
                        vehicleSelect.empty();
                        vehicleSelect.append('<option value="" selected hidden>গাড়ি নির্বাচন করুন</option>');

                        if (response.data.length > 0) {
                            $.each(response.data, function (index, vehicle) {
                                let vehicleText = `${vehicle.name} : ${vehicle.vehicle_licence}`;
                                vehicleSelect.append('<option value="' + vehicle.id + '">' + vehicleText + '</option>');
                            });
                        } else {
                            vehicleSelect.append('<option value="" disabled>No Vehicles Found</option>');
                        }
                    },
                    error: function (error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
        });
    </script>
@endpush