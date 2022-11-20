@extends('layouts.app')
@section('content')
@php
    $bankInfo = json_decode($store->bank, TRUE);
@endphp
    @include('global.topnav')
    @include('global.sidemenu')
	<div id="wrapper">
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">iPOS Concept</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('stores') }}">Store</a></li>
                        <li class="breadcrumb-item active">{{ $store->name }}</li>
                    </ol>
                    <h4 class="page-title">{{ $store->name }}</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <form action="{{ route('store.update', ['id'=>$store->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <h5 class="col-12">Store Information</h5>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="form-group col-md-8 col-xs-12">
                                                <label>Store Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ $store->name }}"/>
                                            </div>
                                            <div class="form-group col-md-4 col-xs-12">
                                                <label>Store Initials</label>
                                                <input type="text" class="form-control" name="initials" value="{{ $store->initials }}"/>
                                            </div>
                                            <div class="form-group col-md-8 col-xs-12">
                                                <label>Store Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ $store->address }}"/>
                                            </div>
                                            <div class="form-group col-md-4 col-xs-12">
                                                <label>Working Hours</label>
                                                <input type="text" class="form-control num-only" name="working_hours" value="{{ $store->working_hours }}"/>
                                            </div>
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label>Store Email</label>
                                                <input type="text" class="form-control" name="email" value="{{ $store->email }}"/>
                                            </div>
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label>Store Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $store->phone }}"/>
                                            </div>
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label>Store Void Password</label>
                                                <input type="text" class="form-control" name="void_pass" value="{{ $store->void_pass }}"/><span class="help-block"><small>Please input the exact model of the printer</small></span>
                                            </div>
                                            <div class="form-group col-md-6 col-xs-12">
                                                <label>Thermal Printer</label>
                                                <input type="text" class="form-control" name="printer" value="{{ $store->printer }}"/><span class="help-block"><small>Please input the exact model of the printer</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Store Theme</label>
                                            <div class="input-group colorpicker-rgba" data-color-format="rgb" data-color="{{ $store->theme }}">
                                                <input type="text" name="theme" readonly="readonly" class="form-control">
                                                <div class="input-group-append add-on">
                                                    <button class="btn btn-light" type="button">
                                                        <i style="background-color:{{ $store->theme }};margin-top: 2px;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <label>Store Logo</label>
                                            <input type="file" class="form-control" id="storeLogo" name="storeLogo">
                                            <div class="storeLogoPreview_container">
                                                @if ($store->logo)
                                                {{ HTML::image('logo/'.$store->name.'/'.$store->logo, $store->name, array('class' => 'thumb-xl')) }}
                                                @else
                                                    <img id="storeLogoPreview" />                                          
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="col-12">Page Restrictions</h5>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Rentals</td>
                                                <td>
                                                    <label class="css-input switch switch-sm switch-success">
                                                        @if($store->p_rental == '1')
                                                        <input type="checkbox" name="p_rental" class="allrentals" data-plugin="switchery" data-color="#1bb99a" value="1" checked>
                                                        @else
                                                        <input type="checkbox" name="p_rental" class="allrentals" data-plugin="switchery" data-color="#1bb99a" value="0">
                                                        @endif
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Customers</td>
                                                <td>
                                                    <label class="css-input switch switch-sm switch-success">
                                                        @if($store->p_customer == '1')
                                                        <input type="checkbox" name="p_customer" class="allcustomers" data-plugin="switchery" data-color="#1bb99a" value="1" checked>
                                                        @else
                                                        <input type="checkbox" name="p_customer" class="allcustomers" data-plugin="switchery" data-color="#1bb99a" value="0">
                                                        @endif
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Downloads</td>
                                                <td>
                                                    <label class="css-input switch switch-sm switch-success">
                                                        @if($store->p_download == '1')
                                                        <input type="checkbox" name="p_download" class="alldownloads" data-plugin="switchery" data-color="#1bb99a" value="1" checked>
                                                        @else
                                                        <input type="checkbox" name="p_download" class="alldownloads" data-plugin="switchery" data-color="#1bb99a" value="0">
                                                        @endif
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Reports</td>
                                                <td>
                                                    <label class="css-input switch switch-sm switch-success">
                                                        @if($store->p_report == '1')
                                                        <input type="checkbox" name="p_report" class="allreports" data-plugin="switchery" data-color="#1bb99a" value="1" checked>
                                                        @else
                                                        <input type="checkbox" name="p_report" class="allreports" data-plugin="switchery" data-color="#1bb99a" value="0">
                                                        @endif
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Payroll</td>
                                                <td>
                                                    <label class="css-input switch switch-sm switch-success">
                                                        @if($store->p_payroll == '1')
                                                        <input type="checkbox" name="p_payroll" class="allpayroll" data-plugin="switchery" data-color="#1bb99a" value="1" checked>
                                                        @else
                                                        <input type="checkbox" name="p_payroll" class="allpayroll" data-plugin="switchery" data-color="#1bb99a" value="0">
                                                        @endif
                                                    </label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h5 class="col-12">Bank Information</h5>
                                    <div class="form-group col-md-3 col-xs-12">
                                        <label>Account Number</label>
                                        <input type="text" class="form-control" name="account_number" value="{{ $bankInfo['account_number'] }}"/>
                                    </div>
                                    <div class="form-group col-md-3 col-xs-12">
                                        <label>Account Name</label>
                                        <input type="text" class="form-control" name="account_name" value="{{ $bankInfo['account_name'] }}"/>
                                    </div>
                                    <div class="form-group col-md-3 col-xs-12">
                                        <label>Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name" value="{{ $bankInfo['bank_name'] }}"/>
                                    </div>
                                    <div class="form-group col-md-3 col-xs-12">
                                        <label>Bank Branch</label>
                                        <input type="text" class="form-control" name="bank_branch" value="{{ $bankInfo['bank_branch'] }}"/>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label>Store Status</label>
                                        @php
                                            $status = array(
                                                '1' => 'Active',
                                                '0' => 'Inactive',
                                            )
                                        @endphp
                                        {{ Form::select('status', $status, $store->status, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <div class="clearfix text-right mt-3">
                                            <button type="submit" id="menuFormBtn" class="btn btn-success">
                                                Update Store
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#storeLogoPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        $('#storeLogo').change(function() {
            readURL(this);
        });
        $('.allrentals').on('change', function() {
            if($(this).is(":checked")) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });
        $('.allcustomers').on('change', function() {
            if($(this).is(":checked")) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });

        $('.alldownloads').on('change', function() {
            if($(this).is(":checked")) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });

        $('.allreports').on('change', function() {
            if($(this).is(":checked")) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });

        $('.allpayroll').on('change', function() {
            if($(this).is(":checked")) {
                $(this).val('1');
            } else {
                $(this).val('0');
            }
        });
    });
</script>
@endpush