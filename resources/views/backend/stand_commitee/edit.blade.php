@extends('backend.layouts.master', ['page_slug' => 'commitee'])


@section('title', 'Stand Commitee')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('Create new Stand Commitee') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('commitee.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('commitee.update', $commitee->id ) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('Name ') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" name="name" value="{{ $commitee->name ?? old('name') }}">
                                        @if($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="designation">{{ __('Designation ') }}<span class="text-danger">*</span></label>
                                        <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Your Designation" name="designation" value="{{ $commitee->designation ?? old('designation') }}">
                                        @if($errors->has('designation'))
                                            <div class="text-danger">{{ $errors->first('designation') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">{{ __('Phone ') }}<span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone Number" value="{{ $commitee->phone ?? old('phone') }}">
                                        @if($errors->has('phone'))
                                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('Email ') }}<span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your email" value="{{ $commitee->email ?? old('email') }}">
                                        @if($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                        @if($commitee->image)
                                            <img src="{{ Storage::url($commitee->image) }}" alt="{{ $commitee->name }}" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                        @else
                                            <p>{{ __('No image available') }}</p>
                                        @endif
                                        <input type="file" class="form-control h-auto" id="image" placeholder="Enter commitee Image" name="image">
                                        @if($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="division">{{ __('Division') }} <span class="text-danger">*</span></label>
                                        <select name="division_id" id="division" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Division') }}</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $commitee->division_id == $division->id ? 'selected' : '' }}>{{ $division->division }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="district">{{ __('District') }}<span class="text-danger"> *</span></label>
                                        <select name="district_id" id="district" class="form-control">
                                            <option value="" selected hidden>{{ __('Select District') }}</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ $commitee->district_id == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="thana">{{ __('Thana') }} <span class="text-danger">*</span></label>
                                        <select name="thana_id" id="thana" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Thana') }}</option>
                                            @foreach ($thanas as $thana)
                                                <option value="{{ $thana->id }}" {{ $commitee->thana_id == $thana->id ? 'selected' : '' }}>
                                                    {{ $thana->thana }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="union">{{ __('Union') }} <span class="text-danger">*</span></label>
                                        <select name="union_id" id="union" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Union') }}</option>
                                            @foreach ($unions as $union)
                                                <option value="{{ $union->id }}" {{ $commitee->union_id == $union->id ? 'selected' : '' }}>
                                                    {{ $union->union }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stand">{{ __('Stand') }} <span class="text-danger">*</span></label>
                                        <select name="stand_id" id="stand" class="form-control">
                                            <option value="" selected hidden>{{ __('Select Stand') }}</option>
                                            @foreach ($stands as $stand)
                                                <option value="{{ $stand->id }}" {{ $commitee->stand_id == $stand->id ? 'selected' : '' }}>
                                                    {{ $stand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ ($commitee->status ?? old('status')) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ ($commitee->status ?? old('status')) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
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

