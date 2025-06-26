@extends('backend.layouts.master', ['page_slug' => 'thana'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Thana List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('thana.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Division Name') }}</th>
                                            <th>{{ __('District Name') }}</th>
                                            <th>{{ __('Thana Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($thanas as $key=>$thana)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $thana->division->division }}</td>
                                            <td>{{ $thana->district->district }}</td>
                                            <td>{{ $thana->thana }}</td>
                                            <td><span class="{{ $thana->statusBg() }}">{{ $thana->statusTitle() }}</span></td>
                                            <td>{{ $thana->created_at ? $thana->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $thana->created_user ? $thana->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('thana.detalis', $thana->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('thana.update', $thana->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="javascript:void(0)" data-url="{{ route('thana.delete', $thana->id) }}" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="javascript:void(0)" data-url="{{ route('thana.status.update', $thana->id) }}" class="btn {{ $thana->statusIcon() }} status-update"><i class="fa-solid fa-power-off"></i></a>
                                                </div>
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




@push('script')

@endpush