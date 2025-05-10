@extends('backend.layouts.master', ['page_slug' => 'thana'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Thana Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('thana.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('thana.update', $thana->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="division">Division <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $thana->division_id == $division->id ? 'selected' : '' }}>
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
                                                <option value="{{ $district->id }}" {{ $thana->district_id == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="thana">{{ __('Thana') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thana" placeholder="Enter The Thana Name" name="thana" value="{{ old('thana') ?? $thana->thana }}">
                                        @if($errors->has('thana'))
                                            <div class="text-danger">{{ $errors->first('thana') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ (old('status') ?? $thana->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $thana->status) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        @if($errors->has('status'))
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
                let _url = '{{ route("ajax.division", ":id") }}'.replace(':id', divisionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let districts = response.data;
                        let districtSelect = $('#district');
                        districtSelect.empty();
                        districtSelect.append('<option value="">Select District</option>');

                        $.each(districts, function(index, district) {
                            districtSelect.append('<option value="' + district.id + '">' + district.district + '</option>');
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