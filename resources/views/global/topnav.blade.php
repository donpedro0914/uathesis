<header id="topnav" class="topbar-light">
    <nav class="navbar-custom" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">{{ ucfirst(iShopUser::get_username(Auth::user()->id)) }}<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Welcome {{ ucfirst(iShopUser::get_name(Auth::user()->id)) }}!</h6>
                    </div>
                    <a href="/logout" class="dropdown-item notify-item">
                        <i class="dripicons-power"></i> <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled menu-left mb-0">
            @php
            if(Auth::user()->type == 'Store Manager') {
                $home = '/store-manager/portal';
            } elseif(Auth::user()->type == 'Partner') {
                $home = '/partner/portal';
            } elseif(Auth::user()->type == 'Supervisor') {
                $home = '/supervisor/portal';
            } else {
                $home = '/dashboard/portal';
            }
            @endphp
            <li class="float-left">
                <a href="{{ $home }}" class="logo" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
                    <span class="logo-lg">
                    {{ HTML::image('img/ishopbox.png', 'iShopBox', array('height' => 20)) }}
                    </span>
                    <span class="logo-sm">
                    {{ HTML::image('img/ishopbox_small.jpg', 'iShopBox', array('height' => 28)) }}
                    </span>
                </a>
            </li>
            <li class="float-left">
                <a class="button-menu-mobile open-left navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <!-- end navbar-custom -->
</header>