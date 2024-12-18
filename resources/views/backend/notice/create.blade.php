@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create New Notice') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('notice.index') }}" class="btn btn-info">{{ __('back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter The Notice Title" name="title" value="{{ old('title') }}">
                                        @if($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="mt-3">{{ __('Date') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="date" value="{{ old('date') }}" class="form-control" placeholder="Enter The Date">
                                        @if($errors->has('date'))
                                            <div class="text-danger">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="mt-3">{{ __('Category') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="category" value="{{ old('category') }}" class="form-control" placeholder="Enter The Category">
                                        @if($errors->has('category'))
                                            <div class="text-danger">{{ $errors->first('category') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="file" class="mt-3">{{ __('file') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file" value="{{ old('file') }}" class="form-control" placeholder="Enter The File">
                                        @if($errors->has('file'))
                                            <div class="text-danger">{{ $errors->first('file') }}</div>
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