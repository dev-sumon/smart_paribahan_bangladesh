@extends('forntend.layouts.master')
@section('title', 'Serial Now')
@section('content')
    <section class="register_section pt-5 py-5">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('Serial Search') }}</h4>
                {{-- Error Message --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('driver.serial.show') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="division">{{ __('বিভাগ') }}</label>
                        <select name="division_id" id="division" class="form-control">
                            <option value="" selected hidden>{{ __('বিভাগ নির্বাচন করুন') }}</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->division }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('division_id'))
                            <div class="text-danger">{{ $errors->first('division_id') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="district">{{ __('জেলা') }}</label>
                        <select name="district_id" id="district" class="form-control">
                            <option value="" selected hidden>{{ __('জেলা নির্বাচন করুন') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thana">{{ __('থানা ') }}</label>
                        <select name="thana_id" id="thana" class="form-control">
                            <option value="" selected hidden>{{ __('থানা নির্বাচন করুন') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="union">{{ __('ইউনিয়ন') }} </label>
                        <select name="union_id" id="union" class="form-control">
                            <option value="" selected hidden>{{ __('ইউনিয়ন নির্বাচন করুন') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stand">{{ __('স্ট্যান্ড') }}</label>
                        <select name="stand_id" id="stand" class="form-control">
                            <option value="" selected hidden>{{ __('স্ট্যান্ড নির্বাচন করুন') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger w-100 mb-3 login">
                            {{ __('Search') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
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
                        districtSelect.append('<option value="">জেলা নির্বাচন করুন</option>');

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
                        thanaSelect.append('<option value="">থানা নির্বাচন করুন</option>');

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
                        unionSelect.append('<option value="">ইউনিয়ন নির্বাচন করুন</option>');

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

            $('#union').on('change', function() {
                let standId = $(this).val();
                let _url = '{{ route('ajax.stand', ':id') }}'.replace(':id', standId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let stands = response.data;
                        let standSelect = $('#stand');
                        standSelect.empty();
                        standSelect.append('<option value="">স্ট্যান্ড নির্বাচন করুন</option>');

                        $.each(stands, function(index, stand) {
                            standSelect.append('<option value="' + stand.id + '">' +
                                stand.title + '</option>');
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
