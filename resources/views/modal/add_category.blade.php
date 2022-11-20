<div id="addCategory" class="modal fade" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form id="menuForm" action="{{ route('addcategory.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="store_id" value="{{ Auth::user()->store_id }}" />
                    <div class="form-row">
                        <div class="form-group col-md-12 col-xs-12">
                            <label>Category Name</label> <span class="catcheck"></span>
                            <input type="text" class="form-control" name="name" placeholder="Enter category name.." required id="cat"/>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="addCatBtn" class="btn btn-success">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>