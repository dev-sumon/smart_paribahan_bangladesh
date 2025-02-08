<nav class="navbar navbar-expand-lg bg-light border-bottom">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="{{ route('f.home') }}">
        <img src="{{ asset('forntend/images/logo.png') }}" alt="Logo" >
      </a>

      <!-- Login Button and Menu Icon (Responsive Mode) -->
      <div class="d-flex d-lg-none align-items-center justify-content-center responsive_menu">
        <a href="login.html" class="btn btn-outline-danger btn-sm btn-login"><i class="fas fa-user-circle"></i> লগ ইন</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""><i class="fa-solid fa-bars"></i></span>
        </button>
      </div>

      <!-- Menu Items (Collapsible) -->
      <div class="collapse navbar-collapse justify-content-between nav_bar" id="navbarContent">
        <!-- Left-aligned menu items -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.home') }}">হোম</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              সার্ভিস সমূহ
            </a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
              <li><a class="dropdown-item" href="#">সার্ভিস ১</a></li>
              <li><a class="dropdown-item" href="#">সার্ভিস ২</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">সম্পর্কিত</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.help.index') }}">হেল্প</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.blog.index') }}">ব্লগ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('f.contact.index') }}">যোগাযোগ</a>
          </li>
        </ul>

        <!-- Right-aligned Language Selector and Buttons -->
        <div class="d-flex align-items-center">
          <div class="dropdown me-3">
            <a class="btn btn-outline-secondary dropdown-toggle language_button" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="images/icon _language_.svg" alt="">
               বাংলা
            </a>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
              <li><a class="dropdown-item" href="#">English</a></li>
              <li><a class="dropdown-item" href="#">বাংলা</a></li>
            </ul>
          </div>
          {{-- <a href="{{ route('f.login.index') }}" class="btn btn-outline-danger me-2 d-none d-lg-block login loginButton">লগ ইন</a>
          <a href="{{ route('f.signup.index') }}" class="btn btn-outline-danger d-none d-lg-block signUp">সাইন আপ</a>
          <a href="{{ route('dRegistration.registerForm') }}" class="btn btn-outline-danger d-none d-lg-block signUp">সাইন আপ</a> --}}

          @if (Auth::guard('driver')->check())
              {{-- Logout button --}}
              {{-- <a class="dropdown-item" href="{{ route('driver.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('driver.logout') }}" method="POST" class="d-none">
                @csrf
            </form> --}}
            <a href="{{ route('driver.dashboard',Auth::guard('driver')->user()->id) }}">{{ __('Profile') }}</a>
          @elseif (Auth::guard('owner')->check())
              <a class="dropdwon-item" href="{{ route('owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
          @else
          <a href="{{ route('f.login.index') }}" class="btn btn-outline-danger me-2 d-none d-lg-block login loginButton">লগ ইন</a>
          <a href="{{ route('f.signup.index') }}" class="btn btn-outline-danger d-none d-lg-block signUp">সাইন আপ</a>
          {{-- <a href="{{ route('dRegistration.registerForm') }}" class="btn btn-outline-danger d-none d-lg-block signUp">সাইন আপ</a> --}}
              {{-- Login and registration buttons --}}
          @endif
        </div>
      </div> 
    </div>
  </nav>