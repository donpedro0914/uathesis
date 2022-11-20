<div id="request" class="modal fade" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Request Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form id="menuForm" action="{{ route('pos.request.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ Auth::user()->store_id }}" />
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
                    <div class="form-row">
                        <div class="form-group col-md-8 col-xs-12">
                            <label>Item Name</label> <span class="catcheck"></span>
                            <input type="text" name="inventory_item" class="form-control" required />
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Downpayment</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Php</span>
                                </div>
                                <input type="text" class="form-control num-only" name="downpayment"/>
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-xs-12">
                            <label>Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Php</span>
                                </div>
                                <input type="text" class="form-control" name="price" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addCatBtn" class="btn btn-success">
                                    Request
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>