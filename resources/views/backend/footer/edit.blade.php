@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Update Footer') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('footer.index') }}" class="btn btn-info">{{ __('back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="logo">{{ __('Footer Logo') }} <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="logo" placeholder="Enter Stand Logo" name="logo" value="{{ old('logo') }}">
                                        @if($errors->has('logo'))
                                            <div class="text-danger">{{ $errors->first('logo') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="description" placeholder="Enter Footer Description" name="description" value="{{ old('description') ?? $footer->description }}">
                                        @if($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                        <input type="tell" class="form-control" id="phone" placeholder="Enter Footer Phone" name="phone" value="{{ old('phone') ?? $footer->phone }}">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ old('email') ?? $footer->email }}">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="goole_play">{{ __('Goole Play') }} <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="goole_play" placeholder="Enter Google Play Image" name="goole_play" value="{{ old('goole_play') }}">
                                        @if($errors->has('goole_play'))
                                            <div class="text-danger">{{ $errors->first('goole_play') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="app_store">{{ __('App Store') }} <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="app_store" placeholder="Enter App Store Image" name="app_store" value="{{ old('app_store') }}">
                                        @if($errors->has('app_store'))
                                            <div class="text-danger">{{ $errors->first('app_store') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ (old('status') ?? $footer->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $footer->status) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
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