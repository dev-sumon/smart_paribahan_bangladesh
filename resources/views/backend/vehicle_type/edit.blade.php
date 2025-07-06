@extends('backend.layouts.master', ['page_slug' => 'vehicle_type'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Update Vehicle Type') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('vehicle_type.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('vehicle_type.update_store', $vehicle_type->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name"
                                            placeholder="Enter vehicle Name" name="name"
                                            value="{{ $vehicle_type->name ?? old('name') }}">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="stand">{{ __('Select Stand') }}</label>
                                        <select name="stand_id" id="stand" class="form-control">
                                            <option value="" hidden>{{ __('Select Stand') }}</option>
                                            @foreach ($stands as $stand)
                                                <option value="{{ $stand->id }}"
                                                    {{ old('stand_id', $vehicle_type->stand_id) == $stand->id ? 'selected' : '' }}>
                                                    {{ $stand->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('stand_id'))
                                            <div class="text-danger">{{ $errors->first('stand_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>
                                        @if ($vehicle_type->image)
                                            <img src="{{ Storage::url($vehicle_type->image) }}"
                                                alt="{{ $vehicle_type->name }}" class="display-image h-auto"
                                                style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control h-auto" id="image"
                                            placeholder="Enter vehicle image" name="image">
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                {{ ($vehicle_type->status ?? old('status')) == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0"
                                                {{ ($vehicle_type->status ?? old('status')) == 0 ? 'selected' : '' }}>
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
