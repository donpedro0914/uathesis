@extends('layouts.app_front')
@section('content')
    @include('global.header')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Application</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Application</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <form action="{{ route('application.save') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 form-group">
                        <label>Title of Assessment applied for:</label>
                        <select class="form-control" name="title">
                            <option>-- Select Qualification --</option>
                            <option value="Bartending NC II">Bartending NC II</option>
                            <option value="Bread and Pastry Production NC II">Bread and Pastry Production NC II</option>
                            <option value="Cookery NC II">Cookery NC II</option>
                            <option value="Driving NC II & NC III">Driving NC II & NC III</option>
                            <option value="Shielded Metal Arc Welding NC II">Shielded Metal Arc Welding NC II</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name"/>
                    </div>
                    <div class="col-4 form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name"/>
                    </div>
                    <div class="col-4 form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name"/>
                    </div>
                    <div class="col-12 form-group">
                        <label>Street</label>
                        <input type="text" class="form-control" name="street">
                    </div>
                    <div class="col-4 form-group">
                        <label>Barangay</label>
                        <input type="text" class="form-control" name="barangay">
                    </div>
                    <div class="col-4 form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="district">
                    </div>
                    <div class="col-4 form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="col-4 form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" name="province">
                    </div>
                    <div class="col-4 form-group">
                        <label>Region</label>
                        <input type="text" class="form-control" name="region">
                    </div>
                    <div class="col-4 form-group">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip">
                    </div>
                    <div class="col-6 form-group">
                        <label>Sex</label>
                        <select class="form-control" name="sex">
                            <option>-- Select Sex --</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label>Civil Status</label>
                        <select class="form-control" name="civil_status">
                            <option>-- Select Civil Status --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                            <option value="Seperated">Seperated</option>
                        </select>
                    </div>
                    <div class="col-3 form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="tel">
                    </div>
                    <div class="col-3 form-group">
                        <label>Mobile</label>
                        <input type="text" class="form-control" name="mobile">
                    </div>
                    <div class="col-3 form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="col-3 form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="col-12 form-group">
                        <label>Highest Educational Attainment</label>
                        <select class="form-control" name="education">
                            <option>-- Select Highest Educational Attainment --</option>
                            <option value="Elementary Graduate">Elementary Graduate</option>
                            <option value="Highschool Graduate">Highschool Graduate</option>
                            <option value="TVET Graduate">TVET Graduate</option>
                            <option value="College Level">College Level</option>
                            <option value="College Graduate">College Graduate</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <label>Employment Status</label>
                        <select class="form-control" name="employment">
                            <option>-- Select Employment Status --</option>
                            <option value="Casual">Casual</option>
                            <option value="Job Order">Job Order</option>
                            <option value="Probationary">Probationary</option>
                            <option value="Permanent">Permanent</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="OFW">OFW</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control datepicker" name="dob">
                    </div>
                    <div class="col-4 form-group">
                        <label>Birthplace</label>
                        <input type="text" class="form-control" name="birthplace">
                    </div>
                    <div class="col-4 form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="col-12 form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('global.footer')
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