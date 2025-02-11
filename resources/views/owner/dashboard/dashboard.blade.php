@extends('forntend.layouts.master')
@section('title', 'Owner Dashboard')
@section('content')
    <section class="error_section pt-5 pb-5">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <h3>{{ __('Owner Profile Update') }}</h3>
                        <form action="{{ route('owner.updateDashboard', $owner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" style="border: 2px solid #ea1827" placeholder="Enter The Driver Name" name="name" value="{{ old('name') ?? $owner->name }}">
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="description" style="border: 2px solid #ea1827" placeholder="Enter The Description" name="description" value="{{ old('description') ?? $owner->description }}">
                                @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="designation">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation" style="border: 2px solid #ea1827" placeholder="Enter The Designation" name="designation" value="{{ old('designation') ?? $owner->designation }}">
                                @if($errors->has('designation'))
                                    <div class="text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" style="border: 2px solid #ea1827" value="{{ old('email') ?? $owner->email }}" class="form-control" placeholder="Enter Driver Email">
                                @if($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" style="border: 2px solid #ea1827" class="form-control" placeholder="Enter Driver Phone" value="{{ old('phone') ?? $owner->phone }}">
                                @if($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                @if($owner->image)
                                    <img src="" alt="" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                                <input type="file" class="form-control h-auto" id="image" placeholder="Enter Driver Image" name="image" style="border: 2px solid #ea1827">
                                @if($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="mt-3" for="blood_group_id">{{ __('Blood Group') }} <span class="text-danger">*</span></label>
                                <select name="blood_group_id" id="blood_group_id" class="form-control form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('Blood Group') }}</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}" 
                                            {{ old('blood_group_id', $owner->blood_group_id ?? '') == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_group }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('blood_group_id'))
                                    <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label class="mt-3" for="division_id">{{ __('Division') }} <span class="text-danger">*</span></label>
                                <select name="division_id" id="division" class="form-control form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" 
                                            {{ old('division_id', $owner->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                            {{ $division->division }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('division_id'))
                                    <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="district_id" class="mt-3">{{ __('District') }} <span class="text-danger">*</span></label>
                                <select name="district_id" id="district" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('জেলা') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thana_id" class="mt-3">{{ __('Thana') }} <span class="text-danger">*</span></label>
                                <select name="thana_id" id="thana" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('থানা') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="union_id" class="mt-3">{{ __('Union') }} <span class="text-danger">*</span></label>
                                <select name="union_id" id="union" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('ইউনিয়ন') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stand_id" class="mt-3">{{ __('Stand') }} <span class="text-danger">*</span></label>
                                <select name="stand_id" id="stand" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('স্ট্যান্ড') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_id" class="mt-3">{{ __('Vehicle') }} <span class="text-danger">*</span></label>
                                <select name="vehicle_id" id="vehicle" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('গাড়ি') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicles_license">{{ __('Vehicle License') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="vehicle_license" style="border: 2px solid #ea1827" placeholder="Enter The Vehicle License" name="vehicles_license" value="{{ old('vehicles_license') ?? $owner->vehicles_license }}">
                                @if($errors->has('vehicles_license'))
                                    <div class="text-danger">{{ $errors->first('vehicles_license') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn w-100 submitBtn" style="background-color: #ea1827; color: #FFFFFF;">
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
                            <a class="dropdown-item text-center" href="{{ route('owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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


@push('script')
  <script>
      $(document).ready(function () {
          // Fetch districts based on selected division
          $('#division').on('change', function () {
              var division_id = $(this).val();
              if (division_id) {
                  $.ajax({
                      url: '/home/get-districts/' + division_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#district').empty();
                          $('#district').append('<option value="">জেলা</option>');
                          $.each(data, function (key, value) {
                              $('#district').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#district').empty();
              }
          });

          // Fetch thanas based on selected district
          $('#district').on('change', function () {
              var district_id = $(this).val();
              if (district_id) {
                  $.ajax({
                      url: '/home/get-thanas/' + district_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#thana').empty();
                          $('#thana').append('<option value="">থানা</option>');
                          $.each(data, function (key, value) {
                              $('#thana').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#thana').empty();
              }
          });

          // Fetch unions based on selected thana
          $('#thana').on('change', function () {
              var thana_id = $(this).val();
              if (thana_id) {
                  $.ajax({
                      url: '/home/get-unions/' + thana_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#union').empty();
                          $('#union').append('<option value="">ইউনিয়ন</option>');
                          $.each(data, function (key, value) {
                              $('#union').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#union').empty();
              }
          });

          // Fetch stands based on selected union
          $('#union').on('change', function () {
              var union_id = $(this).val();
              if (union_id) {
                  $.ajax({
                      url: '/home/get-stands/' + union_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#stand').empty();
                          $('#stand').append('<option value="">স্ট্যান্ড</option>');
                          $.each(data, function (key, value) {
                              $('#stand').append('<option value="' + key + '">' + value + '</option>');
                          });
                      }
                  });
              } else {
                  $('#stand').empty();
              }
          });

          // Fetch vehicles based on selected stand
          $('#stand').on('change', function () {
              var stand_id = $(this).val();
              if (stand_id) {
                  $.ajax({
                      url: '/home/get-vehicles/' + stand_id,
                      type: 'GET',
                      dataType: 'json',
                      success: function (data) {
                          $('#vehicle').empty();
                          $('#vehicle').append('<option value="">গাড়ি</option>');
                          $.each(data, function (key, value) {
                              $('#vehicle').append('<option value="' + key + '">' + value + '</option>');
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
    