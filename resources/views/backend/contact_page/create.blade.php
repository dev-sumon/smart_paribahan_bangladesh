@extends('backend.layouts.master', ['page_slug' => 'contact'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create New Contact') }}</h4>
                        </span>
                        {{-- <span class="float-right">
                            <a href="{{ route('contact.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter The Title" name="title" value="{{ old('title', $contact->title ?? '') }}">
                                        @if($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="mt-3">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        {{-- <input type="text" name="description" value="{{ old('description', $contact->description ?? '') }}" class="form-control" placeholder="Enter The description"> --}}
                                        <textarea name="description" class="form-control" style="height: 300px" placeholder="Enter The description">{{ old('description', $contact->description ?? '') }}</textarea>
                                        @if($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="mt-3">{{ __('address') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{ old('address', $contact->address ?? '') }}" class="form-control" placeholder="Enter The address">
                                        @if($errors->has('address'))
                                            <div class="text-danger">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control" placeholder="Enter Your Phone">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="mt-3">{{ __('Phone No 2.') }} <span class="text-danger">*</span></label>
                                        <input type="tel" name="optional_number" value="{{ old('optional_number', $contact->optional_number ?? '') }}" class="form-control" placeholder="Enter Your Phone">
                                        @if($errors->has('optional_number'))
                                            <div class="text-danger">{{ $errors->first('optional_number') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ old('email', $contact->email ?? '') }}" class="form-control" placeholder="Enter Your Email">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Save') }}
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