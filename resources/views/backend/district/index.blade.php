@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Division List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('district.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($districts as $key=>$district)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $district->division->division ?? 'N/A' }}</td>
                                            <td>{{ $district->district }}</td>
                                            <td><span class="{{ $district->statusBg() }}">{{ $district->statusTitle() }}</span></td>
                                            <td>{{ $district->created_at ? $district->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $district->created_user ? $district->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('district.detalis', $district->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('district.update', $district->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('district.delete', $district->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('district.status.update', $district->id) }}" data-id="" class="btn {{ $district->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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