<div class="left-side-menu left-side-menu-dark" style="background: {{ iShopUser::get_theme(Auth::user()->store_id) }}">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="active">
            <ul class="metismenu in" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li><a href="/dashboard/portal"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('stores') }}"><i class="mdi mdi-store"></i> <span>Stores</span></a></li>
                <li><a href="{{ route('users') }}"><i class="mdi mdi-account-group"></i> <span>Users</span></a></li>
                <!-- <li><a href="{{ route('registry') }}"><i class="mdi mdi-cube"></i> <span>Registry</span></a></li> -->
                <li><a href="{{ route('reports') }}"><i class="mdi mdi-google-analytics"></i> <span>Reports</span></a></li>
                <li><a href="{{ route('downloadable-forms') }}"><i class="mdi mdi-file-document"></i></i> <span>Downloadable Files</span></a></li>
                <li><a href="{{ route('logs') }}"><i class="mdi mdi-format-list-bulleted"></i></i> <span>Logs</span></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>