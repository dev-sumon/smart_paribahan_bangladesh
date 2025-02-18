@extends('backend.layouts.master', ['page_slug' => 'notice'])


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
                                        <label for="division">Division<span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" selected hidden>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('division_id'))
                                            <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="district">District<span class="text-danger">*</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" selected hidden>Select District</option>
                                        </select>
                                        @if($errors->has('district_id'))
                                            <div class="text-danger">{{ $errors->first('district_id') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="thana">Thana<span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" selected hidden>Select Thana</option>
                                        </select>
                                        @if($errors->has('thana_id'))
                                            <div class="text-danger">{{ $errors->first('thana_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="union">Union<span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" selected hidden>Select Union</option>
                                        </select>
                                        @if($errors->has('union_id'))
                                            <div class="text-danger">{{ $errors->first('union_id') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="stand">Stand<span class="text-danger">*</span></label>
                                        <select name="stand_id" id="stand" class="form-control">
                                            <option value="" selected hidden>Select Stand</option>
                                        </select>
                                        @if($errors->has('stand_id'))
                                        <div class="text-danger">{{ $errors->first('stand_id') }}</div>
                                    @endif
                                    </div>
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
                                        <input type="file" name="file" value="{{ old('file') }}" class="form-control h-auto" placeholder="Enter The File">
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

            $('#district').on('change', function() { 
                let districtId = $(this).val();
                let _url = '{{ route("ajax.thana", ":id") }}'.replace(':id', districtId); 

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let thanas = response.data;
                        let thanaSelect = $('#thana');
                        thanaSelect.empty();
                        thanaSelect.append('<option value="">Select Thana</option>');

                        $.each(thanas, function(index, thana) {
                            thanaSelect.append('<option value="' + thana.id + '">' + thana.thana + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

            $('#thana').on('change', function() { 
                let unionId = $(this).val();
                let _url = '{{ route("ajax.union", ":id") }}'.replace(':id', unionId); 

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let unions = response.data;
                        let unionSelect = $('#union');
                        unionSelect.empty();
                        unionSelect.append('<option value="">Select Union</option>');

                        $.each(unions, function(index, union) {
                            unionSelect.append('<option value="' + union.id + '">' + union.union + '</option>');
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $('#union').on('change', function() { 
                let standId = $(this).val();
                let _url = '{{ route("ajax.stand", ":id") }}'.replace(':id', standId); 

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let stands = response.data;
                        let standSelect = $('#stand');
                        standSelect.empty();
                        standSelect.append('<option value="">Select Stand</option>');

                        $.each(stands, function(index, stand) {
                            standSelect.append('<option value="' + stand.id + '">' + stand.name + '</option>');
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