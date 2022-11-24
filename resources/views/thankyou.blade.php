@extends('layouts.app_front')
@section('content')
    @include('global.header')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Thank You!</h1>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h2>Your form has been received and being reviewed by our staff.</h2>
        </div>
    </div>
    @include('global.footer')
@endsection
