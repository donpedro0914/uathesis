<div class="modal fade sendMessage">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <div class="block">
                    <form>
                        <div class="row">
                            @csrf
                            <div class="col-xs-12 col-md-12 form-group">
                                <label>To</label>
                                <select class="select2 form-control" name="sendto" id="sendTo">
                                    <option value="All">All</option>
                                    @foreach(App\Brand::where('store_id', Auth::user()->store_id)->get() as $brands)
                                    <option value="{{ $brands->id }}" data-name="{{ $brands->name }}">{{ $brands->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-12 form-group">
                                <label>Notes</label>
                                <textarea class="form-control" name="sendnotes" id="sendMessage"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="sendMessageBtn" class="btn btn-success">Send</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>