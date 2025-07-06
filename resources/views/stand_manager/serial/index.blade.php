@extends('stand_manager.layouts.master', ['page_slug' => 'serial'])
@section('title', 'Vechicle Serial List')
@section('content')
    <div class="stand_manager_list_page" id="">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div>
                <h1 class="h2">{{ __('সিরিয়াল তালিকা') }}</h1>
                <p class="text-muted">{{ __('সকল সিরিয়ালের তালিকা দেখুন এবং ম্যানেজ করুন') }}</p>
            </div>
            <span class="button-create">
                <a href="{{ route('stand_manager.serial.manager.stand.serials') }}"><i class="bi bi-plus"></i> {{ __('নতুন নোটিশ') }}</a>
            </span>
        </div>
        <!-- Serials Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>সিরিয়াল</th>
                                <th>নাম</th>
                                <th>Vehicle Number</th>
                                <th>সময়</th>
                                <th>স্ট্যাটাস</th>
                                {{-- <th class="text-end">অ্যাকশন</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serials as $serial)
                                <tr class="text-center">
                                    <td>{{ $serial->serial }}</td>
                                    <td>{{ $serial->driver->title ?? 'N/A' }}</td>
                                    <td>{{ $serial->driver?->vehicle?->vehicle_licence ?? 'N/A' }}</td>
                                    <td><i class="bi bi-clock me-1"></i> {{ $serial->check_in }}</td>
                                    <td>
                                        <form method="POST"
                                            action="{{ route('serial.driver.serial.checkout', $serial->id) }}">
                                            @csrf
                                            <select name="status" class="form-select form-select-sm"
                                                onchange="this.form.submit()">
                                                <option value="0" {{ $serial->status == 0 ? 'selected' : '' }}>
                                                    Checked Out</option>
                                                <option value="1" {{ $serial->status == 1 ? 'selected' : '' }}>
                                                    Running</option>
                                                <option value="2" {{ $serial->status == 2 ? 'selected' : '' }}>
                                                    Panding</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">মোট ৫টি সিরিয়ালের মধ্যে ১-৫ দেখানো হচ্ছে</div>
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
