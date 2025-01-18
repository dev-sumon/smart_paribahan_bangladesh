@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Thana Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('thana.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('thana.update', $thana->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="mt-3" for="division_id">{{ __('Division') }}</label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Division') }}</option>
                                            @foreach ($divisions as $division)
                                                <option 
                                                    value="{{ $division->id }}" 
                                                    {{ old('division_id', $thana->district->division_id ?? '') == $division->id ? 'selected' : '' }}>
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
                                                    {{ old('district_id', $thana->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('district_id'))
                                            <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="thana">{{ __('Thana') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thana" placeholder="Enter The Thana Name" name="thana" value="{{ old('thana') ?? $thana->thana }}">
                                        @if($errors->has('thana'))
                                            <div class="text-danger">{{ $errors->first('thana') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ (old('status') ?? $thana->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $thana->status) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
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