<div id="addStaffSM" class="modal fade" aria-labelledby="addTherapist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Staff</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body">
                    <form id="staffForm" action="{{ route('add.staff') }}" method="post">
                        @csrf
                        <input type="hidden" name="store_id" id="store_id" value="{{ Auth::user()->store_id }}" />
                        <div class="form-row">
                            <h5 class="col-12">Staff Information</h5>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Position</label>
                                @php
                                    $position = array(
                                        'Supervisor' => 'Supervisor',
                                        'Manager' => 'Manager',
                                        'Cashier' => 'Cashier'
                                    )
                                @endphp
                                {{ Form::select('type', $position, '', ['class' => 'form-control select2', 'id' => 'type']) }}
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" id="address" required/>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+63</span>
                                    </div>
                                    <input type="text" class="form-control num-only" name="phone" id="phone" required/>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email"/>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Daily Rate</label>
                                <input type="text" class="form-control num-only" name="rate" id="rate" />
                            </div>
                            <h5 class="col-12">Deductions</h5>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>SSS</label>
                                <input type="text" class="form-control" name="sss" id="sss"/>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Pag-ibig</label>
                                <input type="text" class="form-control" name="pagibig" id="pagibig" />
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Philhealth</label>
                                <input type="text" class="form-control" name="phlhealth" id="phlhealth" />
                            </div>
                            <h5 class="col-12">Account Information</h5>
                            <div class="form-group col-md-6 col-xs-12">
                                <label class="requiredinput">Username</label> <span class="usercheck"></span>
                                <input type="text" class="form-control" id="store_username" name="username" placeholder="Enter username.." pattern=".{4,}" required title="4 characters minimum" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password" required/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <div class="clearfix text-right mt-3">
                                    <button type="submit" id="staffFormBtn" class="btn btn-success">
                                        Add Staff
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>