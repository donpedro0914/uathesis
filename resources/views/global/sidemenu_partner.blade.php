<div class="left-side-menu left-side-menu-dark" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="active">
            <ul class="metismenu in" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li><a href="/partner/portal"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('partner.inventory') }}"><i class="mdi mdi-package-variant"></i> <span>Inventory</span></a></li>
                <li><a href="{{ route('partner.sales') }}"><i class="mdi mdi-database"></i> <span>Sales</span></a></li>
                <li><a href="{{ route('partner.profile') }}"><i class="mdi mdi-account"></i> <span>Profile</span></a></li>
                <li><a href="{{ route('partner.download_forms') }}"><i class="mdi mdi-file-document"></i> <span>Download Forms</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>