@extends('backend.layouts.master', ['page_slug' => 'manager'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Stand Manager Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('manager.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $manager->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mobile  No.') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $manager->image) }}"
                                                    alt="{{ $manager->title }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Blood Group') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->blood_group->blood_group ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Division') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->division->division ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->district->district ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Thana') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->thana->thana ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Union') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->union->union ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Stand') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->stand->title ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $manager->statusBg() }}">{{ $manager->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $manager->created_by ?? 'N/A' }}</td>
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
