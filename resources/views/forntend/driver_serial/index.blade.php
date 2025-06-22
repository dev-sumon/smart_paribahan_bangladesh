@extends('forntend.layouts.master')
@section('title', 'Serial List')

@section('content')
    <section class="serial_list">
        <div class="container">
            <header>
                <div class="header">
                    <h1>{{ __('ড্রাইভার সিরিয়াল চেকার') }}</h1>
                    <p>{{ __('আপনার সিরিয়াল নম্বর দিয়ে আগের ড্রাইভারদের তালিকা দেখুন') }}</p>
                </div>
            </header>
            <div class="card">
                <div class="card-header list d-flex justify-content-between align-items-center">
                    <h2 class="card-title">{{ __('সাম্প্রতিক ড্রাইভার তালিকা') }}</h2>
                    <a href="{{ route('driver.serial.check.in') }}">{{ __('Check In') }}</a>
                </div>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>{{ __('সিরিয়াল') }}</th>
                                <th>{{ __('Vechicle') }}</th>
                                <th>{{ __('নাম') }}</th>
                                <th>{{ __('তারিখ') }}</th>
                                <th>{{ __('স্ট্যাটাস') }}</th>
                            </tr>
                        </thead>
                        <tbody id="recentDriversTableBody">
                            <!-- Recent drivers will be inserted here -->
                            @foreach ($serials as $key => $serial)
                                <tr>
                                    <td>{{ $serial->serial }}</td>
                                    <td>{{ $serial->driver?->vehicle?->vehicle_licence ?? 'N/A' }}</td>
                                    <td>{{ $serial->driver?->title ?? 'N/A' }}</td>
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
    </section>
@endsection

@push('script')
    {{-- <script>
        function fetchRecentSerials() {
            fetch('{{ route('driver.ajax.fetch.serials') }}')
                .then(response => response.json())
                .then(data => {
                    let tbody = document.getElementById('recentDriversTableBody');
                    tbody.innerHTML = '';

                    data.forEach(serial => {
                        let statusBadge = '';
                        if (serial.status == 0) {
                            statusBadge = '<span class="badge bg-success">চেক আউট</span>';
                        } else if (serial.status == 1) {
                            statusBadge = '<span class="badge bg-warning">চলমান</span>';
                        } else if (serial.status == 2) {
                            statusBadge = '<span class="badge bg-secondary">পেন্ডিং</span>';
                        }

                        let row = `
                        <tr>
                            <td>${serial.serial}</td>
                            <td>${serial.driver?.vehicle?.vehicle_licence ?? 'N/A'}</td>
                            <td>${serial.driver?.name ?? ''}</td>
                            <td>${serial.check_in}</td>
                            <td>${statusBadge}</td>
                        </tr>
                    `;

                        tbody.innerHTML += row;
                    });
                });
        }

        
        setInterval(fetchRecentSerials, 5000);

       
        fetchRecentSerials();
    </script> --}}


    <script>
        let standId = {{ $serials->first()?->stand_id ?? 1 }};

        function fetchStandSerials() {
            fetch(`/driver/ajax/serials/stand/${standId}`)
                .then(response => response.json())
                .then(data => {
                    let tbody = document.getElementById('recentDriversTableBody');
                    tbody.innerHTML = '';

                    data.forEach(serial => {
                        let statusBadge = '';
                        if (serial.status == 0) {
                            statusBadge = '<span class="badge bg-success">চেক আউট</span>';
                        } else if (serial.status == 1) {
                            statusBadge = '<span class="badge bg-warning">চলমান</span>';
                        } else if (serial.status == 2) {
                            statusBadge = '<span class="badge bg-secondary">পেন্ডিং</span>';
                        }

                        let row = `
                <tr>
                    <td>${serial.serial}</td>
                    <td>${serial.driver?.vehicle?.vehicle_licence ?? 'N/A'}</td>
                    <td>${serial.driver?.title ?? ''}</td>
                    <td>${serial.check_in}</td>
                    <td>${statusBadge}</td>
                </tr>
                `;
                        tbody.innerHTML += row;
                    });
                });
        }

        // প্রথমবার কল করা
        fetchStandSerials();

        // প্রতি ৫ সেকেন্ডে রিফ্রেশ করা
        setInterval(fetchStandSerials, 5000);
    </script>
@endpush
