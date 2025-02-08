{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Document') }}</title>
</head>
<body>
    <h1>{{ __('Driver Dashbaord') }}</h1>
    <li class="nav-item dropdown">
        <a class="dropdown-item" href="{{ route('driver.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </li>
</body>
</html> --}}

@extends('forntend.layouts.master')
@section('title', 'Driver Dashboard')
@section('content')
     <!-- error_section section design start -->
     <section class="error_section pt-5 pb-5">
        <div class="container">
            <div class="error_image d-flex">
                <div class="error">
                    
                </div>
                {{-- <div class="image">
                    <img src="{{ asset('forntend/images/Frame.png') }}" alt="">
                </div> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <h3>{{ __('Driver Profile Update') }}</h3>
                        <form action="{{ route('dRegistration.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" style="border: 2px solid #ea1827" placeholder="Enter The Driver Name" name="name" value="{{ old('name', $driver->name) }}">
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="description" style="border: 2px solid #ea1827" placeholder="Enter The Description" name="description" value="{{ old('description')  }}">
                                @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="designation">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation" style="border: 2px solid #ea1827" placeholder="Enter The Designation" name="designation" value="{{ old('designation')  }}">
                                @if($errors->has('designation'))
                                    <div class="text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  class="mt-3" for="blood_group_id">{{ __('Blood Group') }}</label>
                                <select name="blood_group_id" id="blood_group_id" class="form-control" style="border: 2px solid #ea1827">
                                    <option value=" " selected hidden>{{ __('Select Blood Broup') }}</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}" 
                                            {{ old('blood_group_id', $driver->blood_group_id) == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_group }}
                                    @endforeach
                                </select>
                                @if($errors->has('blood_group'))
                                <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label class="mt-3" for="division_id">{{ __('Division') }}</label>
                                <select name="division_id" id="division_id" class="form-control" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('Select Division') }}</option>
                                    @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" 
                                        {{ old('division_id', $driver->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                        {{ $division->division }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('division_id'))
                                    <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="district">{{ __('District') }}<span class="text-danger">*</span></label>
                                <select name="district_id" id="district" class="form-control">
                                    <option value="" selected hidden>{{ __('Select District') }}</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label class="mt-3" for="division">{{ __('Division') }}</label>
                                <select name="division_id" id="division" class="form-control" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('Select Division') }}</option>
                                    @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->division }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="district">{{ __('District') }}</label>
                                <select name="district_id" id="district" class="form-control">
                                    <option value="" selected hidden>{{ __('Select District') }}</option>
                                </select>
                            </div>
                            
                            {{-- <div class="form-group">
                                <label class="mt-3" for="district_id">{{ __('District') }}</label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="" selected hidden>{{ __('Select District') }}</option>
                                    @foreach ($districts as $district)
                                        <option 
                                            value="{{ $district->id }}" 
                                            {{ old('district_id', $driver->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                            {{ $district->district }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('district_id'))
                                    <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                @endif
                            </div> --}}
                            
                            {{-- <div class="form-group">
                                <label class="mt-3" for="thana_id">{{ __('Thana') }}</label>
                                <select name="thana_id" id="thana_id" class="form-control">
                                    <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                    @foreach ($thanas as $thana)
                                        <option 
                                            value="{{ $thana->id }}" 
                                            {{ old('thana_id', $driver->thana_id ?? '') == $thana->id ? 'selected' : '' }}>
                                            {{ $thana->thana }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('thana_id'))
                                    <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label class="mt-3" for="union_id">{{ __('Union') }}</label>
                                <select name="union_id" id="union_id" class="form-control">
                                    <option value="" selected hidden>{{ __('Select Union') }}</option>
                                    @foreach ($unions as $union)
                                        <option 
                                            value="{{ $union->id }}" 
                                            {{ old('union_id', $driver->union_id ?? '') == $union->id ? 'selected' : '' }}>
                                            {{ $union->union }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('union_id'))
                                    <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label class="mt-3" for="stand_id">{{ __('Stand') }}</label>
                                <select name="stand_id" id="stand_id" class="form-control">
                                    <option value="" selected hidden>{{ __('Select Stand') }}</option>
                                    @foreach ($stands as $stand)
                                        <option 
                                            value="{{ $stand->id }}" 
                                            {{ old('stand_id', $driver->stand_id ?? '') == $stand->id ? 'selected' : '' }}>
                                            {{ $stand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('stand_id'))
                                    <div class="text-danger">{{ $errors->first('stand_id') }}</div>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label for="vehicle_id">{{ __('Vehicle Type') }} <span class="text-danger">*</span></label>
                                <select name="vehicle_id" id="vehicle_id"  class="form-control">
                                    <option value="" selected hidden>{{ __('Select Vehicle') }}</option>
                                    @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $driver->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->name }}
                                    </option>                                            
                                    @endforeach
                                </select>
                                @if($errors->has('vehicle_id'))
                                    <div class="text-danger">{{ $errors->first('vehicle_id') }}</div>
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" style="border: 2px solid #ea1827" value="{{ old('email') }}" class="form-control" placeholder="Enter Driver Email">
                                @if($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" style="border: 2px solid #ea1827" value="{{ old('phone') }}" class="form-control" placeholder="Enter Driver Phone">
                                @if($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label class="mt-3" for="owner_id">{{ __('Vehicles License') }}</label>
                                <select name="owner_id" id="owner_id" class="form-control">
                                    <option value="" selected hidden>{{ __('Select Vehicles License') }}</option>
                                    @foreach ($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ (old('owner_id', $driver->owner_id) == $owner->id) ? 'selected' : '' }}>
                                            {{ $owner->vehicles_license }}
                                        </option>
                                    @endforeach
                                </select>
                                @if($errors->has('owner_id'))
                                <div class="text-danger">{{ $errors->first('owner_id') }}</div>
                                @endif
                            </div> --}}
                            
                            <div class="form-group">
                                <label for="driving_license">{{ __('Driving License') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="driving_license" style="border: 2px solid #ea1827" placeholder="Enter The Driving License" name="driving_license" value="{{ old('driving_license') }}">
                                @if($errors->has('driving_license'))
                                    <div class="text-danger">{{ $errors->first('driving_license') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                @if($driver->image)
                                    <img src="" alt="" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                                <input type="file" class="form-control h-auto" id="image" placeholder="Enter Driver Image" name="image">
                                @if($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <label for="password" class="mt-3">{{ __('Password') }} <span class="text-danger">*</span></label>
                                <input type="password" name="password" id="password" style="border: 2px solid #ea1827" value="{{ old('password') }}" class="form-control" placeholder="Enter Your Password">
                                @if($errors->has('password'))
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="mt-3">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" style="border: 2px solid #ea1827" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Enter Confirm Password">
                                @if($errors->has('password_confirmation'))
                                    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ (old('status') ?? $driver->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{ (old('status') ?? $driver->status) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="text-danger">{{ $errors->first('status') }}</div>
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn w-100 submitBtn" style="background-color: #ea1827; color: #FFFFFF;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                            <div class="form-group text-center">
                                <a href="{{ route('driver.logout') }}" style="border: 2px solid #ea1827; color: #ea1827; background-color: #FFFFFF; padding: 5px; border-radius: 3px;">{{ __('Logout') }}</a>
                            </div>
                        </form>
                        
                     {{-- <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                         @csrf
                         <div class="form-grou">
                            <a class="dropdown-item" href="{{ route('driver.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                         </div>
                     </form> --}}
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- error_section section design end -->
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                let divisionId = $(this).val();
                if (divisionId) {
                    let _url = '{{ route("ajax.division", ":id") }}'.replace(':id', divisionId);

                    $.ajax({
                        url: _url,
                        type: 'GET',
                        success: function(response) {
                            let districts = response.data;
                            let districtSelect = $('#district');
                            districtSelect.empty();
                            districtSelect.append('<option value="">Select District</option>');

                            $.each(districts, function(index, district) {
                                districtSelect.append('<option value="' + district.id + '">' + district.district + '</option>');
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    $('#district').empty().append('<option value="">Select District</option>');
                }
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
                        thanaSelect.append('<option value="">Select Thana</option>');

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
                        unionSelect.append('<option value="">Select Union</option>');

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
                        standSelect.append('<option value="">Select Stand</option>');

                        $.each(stands, function(index, stand) {
                            standSelect.append('<option value="' + stand.id + '">' + stand.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#stand').on('change', function() { 
                let vehicleId = $(this).val();
                let _url = '{{ route("ajax.vehicle", ":id") }}'.replace(':id', vehicleId); 

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let vehicles = response.data;
                        let vehicleSelect = $('#vehicle');
                        vehicleSelect.empty();
                        vehicleSelect.append('<option value="">Select vehicle</option>');

                        $.each(vehicles, function(index, vehicle) {
                            vehicleSelect.append('<option value="' + vehicle.id + '">' + vehicle.vehicle + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#vehicle').on('change', function() { 
                let vehicleId = $(this).val();
                let _url = '{{ route("ajax.vehiclesLicense", ":id") }}'.replace(':id', vehicleId); 

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let licenses = response.data;
                        let licenseSelect = $('#vehicles_license');
                        licenseSelect.empty();
                        licenseSelect.append('<option value="">Select Vehicles License</option>');

                        $.each(licenses, function(index, license) {
                            licenseSelect.append('<option value="' + license + '">' + license + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>
@endpush