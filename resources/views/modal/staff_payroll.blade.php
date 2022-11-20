<div id="addStore" class="modal fade" aria-labelledby="addTherapist">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Staff</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body">
                    <form id="menuForm" action="{{ route('add.payroll.staff') }}" method="post">
                        @csrf
                        <input type="hidden" name="store_id" value="{{ Auth::user()->store_id }}" />
                        <div class="form-row">
                            <h5 class="col-12">Staff Information</h5>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Position</label>
                                <input type="text" class="form-control" name="type" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="first_name" required/>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" required/>
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" required/>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+63</span>
                                    </div>
                                    <input type="text" class="form-control num-only" name="phone" required/>
                                </div>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email"/>
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Daily Rate</label>
                                <input type="text" class="form-control num-only" name="rate"/>
                            </div>
                            <h5 class="col-12">Deductions</h5>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>SSS</label>
                                <input type="text" class="form-control" name="sss" />
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Pag-ibig</label>
                                <input type="text" class="form-control" name="pagibig" />
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <label>Philhealth</label>
                                <input type="text" class="form-control" name="phlhealth" />
                            </div>
                            <div class="form-group col-md-12 col-xs-12">
                                <div class="clearfix text-right mt-3">
                                    <button type="submit" id="addStoreBtn" class="btn btn-success">
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