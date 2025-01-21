@extends('backend.layouts.master', ['page_slug' => 'owner'])


@section('title', 'Admin - management')
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
                                <form action="{{ route('owner.update', $owner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter The Owner Name" name="name" value="{{ old('name') ?? $owner->name }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="description" placeholder="Enter The Description" name="description" value="{{ old('description') ?? $owner->description }}">
                                        @if($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label  class="mt-3" for="blood_group_id">{{ __('Blood Group') }}</label>
                                        <select name="blood_group_id" id="blood_group_id" class="form-control">
                                            <option value=" " selected hidden>{{ __('Select Blood Broup') }}</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{ $blood->id }}" 
                                                    {{ old('blood_group_id', $owner->blood_group_id) == $blood->id ? 'selected' : '' }}>
                                                    {{ $blood->blood_group }}
                                            @endforeach
                                        </select>
                                        @if($errors->has('blood_group'))
                                        <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') ?? $owner->email }}" class="form-control" placeholder="Enter Owner Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') ?? $owner->phone }}" class="form-control" placeholder="Enter Owner Phone">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicles_license">{{ __('Vehicles License') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicles_license" placeholder="Enter The Vehiclle License Number" name="vehicles_license" value="{{ old('vehicles_license') ?? $owner->vehicles_license}}">
                                        @if($errors->has('vehicles_license'))
                                            <div class="text-danger">{{ $errors->first('vehicles_license') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="division_id">{{ __('Division') }}</label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Division') }}</option>
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
                                        <label class="mt-3" for="district_id">{{ __('District') }}</label>
                                        <select name="district_id" id="district_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select District') }}</option>
                                            @foreach ($districts as $district)
                                                <option 
                                                    value="{{ $district->id }}" 
                                                    {{ old('district_id', $owner->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('district_id'))
                                            <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="thana_id">{{ __('Thana') }}</label>
                                        <select name="thana_id" id="thana_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                            @foreach ($thanas as $thana)
                                                <option 
                                                    value="{{ $thana->id }}" 
                                                    {{ old('thana_id', $owner->thana_id ?? '') == $thana->id ? 'selected' : '' }}>
                                                    {{ $thana->thana }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('thana_id'))
                                            <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="union_id">{{ __('Union') }}</label>
                                        <select name="union_id" id="union_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Union') }}</option>
                                            @foreach ($unions as $union)
                                                <option 
                                                    value="{{ $union->id }}" 
                                                    {{ old('union_id', $owner->union_id ?? '') == $union->id ? 'selected' : '' }}>
                                                    {{ $union->union }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('union_id'))
                                            <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_id">{{ __('Vehicle') }} <span class="text-danger">*</span></label>
                                        <select name="vehicle_id" id="vehicle_id"  class="form-control">
                                            <option value="" selected hidden>{{ __('Select Vehicle') }}</option>
                                            @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $owner->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>
                                                {{ $vehicle->name }}
                                            </option>                                            
                                            @endforeach
                                        </select>
                                        @if($errors->has('vehicle_id'))
                                            <div class="text-danger">{{ $errors->first('vehicle_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                        @if($owner->image)
                                            <img src="{{ Storage::url($owner->image) }}" alt="{{ $owner->name }}" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control h-auto" id="image" placeholder="Enter owner Image" name="image">
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
                                            <option value="1" {{ (old('status') ?? $owner->status ) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $owner->status ) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        @if($errors->has('status'))
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