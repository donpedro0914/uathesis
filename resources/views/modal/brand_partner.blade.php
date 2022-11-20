<div id="addBrandPartner" class="modal fade" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Brand Partner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form id="brandpartnerForm" action="{{ route('brandpartner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="store_id" id="store_id" value="{{ Auth::user()->store_id }}" />
                    <div class="form-row">
                        <h5 class="col-12">Brand Information</h5>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" id="brand_name" name="name" placeholder="Enter brand name.." required/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Brand Code</label> <span class="brandcodecheck"></span>
                            <input type="text" class="form-control" name="brand_code" id="brand_code" placeholder="Enter brand code.."required />
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Brand Category</label>
                            <select name="category" class="form-control select2" required id="category">
                                <option value="">-- Select Category --</option>
                                <option value="Babies & Kids">Babies & Kids</option>
                                <option value="Cameras">Cameras</option>
                                <option value="Groceries & Pet Care">Groceries & Pet Care</option>
                                <option value="Health & Personal Care">Health & Personal Care</option>
                                <option value="Home & Living">Home & Living</option>
                                <option value="Home Appliances">Home Appliances</option>
                                <option value="Home Entertainment">Home Entertainment</option>
                                <option value="Laptops & Computers">Laptops & Computers</option>
                                <option value="Makeup & Fragrances">Makeup & Fragrances</option>
                                <option value="Mens Apparel">Mens Apparel</option>
                                <option value="Mens Bags & Accessories">Mens Bags & Accessories</option>
                                <option value="Mens Shoes">Mens Shoes</option>
                                <option value="Mobiles & Accessories">Mobiles & Accessories</option>
                                <option value="Motors">Motors</option>
                                <option value="Sports & Travels">Sports & Travels</option>
                                <option value="Toys, Games & Collectibles">Toys, Games & Collectibles</option>
                                <option value="Womens Accessories">Womens Accessories</option>
                                <option value="Womens Apparel">Womens Apparel</option>
                                <option value="Womens Bags">Womens Bags</option>
                                <option value="Womens Shoes">Womens Shoes</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Slot Leased</label>
                            <input type="text" class="form-control" name="slot_leased" id="slot_leased" placeholder="Enter slot leased.." required/>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Date of Rental Payment</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="date_rental form-control" name="rental_payment" id="rental_payment" data-date-format="yyyy-mm-dd" value="{!! date('Y-m-d') !!}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Contract Duration Starts</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="date_rental form-control" name="start_contract" id="start_contract" data-date-format="yyyy-mm-dd" value="{!! date('Y-m-d') !!}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Contract Duration Ends</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="date_rental form-control" name="end_contract" id="end_contract" data-date-format="yyyy-mm-dd" value="{!! date('Y-m-d') !!}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Rental</label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            Php
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="rental_due" id="rental_due" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            00
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="col-12">Bank Information</h5>
                        <div class="form-group col-md-3 col-xs-12">
                            <label>Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Enter account number.."/>
                        </div>
                        <div class="form-group col-md-3 col-xs-12">
                            <label>Account Name</label>
                            <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Enter account name.."/>
                        </div>
                        <div class="form-group col-md-3 col-xs-12">
                            <label>Bank Name</label>
                            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter bank name.."/>
                        </div>
                        <div class="form-group col-md-3 col-xs-12">
                            <label>Bank Branch</label>
                            <input type="text" class="form-control" name="bank_branch" id="bank_branch" placeholder="Enter bank branch.."/>
                        </div>
                        <h5 class="col-12">Owner Information</h5>
                        <div class="form-group col-md-6 col-xs-12">
                            <label class="requiredinput">Username</label> <span class="usercheck"></span>
                            <input type="text" class="form-control" id="store_username" name="username" placeholder="Enter username.." pattern=".{4,}" required title="4 characters minimum"/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" id="password" required/>
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
                            <input type="text" class="form-control" name="owner_address" id="owner_address" required/>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+63</span>
                                </div>
                                <input type="text" class="form-control num-only" name="owner_phone" id="owner_phone" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Email</label> <span class="emailcheck"></span>
                            <input type="text" class="form-control" name="email" id="email" />
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Facebook URL</label>
                            <input type="text" class="form-control" name="facebook" id="facebook"/>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="brandpartnerBtn" class="btn btn-success">
                                    Add Brand Partner
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>