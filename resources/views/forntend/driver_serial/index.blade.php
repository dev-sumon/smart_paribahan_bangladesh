@extends('forntend.layouts.master')
@section('title', 'Serial List')

@section('content')
    <section class="serial_list">
        <div class="container">
            <header>
                <div class="header">
                    <h1>ড্রাইভার সিরিয়াল চেকার</h1>
                    <p>আপনার সিরিয়াল নম্বর দিয়ে আগের ড্রাইভারদের তালিকা দেখুন</p>
                </div>
            </header>
            <div class="card">
                <div class="card-header list d-flex justify-content-between align-items-center">
                    <h2 class="card-title">সাম্প্রতিক ড্রাইভার তালিকা</h2>
                    <a href="{{ route('driver.serial.check.in') }}">Check In</a>
                </div>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>সিরিয়াল</th>
                                <th>Vechicle</th>
                                <th>নাম</th>
                                <th>তারিখ</th>
                                <th>স্ট্যাটাস</th>
                            </tr>
                        </thead>
                        <tbody id="recentDriversTableBody">
                            <!-- Recent drivers will be inserted here -->
                            @foreach ($serials as $key => $serial)
                                <tr>
                                    <td>{{ $serial->serial }}</td>
                                    <td>{{ $serial->driver?->vehicle?->vehicle_licence ?? 'N/A' }}</td>
                                    <td>{{ $serial->driver?->name }}</td>
                                    <td>{{ $serial->check_in }}</td>
                                    <td>
                                        @if ($serial->status == 0)
                                            <span class="badge bg-success">চেক আউট</span>
                                        @elseif ($serial->status == 1)
                                            <span class="badge bg-warning">চলমান</span>
                                        @elseif ($serial->status == 2)
                                            <span class="badge bg-secondary">পেন্ডিং</span>
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
