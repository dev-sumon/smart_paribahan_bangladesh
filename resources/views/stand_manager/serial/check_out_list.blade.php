@extends('stand_manager.layouts.master', ['page_slug' => 'serial'])
@section('title', 'Vechicle Serial List')
@section('content')
    <div class="stand_manager_list_page" id="">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div>
                <h1 class="h2">{{ __('সিরিয়াল তালিকা') }}</h1>
                <p class="text-muted">{{ __('সকল সিরিয়ালের তালিকা দেখুন এবং ম্যানেজ করুন') }}</p>
            </div>
            <span class="create-button">
                <a href="{{ route('stand_manager.serial.stand.serials') }}">{{ __('Back') }}</a>
            </span>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>{{ __('সিরিয়াল') }}</th>
                                <th>{{ __('নাম') }}</th>
                                <th>{{ __('Vehicle Number') }}</th>
                                <th>{{ __('সময়') }}</th>
                                <th>{{ __('স্ট্যাটাস') }}</th>
                            </tr>
                        </thead>
                       <tbody id="recentDriversTableBody">
                            <!-- Recent drivers will be inserted here -->
                            @foreach ($serials as $key => $serial)
                                <tr class="text-center">
                                    <td>{{ $serial->serial }}</td>
                                    <td>{{ $serial->driver?->title ?? 'N/A' }}</td>
                                    <td>{{ $serial->driver?->vehicle?->vehicle_licence ?? 'N/A' }}</td>
                                    <td>{{ $serial->check_in }}</td>
                                    <td>
                                        @if ($serial->status == 0)
                                            <span class="badge bg-success">{{ __('চেক আউট') }}</span>
                                        @elseif ($serial->status == 1)
                                            <span class="badge bg-warning">{{ __('চলমান') }}</span>
                                        @elseif ($serial->status == 2)
                                            <span class="badge bg-secondary">{{ __('পেন্ডিং') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection