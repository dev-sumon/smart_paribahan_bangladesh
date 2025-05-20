@extends('backend.layouts.master', ['page_slug' => 'admin'])
@section('title', 'Stand Driver List')
@section('content')
    @foreach ($serials as $serial)
        <h4>{{ $serial->stand->title ?? 'N/A' }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Driver Name</th>
                    <th>Check In</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $serial->serial }}</td>
                    <td>{{ $serial->driver->title ?? 'N/A' }}</td>
                    <td>{{ $serial->check_in }}</td>
                    <td>
                        <form method="POST" action="{{ route('serial.driver.serial.checkout', $serial->id) }}">
                            @csrf
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="0" {{ $serial->status == 0 ? 'selected' : '' }}>Checked Out</option>
                                <option value="1" {{ $serial->status == 1 ? 'selected' : '' }}>Running</option>
                                <option value="2" {{ $serial->status == 2 ? 'selected' : '' }}>Panding</option>
                            </select>
                        </form>
                    </td>


                </tr>
            </tbody>
        </table>
    @endforeach

@endsection
