@extends('forntend.layouts.master')
@section('title', 'search profile')
@section('content')

<!-- notice section start  -->
<section class="notice">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 col-lg-9">
                @foreach ($vehicles as $key=>$vehicle)
                    
                <h4>{{ $vehicle->vehicle_licence }}</h4>
                @endforeach
            </div>
            <div class="col-md-12 col-lg-9">
                @foreach ($drivers as $key=>$driver)
                    
                <h4>{{ $driver->driving_license }}</h4>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection