@extends('backend.layouts.master', ['page_slug' => 'owner'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Owner Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('owner.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $owner->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $owner->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Blood Group') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->blood_group->blood_group ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mobile  No.') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Division') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->division->division ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District.') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->district->district ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Thana') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->thana->thana ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Union') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->union->union ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Stand') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->stand->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Vehicle Type') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->vehicle->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Vehicles License') }}</th>
                                            <th>{{ __(':') }}</th>
                                            {{-- <td> {{ $owner->vehicles_license }}</td> --}}
                                            {{-- @fore ($owner->vehicles as $vehicle)
                                                <td>
                                                    {{ $vehicle->name }} - {{ $vehicle->vehicle_licence }}
                                                </td>
                                            @endforelse --}}



                                            <td>
                                                @foreach ($owner->vehicles as $vehicle)
                                                    <p class="d-inline">{{ $vehicle->name }} -
                                                        {{ $vehicle->vehicle_licence }}, </p>
                                                @endforeach
                                            </td>

                                        </tr>

                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $owner->image) }}"
                                                    alt="{{ $owner->title }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $owner->statusBg() }}">{{ $owner->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->created_by ?? 'N/A' }}</td>
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
`
