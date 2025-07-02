<div class="col-md-3 col-lg-2 d-md-block sidebar collapse vh-100 position-fixed" id="sidebar">
    <div class="position-sticky pt-3">
        <div class="d-flex align-items-center justify-content-between px-3 mb-4">
            <h4 class="m-0">{{ __('মাঠকর্মী') }}</h4>
            <button type="button" class="btn-close d-md-none" data-bs-toggle="collapse" data-bs-target="#sidebar"
                aria-label="Close"></button>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.dashboard') }}"
                    class="nav-link {{ $page_slug == 'dashboard' ? 'active' : '' }}">
                    <i class="bi bi-house-door"></i> ড্যাশবোর্ড
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.stand.index') }}"
                    class="nav-link {{ $page_slug == 'stand' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-location"></i>{{ __('Stand') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.owner.index') }}"
                    class="nav-link {{ $page_slug == 'owner' ? 'active' : '' }}">
                    <i class="fa-regular fa-circle-user"></i>{{ __('Owner') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.driver.index') }}"
                    class="nav-link {{ $page_slug == 'driver' ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-dharmachakra"></i>{{ __('Driver') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.commitee.index') }}"
                    class="nav-link {{ $page_slug == 'stand-commitee' ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>{{ __('Stand Commitee') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.union.index') }}"
                    class="nav-link {{ $page_slug == 'union' ? 'active' : '' }}">
                    <i class="fa-regular fa-circle-user"></i>{{ __('Union') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.blog.index') }}"
                    class="nav-link {{ $page_slug == 'blog' ? 'active' : '' }}">
                    <i class="nav-icon fa-solid fa-blog"></i>{{ __('Blog') }}</a>
            </li>
            <li class="nav-item menu-open">
                <a href="{{ route('field_worker.notice.index') }}"
                    class="nav-link {{ $page_slug == 'notice' ? 'active' : '' }}">
                    <i class="bi bi-bell"></i> নোটিশ
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="#yearly-notices-section" class="nav-link {{ $page_slug == 'yearly_notice' ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i> বার্ষিক নোটিশ
                </a>
            </li>
        </ul>

        <hr class="my-3">

        <div class="px-3">
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 align-items-center">
                    @if (Auth::guard('field_worker')->user()->image)
                        <img src="{{ asset('storage/' . Auth::guard('field_worker')->user()->image) }}" alt="Profile"
                            class="rounded-circle" width="40" height="40">
                    @else
                        <i class="bi bi-person-circle" style="font-size: 40px;"></i>
                    @endif

                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">{{ Auth::guard('field_worker')->user()->name }}</h6>
                </div>
            </div>
            <div class="d-grid gap-2">
                <form action="{{ route('field_worker.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">
                        <i class="bi bi-box-arrow-right"></i> লগআউট
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
