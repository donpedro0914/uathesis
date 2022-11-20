<div id="addStore" class="modal fade" aria-labelledby="addTherapist">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Store</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
			</div>
			<div class="modal-body">
				<form id="menuForm" action="{{ route('store.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
                        <h5 class="col-12">Store Information</h5>
                        <div class="col-8">
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12">
                                    <label>Store Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter store name.."/>
                                </div>
                                <div class="form-group col-md-8 col-xs-12">
                                    <label>Store Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter store address.."/>
                                </div>
                                <div class="form-group col-md-4 col-xs-12">
                                    <label>Working Hours</label>
                                    <input type="text" class="form-control num-only" name="working_hours" />
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Store Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Enter store email.."/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Store Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter store phone.."/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Store Initials</label>
                                    <input type="text" class="form-control" name="initials" placeholder="Enter store initials.."/>
                                </div>
                                <div class="form-group col-md-6 col-xs-12">
                                    <label>Store Void Password</label>
                                    <input type="text" class="form-control" name="void_pass" placeholder="Enter void password.."/>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                        	<div class="form-group">
                            	<label>Store Theme</label>
                                <div class="input-group colorpicker-rgba" data-color-format="rgb" data-color="rgb(66, 103, 178)">
                                    <input type="text" name="theme" readonly="readonly" class="form-control">
                                    <div class="input-group-append add-on">
                                        <button class="btn btn-light" type="button">
                                            <i style="background-color:rgb(66, 103, 178);margin-top: 2px;"></i>
                                        </button>
                                    </div>
                                </div>
                        	</div>
                            <label>Store Logo</label>
                            <input type="file" id="storeLogo" name="storeLogo">
                            <div class="storeLogoPreview_container">
                                <img id="storeLogoPreview" />
                            </div>
                        </div>
                        <h5 class="col-12">Page Restrictions</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Rentals</td>
                                    <td>
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" name="p_rental" class="allrentals" data-plugin="switchery" data-color="#1bb99a" value="0">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Customers</td>
                                    <td>
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" name="p_customer" class="allcustomers" data-plugin="switchery" data-color="#1bb99a" value="0">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Downloads</td>
                                    <td>
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" name="p_download" class="alldownloads" data-plugin="switchery" data-color="#1bb99a" value="0">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reports</td>
                                    <td>
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" name="p_report" class="allreports" data-plugin="switchery" data-color="#1bb99a" value="0">
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Payroll</td>
                                    <td>
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" name="p_payroll" class="allpayroll" data-plugin="switchery" data-color="#1bb99a" value="0">
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="col-12">Bank Information</h5>
						<div class="form-group col-md-3 col-xs-12">
							<label>Account Number</label>
							<input type="text" class="form-control" name="account_number" placeholder="Enter account number.."/>
                        </div>
						<div class="form-group col-md-3 col-xs-12">
							<label>Account Name</label>
							<input type="text" class="form-control" name="account_name" placeholder="Enter account name.."/>
                        </div>
						<div class="form-group col-md-3 col-xs-12">
							<label>Bank Name</label>
							<input type="text" class="form-control" name="bank_name" placeholder="Enter bank name.."/>
                        </div>
						<div class="form-group col-md-3 col-xs-12">
							<label>Bank Branch</label>
							<input type="text" class="form-control" name="bank_branch" placeholder="Enter bank branch.."/>
                        </div>
                        <h5 class="col-12">Owner Information</h5>
						<div class="form-group col-md-6 col-xs-12">
							<label class="requiredinput">Username</label> <span class="usercheck"></span>
							<input type="text" class="form-control" id="store_username" name="username" placeholder="Enter username.." pattern=".{4,}" required title="4 characters minimum"/>
                        </div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Password</label>
							<input type="password" class="form-control" name="password"/>
                        </div>
						<div class="form-group col-md-6 col-xs-12">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name"/>
                        </div>
						<div class="form-group col-md-6 col-xs-12">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name"/>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<label>Address</label>
							<input type="text" class="form-control" name="owner_address"/>
                        </div>
						<div class="form-group col-md-4 col-xs-12">
                            <label>Phone Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+63</span>
                                </div>
                                <input type="text" class="form-control num-only" name="owner_phone"/>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Email</label> <span class="emailcheck"></span>
                            <input type="text" class="form-control" name="email" id="email" />
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Thermal Printer</label>
                            <input type="text" class="form-control" name="printer" />
                            <span class="help-block"><small>Please input the exact model of the printer</small></span>
                        </div>
						<div class="form-group col-md-12 col-xs-12">
							<div class="clearfix text-right mt-3">
								<button type="submit" id="addStoreBtn" class="btn btn-success">
									Add Store
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>