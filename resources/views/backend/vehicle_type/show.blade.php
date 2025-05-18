@extends('backend.layouts.master', ['page_slug' => 'vehicle_type'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Vehicle Type Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('vehicle_type.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle_type->stand->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $vehicle_type->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $vehicle_type->image) }}" alt="{{ $vehicle_type->name }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $vehicle_type->statusBg() }}">{{ $vehicle_type->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $vehicle_type->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $vehicle_type->created_by ?? 'N/A' }}</td>
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
