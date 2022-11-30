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
                        <select class="form-control" name="title" required>
                            <option value="">-- Select Qualification --</option>
                            <option value="Bartending NC II">Bartending NC II</option>
                            <option value="Bread and Pastry Production NC II">Bread and Pastry Production NC II</option>
                            <option value="Cookery NC II">Cookery NC II</option>
                            <option value="Driving NC II & NC III">Driving NC II & NC III</option>
                            <option value="Shielded Metal Arc Welding NC II">Shielded Metal Arc Welding NC II</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="last_name" required/>
                    </div>
                    <div class="col-4 form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="first_name" required/>
                    </div>
                    <div class="col-4 form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" name="middle_name" required/>
                    </div>
                    <div class="col-12 form-group">
                        <label>Street</label>
                        <input type="text" class="form-control" name="street" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>Barangay</label>
                        <input type="text" class="form-control" name="barangay" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>District</label>
                        <input type="text" class="form-control" name="district" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>City / Municipality</label>
                        @php
                            $option = array(
                                '' => '-- Select City/Municipality --',
                                'Angeles' => 'Angeles',
                                'Apalit' => 'Apalit',
                                'Arayat' => 'Arayat',
                                'Bacolor' => 'Bacolor',
                                'Candaba' => 'Candaba',
                                'Floridablanca' => 'Floridablanca',
                                'Guagua' => 'Guagua',
                                'Lubao' => 'Lubao',
                                'Mabalacat' => 'Mabalacat',
                                'Macabebe' => 'Macabebe',
                                'Magalang' => 'Magalang',
                                'Masantol' => 'Masantol',
                                'Mexico' => 'Mexico',
                                'Minalin' => 'Minalin',
                                'Porac' => 'Porac',
                                'Sasmuan' => 'Sasmuan',
                                'Santa Ana' => 'Santa Ana',
                                'San Fernando' => 'San Fernando',
                                'San Luis' => 'San Luis',
                                'San Simon' => 'San Simon',
                                'Santa Rita' => 'Santa Rita',
                                'Santo Tomas' => 'Santo Tomas',
                            );
                        @endphp
                        {{ Form::select('city', $option, '', ['class' => 'form-control', 'required' => 'required']) }}
                    </div>
                    <div class="col-4 form-group">
                        <label>Region</label>
                        <select class="form-control" name="region" required>
                            <option value=''>-- Select Region --</option>
                            <option value="Region 3">Region 3</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Province</label>
                        <select class='form-control' name="province" required>
                            <option value=''>-- Select Province --</option>
                            <option value="Pampanga">Pampanga</option>
                        </select>
                    </div>
                    <div class="col-4 form-group">
                        <label>Zip</label>
                        <input type="text" class="form-control" name="zip" required>
                    </div>
                    <div class="col-6 form-group">
                        <label>Sex</label>
                        <select class="form-control" name="sex" required>
                            <option value=''>-- Select Sex --</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label>Civil Status</label>
                        <select class="form-control" name="civil_status" required>
                            <option value=''>-- Select Civil Status --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widow">Widow</option>
                            <option value="Seperated">Seperated</option>
                        </select>
                    </div>
                    <div class="col-3 form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="tel" maxlength="7" minlength="7" required>
                    </div>
                    <div class="col-3 form-group">
                        <label>Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+63</span>
                            </div>
                            <input type="text" class="form-control" name="mobile" id="phone" required maxlength="10" minlength="10"/>
                        </div>
                    </div>
                    <div class="col-3 form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="col-3 form-group">
                        <label>Fax</label>
                        <input type="text" class="form-control" name="fax">
                    </div>
                    <div class="col-12 form-group">
                        <label>Highest Educational Attainment</label>
                        <select class="form-control" name="education" required>
                            <option value=''>-- Select Highest Educational Attainment --</option>
                            <option value="Elementary Graduate">Elementary Graduate</option>
                            <option value="Highschool Graduate">Highschool Graduate</option>
                            <option value="TVET Graduate">TVET Graduate</option>
                            <option value="College Level">College Level</option>
                            <option value="College Graduate">College Graduate</option>
                        </select>
                    </div>
                    <div class="col-12 form-group">
                        <label>Employment Status</label>
                        <select class="form-control" name="employment" required>
                            <option value=''>-- Select Employment Status --</option>
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
                        <input type="text" class="form-control datepicker" name="dob" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>Birthplace</label>
                        <input type="text" class="form-control" name="birthplace" required>
                    </div>
                    <div class="col-4 form-group">
                        <label>Age</label>
                        <select class="form-control" name="age" required>
                            <option value=''>-- Select Age --</option>
                        @for($i=18; $i<=80; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        </select>
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