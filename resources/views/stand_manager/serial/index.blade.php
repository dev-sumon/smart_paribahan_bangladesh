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
                <a href="{{ route('stand_manager.serial.manager.stand.serials') }}"><i class="bi bi-plus"></i>
                    {{ __('নতুন নোটিশ') }}</a>
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
                        <tbody id="serial-body">
                            <tr>
                                <td colspan="5" class="text-center">Loading...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    function loadSerials() {
        const standId = "{{ auth('stand_manager')->user()->stand_id }}";

        $.ajax({
            url: `/stand_manager/ajax/stand-wise-serials/${standId}`,
            method: "GET",
            success: function (serials) {
                let html = '';
                if (serials.length === 0) {
                    html = `<tr><td colspan="5" class="text-center text-danger">No serials found</td></tr>`;
                } else {
                    serials.forEach(serial => {
                        html += `
                            <tr class="text-center">
                                <td>${serial.serial ?? 'N/A'}</td>
                                <td>${serial.driver?.title ?? 'N/A'}</td>
                                <td>${serial.driver?.vehicle?.vehicle_licence ?? 'N/A'}</td>
                                <td><i class="bi bi-clock me-1"></i> ${serial.check_in}</td>
                                <td>
                                    <form method="POST" action="/stand_manager/serial/driver-serial/${serial.id}/checkout">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                            <option value="0" ${serial.status == 0 ? 'selected' : ''}>Checked Out</option>
                                            <option value="1" ${serial.status == 1 ? 'selected' : ''}>Running</option>
                                            <option value="2" ${serial.status == 2 ? 'selected' : ''}>Pending</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>`;
                    });
                }
                $('#serial-body').html(html);
            },
            error: function () {
                $('#serial-body').html(`<tr><td colspan="5" class="text-danger text-center">Failed to load serials.</td></tr>`);
            }
        });
    }

    $(document).ready(function () {
        loadSerials();

        // Optional: auto-refresh every 30 seconds
        setInterval(loadSerials, 5000);
    });
</script>
@endpush
