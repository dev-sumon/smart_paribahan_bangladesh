@extends('backend.layouts.master', ['page_slug' => 'notice_category'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Notice Category List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('notice_category.create') }}" class="btn btn-info">{{ __('Create') }}</a>
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
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $key=>$categorie)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $categorie->name }}</td>
                                                <td><span class="{{ $categorie->statusBg() }}">{{ $categorie->statusTitle() }}</span></td>
                                                <td>{{ $categorie->created_at ? $categorie->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                                <td>{{ $categorie->created_user ? $categorie->created_user->name : 'system' }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-level="Basic example">
                                                        <a href="{{ route('notice_category.detalis', $categorie->id) }}" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                        <a href="{{ route('notice_category.update', $categorie->id) }}" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ route('notice_category.delete', $categorie->id) }}" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                        <a href="{{ route('notice_category.status.update', $categorie->id) }}" data-id="" class="btn {{ $categorie->statusIcon() }}"><i class="fa-solid fa-power-off"></i></a>
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
