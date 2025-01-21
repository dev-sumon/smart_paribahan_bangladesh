@extends('backend.layouts.master',['page_slug'=>'admin'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Admin') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('admin.index') }}" class="btn btn-info">{{ __('back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name" placeholder="Enter Admin Name" name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nid">{{ __('NID No') }}<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="nid" placeholder="Enter NID Number" name="nid" value="{{ old('nid') }}">
                                        @if($errors->has('nid'))
                                            <div class="text-danger">{{ $errors->first('nid') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="father_name">{{ __('Father Name') }}<span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="father_name" placeholder="Enter Your Father Name" name="father_name" value="{{ old('father_name') }}">
                                        @if($errors->has('father_name'))
                                            <div class="text-danger">{{ $errors->first('father_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_name">{{ __('Mother Name') }}<span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="mother_name" placeholder="Enter Your Mother Name" name="mother_name" value="{{ old('mother_name') }}">
                                        @if($errors->has('mother_name'))
                                            <div class="text-danger">{{ $errors->first('mother_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }}</label>
                                        <input type="file" class="form-control h-auto" id="image" placeholder="Enter Stand Image" name="image" value="{{ old('image') }}">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Your Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
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