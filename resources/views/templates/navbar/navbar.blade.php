     <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" >


        <div class="app-brand pt-2 d-flex justify-content-center columns-2">
            <a href="#" class="app-brand-link px-2">
              <span class="gold-brand-logo justify-content-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="sinag-logo" width="90">
              </span>
            </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner pt-3 overflow-auto">
                @foreach(Auth::user()->getMainModules() as $module)
                  <li class="menu-item text-xs">
                    <a href="{{ $module->url ? route($module->url) : 'javascript:void(0);' }}" class="menu-link {{ empty($module->url) ? 'menu-toggle' : '' }}">
                        <i class='menu-icon tf-icons bx {{ $module->icon }}' ></i>
                        <div class="text-truncate">{{ $module->modulename }}</div>
                    </a>
                    @if(empty($module->url))
                      @foreach(Auth::user()->getSubModules() as $submodule)
                        <ul class="menu-sub">
                          <li class="menu-item text-xs">
                            <a href="{{ route($submodule->url) }}" class="menu-link">
                              <div class="text-truncate" data-i18n="Checkout">{{ $submodule->modulename }}</div>
                            </a>
                          </li>
                        </ul>
                      @endforeach
                    @endif
                  </li>
                @endforeach
        </ul>
      </aside>

      