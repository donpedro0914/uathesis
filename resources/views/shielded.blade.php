@extends('layouts.app_front')
@section('content')
    @include('global.header')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">SHIELDED METAL ARC WELDING NC II</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Qualifcation</p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">SHIELDED METAL ARC WELDING NC II</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <div class="section-title position-relative mb-5">
                            <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Course Detail</h6>
                            <h1 class="display-4">Shielded Metal Arc Welding NC II</h1>
                        </div>
                        {{ HTML::image('img/courses-7.jpg', '', array('class'=>'img-fluid mb-4')) }}
                        <p>The Shielded Metal Arc Welding (SMAW) NC II Qualification consists of competencies that a person must achieve to weld carbon steel plate and pipe components as specified by layout, blueprints, diagrams, work order, welding procedure or oral instructions using shielded metal arc welding equipment.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="py-3 px-4">
                        <a class="btn btn-block btn-secondary py-3 px-5" href="{{ route('application') }}">Apply Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('global.footer')
@endsection