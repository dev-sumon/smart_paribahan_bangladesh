@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Footer Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('footer.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Logo') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $footer->logo) }}" alt="" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $footer->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $footer->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $footer->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Google Play') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $footer->goole_play) }}" alt="" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('App Store') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><img src="{{ asset('storage/' . $footer->app_store) }}" alt="" width="100"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $footer->statusBg() }}">{{ $footer->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $footer->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created B') }}y</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $footer->created_by ?? 'N/A' }}</td>
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
