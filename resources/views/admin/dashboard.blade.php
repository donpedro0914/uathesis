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
	                <div class="col-xl-3">
	                    <div class="card-box">
	                        <h4 class="header-title">Top Selling Product by Price</h4>
	                        <div class="mb-3 mt-4">
	                            <h2 class="font-weight-light">{!! $productByPriceChart->render() !!}</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-3">
	                    <div class="card-box">
	                        <h4 class="header-title">Top Selling Product per Quantity</h4>
	                        <div class="mb-3 mt-4">
	                            <h2 class="font-weight-light">{!! $productByQuantityChart->render() !!}</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-3">
	                    <div class="card-box">
	                        <h4 class="header-title">Top Selling Partners</h4>
	                        <div class="mb-3 mt-4">
								<table class="table table-sm">
									<thead>
										<tr>
											<th>Brand Name</th>
											<th class="text-right">Total Sales</th>
										</tr>
									</thead>
									<tbody>
										@foreach($topSellingPartners as $partner)
											<tr>
												<td>{{ $partner->name }}</td>
												<td class="text-right">Php {{ $partner->totalPrice }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-xl-3">
	                    <div class="card-box">
	                        <h4 class="header-title">Top Selling Stores</h4>
	                        <div class="mb-3 mt-4">
								<table class="table table-sm">
									<thead>
										<tr>
											<th>Store Name</th>
											<th class="text-right">Total Sales</th>
										</tr>
									</thead>
									<tbody>
										@foreach($topSellingStores as $partner)
											<tr>
												<td>{{ $partner->name }}</td>
												<td class="text-right">Php {{ $partner->finalAmount }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-12">
	                    <div class="card-box">
	                        <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
@endsection