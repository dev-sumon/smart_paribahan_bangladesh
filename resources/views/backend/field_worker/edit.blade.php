@extends('backend.layouts.master')


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
                            <a href="{{ route('worker.index') }}" class="btn btn-info">{{ __('back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('worker.update', $worker->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name" placeholder="Enter Field Worker Name" name="name" value="{{ old('name') ?? $worker->name }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone') ?? $worker->phone }}" class="form-control" placeholder="Enter Your Phone">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') ?? $worker->email }}" class="form-control" placeholder="Enter Your Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nid" class="mt-3">{{ __('NID No.') }} <span class="text-danger">*</span></label>
                                        <input type="number" name="nid" value="{{ old('nid') ?? $worker->nid }}" class="form-control" placeholder="Enter Your NID">
                                        @if($errors->has('nid'))
                                            <div class="text-danger">{{ $errors->first('nid') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                        @if($worker->image)
                                            <img src="{{ Storage::url($worker->image) }}" alt="{{ $worker->name }}" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control" id="image" placeholder="Enter Worker Image" name="image">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="father_name">{{ __('Father Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="father_name" placeholder="Enter Your Father Name" name="father_name" value="{{ old('father_name') ?? $worker->father_name }}">
                                        @if($errors->has('father_name'))
                                            <div class="text-danger">{{ $errors->first('father_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_name">{{ __('Mother Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mother_name" placeholder="Enter Your Mother Name" name="mother_name" value="{{ old('mother_name') ?? $worker->mother_name }}">
                                        @if($errors->has('mother_name'))
                                            <div class="text-danger">{{ $errors->first('mother_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter Your address" name="address" value="{{ old('address') ?? $worker->address }}">
                                        @if($errors->has('address'))
                                            <div class="text-danger">{{ $errors->first('address') }}</div>
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
                                            <option value="1" {{ (old('status') ?? $worker->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $worker->status) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
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