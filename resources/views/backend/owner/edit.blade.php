@extends('backend.layouts.master', ['page_slug' => 'owner'])
@section('title', 'Owner - Edit')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Update Owner') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('owner.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('owner.update', $owner->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name"
                                            placeholder="Enter The Owner Name" name="name"
                                            value="{{ old('name') ?? $owner->title }}">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="title">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter The Owner Name" name="title"
                                            value="{{ old('title') ?? $owner->title }}" oninput="slugGenerate($(this))">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group d-none">
                                        <input type="hidden" name="slug" class="form-control" id="slug"
                                            value="{{ old('slug', $owner->slug) }}">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">{{ __('Designation') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="designation"
                                            placeholder="Enter The Designation" name="designation"
                                            value="{{ old('designation') ?? $owner->designation }}">
                                        @if ($errors->has('designation'))
                                            <div class="text-danger">{{ $errors->first('designation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" placeholder="Enter The Description"
                                            style="width: 100%; height: 150px; padding: 10px;">{{ old('description') ?? $owner->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="blood_group_id">{{ __('Blood Group') }}</label>
                                        <select name="blood_group_id" id="blood_group_id" class="form-control">
                                            <option value=" " selected hidden>{{ __('Select Blood Broup') }}</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{ $blood->id }}"
                                                    {{ old('blood_group_id', $owner->blood_group_id) == $blood->id ? 'selected' : '' }}>
                                                    {{ $blood->blood_group }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('blood_group'))
                                            <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') ?? $owner->email }}"
                                            class="form-control" placeholder="Enter Owner Email">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') ?? $owner->phone }}"
                                            class="form-control" placeholder="Enter Owner Phone">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ $owner->division_id == $division->id ? 'selected' : '' }}>
                                                    {{ $division->division }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
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
                                        <label for="thana">Thana <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
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
                                        <label for="union">Union <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
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
                                        <div class="form-group">
                                            <label for="stand">Stand <span class="text-danger">*</span></label>
                                            <select name="stand_id" id="stand" class="form-control">
                                                <option value="" hidden>Select Stand</option>
                                                @foreach ($stands as $stand)
                                                    <option value="{{ $stand->id }}"
                                                        {{ $owner->stand_id == $stand->id ? 'selected' : '' }}>
                                                        {{ $stand->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="vehicle_id">{{ __('Vehicle') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="vehicle_id" id="vehicle" class="form-control">
                                                <option value="" selected hidden>{{ __('Select Vehicle') }}</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->id }}"
                                                        {{ old('vehicle_id', $owner->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>
                                                        {{ $vehicle->name }}: {{ $vehicle->license_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('vehicle_id'))
                                                <div class="text-danger">{{ $errors->first('vehicle_id') }}</div>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label for="image">{{ __('Image') }} <span
                                                    class="text-danger">*</span></label>
                                            {{-- @if ($owner->image)
                                                <img src="{{ Storage::url($owner->image) }}" alt="{{ $owner->title }}"
                                                    class="display-image"
                                                    style="width: 100%; height: auto; object-fit: cover;">
                                            @else
                                                <p>{{ __('No image available') }}</p>
                                            @endif --}}
                                            @if ($owner->image)
                                                <img src="{{ Storage::url($owner->image) }}" alt="{{ $owner->name }}"
                                                    class="display-image"
                                                    style="width: 100%; height: auto; object-fit: cover;">
                                            @else
                                                <p>{{ __('No image available') }}</p>
                                            @endif
                                            <input type="file" class="form-control h-auto" id="image"
                                                placeholder="Enter owner Image" name="image">
                                            @if ($errors->has('image'))
                                                <div class="text-danger">{{ $errors->first('image') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="mt-3">{{ __('Password') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('password') }}" class="form-control"
                                                placeholder="Enter Your Password">
                                            @if ($errors->has('password'))
                                                <div class="text-danger">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation"
                                                class="mt-3">{{ __('Confirm Password') }} <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation" value="{{ old('password_confirmation') }}"
                                                class="form-control" placeholder="Enter Confirm Password">
                                            @if ($errors->has('password_confirmation'))
                                                <div class="text-danger">{{ $errors->first('password_confirmation') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1"
                                                    {{ (old('status') ?? $owner->status) == 1 ? 'selected' : '' }}>
                                                    {{ __('Active') }}</option>
                                                <option value="0"
                                                    {{ (old('status') ?? $owner->status) == 0 ? 'selected' : '' }}>
                                                    {{ __('Deactive') }}</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <div class="text-danger">{{ $errors->first('status') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success w-100 submitBtn">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                let divisionId = $(this).val();
                let _url = '{{ route('ajax.division', ':id') }}'.replace(':id', divisionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let districts = response.data;
                        let districtSelect = $('#district');
                        districtSelect.empty();
                        districtSelect.append('<option value="">Select District</option>');

                        $.each(districts, function(index, district) {
                            districtSelect.append('<option value="' + district.id +
                                '">' + district.district + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#district').on('change', function() {
                let districtId = $(this).val();
                let _url = '{{ route('ajax.thana', ':id') }}'.replace(':id', districtId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let thanas = response.data;
                        let thanaSelect = $('#thana');
                        thanaSelect.empty();
                        thanaSelect.append('<option value="">Select Thana</option>');

                        $.each(thanas, function(index, thana) {
                            thanaSelect.append('<option value="' + thana.id + '">' +
                                thana.thana + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#thana').on('change', function() {
                let unionId = $(this).val();
                let _url = '{{ route('ajax.union', ':id') }}'.replace(':id', unionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let unions = response.data;
                        let unionSelect = $('#union');
                        unionSelect.empty();
                        unionSelect.append('<option value="">Select Union</option>');

                        $.each(unions, function(index, union) {
                            unionSelect.append('<option value="' + union.id + '">' +
                                union.union + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#union').on('change', function() {
                let standId = $(this).val();
                let _url = '{{ route('ajax.stand', ':id') }}'.replace(':id', standId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let stands = response.data;
                        let standSelect = $('#stand');
                        standSelect.empty();
                        standSelect.append('<option value="">Select Stand</option>');

                        $.each(stands, function(index, stand) {
                            standSelect.append('<option value="' + stand.id + '">' +
                                stand.name + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#stand').on('change', function() {
                let standId = $(this).val();
                let url = '{{ route('ajax.standVehicles', ':id') }}'.replace(':id', standId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        let vehicleSelect = $('#vehicle');
                        vehicleSelect.empty();
                        vehicleSelect.append(
                            '<option value="" selected hidden>Select Vehicle</option>');

                        if (response.data.length > 0) {
                            $.each(response.data, function(index, vehicle) {
                                let vehicleText =
                                    `${vehicle.name} : ${vehicle.vehicle_licence}`;
                                vehicleSelect.append('<option value="' + vehicle.id +
                                    '">' + vehicleText + '</option>');
                            });
                        } else {
                            vehicleSelect.append(
                                '<option value="" disabled>No Vehicles Found</option>');
                        }
                    },
                    error: function(error) {
                        console.error('AJAX Error:', error);
                    }
                });
            });
            $('#vehicle').on('change', function() {
                let vehicleId = $(this).val();
                let _url = '{{ route('ajax.vehiclesLicense', ':id') }}'.replace(':id', vehicleId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let licenseSelect = $('#vehicles_license');
                        licenseSelect.empty();
                        licenseSelect.append(
                            '<option value="">Select Vehicles License</option>');

                        if (response.success && response.data.length > 0) {
                            licenseSelect.append('<option value="' + response.data[0] + '">' +
                                response.data[0] + '</option>');
                        } else {
                            licenseSelect.append(
                                '<option value="">No License Available</option>');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
