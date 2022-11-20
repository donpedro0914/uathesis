<div class="left-side-menu left-side-menu-dark" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
        <!--- Sidemenu -->
        <div class="slimscroll-menu">
            <div id="sidebar-menu" class="active">
                <ul class="metismenu in" id="side-menu">
                    <li class="menu-title">Navigation</li>
                    <li><a href="/manager/portal"><i class="mdi mdi-package-variant"></i> <span>Inventory</span></a></li>
                    <li><a href="{{ route('manager.brand') }}"><i class="mdi mdi-store"></i> <span>Brand Partners</span></a></li>
                    <li style="display:{{ iShopUser::payroll(Auth::user()->id) }}"><a href="/manager/attendance"><i class="mdi mdi-calendar-check"></i> <span>Attendance</span></a></li>
                    <li style="display:{{ iShopUser::customers(Auth::user()->store_id) }}">
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-account-switch"></i>
                            <span> Customers</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('manager.customer') }}">Customer Lists</a></li>
                            <li><a href="{{ route('manager.points') }}">Points</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>