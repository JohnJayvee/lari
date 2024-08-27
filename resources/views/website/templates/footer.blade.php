<footer class="bg-light py-2">
    <div class="container">
        <div class="row text-center text-md-start">

            <div class="col-12 col-md-4 mb-2 d-flex justify-content-center justify-content-md-start align-items-center">
                <a href="#"><img class="logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo"></a>
            </div>

            <div class="col-12 col-md-4 mb-2">
                <ul class="list-unstyled d-flex flex-column align-items-center align-items-md-start gap-1">
                    <li><a class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link {{ request()->route()->named('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About Us</a></li>
                    <li><a class="nav-link {{ request()->is('terms-and-condition/*') ? 'active' : '' }}"
                            href="{{ route('general-terms') }}">Terms & Conditions</a></li>
                    <li><a class="nav-link {{ request()->route()->named('contact-us') ? 'active' : '' }}"
                            href="{{ route('contact-us') }}">Contact Us</a></li>
                    <li><a class="nav-link {{ request()->route()->named('faqs') ? 'active' : '' }}"
                            href="{{ route('faqs') }}">FAQ’s</a></li>
                </ul>
            </div>

            <div class="col-12 col-md-4 mb-2">
                <ul class="list-unstyled d-flex flex-column align-items-center align-items-md-start gap-1">
                    <li class="d-flex align-items-center"><i class="bi bi-map me-2"></i><span>83 National Road, Brgy.
                            Putatan Muntinlupa City</span></li>
                    <li class="d-flex align-items-center"><i
                            class="bi bi-envelope me-2"></i><span>lariph22@gmail.com</span></li>
                    <li class="d-flex align-items-center"><i class="bi bi-telephone me-2"></i><span>0915-264-8656</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                <span>ⓒ 2024 LARI. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>
