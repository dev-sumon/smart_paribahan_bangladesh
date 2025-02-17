@extends('backend.layouts.master', ['page_slug' => 'vehicle_type'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Vehicle List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('vehicle_type.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($vehicle_types as $vehicle_type)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $vehicle_type->stand->name }}</td>
                                                <td>{{ $vehicle_type->name }}</td>
                                                <td><img src="{{ asset('storage/'. $vehicle_type->image) }}" alt="{{ $vehicle_type->name }}" width="100"></td>
                                                <td><span class="{{$vehicle_type->statusBg()}}">{{$vehicle_type->statusTitle()}}</span></span></td>
                                                <td>{{ $vehicle_type->created_at ? $vehicle_type->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                                <td>{{ $vehicle_type->created_admin ? $vehicle_type->created_admin->name : 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('vehicle_type.detalis', $vehicle_type->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('vehicle_type.update', $vehicle_type->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('vehicle_type.delete', $vehicle_type->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="{{ route('vehicle_type.status.update', $vehicle_type->id) }}" data-id="" class="btn {{$vehicle_type->statusIcon()}}"><i class="fa-solid fa-power-off"></i></a>
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
    <script>

    </script>
@endpush
