<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bangladesh Smart Poribahon</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts - Hind Siliguri -->
      <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet"/>
       <!-- font-family: "Chivo", serif; -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <!-- font-family: "Manrope", serif; -->
       <link rel="preconnect" href="https://fonts.googleapis.com">
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
       <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />

    <!-- Custom css link -->
    <link rel="stylesheet" href="{{ asset('forntend/style/style.css') }}">

    <!-- responsive css link  -->
    <link rel="stylesheet" href="{{ asset('forntend/style/responsive.css') }}">
  </head>
  <body>
    <!-- nav section start -->
    <header>
        {{-- <nav class="navbar navbar-expand-lg bg-light border-bottom">
            <div class="container">
              
              <a class="navbar-brand" href="index.html">
                <img src="{{ asset('forntend/images/logo.png') }}" alt="Logo" >
              </a>
        
            
              <div class="d-flex d-lg-none align-items-center justify-content-center responsive_menu">
                <a href="login.html" class="btn btn-outline-danger btn-sm btn-login"><i class="fas fa-user-circle"></i> লগ ইন</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""><i class="fa-solid fa-bars"></i></span>
                </button>
              </div>
        
             
              <div class="collapse navbar-collapse justify-content-between nav_bar" id="navbarContent">
               
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.html">হোম</a>
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
                    <a class="nav-link" href="chat_box.html">হেল্প</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="blog.html">ব্লগ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.html">যোগাযোগ</a>
                  </li>
                </ul>
        
                
                <div class="d-flex align-items-center">
                  <div class="dropdown me-3">
                    <a class="btn btn-outline-secondary dropdown-toggle language_button" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('forntend/images/icon _language_.svg') }}" alt="">
                       বাংলা
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                      <li><a class="dropdown-item" href="#">English</a></li>
                      <li><a class="dropdown-item" href="#">বাংলা</a></li>
                    </ul>
                  </div>
                  <a href="login.html" class="btn btn-outline-danger me-2 d-none d-lg-block login loginButton">লগ ইন</a>
                  <a href="signup_page .html" class="btn btn-outline-danger d-none d-lg-block signUp">সাইন আপ</a>
                </div>
              </div> 
            </div>
          </nav> --}}
          @include('forntend.includes.nav-top')
    </header>
    <!-- nav section end -->

    @yield('content')
 
  <!-- Footer Part start -->
    @include('forntend.includes.footer')
  <!-- Footer part End! -->


  <!-- FAQ JS start -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <!-- Bootstrap JS (with Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

  <!-- Custom Js Link -->
     <script src="{{ asset('forntend/js/main.js') }}"></script>
  
  </body>
</html>