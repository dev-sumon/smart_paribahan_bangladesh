@extends('field_worker.layouts.master', ['page_slug' => 'stand'])
@section('title', 'Stand Edit')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Stand Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.stand.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('field_worker.stand.update', $stand->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}"
                                                    {{ $stand->division_id == $division->id ? 'selected' : '' }}>
                                                    {{ $division->division }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" hidden>Select District</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{ $stand->district_id == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thana">Thana <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" hidden>Select Thana</option>
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana->id }}"
                                                    {{ $stand->thana_id == $thana->id ? 'selected' : '' }}>
                                                    {{ $thana->thana }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="union">Union <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" hidden>Select Union</option>
                                            @foreach ($unions as $union)
                                                <option value="{{ $union->id }}"
                                                    {{ $stand->union_id == $union->id ? 'selected' : '' }}>
                                                    {{ $union->union }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{ __('Stand Name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="name" class="form-control" id="title"
                                            placeholder="Enter Stand Name" name="title"
                                            value="{{ old('title') ?? $stand->title }}" oninput="slugGenerate($(this))">

                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">{{ __('Slug') }}</label>
                                            <input type="text" name="slug" class="form-control" id="slug"
                                                value="{{ old('slug', $stand->slug) }}">
                                            @error('slug')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">{{ __('Description') }} <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="description" class="w-100 p-3" rows="6" style="outline: none;">{{ old('description', $stand->description) }}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="location">{{ __('Location') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="url" class="form-control" id="location"
                                            placeholder="Enter Stand Location" name="location"
                                            value="{{ old('location') ?? $stand->location }}">
                                        @if ($errors->has('location'))
                                            <div class="text-danger">{{ $errors->first('location') }}</div>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>
                                        @if ($stand->image)
                                            <img src="{{ Storage::url($stand->image) }}" alt="{{ $stand->title }}"
                                                class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control h-auto" id="image"
                                            placeholder="Enter Stand Image" name="image">
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span
                                                class="text-danger">*</span></label>

                                        @if ($stand->image)
                                            @php
                                                $images = is_array($stand->image)
                                                    ? $stand->image
                                                    : json_decode($stand->image, true);
                                            @endphp

                                            <div class="row mb-2">
                                                @foreach ($images as $img)
                                                    <div class="col-md-3 mb-2">
                                                        <img src="{{ Storage::url($img) }}" alt="{{ $stand->title }}"
                                                            class="img-fluid rounded"
                                                            style="width: 100%; height: 150px; object-fit: cover;">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif

                                        <input type="file" class="form-control h-auto" id="image" name="image[]"
                                            multiple>

                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                {{ (old('status') ?? $stand->status) == 1 ? 'selected' : '' }}>
                                                {{ __('Active') }}</option>
                                            <option value="0"
                                                {{ (old('status') ?? $stand->status) == 0 ? 'selected' : '' }}>
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


@push('script')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                let divisionId = $(this).val();
                let _url = '{{ route('ajax.division', ':id') }}'.replace(':id', divisionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let districts = response.data;
                        let districtSelect = $('#district');
                        districtSelect.empty();
                        districtSelect.append('<option value="">Select District</option>');

                        $.each(districts, function(index, district) {
                            districtSelect.append('<option value="' + district.id +
                                '">' + district.district + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#district').on('change', function() {
                let districtId = $(this).val();
                let _url = '{{ route('ajax.thana', ':id') }}'.replace(':id', districtId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let thanas = response.data;
                        let thanaSelect = $('#thana');
                        thanaSelect.empty();
                        thanaSelect.append('<option value="">Select Thana</option>');

                        $.each(thanas, function(index, thana) {
                            thanaSelect.append('<option value="' + thana.id + '">' +
                                thana.thana + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#thana').on('change', function() {
                let unionId = $(this).val();
                let _url = '{{ route('ajax.union', ':id') }}'.replace(':id', unionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let unions = response.data;
                        let unionSelect = $('#union');
                        unionSelect.empty();
                        unionSelect.append('<option value="">Select Union</option>');

                        $.each(unions, function(index, union) {
                            unionSelect.append('<option value="' + union.id + '">' +
                                union.union + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
