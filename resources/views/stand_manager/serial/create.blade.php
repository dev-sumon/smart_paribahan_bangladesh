@extends('stand_manager.layouts.master', ['page_slug' => 'serial'])
@section('title', 'Vehicle Serial List')
@section('content')
    <section class="register_section pt-5 py-5">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="card p-4 shadow-sm" style="max-width: 400px; width: 100%; border-radius: 15px">
                <h4 class="mb-4">{{ __('serial din') }}</h4>
                {{-- Error Message --}}
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('stand_manager.serial.manager.stand.serials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="driver_id">{{ __('ড্রাইভার নির্বাচন করুন') }}</label>
                        <select name="driver_id" id="driver_id" class="form-control" style="width: 100%;">
                        </select>
                    </div>

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

                    <div class="form-group mt-3">
                        <label for="district">{{ __('জেলা') }}</label>
                        <select name="district_id" id="district" class="form-control">
                            <option value="" selected hidden>{{ __('জেলা নির্বাচন করুন') }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="thana">{{ __('থানা ') }}</label>
                        <select name="thana_id" id="thana" class="form-control">
                            <option value="" selected hidden>{{ __('থানা নির্বাচন করুন') }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="union">{{ __('ইউনিয়ন') }} </label>
                        <select name="union_id" id="union" class="form-control">
                            <option value="" selected hidden>{{ __('ইউনিয়ন নির্বাচন করুন') }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="stand">{{ __('স্ট্যান্ড') }}</label>
                        <select name="stand_id" id="stand" class="form-control">
                            <option value="" selected hidden>{{ __('স্ট্যান্ড নির্বাচন করুন') }}</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-danger w-100 mb-3 login">
                            {{ __('Check In') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Division change -> load Districts
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
                        districtSelect.append(
                            '<option value="" selected hidden>জেলা নির্বাচন করুন</option>');

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

            // District change -> load Thanas
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
                        thanaSelect.append(
                            '<option value="" selected hidden>থানা নির্বাচন করুন</option>');

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

            // Thana change -> load Unions
            $('#thana').on('change', function() {
                let thanaId = $(this).val();
                let _url = '{{ route('ajax.union', ':id') }}'.replace(':id', thanaId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let unions = response.data;
                        let unionSelect = $('#union');
                        unionSelect.empty();
                        unionSelect.append(
                            '<option value="" selected hidden>ইউনিয়ন নির্বাচন করুন</option>'
                            );

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

            // Union change -> load Stands
            $('#union').on('change', function() {
                let unionId = $(this).val();
                let _url = '{{ route('ajax.stand', ':id') }}'.replace(':id', unionId);

                $.ajax({
                    url: _url,
                    type: 'GET',
                    success: function(response) {
                        let stands = response.data;
                        let standSelect = $('#stand');
                        standSelect.empty();
                        standSelect.append(
                            '<option value="" selected hidden>স্ট্যান্ড নির্বাচন করুন</option>'
                            );

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

            // Driver select2 ajax search
            $('#driver_id').select2({
                placeholder: 'ড্রাইভার সার্চ করুন',
                ajax: {
                    url: '{{ route('stand_manager.ajax.searchDrivers') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1
            });
        });
    </script>
@endpush
