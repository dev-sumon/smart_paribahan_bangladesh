@extends('backend.layouts.master', ['page_slug' => 'vehicle'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Vehicle Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('vehicle.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('vehicle.update', $vehicle->id) }}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name" placeholder="Enter vehicle Name" name="name" value="{{ old('name') ?? $vehicle->name }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_licence">{{ __('Vehicle licence') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="vehicle_licence" placeholder="Enter vehicle licence Number" name="vehicle_licence" value="{{ $vehicle->vehicle_licence ?? old('vehicle_licence')  }}">
                                        @if($errors->has('vehicle_licence'))
                                            <div class="text-danger">{{ $errors->first('vehicle_licence') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="vehicle_type_id">{{ __('Select Vehicle Type') }} <span class="text-danger">*</span></label>
                                        <select name="vehicle_type_id" id="vehicle_type_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Vehicle Type') }}</option>
                                            @foreach($vehicle_types as $vehicle_type)
                                                <option value="{{ $vehicle_type->id }}"
                                                    {{ old('vehicle_type_id', $vehicle->vehicle_type_id) == $vehicle_type->id ? 'selected' : '' }}>
                                                    {{ $vehicle_type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('vehicle_type_id'))
                                            <div class="text-danger">{{ $errors->first('vehicle_type_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="owner_id">{{ __('Select Owner') }}</label>
                                        <select name="owner_id" id="owner" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Owner') }}</option>
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}" {{ old('owner_id', $vehicle->owner_id) == $owner->id ? 'selected' : '' }}>{{ $owner->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="driver_id">{{ __('Select Driver') }}</label>
                                        <select name="driver_id" id="driver" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Driver') }}</option>
                                            @foreach($drivers as $driver)
                                            <option value="{{ $driver->id }}" {{ old('driver_id', $vehicle->driver_id) == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">বর্তমান ইমেজসমূহ</label><br>
                                        @if ($vehicle->image)
                                            @foreach (json_decode($vehicle->image) as $img)
                                                <img src="{{ asset('storage/' . $img) }}" width="100" class="me-2 mb-2">
                                            @endforeach
                                        @else
                                            <p>কোনো ছবি পাওয়া যায়নি।</p>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">নতুন ইমেজ আপলোড করুন (একাধিক)</label>
                                        <input type="file" name="image[]" class="form-control" multiple>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ (old('status') ?? $vehicle->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $vehicle->status) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
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
