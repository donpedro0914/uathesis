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
                        <li class="breadcrumb-item active">Downloadable Forms</li>
                    </ol>
                    <h4 class="page-title">Downloadable Forms</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30 ribbon-box">
                            <div class="card-body">
                                @if($contract)
                                <div class="ribbon ribbon-primary float-left">
                                    <i class="mdi mdi-thumb-up"></i>
                                </div>
                                <div class="clear"></div>
                                @endif
                                <h5 class="card-title">Contracts</h5>
                                <form action="{{ route('admin.downloadable.contracts') }}" enctype="multipart/form-data" method="post" class="dropzone" id="contract">
                                    @csrf
                                    <div class="fallback">
                                        <input name="contract" type="file" />
                                    </div>
    
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30 ribbon-box">
                            <div class="card-body">
                                @if($reciept)
                                <div class="ribbon ribbon-primary float-left">
                                    <i class="mdi mdi-thumb-up"></i>
                                </div>
                                <div class="clear"></div>
                                @endif
                                <h5 class="card-title">Reciepts</h5>
                                <form action="{{ route('admin.downloadable.reciepts') }}" enctype="multipart/form-data" method="post" class="dropzone" id="reciepts">
                                    @csrf
                                    <div class="fallback">
                                        <input name="reciepts" type="file" multiple />
                                    </div>
    
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30 ribbon-box">
                            <div class="card-body">
                                @if($layaway)
                                <div class="ribbon ribbon-primary float-left">
                                    <i class="mdi mdi-thumb-up"></i>
                                </div>
                                <div class="clear"></div>
                                @endif
                                <h5 class="card-title">Lay Away Form</h5>
                                <form action="{{ route('admin.downloadable.layaway') }}" enctype="multipart/form-data" method="post" class="dropzone" id="layaway">
                                    @csrf
                                    <div class="fallback">
                                        <input name="layaway" type="file" multiple />
                                    </div>
    
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="card m-b-30 ribbon-box">
                            <div class="card-body">
                                @if($petty_cash)
                                <div class="ribbon ribbon-primary float-left">
                                    <i class="mdi mdi-thumb-up"></i>
                                </div>
                                <div class="clear"></div>
                                @endif
                                <h5 class="card-title">Petty Cash Vouchers</h5>
                                <form action="{{ route('admin.downloadable.petty_cash') }}" enctype="multipart/form-data" method="post" class="dropzone" id="petty_cash">
                                    @csrf
                                    <div class="fallback">
                                        <input name="petty_cash" type="file" multiple />
                                    </div>
    
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                    </div>
                                </form>
                            </div>
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

    $(document).ready(function() {

        var success = "{!! session('success') !!}";
        var error = "{!! session('error') !!}";

        if(success) {
            swal({
                position: 'middle-center',
                type: 'success',
                title: success,
                showConfirmButton: false,
                timer: 1000
            })
        }

        if(error) {
            swal({
                position: 'middle-center',
                type: 'error',
                title: error,
                showConfirmButton: false,
                timer: 1000
            })  
        }
    });
</script>
@endpush