<div class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed" id="sidebar">
    <div class="position-sticky pt-3">
        <div class="d-flex align-items-center justify-content-between px-3 mb-4">
            <h4 class="m-0">স্ট্যান্ড ম্যানেজার</h4>
            <button type="button" class="btn-close d-md-none" data-bs-toggle="collapse" data-bs-target="#sidebar"
                aria-label="Close"></button>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item menu-open">
                <a href="{{ route('stand_manager.dashboard') }}"
                    class="nav-link {{ $page_slug == 'dashboard' ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> ড্যাশবোর্ড
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('stand_manager.serial.stand.serials') }}"
                    class="nav-link {{ $page_slug == 'serial' ? 'active' : '' }}">
                    <i class="bi bi-calendar-check"></i>{{ __('সিরিয়াল ম্যানেজমেন্ট') }}
                </a>
            </li>
            {{-- <li class="nav-item menu-open">
                <a href="#advertisements-section" class="nav-link {{ $page_slug == 'advertisement' ? 'active' : '' }}">
                    <i class="bi bi-badge-ad"></i> বিজ্ঞাপন
                </a>
            </li> --}}
            <li class="nav-item menu-open">
                <a href="{{ route('stand_manager.notice.stand.manager.index') }}"
                    class="nav-link {{ $page_slug == 'notice' ? 'active' : '' }}">
                    <i class="bi bi-bell"></i> নোটিশ
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('stand_manager.yearly_notice.index') }}" class="nav-link {{ $page_slug == 'yearly_notice' ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i> বার্ষিক নোটিশ
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('stand_manager.qr.index') }}"
                    class="nav-link {{ $page_slug == 'qr-code' ? 'active' : '' }}">
                    <i class="fa-solid fa-qrcode"></i> {{ __('QR Code Generate') }}
                </a>
            </li>
        </ul>

        <hr class="my-3">

        <div class="px-3">
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 align-items-center">
                    @if (Auth::guard('stand_manager')->user()->image)
                        <img src="{{ asset('storage/' . Auth::guard('stand_manager')->user()->image) }}" alt="Profile"
                            class="rounded-circle" width="40" height="40">
                    @else
                        <i class="bi bi-person-circle" style="font-size: 40px;"></i>
                    @endif

                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">{{ Auth::guard('stand_manager')->user()->title }}</h6>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-light btn-sm">
                    <i class="bi bi-gear"></i> সেটিংস
                </button>
                <form action="{{ route('stand_manager.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> লগআউট
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>