@extends('backend.layouts.master', ['page_slug' => 'driver'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create New Driver') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('driver.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('driver.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter The Driver Name" name="name" value="{{ old('name') }}">
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
                                        <label for="designation">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="designation" placeholder="Enter The Designation" name="designation" value="{{ old('designation') }}">
                                        @if($errors->has('designation'))
                                            <div class="text-danger">{{ $errors->first('designation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Driver Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Driver Phone">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="vehicles_license">{{ __('Vehicles License') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicles_license" placeholder="Enter The Vehicles License" name="vehicles_license" value="{{ old('vehicles_license') }}">
                                        @if($errors->has('vehicles_license'))
                                            <div class="text-danger">{{ $errors->first('vehicles_license') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label  class="mt-3" for="vehicles_license">{{ __('Vehicles License') }}</label>
                                        <select name="owner_id" id="owner_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Vehicles License') }}</option>
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}" {{ $owner->id==old('owner_id') ? 'selected': '' }}>{{ $owner->vehicles_license}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vehicles_license'))
                                        <div class="text-danger">{{ $errors->first('vehicles_license') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="driving_license">{{ __('Driving License') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="driving_license" placeholder="Enter The Driving License" name="driving_license" value="{{ old('driving_license') }}">
                                        @if($errors->has('driving_license'))
                                            <div class="text-danger">{{ $errors->first('driving_license') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="blood_group">{{ __('Blood Group') }}</label>
                                        <input type="text" class="form-control" id="blood_group" placeholder="Enter The Blood Group" name="blood_group" value="{{ old('blood_group') }}">
                                        @if($errors->has('blood_group'))
                                            <div class="text-danger">{{ $errors->first('blood_group') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label  class="mt-3" for="blood_group_id">{{ __('Blood Group') }}</label>
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
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
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