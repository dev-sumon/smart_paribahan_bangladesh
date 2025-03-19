@extends('forntend.layouts.master')
@section('title', 'Driver Dashboard')
@section('content')
     <!-- error_section section design start -->
     <section class="error_section pt-5 pb-5">
        <div class="container">
            <div class="error_image d-flex">
                <div class="error">
                    
                </div>
                {{-- <div class="image">
                    <img src="{{ asset('forntend/images/Frame.png') }}" alt="">
                </div> --}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <div class="top d-flex justify-content-between pb-3">
                            <h3 class="text-start">{{ __('মাঠকর্মী প্রোফাইল') }}</h3>
                            <a href="" class="text-end ms-auto btn w-10 submitBtn" style="background-color: #ea1827; color: #FFFFFF;">Add</a>
                        </div>
                        
                        {{-- <div class="header">
                            <span class="float-left">
                                <h4>{{ __('Field Worker List') }}</h4>
                            </span>
                            <span class="float-right">
                                <a href="" class="btn btn-info">{{ __('Create') }}</a>
                            </span>
                        </div> --}}
                        <form action="{{ route('field_worker.updateDashboard', $worker->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{ __('নাম') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" style="border: 2px solid #ea1827" placeholder="আপনার নাম লিখুন" name="name" value="{{ old('name')  ?? $worker->name }}">
                                @if($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="mt-3">{{ __('মোবাইল নাম্বার') }} <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" style="border: 2px solid #ea1827" class="form-control" placeholder="মোবাইল নাম্বার" value="{{  $worker->phone ?? old('phone') }}">
                                @if($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="mt-3">{{ __('মেইল লিখুন') }} <span class="text-danger">*</span></label>
                                <input type="email" name="email" style="border: 2px solid #ea1827" value="{{ old('email') ?? $worker->email }}" class="form-control" placeholder="মেইল লিখুন">
                                @if($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nid" class="mt-3">{{ __('জাতীয় পরিচয়পত্র নম্বর') }} <span class="text-danger">*</span></label>
                                <input type="number" name="nid" value="{{ old('nid') ?? $worker->nid }}" class="form-control" placeholder="Enter Your NID" style="border: 2px solid #ea1827">
                                @if($errors->has('nid'))
                                    <div class="text-danger">{{ $errors->first('nid') }}</div>
                                @endif
                            </div>
                            
                           
                            <div class="form-group">
                                <label for="image">{{ __('ছবি') }} <span class="text-danger">*</span></label>
                                @if($worker->image)
                                    <img src="{{ asset('storage/' . $worker->image) }}" alt="Driver Image" class="display-image" style="width: 100%; height: auto; object-fit: cover;">
                                @else
                                    <p>{{ __('No image available') }}</p>
                                @endif
                                <input type="file" class="form-control h-auto" id="image" placeholder="Enter Driver Image" name="image" style="border: 2px solid #ea1827">
                                @if($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="father_name">{{ __('পিতার নাম') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="father_name" placeholder="Enter Your Father Name" style="border: 2px solid #ea1827" name="father_name" value="{{ old('father_name') ?? $worker->father_name }}">
                                @if($errors->has('father_name'))
                                    <div class="text-danger">{{ $errors->first('father_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mother_name">{{ __('মায়ের নাম') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="mother_name" style="border: 2px solid #ea1827" placeholder="Enter Your Mother Name" name="mother_name" value="{{ old('mother_name') ?? $worker->mother_name }}">
                                @if($errors->has('mother_name'))
                                    <div class="text-danger">{{ $errors->first('mother_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('ঠিকানা') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="address" style="border: 2px solid #ea1827" placeholder="Enter Your address" name="address" value="{{ old('address') ?? $worker->address }}">
                                @if($errors->has('address'))
                                    <div class="text-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
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
                    <div class="col-md-2 m-auto">
                        <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="logout_form">
                            @csrf
                            <div class="form-group">
                            <a class="dropdown-item text-center" href="{{ route('driver.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <!-- error_section section design end -->
@endsection