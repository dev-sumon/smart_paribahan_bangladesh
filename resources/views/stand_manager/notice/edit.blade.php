@extends('stand_manager.layouts.master', ['page_slug' => 'notice'])
@section('title', 'Stand Notice')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Notice Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('notice.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('stand_manager.notice.stand.manager.updae', $notice->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- <div class="form-group">
                                        <label for="division">{{ __('Division') }}<span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Division') }}</option>
                                            @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}" {{ $notice->division_id == $division->id ? 'selected' : '' }}>
                                                {{ $division->division }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('division_id'))
                                            <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="district">{{ __('District') }}<span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" selected hidden>{{ __('Select District') }}</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ $notice->district_id == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('district_id'))
                                            <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="thana">{{ __('Thana') }}<span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana->id }}" {{ $notice->thana_id == $thana->id ? 'selected' : '' }}>
                                                    {{ $thana->thana }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('thana_id'))
                                            <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="union">{{ __('Union') }}<span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Union') }}</option>
                                            @foreach ($unions as $union)
                                                <option value="{{ $union->id }}" {{ $notice->union_id == $union->id ? 'selected' : '' }}>
                                                    {{ $union->union }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('union_id'))
                                            <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label for="stand">{{ __('Stand') }}<span class="text-danger">*</span></label>
                                        <select name="stand_id" id="stand" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Stand') }}</option>
                                            @foreach ($stands as $stand)
                                                <option value="{{ $stand->id }}"
                                                    {{ $notice->stand_id == $stand->id ? 'selected' : '' }}>
                                                    {{ $stand->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('stand_id'))
                                            <div class="text-danger">{{ $errors->first('stand_id') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="title">{{ __('Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="Enter The Notice Title" name="title"
                                            value="{{ old('title') ?? $notice->title }}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="date" class="mt-3">{{ __('Date') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="date" value="{{ old('date') ?? $notice->date }}"
                                            class="form-control" placeholder="Enter The Date">
                                        @if ($errors->has('date'))
                                            <div class="text-danger">{{ $errors->first('date') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="notice_category">{{ __('Category') }}<span
                                                class="text-danger">*</span></label>
                                        <select name="notice_category_id" id="notice_category_id" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Notice Category') }}
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $notice->notice_category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('notice_category_id'))
                                            <div class="text-danger">{{ $errors->first('notice_category_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="file" class="mt-3">{{ __('file') }} <span
                                                class="text-danger">*</span></label>
                                        @if ($notice->file)
                                            <img src="{{ Storage::url($notice->file) }}" alt="{{ $notice->file }}">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" name="file" value="{{ old('file') }}"
                                            class="form-control h-auto" placeholder="Enter The File">
                                        @if ($errors->has('file'))
                                            <div class="text-danger">{{ $errors->first('file') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                {{ (old('status') ?? $notice->status) == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0"
                                                {{ (old('status') ?? $notice->status) == 0 ? 'selected' : '' }}>
                                                {{ __('Deactive') }}</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Update') }}
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
