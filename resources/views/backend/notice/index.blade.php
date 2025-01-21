@extends('backend.layouts.master', ['page_slug' => 'notice'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Notice List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('notice.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Date') }}</th>
                                            <th>{{ __('Category') }}</th>
                                            <th>{{ __('File') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($notices as $key=>$notice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $notice->title }}</td>
                                            <td>{{ $notice->date }}</td>
                                            <td>{{ $notice->category }}</td>
                                            <td><a href="{{ asset('storage/' . $notice->file) }}" download>Download PDF</a></td>
                                            <td><span class="{{$notice->statusBg()}}">{{ $notice->statusTitle() }}</span></td>
                                            <td>{{ $notice->created_at ? $notice->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $notice->created_user ? $notice->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="{{ route('notice.detalis', $notice->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('notice.update', $notice->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ route('notice.delete', $notice->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="{{ route('notice.status.update', $notice->id) }}" class="btn {{$notice->statusIcon()}}"><i class="fa-solid fa-power-off"></i></a>
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