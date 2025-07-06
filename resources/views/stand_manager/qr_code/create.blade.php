@extends('stand_manager.layouts.master', ['page_slug' => 'qr-code'])
@section('title', 'QR Code Create')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="float-left card-title">
                            <h4>{{ __('Create QR Code') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('stand_manager.qr.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('stand_manager.qr.generate') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter The Notice Title" name="title" value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="url">{{ __('Enter URL:') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="url" class="form-control mt-3 mb-3" id="url"
                                            placeholder="Enter The Url" name="url" value="{{ old('url') }}" required>
                                        @if ($errors->has('url'))
                                            <div class="text-danger">{{ $errors->first('url') }}</div>
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
