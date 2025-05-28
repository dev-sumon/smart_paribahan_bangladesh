@extends('field_worker.layouts.master', ['page_slug' => 'driver'])
@section('title', 'Driver List')
@section('content')
        <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="float-left">
                            <h4>{{ __('Driver List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.driver.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drivers as $key=>$driver)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $driver->title }}</td>
                                            <td>{{ $driver->email }}</td>
                                            <td><span class="{{ $driver->statusBg() }}">{{ $driver->statusTitle() }}</span></td>
                                            <td>{{ $driver->created_at ? $driver->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $driver->created_user ? $driver->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('field_worker.driver.detalis', $driver->slug) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('field_worker.driver.update', $driver->slug) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('field_worker.driver.delete', $driver->slug) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('field_worker.driver.status.update', $driver->slug) }}" class="btn {{ $driver->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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