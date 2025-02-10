@extends('forntend.layouts.master')
@section('title', 'Owner Dashboard')
@section('content')
    <section class="error_section pt-5 pb-5">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <h3>{{ __('Owner Profile Update') }}</h3>
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" style="border: 2px solid #ea1827" placeholder="Enter The Driver Name" name="name" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="description" style="border: 2px solid #ea1827" placeholder="Enter The Description" name="description" value="{{ old('description')  }}">
                                @if($errors->has('description'))
                                    <div class="text-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="designation">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="designation" style="border: 2px solid #ea1827" placeholder="Enter The Designation" name="designation" value="{{ old('designation')  }}">
                                @if($errors->has('designation'))
                                    <div class="text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label  class="mt-3" for="blood_group_id">{{ __('Blood Group') }}</label>
                                <select name="blood_group_id" id="blood_group_id" class="form-control form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('Select Blood Broup') }}</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}" 
                                            {{ old('blood_group_id', $driver->blood_group_id) == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_group }}
                                    @endforeach
                                </select>
                                @if($errors->has('blood_group'))
                                    <div class="text-danger">{{ $errors->first('blood_group_id') }}</div>
                                @endif
                            </div> --}}
                            {{-- <div class="form-group">
                                <label class="mt-3" for="division_id">{{ __('Division') }}</label>
                                <select name="division_id" id="division" class="form-control form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="" selected hidden>{{ __('বিভাগ') }}</option>
                                    @foreach ($divisions as $division)
                                        <option 
                                            value="{{ $division->id }}" 
                                            {{ old('division_id', $driver->division_id ?? '') == $division->id ? 'selected' : '' }}>
                                            {{ $division->division }}
                                        </option>
                                    @endforeach
                                </select>
                                    @if($errors->has('division_id'))
                                        <div class="text-danger">{{ $errors->first('division_id') }}</div>
                                    @endif
                            </div> --}}
                            <div class="form-group">
                                <label for="district_id" class="mt-3">{{ __('District') }}</label>
                                <select name="district_id" id="district" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('জেলা') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thana_id" class="mt-3">{{ __('Thana') }}</label>
                                <select name="thana_id" id="thana" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('থানা') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="union_id" class="mt-3">{{ __('Union') }}</label>
                                <select name="union_id" id="union" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('ইউনিয়ন') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stand_id" class="mt-3">{{ __('Stand') }}</label>
                                <select name="stand_id" id="stand" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('স্ট্যান্ড') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="vehicle_id" class="mt-3">{{ __('Vehicle') }}</label>
                                <select name="vehicle_id" id="Stand" class="form-select select_iteam" style="border: 2px solid #ea1827">
                                    <option value="">{{ __('গাড়ি') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('Email') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" style="border: 2px solid #ea1827" value="{{ old('email') }}" class="form-control" placeholder="Enter Driver Email">
                                @if($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-3">{{ __('Phone No.') }} <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" style="border: 2px solid #ea1827" value="{{ old('phone') }}" class="form-control" placeholder="Enter Driver Phone" value="{{ old('name') }}">
                                @if($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="driving_license">{{ __('Driving License') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="driving_license" style="border: 2px solid #ea1827" placeholder="Enter The Driving License" name="driving_license" value="{{ old('driving_license') }}">
                                @if($errors->has('driving_license'))
                                    <div class="text-danger">{{ $errors->first('driving_license') }}</div>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="image">{{ __('Image') }} <span class="text-danger">*</span></label>
                                @if($driver->image)
                                    <img src="" alt="" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                                <input type="file" class="form-control h-auto" id="image" placeholder="Enter Driver Image" name="image" style="border: 2px solid #ea1827">
                                @if($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn w-100 submitBtn" style="background-color: #ea1827; color: #FFFFFF;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        
                        </form>
                        
                    
                    </div>
                </div>
            </div>
        
        </div>
    </section>
    <section class="logout">
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" class="">
                            @csrf
                            <div class="form-grou">
                            <a class="dropdown-item" href="{{ route('owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection
    