<div id="smsCustomer" class="modal fade text-left" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send SMS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('store.sms') }}" method="post">
                    @csrf
                    <input type="hidden" name="phone" value="+639{{ $user->mobile }}" />
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label>Message</label>
                            <textarea class="form-control" name="message" col="2" row="2"></textarea>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addCatBtn" class="btn btn-success">
                                    Send
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>