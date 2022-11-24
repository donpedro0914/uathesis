<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="{{ route('homepage') }}" class="navbar-brand ml-lg-3" style="width: 850px;">
            {{ HTML::image('img/logo.png', '', array('style'=>'width:15%;float:left;')) }}
            <h3 class="m-0 text-uppercase text-primary" style="padding-top: 30px; margin-left: 150px !important;">International Technology Center</h3>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="{{ route('homepage') }}" class="nav-item nav-link @if(request()->is('/')) active @endif">Home</a>
                <a href="{{ route('about') }}" class="nav-item nav-link @if(request()->is('about')) active @endif">About</a>
                <a href="{{ route('qualifications') }}" class="nav-item nav-link @if(request()->is('qualifications')) active @endif">Qualifications</a>
                <a href="{{ route('application') }}" class="nav-item nav-link @if(request()->is('application-form')) active @endif">Application Form</a>
            </div>
        </div>
    </nav>
</div>