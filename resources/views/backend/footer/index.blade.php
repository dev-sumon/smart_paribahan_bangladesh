@extends('backend.layouts.master')


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h4>{{ __('Footer List') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('footer.create') }}" class="btn btn-info">{{ __('Create') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Sl') }}</th>
                                            <th>{{ __('Logo') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Phone') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __('Created By') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($footers as $key=>$footer)
                                        <tr>
                                            
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/' . $footer->logo) }}" alt="Logo" width="100"></td>
                                            <td>{{ $footer->description }}</td>
                                            <td>{{ $footer->phone }}</td>
                                            <td>{{ $footer->email }}</td>
                                            <td><span class="">{{ $footer->status }}</span></td>
                                            <td>{{ $footer->created_at ? $footer->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td>
                                            <td>{{ $footer->created_user ? $footer->created_user->name : 'system' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-level="Basic example">
                                                    <a href="" data-id="" class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                                    <a href="" data-id="" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="" data-id="" class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                                    <a href="" data-id="" class="btn "><i class="fa-solid fa-power-off"></i></a>
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