@extends('backend.layouts.master',['page_slug'=>'admin'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Admin Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('admin.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $admin->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('NID') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $admin->nid }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Father Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $admin->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mother Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $admin->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __(key: 'Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $admin->image) }}" alt="{{ $admin->name }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $admin->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $admin->statusBg() }}">{{ $admin->statusTitle() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $admin->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $admin->created_b ?? 'N/A' }}</td>
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