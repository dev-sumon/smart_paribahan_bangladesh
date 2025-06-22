@extends('backend.layouts.master', ['page_slug' => 'admin'])
@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Admin List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('admin.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $key => $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td><img src="{{ asset('storage/' . $admin->image) }}"
                                                        alt="{{ $admin->name }}" width="100"></td>
                                                <td>{{ $admin->email }}</td>
                                                <td><span
                                                        class="{{ $admin->statusBg() }}">{{ $admin->statusTitle() }}</span>
                                                </td>
                                                <td>{{ $admin->created_at ? $admin->created_at->format('d-m-Y H:i:s') : 'N/A' }}
                                                </td>

                                                <td>{{ $admin->created_user ? $admin->created_user->name : 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('admin.detalis', $admin->id) }}" data-id=""
                                                            class="btn btn-secondary view" title="view deatils"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('admin.update', $admin->id) }}" data-id=""
                                                            class="btn btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-danger delete" data-url="{{ route('admin.delete', $admin->id) }}"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-warning status-update" data-url="{{ route('admin.status.update', $admin->id) }}"><i class="fa-solid fa-power-off"></i></a>
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




{{-- @push('script')
    <script>
        const details = {
            'url': `{{ route('admin.delete', ['id' => '_id']) }}`
        }
    </script>
@endpush --}}
