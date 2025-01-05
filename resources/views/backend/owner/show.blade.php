@extends('backend.layouts.master')


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
                                            <td>{{ $owner->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $owner->description }}</td>
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
                                            <th>{{ __('Vehicles License') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->vehicles_license }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Blood Group') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $owner->blood_group }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $owner->image) }}" alt="{{ $owner->name }}" width="100"></td>
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
                                            <th>{{ __('Created By') }}y</th>
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