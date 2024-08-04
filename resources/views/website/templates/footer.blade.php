<footer>
  <div class="container-fluid">
    <div class="row">

      <div class="d-flex align-items-center justify-content-center col-md-4">
        <a href="#"><img class="logo" src="{{ asset('assets/img/logo.png') }}"></a>
      </div>

      <div class="d-flex align-items-center justify-content-center col-md-4">
        <ul class="footer-links">
          <li><a class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
          <li><a class="nav-link {{ request()->route()->named('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>
          <li><a class="nav-link {{ request()->is('terms-and-condition/*') ? 'active' : '' }}" href="{{ route('general-terms') }}">Terms & Conditions</a></li>
          <li><a class="nav-link {{ request()->route()->named('contact-us') ? 'active' : '' }}" href="{{ route('contact-us') }}">Contact Us</a></li>
          <li><a class="nav-link {{ request()->route()->named('faqs') ? 'active' : '' }}" href="{{ route('faqs') }}">FAQ’s</a></li>
        </ul>
      </div>

      <div class="d-flex align-items-center justify-content-left col-md-4">
          <ul class="footer-acc">
            <li><i class="bi bi-map"></i><span>83 National Road, Brgy. Putatan Muntinlupa City</span></li>
            <li><i class="bi bi-envelope"></i><span>lariph22@gmail.com</span></li>
            <li><i class="bi bi-telephone"></i><span>0915-264-8656</span></li>
          </ul>
      </div>

        <div class="col-md-12 d-flex justify-content-center align-items-center copyright">
          <span>ⓒ 2024 LARI. All right reserved.</span>
        </div>

    </div>
  </div>
</footer>

