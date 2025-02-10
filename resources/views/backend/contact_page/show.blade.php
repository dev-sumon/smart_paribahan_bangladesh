@extends('backend.layouts.master', ['page_slug' => 'contact'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Contact Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $contact->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $contact->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Address') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $contact->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $contact->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $contact->email }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $contact->statusBg() }}">{{ $contact->statusTitle() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $contact->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $contact->created_by ?? 'N/A' }}</td>
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