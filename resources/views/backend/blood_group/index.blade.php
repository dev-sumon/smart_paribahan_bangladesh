@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Blood Group List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('blood.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bloods as $key=>$blood )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $blood->blood_group }}</td>
                                            <td><span class="{{ $blood->statusBg() }}">{{ $blood->statusTitle() }}</span></td>
                                            <td>{{ $blood->created_at ? $blood->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $blood->created_user ? $blood->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('blood.detalis', $blood->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('blood.update', $blood->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('blood.delete', $blood->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('blood.status.update', $blood->id) }}" data-id="" class="btn {{ $blood->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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