<div class="left-side-menu left-side-menu-dark" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
        <!--- Sidemenu -->
        <div class="slimscroll-menu">
            <div id="sidebar-menu" class="active">
                <ul class="metismenu in" id="side-menu">
                    <li class="menu-title">Navigation</li>
                    <li><a href="/store-manager/portal"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ route('sm.brand') }}"><i class="mdi mdi-store"></i> <span>Brand Partners</span></a></li>
                    <li>
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-package-variant"></i>
                            <span> Inventory</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('sm.inventory') }}">List</a></li>
                            <li><a href="{{ route('sm.inventory.search') }}">Search Item</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('sm.payout') }}"><i class="mdi mdi-database"></i> <span>Payout / Sales</span></a></li>
                    <li><a href="{{ route('sm.staff') }}"><i class="mdi mdi-account-group"></i> <span>Staff</span></a></li>
                    <li style="display:{{ iShopUser::payrolls(Auth::user()->store_id) }}">
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-calendar-check"></i>
                            <span> Payroll</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('sm.payroll.attendance') }}">Attendance</a></li>
                            <li><a href="{{ route('sm.payroll.staff') }}">Staff</a></li>
                        </ul>
                    </li>
                    <li style="display:{{ iShopUser::rentals(Auth::user()->store_id) }}">
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-houzz-box"></i>
                            <span> Rentals</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('sm.rentals') }}">Rental Dues</a></li>
                            <li><a href="{{ route('sm.rentals.duration') }}">Contract Duration</a></li>
                            <li><a href="{{ route('sm.rentals.report') }}">Summary Reports - Payments</a></li>
                        </ul>
                    </li>
                    <li style="display:{{ iShopUser::downloads(Auth::user()->store_id) }}"><a href="{{ route('sm.download_forms') }}"><i class="mdi mdi-file-document"></i> <span>Download Forms</span></a></li>
                    <li style="display:{{ iShopUser::customers(Auth::user()->store_id) }}">
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-account-switch"></i>
                            @php
                                $bday_noti = iShopUser::bday_noti(Auth::user()->store_id);
                            @endphp
                            @if($bday_noti)
                            <span> Customers</span> <span class="badge badge-danger"><i class="text-white mdi mdi-gift"></i>{{ $bday_noti }}</span>
                            @else
                            <span> Customers</span>
                            @endif
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('sm.customer') }}">Customer Lists</a></li>
                            <li><a href="{{ route('sm.points') }}">Points</a></li>
                        </ul>
                    </li>
                    <li style="display:{{ iShopUser::reports(Auth::user()->store_id) }}">
                        <a href="javascript:void(0);" aria-expanded="false">
                            <i class="mdi mdi-google-analytics"></i>
                            <span> Reports</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level collapse" aria-expanded="false">
                            <li><a href="{{ route('sm.reports') }}">Overall Reports</a></li>
                            <li><a href="{{ route('sm.reports.sales') }}">Sales Reports</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('sm.logs') }}"><i class="mdi mdi-format-list-bulleted"></i></i> <span>Logs</span></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>