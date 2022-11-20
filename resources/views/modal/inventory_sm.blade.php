<div id="addInventory" class="modal fade" aria-labelledby="addTherapist">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form id="inventorySMForm" action="{{ route('sm.inventory.store') }}" method="post">
                    @csrf
                    @php
                        if(empty($itemCount->sku)) {
                            $itemCount = '00001';
                        } else {
                            $itemCount = $itemCount->sku;
                            $itemCount = preg_replace("/[^0-9]/", "", $itemCount);
                            $itemCount = $itemCount + 1;
                            $itemCount = sprintf("%05d", $itemCount);
                        }
                    @endphp
                    <input type="hidden" name="brand_id" id="brand_id" value="{{ $brand->id }}" />
                    <input type="hidden" name="brand_code" id="brand_code" value="{{ $brand->brand_code }}" />
                    <div class="form-row">
                        <h5 class="col-12">Item Information</h5>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter brand name.." required/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Brand Partner</label>
                            <input type="text" class="form-control" value="{{ $brand->name }}" id="brand_name" readonly/>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Product Category</label>
                            <select name="category" class="form-control select2" id="category" required>
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
                                @foreach(App\Category::where('store_id', Auth::user()->store_id)->get() as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <label>Quantity</label>
                            <input type="text" class="form-control" name="qty" id="qty" required/>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>SKU</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{ $brand->brand_code }}</span>
                                </div>
                                <input type="text" class="form-control" value="{{ $itemCount }}" readonly/>
                                <input type="hidden" class="form-control" name="sku" id="sku" value="{{ $brand->brand_code }}{{ $itemCount }}"/>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Re-stock Point</label>
                            <input type="text" class="form-control num-only" name="restock" value="0" id="restock" required/>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                            <label>Remarks Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₱</span>
                                </div>
                                <input type="text" class="form-control" name="price" id="price" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="clearfix text-right mt-3">
                                <button type="submit" id="inventorySMBtn" class="btn btn-success">
                                    Add Item
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>