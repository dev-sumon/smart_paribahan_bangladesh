@extends('field_worker.layouts.master', ['page_slug' => 'blog'])
@section('title', 'Blog Create')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d- justify-content-between">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Vehicle') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.blog.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('field_worker.blog.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter Blog Title" name="title" value="{{ old('title') }}"
                                            oninput="slugGenerate($(this))">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <!-- Slug -->
                                    <div class="form-group mt-3">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                            <input type="text" name="slug" class="form-control" id="slug"
                                                value="{{ old('slug') }}">
                                            @error('slug')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="description">{{ __('Description') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Enter Description"
                                            style="width: 100%; height: 400px;">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" class="form-control h-auto" id="image"
                                            placeholder="Enter The Blog Image" name="image" value="{{ old('image') }}">
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                                {{ __('Deactive') }}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
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
