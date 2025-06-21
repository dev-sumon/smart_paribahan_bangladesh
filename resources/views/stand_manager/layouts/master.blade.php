<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', config('app.name')) - {{ config('app.name') }}
    </title>
    <link rel="icon" href="{{ asset('backend/dist/img/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                @include('stand_manager.includes.aside')

                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                    <!-- Mobile Header -->
                    @include('stand_manager.includes.mobile_menu')

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Dashboard Section -->
                        <div class="tab-pane fade show active" id="dashboard-section">
                            @include('stand_manager.includes.top_nav')
                        </div>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    @stack('script')

    <script>
        Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            // Tab navigation
            var triggerTabList = [].slice.call(document.querySelectorAll('.nav-link'))
            triggerTabList.forEach(function(triggerEl) {
                triggerEl.addEventListener('click', function(e) {
                    e.preventDefault()

                    // Close mobile sidebar when a tab is clicked
                    var sidebar = document.getElementById('sidebar')
                    if (window.innerWidth < 768 && sidebar.classList.contains('show')) {
                        var bsCollapse = new bootstrap.Collapse(sidebar)
                        bsCollapse.hide()
                    }

                    // Show the selected tab
                    var tabTrigger = new bootstrap.Tab(triggerEl)
                    tabTrigger.show()
                })
            })
        })
    </script>
</body>

</html>
