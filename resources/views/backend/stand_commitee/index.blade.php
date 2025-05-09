@extends('backend.layouts.master', ['page_slug' => 'commitee'])



@section('title', 'Stand Commitee')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Stand Commitee List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('commitee.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($commitees as $key=>$commitee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $commitee->name }}</td>
                                            <td>{{ $commitee->email }}</td>
                                            <td>{{ $commitee->stand->name }}</td>
                                            <td><span class="{{ $commitee->statusBg() }}">{{ $commitee->statusTitle() }}</span></td>
                                            <td>{{ $commitee->created_at ? $commitee->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $commitee->created_user ? $commitee->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('commitee.detalis', $commitee->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('commitee.update', $commitee->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('commitee.delete', $commitee->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('commitee.status.update', $commitee->id) }}" data-id="" class="btn {{ $commitee->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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