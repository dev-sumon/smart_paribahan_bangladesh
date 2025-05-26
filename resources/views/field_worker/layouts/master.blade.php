<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', config('app.name')) - {{ config('app.name') }}
    </title>
    <link rel="icon" href="{{ asset('backend/dist/img/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    {{-- font awesome cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Custom CSS Link --}}
    <link rel="stylesheet" href="{{ asset('stand_manager/style.css') }}">
</head>

<body>
    <section class="stand_manager_dashboard">
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                @include('field_worker.includes.aside')

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                    <!-- Mobile Header -->
                    @include('field_worker.includes.mobile_menu')

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Dashboard Section -->
                        <div class="tab-pane fade show active" id="dashboard-section">
                            @include('field_worker.includes.top_nav')
                        </div>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @stack('link_script')
    @stack('link_script')
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    @stack('script')

</body>

</html>
