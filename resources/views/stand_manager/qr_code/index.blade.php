@extends('stand_manager.layouts.master', ['page_slug' => 'qr-code'])
@section('title', 'QR Code List')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="float-left">
                            <h4>{{ __('Owner List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('stand_manager.qr.form') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr class="text-center align-items-center">
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __('QR Code') }}</th>
                                            <th>{{ __('Download') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($qr_codes as $key => $qr_code)
                                            <tr class="text-center align-items-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $qr_code->title }}</td>
                                                <td>{!! $qr_code->qr_image !!}</td>
                                                {{-- <td><a href="{{ route('stand_manager.qr.download', $qr_code->token) }}"><i class="fa-solid fa-download"></i></a></td> --}}
                                                <td>
                                                    <a href="{{ route('stand_manager.qr.download', $qr_code->token) }}">
                                                        <i class="fa-solid fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
