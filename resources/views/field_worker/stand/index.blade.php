@extends('field_worker.layouts.master', ['page_slug' => 'stand'])
@section('title', 'Stand')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span class="float-left">
                            <h4>{{ __('Stand List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('field_worker.stand.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stands as $key => $stand)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $stand->title }}</td>
                                                <td><img src="{{ asset('storage/' . $stand->image) }}"
                                                        alt="{{ $stand->title }}" width="100"></td>
                                                <td><span
                                                        class="{{ $stand->statusBg() }}">{{ $stand->statusTitle() }}</span>
                                                </td>
                                                <td>{{ $stand->created_at ? $stand->created_at->format('d-m-Y H:i:s') : 'N/A' }}
                                                </td>
                                                <td>{{ $stand->created_user ? $stand->created_user->name : 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('field_worker.stand.detalis', $stand->slug) }}" data-id=""
                                                            class="btn btn-secondary view" title="view deatils"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('field_worker.stand.update', $stand->slug) }}" data-id=""
                                                            class="btn btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:void(0)" data-url="{{ route('field_worker.stand.delete', $stand->slug) }}" class="btn btn-danger delete"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                        <a href="javascript:void(0)" data-url="{{ route('field_worker.stand.status.update', $stand->slug) }}" class="btn {{ $stand->statusIcon() }} status-update"><i
                                                                class="fa-solid fa-power-off"></i></a>
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
