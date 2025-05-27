@extends('field_worker.layouts.master', ['page_slug' => 'union'])
@section('title', 'Union Details')
@section('content')
        <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Union Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.union.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Division Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $union->division->division }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $union->district->district }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Thana Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $union->thana->thana }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Union Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $union->union }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $union->statusBg() }}">{{ $union->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $union->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $union->created_by ?? 'N/A' }}</td>
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