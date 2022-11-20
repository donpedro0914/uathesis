<div id="contract" class="modal fade" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form id="menuForm" action="{{ route('sm.rental.addDuration') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="brand_id" name="brand_id" />
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label>Select Duration</label> <span class="catcheck"></span>
                            <select name="duration" class="form-control">
                                <option value="">-- Select Duration --</option>
                                <option value="1">1 Month</option>
                                <option value="2">2 Months</option>
                                <option value="3">3 Months</option>
                                <option value="4">4 Months</option>
                                <option value="5">5 Months</option>
                                <option value="6">6 Months</option>
                                <option value="7">7 Months</option>
                                <option value="8">8 Months</option>
                                <option value="9">9 Months</option>
                                <option value="10">10 Months</option>
                                <option value="11">11 Months</option>
                                <option value="12">12 Months</option>
                                <option value="13">13 Months</option>
                                <option value="14">14 Months</option>
                                <option value="15">15 Months</option>
                                <option value="16">16 Months</option>
                                <option value="17">17 Months</option>
                                <option value="18">18 Months</option>
                                <option value="19">19 Months</option>
                                <option value="20">20 Months</option>
                                <option value="21">21 Months</option>
                                <option value="22">22 Months</option>
                                <option value="23">23 Months</option>
                                <option value="24">24 Months</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="extendBtn" class="btn btn-success">
                                    Extend Contract
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>