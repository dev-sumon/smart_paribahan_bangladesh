@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Division Create') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('division.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('division.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="division">{{ __('Division') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="division" placeholder="Enter The Division Name" name="division" value="{{ old('division') }}">
                                        @if($errors->has('division'))
                                            <div class="text-danger">{{ $errors->first('division') }}</div>
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