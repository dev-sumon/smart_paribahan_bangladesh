@extends('backend.layouts.master', ['page_slug' => 'owner'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create New Owner') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('owner.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter The Owner Name" name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="description" placeholder="Enter The Description" name="description" value="{{ old('description') }}">
                                        @if($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label  class="mt-3" for="blood_group_id">{{ __('Blood Group') }} <span class="text-danger">*</span></label>
                                        <select name="blood_group_id" id="blood_group_id" class="form-control">
                                            <option value=" " selected hidden>{{ __('Select Blood Broup') }}</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{ $blood->id }}" {{ $blood->id==old('blood_group_id') ? 'selected': '' }}>{{ $blood->blood_group}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('blood_group'))
                                        <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Owner Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Owner Phone">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label  class="mt-3" for="division_id">{{ __('Division') }} <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value=" " selected hidden>{{ __('Select Division') }}</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $division->id==old('division_id') ? 'selected': '' }}>{{ $division->division}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('division_id'))
                                        <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label  class="mt-3" for="district_id">{{ __('District') }} <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district_id" class="form-control">
                                            <option value=" " selected hidden>{{ __('Select District') }}</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ $district->id==old('district_id') ? 'selected': '' }}>{{ $district->district}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('district_id'))
                                        <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="thana_id">{{ __('Thana') }} <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana_id"  class="form-control">
                                            <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana->id }}" {{ $thana->id==old('thana_id') ? 'selected' : '' }}>{{ $thana->thana }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('thana_id'))
                                            <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="union_id">{{ __('Union') }} <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union_id"  class="form-control">
                                            <option value="" selected hidden>{{ __('Select Union') }}</option>
                                            @foreach ($unions as $union)
                                                <option value="{{ $union->id }}" {{ $union->id==old('union_id') ? 'selected' : '' }}>{{ $union->union }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('union_id'))
                                            <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" selected hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" selected hidden>Select District</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="thana">Thana <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" selected hidden>Select Thana</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="union">Union <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" selected hidden>Select Union</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stand">Stand <span class="text-danger">*</span></label>
                                        <select name="stand_id" id="stand" class="form-control">
                                            <option value="" selected hidden>Select Stand</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="stand_id">{{ __('Stand') }} <span class="text-danger">*</span></label>
                                        <select name="stand_id" id="stand_id"  class="form-control">
                                            <option value="" selected hidden>{{ __('Select Stand') }}</option>
                                            @foreach ($stands as $stand)
                                                <option value="{{ $stand->id }}" {{ $stand->id==old('stand_id') ? 'selected' : '' }}>{{ $stand->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('stand_id'))
                                            <div class="text-danger">{{ $errors->first('stand_id') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="vehicle_id">{{ __('Vehicle') }} <span class="text-danger">*</span></label>
                                        <select name="vehicle_id" id="vehicle_id"  class="form-control">
                                            <option value="" selected hidden>{{ __('Select Vehicle') }}</option>
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}" {{ $vehicle->id==old('vehicle_id') ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vehicle_id'))
                                            <div class="text-danger">{{ $errors->first('vehicle_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicles_license">{{ __('Vehicles License') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicles_license" placeholder="Enter The Vehicle License Number" name="vehicles_license" value="{{ old('vehicles_license') }}">
                                        @if($errors->has('vehicles_license'))
                                            <div class="text-danger">{{ $errors->first('vehicles_license') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }}</label>
                                        <input type="file" class="form-control h-auto" id="image" name="image" value="{{ old('image') }}">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="mt-3">{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Your Password">
                                        @if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation" class="mt-3">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Enter Confirm Password">
                                        @if($errors->has('password_confirmation'))
                                            <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
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
                            standSelect.append('<option value="' + stand.id + '">' + stand.name + '</option>');
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