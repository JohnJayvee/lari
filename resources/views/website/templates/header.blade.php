<header>
    <div class="container">
        <div class="row" id="navigation-bar">
            <div class="col-2 d-flex justify-content-start align-items-center logo">
                <a href="#"><img id="img-logo" src="{{ asset('assets/img/logo.png ') }}" alt="LARI Logo"/></a>
            </div>
            <div class="col-10 d-flex justify-content-end align-items-center">
                <nav>
                    <ul>
                        <li><a class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                        <li><a class="nav-link {{ request()->route()->named('about') ? 'active' : '' }}"  href="{{ route('about') }}">About Us</a></li>
                        <li><a class="nav-link {{ request()->is('terms-and-condition/*') ? 'active' : '' }}"  href="{{ route('general-terms') }}">Terms & Conditions</a></li>
                        <li><a class="nav-link {{ request()->route()->named('contact-us') ? 'active' : '' }}"  href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li><a class="nav-link {{ request()->route()->named('faqs') ? 'active' : '' }}"  href="{{ route('faqs') }}">FAQ's</a></li>
                        <li><a class="{{ request()->route()->named('signin') ? 'active' : '' }}  btn btn-link"  href="{{ route('signin') }}" type="button">Sign In</a></li>
                        <a href="#" id="menu-icon"></a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>    
</header>
