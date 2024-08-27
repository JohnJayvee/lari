<style>
    /* Basic Reset */
    body,
    h1,
    h2,
    h3,
    p,
    ul,
    li {
        margin: 0;
        padding: 0;
    }

    /* Navigation Styles */
    #navigation-bar {
        padding: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #img-logo {
        max-height: 50px;
    }

    /* Navigation Links */
    .nav-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        /* Default display for larger screens */
        flex-direction: row;
    }

    .nav-link {
        text-decoration: none;
        padding: 0.5rem 1rem;
    }

    .nav-link.active {
        font-weight: bold;
    }

    /* Hamburger Menu Styles */
    #menu-icon {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        margin: 0;
        position: relative;
        z-index: 1000;
    }

    #menu-icon span {
        display: block;
        width: 25px;
        height: 2px;
        background-color: #333;
        margin: 5px 0;
        transition: 0.3s;
    }

    /* Show/hide navigation */
    .nav-list.active {
        display: flex;
        /* Only show when active on mobile */
    }

    #menu-icon.active span:nth-child(1) {
        transform: rotate(45deg);
        top: 7px;
    }

    #menu-icon.active span:nth-child(2) {
        opacity: 0;
    }

    #menu-icon.active span:nth-child(3) {
        transform: rotate(-45deg);
        top: -7px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .nav-list {
            display: none;
            /* Hide by default on mobile */
            flex-direction: column;
            width: 100%;
            background-color: white;
            position: absolute;
            top: 60px;
            /* Adjust based on header height */
            left: 0;
            z-index: 999;
        }

        #menu-icon {
            display: block;
            /* Show hamburger icon on mobile */
            position: absolute;
            right: 1rem;
            /* Align to the right */
            top: 1rem;
            /* Adjust top position as needed */
        }
    }

    @media (min-width: 768px) {
        #menu-icon {
            display: none;
            /* Hide hamburger icon on larger screens */
        }
    }
</style>


<header>
    <div class="container">
        <div class="row align-items-center" id="navigation-bar">
            <div class="col-12 col-md-2 d-flex justify-content-start align-items-center logo">
                <a href="#"><img id="img-logo" src="{{ asset('assets/img/logo.png') }}" alt="LARI Logo" /></a>
            </div>
            <div class="col-12 col-md-10 d-flex justify-content-between align-items-center">
                <button id="menu-icon" class="d-md-none" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <nav>
                    <ul class="nav-list">
                        <li><a class="nav-link {{ request()->route()->named('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">Home</a></li>
                        <li><a class="nav-link {{ request()->route()->named('about') ? 'active' : '' }}"
                                href="{{ route('about') }}">About Us</a></li>
                        <li><a class="nav-link {{ request()->is('terms-and-condition/*') ? 'active' : '' }}"
                                href="{{ route('general-terms') }}">Terms & Conditions</a></li>
                        <li><a class="nav-link {{ request()->route()->named('contact-us') ? 'active' : '' }}"
                                href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li><a class="nav-link {{ request()->route()->named('faqs') ? 'active' : '' }}"
                                href="{{ route('faqs') }}">FAQ's</a></li>
                        <li><a class="nav-link {{ request()->route()->named('signin') ? 'active' : '' }}"
                                href="{{ route('signin') }}" type="button">Sign In</a></li>
                        {{-- <li><a class="btn btn-link {{ request()->route()->named('signin') ? 'active' : '' }}"
                                href="{{ route('signin') }}" type="button">Sign In</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<script>
    document.getElementById('menu-icon').addEventListener('click', function() {
        const navList = document.querySelector('.nav-list');
        this.classList.toggle('active');
        navList.classList.toggle('active');
    });
</script>
