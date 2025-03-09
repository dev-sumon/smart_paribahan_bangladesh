@extends('backend.layouts.master', ['page_slug' => 'field_worker'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Field Worker Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('worker.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $worker->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $worker->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('NID') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->nid }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $worker->image) }}" alt="{{ $worker->name }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Father Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->father_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mother Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->mother_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $worker->statusBg() }}">{{ $worker->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $worker->created_by ?? 'N/A' }}</td>
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
