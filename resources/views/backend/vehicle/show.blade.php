@extends('backend.layouts.master', ['page_slug' => 'vehicle'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Vehicle Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('vehicle.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Vehicle Licence') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle->vehicle_licence }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Vehicle Type') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle->vehicleType->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Owner Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle->owner->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Driver Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ optional($vehicle->driver)->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $vehicle->statusBg() }}">{{ $vehicle->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $vehicle->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created B') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $vehicle->created_by ?? 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
