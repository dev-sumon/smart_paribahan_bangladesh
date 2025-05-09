@extends('backend.layouts.master', ['page_slug' => 'commitee'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Commitee Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('commitee.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $commitee->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Designation') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->designation }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Division Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->division->division }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->district->district }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Thana Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->thana->thana }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Union Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->union->union }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $commitee->stand->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $commitee->image) }}" alt="{{ $commitee->name }}" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $commitee->statusBg() }}">{{ $commitee->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $commitee->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created B') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $commitee->created_by ?? 'N/A' }}</td>
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
