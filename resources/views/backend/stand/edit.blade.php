@extends('backend.layouts.master', ['page_slug' => 'stand'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Stand') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('stand.index') }}" class="btn btn-info">{{ __('back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('stand.update', $stand->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Stand Name') }} <span class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="name" placeholder="Enter Stand Name" name="name" value="{{ $stand->name ?? old('name')  }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="slug" placeholder="Enter slug" name="slug" value="{{ $stand->slug ?? old('slug') }}">
                                        @if($errors->has('slug'))
                                            <div class="text-danger">{{ $errors->first('slug') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="division_id">{{ __('Division') }}</label>
                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Division') }}</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" 
                                                {{ old('division_id', $stand->division_id ?? '') == $division->id ? 'selected' : '' }}>
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
                                                    {{ old('district_id', $stand->district_id ?? '') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('district_id'))
                                            <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="thana_id">{{ __('Thana') }}</label>
                                        <select name="thana_id" id="thana_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                            @foreach ($thanas as $thana)
                                                <option 
                                                    value="{{ $thana->id }}" 
                                                    {{ old('thana_id', $stand->thana_id ?? '') == $thana->id ? 'selected' : '' }}>
                                                    {{ $thana->thana }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('thana_id'))
                                            <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="mt-3" for="union_id">{{ __('Union') }}</label>
                                        <select name="union_id" id="union_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Union') }}</option>
                                            @foreach ($unions as $union)
                                                <option 
                                                    value="{{ $union->id }}" 
                                                    {{ old('union_id', $stand->union_id ?? '') == $union->id ? 'selected' : '' }}>
                                                    {{ $union->union }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('union_id'))
                                            <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="w-100 p-3" rows="6" style="outline: none;">{{ old('description', $stand->description) }}</textarea>
                                        @if($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="location">{{ __('Location') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter Stand Location" name="location" value="{{ old('location') ?? $stand->location }}">
                                        @if($errors->has('location'))
                                            <div class="text-danger">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                        @if($stand->image)
                                            <img src="{{ Storage::url($stand->image) }}" alt="{{ $stand->name }}" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control" id="image" placeholder="Enter Stand Image" name="image">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ (old('status') ?? $stand->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $stand->status) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
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
@push('script')
    <script>
        $(document).ready(function () {
            $('#name').on('keyup', function () {
                slugGenerate($(this));
            });
        })
    </script>
@endpush