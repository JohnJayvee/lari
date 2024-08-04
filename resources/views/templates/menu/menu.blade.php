<!-- Navbar -->
<nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        
        <!-- ! Not required for layout-without-menu -->
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
          </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

          <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
              <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                <span class="d-none d-md-inline-block text-lg"><strong>Welcome! </strong> {{ Auth::user()->FirstName }}</span>
              </a>
            </div>
          </div>


        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <li>
            <i class="bx bxs-bell bx-sm bx-tada-hover px-2"></i>
          </li>
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar  ">
                <img src="{{ asset('assets/img/profile.png') }}" alt="" class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <div class="dropdown-item py-1">
                  <i class="bx bx-pen me-2"></i>
                  <span class="align-middle">
                    {{   Auth::user()->getLevel()->uleveldescription  }}
                  </span>
                </div>
              </li>
              <li>
                <div class="dropdown-divider "></div>
              </li>
              <li>
                <a class="dropdown-item py-1" href="/user/{{ Auth::user()->UserID}}">
                  <i class="bx bx-user me-2"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <div class="dropdown-divider "></div>
              </li>
              <li>
                  <a class="dropdown-item py-1" href="/logout">
                    <i class="bx bx-log-in me-2"></i>
                    <span class="align-middle">Logout</span>
                  </a>
                </li>
              </ul>
            </li>
            <!--/ User -->
          </ul>
        </div>
              
</nav>
<!-- / Navbar -->

