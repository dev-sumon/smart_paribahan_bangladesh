<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('AdminLTE 3') }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ __('Alexander Pierce') }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>{{ __('Dashboard') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('admin.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>{{ __('Admin') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('worker.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>{{ __('Field Worker') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('stand.index') }}" class="nav-link {{ request()->is('stand.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-location"></i>
              <p>{{ __('Stand') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('vehicle.index') }}" class="nav-link {{ request()->is('vehicle.*') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-car"></i>
              <p>{{ __('Vehicle') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('faq.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-question"></i>
              <p>{{ __('FAQ') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('notice.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-bell"></i>
              <p>{{ __('Notice') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('contact.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-address-book"></i>
              <p>{{ __('Contact Info') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('blog.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-blog"></i>
              <p>{{ __('Blog') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('footerTitle.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-heading"></i>
              <p>{{ __('Footer Title') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('footer.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-file-invoice"></i>
              <p>{{ __('Footer') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('owner.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-circle-user"></i>
              <p>{{ __('Owner') }}</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="{{ route('driver.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-dharmachakra"></i>
              {{-- <i class="fa-solid fa-dharmachakra"></i> --}}
              <p>{{ __('Driver') }}</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>