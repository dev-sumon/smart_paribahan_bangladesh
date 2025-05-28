@extends('field_worker.layouts.master', ['page_slug' => 'notice'])
@section('title', 'Notice Deatils')
@section('content')
        <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Notice Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.notice.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
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
                                            <td>{{ $notice->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $notice->date }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $notice->noticeCategory->name ?? 'No Category' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('File') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><a href="{{ asset('storage/' . $notice->file) }}" download>Download PDF</a></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $notice->statusBg() }}">{{ $notice->statusTitle() }}</span></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $notice->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $notice->created_by ?? 'N/A' }}</td>
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