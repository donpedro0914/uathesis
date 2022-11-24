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
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item ">Applications</li>
                            <li class="breadcrumb-item active">{{ $application->title }}</li>
                        </ol>
                        <h4 class="page-title">Applications</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label>Title of Assessment applied for:</label>
                                            <input tye="text" class="form-control" value="{{ $application->title }}" readonly />
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ $application->last_name }}"/>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ $application->first_name }}"/>
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" value="{{ $application->middle_name }}"/>
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Street</label>
                                            <input type="text" class="form-control" name="street" value="{{ $application->street }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Barangay</label>
                                            <input type="text" class="form-control" name="barangay" value="{{ $application->barangay }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>District</label>
                                            <input type="text" class="form-control" name="district" value="{{ $application->district }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="{{ $application->city }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Province</label>
                                            <input type="text" class="form-control" name="province" value="{{ $application->province }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Region</label>
                                            <input type="text" class="form-control" name="region" value="{{ $application->region }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Zip</label>
                                            <input type="text" class="form-control" name="zip" value="{{ $application->zip }}">
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>Sex</label>
                                            @php
                                                $option = array(
                                                    'M' => 'Male',
                                                    'F' => 'Female'
                                                );
                                            @endphp
                                            {{ Form::select('sex', $option, $application->sex, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-6 form-group">
                                            <label>Civil Status</label>
                                            @php
                                                $option = array(
                                                    'Single' => 'Single',
                                                    'Married' => 'Married',
                                                    'Widow' => 'Widow',
                                                    'Seperated' => 'Seperated'
                                                );
                                            @endphp
                                            {{ Form::select('civil_status', $option, $application->civil_status, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-3 form-group">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" name="tel" value="{{ $application->tel }}">
                                        </div>
                                        <div class="col-3 form-group">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" name="mobile" value="{{ $application->mobile }}">
                                        </div>
                                        <div class="col-3 form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="email" value="{{ $application->email }}">
                                        </div>
                                        <div class="col-3 form-group">
                                            <label>Fax</label>
                                            <input type="text" class="form-control" name="fax" value="{{ $application->fax }}">
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Highest Educational Attainment</label>
                                            @php
                                                $option = array(
                                                    'Elementary Graduate' => 'Elementary Graduate',
                                                    'Highschool Graduate' => 'Highschool Graduate',
                                                    'TVET Graduate' => 'TVET Graduate',
                                                    'College Level' => 'College Level',
                                                    'College Graduate' => 'College Graduate',
                                                );
                                            @endphp
                                            {{ Form::select('education', $option, $application->education, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-12 form-group">
                                            <label>Employment Status</label>
                                            @php
                                                $option = array(
                                                    'Casual' => 'Casual',
                                                    'Job Order' => 'Job Order',
                                                    'Probationary' => 'Probationary',
                                                    'Permanent' => 'Permanent',
                                                    'Self-Employed' => 'Self-Employed',
                                                    'OFW' => 'OFW',
                                                );
                                            @endphp
                                            {{ Form::select('employment', $option, $application->employment, ['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control datepicker" name="dob" value="{{ $application->dob }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Birthplace</label>
                                            <input type="text" class="form-control" name="birthplace" value="{{ $application->birthplace }}">
                                        </div>
                                        <div class="col-4 form-group">
                                            <label>Age</label>
                                            <input type="text" class="form-control" name="age" value="{{ $application->age }}">
                                        </div>
                                        <div class="col-12 form-group">
                                            <button type="button" class="btn btn-primary approve_btn" data-id="{{ $application->id }}">Approve</button>
                                            <a href="{{ route('applications') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
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
    $(document).ready(function() {

        $(".datepicker").datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            clearBtn: true,
        });

        $('#table').DataTable({
            keys: true
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
    });
</script>
@endpush