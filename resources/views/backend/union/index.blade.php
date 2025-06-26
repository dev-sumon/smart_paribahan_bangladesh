@extends('backend.layouts.master', ['page_slug' => 'union'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Union List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('union.ceate') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Union Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($unions as $key=>$union)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $union->division->division }}</td>
                                            <td>{{ $union->district->district }}</td>
                                            <td>{{ $union->thana->thana }}</td>
                                            <td>{{ $union->union }}</td>
                                            <td><span class="{{ $union->statusBg() }}">{{ $union->statusTitle() }}</span></td>
                                            <td>{{ $union->created_at ? $union->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $union->created_user ? $union->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('union.detalis', $union->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('union.update', $union->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="javascript:void(0)" data-url="{{ route('union.delete', $union->id) }}" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="javascript:void(0)" data-url="{{ route('union.status.update', $union->id) }}" class="btn {{ $union->statusIcon() }} status-update"><i class="fa-solid fa-power-off"></i></a>
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