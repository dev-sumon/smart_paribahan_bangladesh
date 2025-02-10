@extends('backend.layouts.master', ['page_slug' => 'driver'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Driver Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('driver.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $driver->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $driver->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Designation') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $driver->designation }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mobile  No.') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Vehicles License Number') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $driver->owner ? $driver->owner->vehicles_license : __('Not Assigned') }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Driving License') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->driving_license }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Blood Group') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->blood_group->blood_group ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $driver->image) }}" alt="{{ $driver->name }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $driver->statusBg() }}">{{ $driver->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $driver->created_by ?? 'N/A' }}</td>
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
