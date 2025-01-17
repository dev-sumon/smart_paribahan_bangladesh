@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Union Create') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('union.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('union.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
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
                                        <label for="union">{{ __('Union') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="union" placeholder="Enter The Union Name" name="union" value="{{ old('union') }}">
                                        @if($errors->has('union'))
                                            <div class="text-danger">{{ $errors->first('union') }}</div>
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