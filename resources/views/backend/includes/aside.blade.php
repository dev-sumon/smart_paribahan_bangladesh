<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="">
      <img src="{{ asset('backend/dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image p-2">
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ $page_slug == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>{{ __('Dashboard') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('admin.index') }}" class="nav-link {{ $page_slug == 'admin' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>{{ __('Admin') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('worker.index') }}" class="nav-link {{ $page_slug == 'field_worker' ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>{{ __('Field Worker') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('stand.index') }}" class="nav-link {{ $page_slug == 'stand' ? 'active' : '' }}">
              <i class="nav-icon fas fa-location"></i>
              <p>{{ __('Stand') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('manager.index') }}" class="nav-link {{ $page_slug == 'manager' ? 'active' : '' }}">
              {{-- <i class="nav-icon fas fa-location"></i> --}}
              <i class="fa-solid fa-users-gear"></i>
              <p>{{ __('Stand Manager') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('vehicle_type.index') }}" class="nav-link {{ $page_slug == 'vehicle_type' ? 'active' : '' }}">
              <i class="fas fa-cogs"></i>
              <p> {{ __(' Vehicle Type') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('vehicle.index') }}" class="nav-link {{ $page_slug == 'vehicle' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-car"></i>
              <p>{{ __('Vehicle ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('faq.index') }}" class="nav-link {{ $page_slug == 'faq' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-question"></i>
              <p>{{ __('FAQ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('notice_category.index') }}" class="nav-link {{ $page_slug == 'notice_category' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-bell-concierge"></i>
              <p>{{ __('Notice Category') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('notice.index') }}" class="nav-link {{ $page_slug == 'notice' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-bell"></i>
              <p>{{ __('Notice') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('contact.index') }}" class="nav-link {{ $page_slug == 'contact' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-address-book"></i>
              <p>{{ __('Contact Info') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('blog.index') }}" class="nav-link {{ $page_slug == 'blog' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-blog"></i>
              <p>{{ __('Blog ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('footerTitle.index') }}" class="nav-link {{ $page_slug == 'footer_title' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-heading"></i>
              <p>{{ __('Footer Title') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('footer.index') }}" class="nav-link {{ $page_slug == 'footer' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-file-invoice"></i>
              <p>{{ __('Footer') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('owner.index') }}" class="nav-link {{ $page_slug == 'owner' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-circle-user"></i>
              <p>{{ __('Owner') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('driver.index') }}" class="nav-link {{ $page_slug == 'driver' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-dharmachakra"></i>
              <p>{{ __('Driver') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('blood.index') }}" class="nav-link {{ $page_slug == 'blood' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-droplet"></i>
              <p>{{ __('Blood Group ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('division.index') }}" class="nav-link {{ $page_slug == 'division' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-layer-group"></i>
              <p>{{ __('Division ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('district.index') }}" class="nav-link {{ $page_slug == 'district' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-landmark"></i>
              <p>{{ __('District ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('thana.index') }}" class="nav-link {{ $page_slug == 'thana' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-building-shield"></i>
              <p>{{ __('Thana ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('union.index') }}" class="nav-link {{ $page_slug == 'union' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-underline"></i>
              <p>{{ __('Union ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('commitee.index') }}" class="nav-link {{ $page_slug == 'commitee' ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-users"></i>
              <p>{{ __('Stand Committee') }}</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>