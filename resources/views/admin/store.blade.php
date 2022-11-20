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
                        <li class="breadcrumb-item active">Store</li>
                    </ol>
                    <h4 class="page-title">Store</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#addStore" data-animation="blur" data-overlayspeed="100" data-overlaycolor="#36404a">Add Store</button>
                            @include('modal.store')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header">
                                    <table id="table" class="table table-bordered dataTable no-footer table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th></th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (App\Store::all() as $store)
                                                <tr class="text-center">
                                                    <td>@if (!empty($store->logo))
                                                            {{ HTML::image('logo/'.$store->name.'/'.$store->logo, $store->name, array('class' => 'thumb-sm')) }}
                                                        @else
                                                            {{ HTML::image('img/default-store.png', $store->name, array('class' => 'thumb-sm')) }}
                                                        @endif</td>
                                                    <td>{{ $store->name }}</td>
                                                    <td>{{ $store->phone }}</td>
                                                    <td>
                                                        @if ($store->status == 1)
                                                            <span class="badge badge-primary">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('store.edit', ['id'=>$store->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                        <a data-module="store" id="{{ $store->id }}" data-name="{{ $store->name }}" class="btn btn-xs btn-default btn-cancel"><i class="text-danger mdi mdi-close-circle"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

        $('#table').DataTable({
            keys: true
        });

        $('#storeLogo').change(function() {
            readURL(this);
        });

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