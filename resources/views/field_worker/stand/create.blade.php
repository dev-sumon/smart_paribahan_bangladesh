@extends('field_worker.layouts.master', ['page_slug' => 'stand'])
@section('titlr', 'Stand Create')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Stand') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('field_worker.stand.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" selected hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" selected hidden>Select District</option>
                                        </select>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="thana">Thana <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" selected hidden>Select Thana</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="union">Union <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" selected hidden>Select Union</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="title">{{ __('Stand Name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter Stand Name" name="title" value="{{ old('title') }}"
                                            oninput="slugGenerate($(this))">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                            <input type="text" name="slug" class="form-control" id="slug"
                                                value="{{ old('slug') }}">
                                            @error('slug')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">{{ __('Description') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="w-100 p-3" rows="6" style="outline: none;"
                                            placeholder="Enter Your Description......"></textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="location">{{ __('Location') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="url" class="form-control" id="location"
                                            placeholder="Enter Stand Google Map Link" name="location"
                                            value="{{ old('location') }}">
                                        @if ($errors->has('location'))
                                            <div class="text-danger">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="image" name="image[]"
                                            multiple placeholder="Enter Stand Image" name="image"
                                            value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                                {{ __('Deactive') }}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Submit') }}
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
                            standSelect.append('<option value="' + stand.id + '">' + stand.title + '</option>');
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
                        vehicleSelect.append('<option value="" selected hidden>Select Vehicle</option>');

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
            $('#vehicle').on('change', function() {
                let vehicleId = $(this).val();
                let _url = '{{ route("ajax.vehiclesLicense", ":id") }}'.replace(':id', vehicleId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let licenseSelect = $('#vehicles_license');
                        licenseSelect.empty();
                        licenseSelect.append('<option value="">Select Vehicles License</option>');

                        if (response.success && response.data.length > 0) {
                            licenseSelect.append('<option value="' + response.data[0] + '">' + response.data[0] + '</option>');
                        } else {
                            licenseSelect.append('<option value="">No License Available</option>');
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
