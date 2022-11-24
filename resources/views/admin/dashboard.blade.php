@extends('layouts.app')
@section('content')
    @include('global.topnav')
	@include('global.sidemenu')
	<div id="wrapper">
	<div class="content-page">
	    <div class="content">
	        <div class="container-fluid">
	            <div class="page-title-box">
	                <ol class="breadcrumb float-right">
	                    <li class="breadcrumb-item"><a href="javascript:void(0);">iPOS Concept</a></li>
	                    <li class="breadcrumb-item active">Dashboard</li>
	                </ol>
	                <h4 class="page-title">Dashboard</h4>
	            </div>
	            <div class="row">
	                <div class="col-xl-4">
	                    <div class="card-box">
	                        <h4 class="header-title">Total Application</h4>
	                        <div class="mb-3 mt-4">
	                            <h2 class="font-weight-light">{{ $total }}</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-4">
	                    <div class="card-box">
	                        <h4 class="header-title">Approved Application</h4>
	                        <div class="mb-3 mt-4">
	                            <h2 class="font-weight-light">{{ $approved }}</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-4">
	                    <div class="card-box">
	                        <h4 class="header-title">Pending Application</h4>
	                        <div class="mb-3 mt-4">
	                            <h2 class="font-weight-light">{{ $pending }}</h2>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-12">
	                    <div class="card-box">
	                        <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
                            {!! $chartjs->render() !!}
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
@endsection