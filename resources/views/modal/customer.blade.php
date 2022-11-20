<div id="addCustomer" class="modal fade" aria-labelledby="addTherapist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body">
                    <form id="SMCustomerForm" action="{{ route('sm.add.customer') }}" method="post">
                        @csrf
                        <input type="hidden" name="store_id" id="store_id" value="{{ Auth::user()->store_id }}" />
                        <div class="form-row">
                            <h5 class="col-12">Customer Information</h5>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Suki Code</label> <span class="codecheck"></span>
                                <input type="text" id="suki_code" class="form-control" name="suki_code" required pattern=".{4,}" title="4 characters minimum"/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name" id="name" required/>
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
                                <label>Gender</label>
                                <select name="sex" class="form-control" id="sex" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="F">Female</option>
                                    <option value="M">Male</option>
                                    <option value="LGBTQ">LGBTQ</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Age</label>
                                <input type="text" class="form-control num-only" name="age" id="age" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Bday</label>
                                <input type="text" class="form-control date_filter" name="bday" id="bday" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="fb" id="fb"/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Occupation</label>
                                <select name="occupation" class="form-control occupation" id="occupation" required>
                                    <option value="">-- Select Occupation --</option>
                                    <option value="Student">Student</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Non-Employee">Non-Employee</option>
                                    <option value="Self-Employed">Self-Employed</option>
                                </select>
                                <input type="text" class="form-control employee_fld" style="display:none;"/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Type</label>
                                <select name="type" class="form-control" id="type" required>
                                    <option value="">-- Select Customer Type --</option>
                                    <option value="Reseller">Reseller</option>
                                    <option value="Wholesaler">Wholesaler</option>
                                    <option value="Suki">Suki</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <div class="clearfix text-right mt-3">
                                    <button type="submit" id="SMCustomerFormBtn" class="btn btn-success">
                                        Add Customer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>