@extends('backend.layouts.master', ['page_slug' => 'district'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('District Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('district.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Division') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $district->division->division ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $district->district }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $district->statusBg() }}">{{ $district->statusTitle() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $district->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $district->created_by_guard }} - {{ $district->creator()->name ?? 'System' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Updated By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $district->updated_by_guard }} - {{ $district->updater()->name ?? 'N/A' }}</td>
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