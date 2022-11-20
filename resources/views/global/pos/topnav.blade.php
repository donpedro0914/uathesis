<header id="topnav" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
    <nav class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link nav-user" href="/pos/portal">
                        <span><i class=" mdi mdi-cart"></i> Add Cart</span>
                    </a>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link nav-user" href="{{ route('pos.summary') }}">
                        <span><i class="mdi mdi-format-list-bulleted"></i> Sales Summary</span>
                    </a>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link nav-user" href="{{ route('pos.inventory') }}">
                        <span><i class="mdi mdi-file-document-box"></i> Inventory</span>
                    </a>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link nav-user" href="{{ route('pos.transactions') }}">
                        <span><i class="mdi mdi-format-list-checks"></i> Transactions</span>
                    </a>
                </li>
                <li class="dropdown notification-list" style="display:{{ iShopUser::customers(Auth::user()->store_id) }}">
                    <a class="nav-link nav-user" href="{{ route('pos.customers') }}">
                        <span><i class="mdi mdi-account-switch"></i> Customers</span>
                    </a>
                </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <span class="ml-1">{{ ucfirst(iShopUser::get_username(Auth::user()->id)) }} <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h6 class="text-overflow m-0">Welcome {{ ucfirst(iShopUser::get_name(Auth::user()->id)) }}!</h6>
                        </div>
                        <!-- item-->
                        <a href="/logout" class="dropdown-item notify-item">
                            <i class="dripicons-power"></i> <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <a href="/pos/portal" class="logo">
                        <span class="logo-lg">
                        {{ HTML::image(iShopUser::get_logo(Auth::user()->id), 'Logo', array('height' => 28)) }}
                        </span>
                        <span class="logo-sm">
                        {{ HTML::image(iShopUser::get_logo(Auth::user()->id), 'Logo', array('height' => 28)) }}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end topbar-main -->
    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="has-submenu">
                        <a href="/pos/portal">
                            <span><i class=" mdi mdi-cart"></i> Add Cart</span>
                        </a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('pos.summary') }}">
                            <span><i class="mdi mdi-format-list-bulleted"></i> Sales Summary</span>
                        </a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('pos.inventory') }}">
                            <span><i class="mdi mdi-file-document-box"></i> Inventory</span>
                        </a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ route('pos.transactions') }}">
                            <span><i class="mdi mdi-format-list-checks"></i> Transactions</span>
                        </a>
                    </li>
                    <li class="has-submenu" style="display:{{ iShopUser::customers(Auth::user()->store_id) }}">
                        <a href="{{ route('pos.customers') }}">
                            <span><i class="mdi mdi-account-switch"></i> Customers</span>
                        </a>
                    </li>
                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div>
</header>