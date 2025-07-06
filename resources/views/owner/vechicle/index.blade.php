@extends('forntend.layouts.master')
@section('title', 'Add Vehicle')
@section('content')
    <div class="container-fluid mt-2 add_vehicle">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Vehicle') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('owner.dashboard', $owner->slug) }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('owner.addVehicleStore') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter vehicle name" name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="stand">{{ __('Select Vehicle Type') }} <span class="text-danger">*</span></label>
                                        <select name="vehicle_type_id" id="stand" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Vehicle Type') }}</option>
                                            @foreach($vehicle_types as $vehicle_type)
                                                <option value="{{ $vehicle_type->id }}">{{ $vehicle_type->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vehicle_type_id'))
                                            <div class="text-danger">{{ $errors->first('vehicle_type_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_licence">{{ __('Vehicle licence') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicle_licence" placeholder="Enter vehicle licence Number" name="vehicle_licence" value="{{ old('vehicle_licence')  }}">
                                        @if($errors->has('vehicle_licence'))
                                            <div class="text-danger">{{ $errors->first('vehicle_licence') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="image" name="image[]" multiple placeholder="Enter Stand Image" name="image" value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
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
