@extends('backend.layouts.master', ['page_slug' => 'blog'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Blog List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('blog.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Thumbnail Image') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($blogs as $key=>$blog )
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->description }}</td>
                                                <td><img src="{{ asset('storage/'. $blog->image) }}" alt="{{ $blog->title }}" width="100"></td>
                                                <td><span class="{{ $blog->statusBg() }}">{{ $blog->statusTitle() }}</span></td>
                                                <td>{{ $blog->created_at ? $blog->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                                <td>{{ $blog->created_admin ? $blog->created_admin->name : 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('blog.detalis', $blog->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('blog.update', $blog->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('blog.delete', $blog->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="{{ route('blog.status.update', $blog->id) }}" data-id="" class="btn {{ $blog->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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
