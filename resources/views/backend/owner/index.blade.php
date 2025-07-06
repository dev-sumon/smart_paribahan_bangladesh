@extends('backend.layouts.master', ['page_slug' => 'owner'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Owner List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('owner.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                        @foreach ($owners as $key => $owner)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $owner->title }}</td>
                                                <td>{{ $owner->email }}</td>
                                                <td><span
                                                        class="{{ $owner->statusBg() }}">{{ $owner->statusTitle() }}</span>
                                                </td>
                                                <td>{{ $owner->created_at ? $owner->created_at->format('d-m-Y H:i:s') : 'N/A' }}
                                                </td>
                                                <td>{{ $owner->creator()->name ?? 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('owner.detalis', $owner->slug) }}" data-id=""
                                                            class="btn btn-secondary view" title="view deatils"><i
                                                                class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('owner.update', $owner->slug) }}" data-id=""
                                                            class="btn btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="javascript:vaid(0)" data-url="{{ route('owner.delete', $owner->slug) }}" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="javascript:vaid(0)" data-url="{{ route('owner.status.update', $owner->slug) }}" class="btn {{ $owner->statusIcon() }} status-update"><i class="fa-solid fa-power-off"></i></a>
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
    <script></script>
@endpush
