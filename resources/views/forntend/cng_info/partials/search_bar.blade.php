<form action="{{ route('f.home.search') }}" method="post" >
    @csrf
    <div class="row">
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="division_id" id="division">
                    <option value="" selected hidden>{{ __('Division') }}</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->division }}</option>
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
                    <option value="">{{ __('District') }}</option>
                </select>
            </div>
        </div>
        
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="thana_id" id="thana">
                    <option value="">{{ __('thana') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="union_id" id="union">
                    <option value="">{{ __('Union') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="stand_id" id="stand">
                    <option value="">{{ __('Stand') }}</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-sm-12 d-flex flex-column align-items-center text-center">
            <div class="dropdown">
                <select name="vehicle_id" id="vehicle">
                    <option value="">{{ __('Vehicle') }}</option>
                </select>
            </div>
        </div>
        <div class="submit">
            <button class="btn btn-outline-success mt-3 mb-5" type="submit">{{ __('Click') }}</button>
        </div>
    </div>
</form>