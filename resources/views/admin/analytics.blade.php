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
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                    <h4 class="page-title">Reports</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <div class="form-group">
                                <label>Date Range Filter</label>
                                <div class="input-group">
                                    <input class="form-control input-daterange-datepicker" id="daterange" type="text"/>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary waves-effect waves-light" id="date_filter" type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card-box">
                            <h4 class="header-title">Top Selling Product</h4>
                            <div class="mb-3 mt-4">
                                <h2 class="font-weight-light">-</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card-box">
                            <h4 class="header-title">Top Selling Product Category</h4>
                            <div class="mb-3 mt-4">
                                <h2 class="font-weight-light">-</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card-box">
                            <h4 class="header-title">Top Selling Stores</h4>
                            <div class="mb-3 mt-4">
                                <h2 class="font-weight-light">-</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card-box">
                            <h4 class="header-title">Top Selling Partners</h4>
                            <div class="mb-3 mt-4">
                                <h2 class="font-weight-light">-</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
                            {!! $chartjs->render() !!}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
                            {!! $bar->render() !!}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
                            {!! $doughnut->render() !!}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card-box">
                            <h4 class="header-title">Statistics for the month of <?php echo date('F'); ?></h4>
                            {!! $pie->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $('.input-daterange-datepicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-light',
        });
        
    });
</script>
@endpush