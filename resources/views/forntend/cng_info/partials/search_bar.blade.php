<form action="{{ route('f.home.search') }}" method="post" >
    @csrf
    <div class="row">
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="division_id" id="division">
                    <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ $division->id == old( 'division_id', $division->id) ? 'selected' : '' }}>{{ $division->division }}</option>
                    @endforeach
                </select>
                @if($errors->has('division_id'))
                <div class="text-danger">{{ $errors->first('division_id') }}</div>
                @endif
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="district_id" id="district">
                    <option value="">{{ __('জেলা') }}</option>
                </select>
                {{-- <select name="district_id" id="district">
                    <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ $district->id == old( 'district_id', $district->id) ? 'selected' : '' }}>{{ $district->district }}</option>
                    @endforeach
                </select>
                @if($errors->has('division_id'))
                <div class="text-danger">{{ $errors->first('division_id') }}</div>
                @endif --}}
            </div>
        </div>
        
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="thana_id" id="thana">
                    <option value="">{{ __('থানা') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="union_id" id="union">
                    <option value="">{{ __('ইউনিয়ন') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="stand_id" id="stand">
                    <option value="">{{ __('স্ট্যান্ড') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="vehicle_id" id="vehicle">
                    <option value="">{{ __('গাড়ি') }}</option>
                </select>
            </div>
        </div>
        <div class="submit">
            <button class="btn btn-outline-success mt-3 mb-5" type="submit">{{ __('ক্লিক করুন') }}</button>
        </div>
    </div>
</form>


@push('js')
<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // ফর্মের ডিফল্ট সাবমিশন বন্ধ করুন

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#searchResult').html(response); // সার্চ রেজাল্ট দেখান
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@endpush