@extends('backend.layouts.master', ['page_slug' => 'stand'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-10 mx-auto my-5">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left">
                            <h1 class="float-start">{{ __('Stand Detalis') }}</h1>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('stand.index') }}" class="btn btn-info btn-sm float-end">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped dataTable dtr-inline">
                                    <tbody>
                                        <tr>
                                            <th>{{ __('Division Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->division->division }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('District Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->district->district }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Thana Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->thana->thana }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Union Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->union->union }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Stand Name') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->description }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Location') }}</th>
                                            <th>{{ __(':') }}</th>
                                            {{-- <td> {{ $stand->location }}</td> --}}
                                            <td><iframe src="{{ $stand->location }}" width="100%" height="250"
                                                    style="border:0;" allowfullscreen="" loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"></iframe></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __(':') }}</th>
                                            {{-- <td><img src="{{ asset('storage/' . $stand->image) }}" alt="{{ $stand->title }}" width="100"></td> --}}
                                            <td>
                                                @if ($stand->image)
                                                    @php
                                                        $images = is_array($stand->image)
                                                            ? $stand->image
                                                            : json_decode($stand->image, true);
                                                    @endphp

                                                    <div class="row mb-2">
                                                        @foreach ($images as $img)
                                                            <div class="col-md-3 mb-2">
                                                                <img src="{{ Storage::url($img) }}"
                                                                    alt="{{ $stand->title }}" class="img-fluid rounded"
                                                                    style="width: 100%; height: auto; object-fit: cover;">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p>{{ __('No image available') }}</p>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td><span class="{{ $stand->statusBg() }}">{{ $stand->statusTitle() }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created At') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $stand->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Created By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td> {{ $stand->created_by_guard }} -
                                                {{ $stand->creator()->name ?? 'System' }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Updated By') }}</th>
                                            <th>{{ __(':') }}</th>
                                            <td>{{ $stand->updated_by_guard }} - {{ $stand->updater()->name ?? 'System' }}
                                            </td>
                                        </tr>
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
