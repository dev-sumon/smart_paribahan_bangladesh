@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Field Worker List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('worker.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Mobile') }}</th>
                                            <th>{{ __('NID No') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ( $workers as $key=>$worker )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $worker->name }}</td>
                                            <td>{{ $worker->phone }}</td>
                                            <td>{{ $worker->nid }}</td>
                                            <td><img src="{{ asset('storage/' .$worker->image) }}" alt="{{ $worker->image }}" width="100"></td>
                                            <td><span class="{{ $worker->statusBg() }}">{{ $worker->statusTitle() }}</span></td>
                                            <td>{{ $worker->created_at }}</td>
                                            <td>{{ $worker->created_by  }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('worker.detalis', $worker->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('worker.update', $worker->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('worker.delete', $worker->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('worker.status.update', $worker->id) }}" data-id="" class="btn {{ $worker->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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