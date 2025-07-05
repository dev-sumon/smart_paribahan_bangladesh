@extends('stand_manager.layouts.master', ['page_slug' => 'notice'])
@section('title', 'Notice')
@section('content')
    <div class="stand_manager_list_page" id="">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div>
                <h1 class="h2">{{ __('নোটিশ তালিকা') }}</h1>
                <p class="text-muted">{{ __('সকল নোটিশের তালিকা দেখুন এবং ম্যানেজ করুন') }}</p>
            </div>
            <span class="create-button">
                <a href="{{ route('stand_manager.notice.stand.manager.create') }}"><i class="bi bi-plus"></i> {{ __("নতুন নোটিশ") }}</a>
            </span>
        </div>
        <!-- Notices Table -->
        <div class="card">
            {{-- <div class="card-header">
                <h5 class="mb-0">নোটিশ তালিকা</h5>
                <small class="text-muted">সকল নোটিশের তালিকা দেখুন এবং ম্যানেজ করুন</small>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>সিরিয়াল</th>
                                <th>শিরোনাম</th>
                                <th>তারিখ</th>
                                <th>Status</th>
                                <th>লেখক</th>
                                <th>অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notices as $key => $notice)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $notice->title }}</td>
                                    <td>{{ $notice->date }}</td>
                                    <td><span class="{{ $notice->statusBg() }}">{{ $notice->statusTitle() }}</span></td>
                                    {{-- <td>{{ $notice->created_at ? $notice->created_at->format('d-m-Y H:i:s') : 'N/A' }}</td> --}}
                                    <td>{{ $notice->created_user ? $notice->created_user->name : 'system' }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-level="Basic example">
                                            <a href="{{ route('stand_manager.notice.detalis', $notice->id) }}" data-id=""
                                                class="btn btn-secondary view" title="view deatils"><i class="fa-solid fa-eye"></i></a>
                                            <a href="{{ route('stand_manager.notice.stand.manager.updae', $notice->id) }}" data-id=""
                                                class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('stand_manager.notice.stand.manager.delete', $notice->id) }}" data-id=""
                                                class="btn btn-danger delete"><i class="fa-solid fa-trash-can"></i></a>
                                            <a href="{{ route('stand_manager.notice.stand.manager.status.update', $notice->id) }}"
                                                class="btn {{ $notice->statusIcon() }}"><i
                                                    class="fa-solid fa-power-off"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end align-items-center text-end mt-3">
                    {{-- <div class="text-muted small">মোট ৫টি নোটিশের মধ্যে ১-৫ দেখানো হচ্ছে</div> --}}
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">আগের</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">১</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">পরের</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
