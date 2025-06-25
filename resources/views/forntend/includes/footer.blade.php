<footer class="footer_gray pt-5 pb-4">
    <div class="container">
      <div class="row">
        <!-- Logo and Contact Section -->
          <div class="col-md-12 col-lg-6 mb-4 left_footer">
              <a href="{{ route('f.home') }}">
                <img src="{{ asset('forntend/images/footer_logo.png') }}" alt="Logo" class="mb-3 logo">
              </a>
              <p class="mb-3">Phasellus pulvinar porta turpis sit amet <br> facilis sapien bibendum eu praesent massa.</p>
              <p ><i class="fas fa-phone-alt me-2"></i>
                <a class="contact" href="tel:{{ $contact->phone }}">+880 {{ $contact->phone }},</a>
                <a class="contact" href="tel:{{ $contact->optional_number }}">{{ $contact->optional_number }}</a>
              </p>
              <p ><i class="fas fa-envelope me-2"></i><a class="contact" href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
              <div class="d-flex mobile_app_link">
                  <div class="google_play">
                    <a href="#" class="me-2"><img src="{{ asset('forntend/images/image 30.png') }}" alt="google_img"></a>
                  </div>
                  <div class="app_store">
                    <a href="#" class="mr-3"><img src="{{ asset('forntend/images/image 31.png') }}" alt="apple_img"></a>
                  </div>
              </div>
          </div>

          <!-- Useful Links -->
          <div class="col-md-4 col-lg-2 mb-4 mt-2 mt-md-3 mt-lg-5">
              <h6 class="text-capitalize footer_text">{{ __('Useful Links') }}</h6>
              <ul class="list-unstyled">
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Features') }}</a></li>
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('About') }}</a></li>
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Service') }}</a></li>
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Team') }}</a></li>
              </ul>
          </div>

          <!-- Help & Support -->
          <div class="col-md-4 col-lg-2 mb-4 mt-2 mt-md-3 mt-lg-5">
              <h6 class="text-capitalize footer_text">{{ __('Help & Support') }}</h6>
              <ul class="list-unstyled">
                  <li class="mt-2"><a href="#faq" class="footer_gray text-decoration-none">{{ __('FAQ') }}</a></li>
                  <li class="mt-2"><a href="{{ route('f.blog.index') }}" class="footer_gray text-decoration-none">{{ __('Blog') }}</a></li>
                  <li class="mt-2"><a href="{{ route('f.contact.index') }}" class="footer_gray text-decoration-none">{{ __('Contact Us') }}</a></li>
                  <li class="mt-2"><a href="{{ route('f.help.index') }}" class="footer_gray text-decoration-none">{{ __('Support') }}</a></li>
              </ul>
          </div>

          <!-- Resources -->
          <div class="col-md-4 col-lg-2 mb-4 mt-2 mt-md-3 mt-lg-5">
              <h6 class="text-capitalize footer_text">{{ __('Resources') }}</h6>
              <ul class="list-unstyled">
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Guides and resources') }}</a></li>
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Team') }}</a></li>
                  <li class="mt-2"><a href="#" class="footer_gray text-decoration-none">{{ __('Tools') }}</a></li>
                  <li class="mt-2"><a href="{{ route('f.help.index') }}" class="footer_gray text-decoration-none">{{ __('Support') }}</a></li>
              </ul>
          </div>

        <!-- Social Links -->

        <div class="d-flex justify-content-between align-items-center mt-4 certified_social">
          <div class="certified">
            <p class="mb-0 copy_right">Copyright © 2024 - {{ date('Y') . ' ' . config('app.name') }} | developed by <a
                href="https://rayhansict.com/" target="_blank">Rayhans ICT</a></p>
            {{-- <span></span> --}}
          </div>
          <div class="d-flex gap-3 social">
            <a href="#" class="footer_gray"><i class="fab fa-facebook-square"></i></a>
            <a href="#" class="footer_gray"><i class="fa-brands fa-square-instagram"></i></a>
            <a href="#" class="footer_gray"><i class="fab fa-twitter"></i></a>
            <a href="#" class="footer_gray"><i class="fa-brands fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
