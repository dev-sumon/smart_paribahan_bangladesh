<nav class="navbar navbar-expand-lg bg-light border-bottom">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ route('f.home') }}">
        <img src="{{ asset('forntend/images/logo.png') }}" alt="Logo" >
      </a>

      <!-- Login Button and Menu Icon (Responsive Mode) -->
      <div class="d-flex d-lg-none align-items-center justify-content-center responsive_menu">
        <a href="{{ route('f.login.index') }}" class="btn btn-outline-danger btn-sm btn-login"><i class="fas fa-user-circle"></i>Log In</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><a href="{{ route('f.login.index') }}"><i class="fa-solid fa-bars"></i></a></span>
        </button>
      </div>

      <!-- Menu Items (Collapsible) -->
      <div class="collapse navbar-collapse justify-content-between nav_bar" id="navbarContent">
        <!-- Left-aligned menu items -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.home') }}">{{ __('Home') }}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('Services') }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="#">{{ __('Service1') }}</a></li>
              <li><a class="dropdown-item" href="#">{{ __('Service2') }}</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">{{ __('Related') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.help.index') }}">{{ __('Help') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.blog.index') }}">{{ __('Blog') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.contact.index') }}">{{ __('Contact') }}</a>
          </li>
        </ul>

        <!-- Right-aligned Language Selector and Buttons -->
        @php
          $currentLang = Session::get('locale', 'bn');
      @endphp
        <div class="d-flex align-items-center">
          <div class="dropdown me-3">
            <a class="btn btn-outline-secondary dropdown-toggle language_button" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/icon _language_.svg" alt="">
                {{ $currentLang == 'bn' ? 'বাংলা' : 'English' }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
              <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}">English</a></li>
              <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['lang' => 'bn']) }}">বাংলা</a></li>
            </ul>
          </div>
          @if (Auth::guard('driver')->check())
            <a href="{{ route('driver.dashboard',Auth::guard('driver')->user()->id) }}">{{ __('Profile') }}</a>
          @elseif (Auth::guard('owner')->check())
          <a href="{{ route('owner.dashboard', Auth::guard('owner')->user()->id) }}">{{ __('Profile') }}</a>
          @else
          <a href="{{ route('f.login.index') }}" class="btn btn-outline-danger me-2 d-none d-lg-block login loginButton">Log In</a>
          <a href="{{ route('f.signup.index') }}" class="btn btn-outline-danger d-none d-lg-block signUp">Sign Up</a>
          @endif
        </div>
      </div> 
    </div>
  </nav>