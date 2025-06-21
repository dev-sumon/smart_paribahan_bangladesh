@extends('backend.layouts.master', ['page_slug' => 'dashboard'])

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-6">
        <h1 class="m-0">{{ __('Dashboard') }}</h1>
      </div> --}}
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <img src="{{ asset('storage/' . $admin->image) }}" alt="{{ $admin->name }}" width="80"
                            height="80" class="rounded-circle">
                        <h4>{{ __('Welcome back') }} {{ $admin->name }} {{ __('!') }}</h4>
                        <h3>{{ __('Today Sell') }}</h3>
                    </div>
                    <div class="icon">
                        <i class=""><img src="{{ asset('storage/' . $admin->image) }}" alt="{{ $admin->name }}"
                                width="100"></i>

                    </div>
                    {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>{{ __('Total Field Worker') }}</p>
                        <h3>{{ $field_worker }}</h3>
                        {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        {{-- <i class="ion ion-stats-bars"></i> --}}
                    </div>
                    <a href="{{ route('worker.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>{{ __('Total Stand Manager') }}</p>
                        <h3>{{ $stand_manager }}</h3>
                        {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-users-gear"></i>
                        {{-- <i class="ion ion-stats-bars"></i> --}}
                    </div>
                    <a href="{{ route('manager.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p>Total Division</p>
                        <h3>{{ $division }}</h3>
                        {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-layer-group"></i>
                        {{-- <i class="ion ion-stats-bars"></i> --}}
                    </div>
                    <a href="{{ route('division.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <p>{{ __('Total District') }}</p>
                        <h3>{{ $district }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-landmark"></i>
                    </div>
                    <a href="{{ route('district.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Thana') }}</p>
                        <h3>{{ $thana }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-building-shield"></i>
                    </div>
                    <a href="{{ route('thana.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Union') }}</p>
                        <h3>{{ $union }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-underline"></i>
                    </div>
                    <a href="{{ route('union.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Stand') }}</p>
                        <h3>{{ $stand }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-location"></i>
                    </div>
                    <a href="{{ route('stand.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Driver') }}</p>
                        <h3>{{ $driver }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-dharmachakra"></i>
                    </div>
                    <a href="{{ route('driver.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Owner') }}</p>
                        <h3>{{ $owner }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-circle-user"></i>
                    </div>
                    <a href="{{ route('owner.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Vehicle') }}</p>
                        <h3>{{ $vehicle }}</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <a href="{{ route('vehicle.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p>{{ __('Total Notice') }}</p>
                        <h3>{{ $notice }}</h3>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa-solid fa-bell"></i>
                    </div>
                    <a href="{{ route('notice.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
