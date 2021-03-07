@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Manage Product</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
</div>



<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-12 col-xl-12">
        <div class="br-section-wrapper">
			<h6 class="br-section-label ">Create New Product</h6>

			<div class="bd rounded table-responsive">
				<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-layout form-layout-1">
			            <div class="row mg-b-25">
			             
			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Product Title: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="title" placeholder="Product Title (Max 255) ">
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Display Description:</label>
			                  <textarea name="short_desc" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Short Description"></textarea>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Product Desciption:</label>
			                  <textarea name="desc" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Product Description"></textarea>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-4">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Product Type: <span class="tx-danger">*</span></label>
			                  <select name="product_type" id="" class="form-control">
			                  	<option >Product Type</option>
			                  	<option value="0">NEW</option>
			                  	<option value="1">USED</option>
			                  </select>
			                </div>
			              </div>
			              <div class="col-lg-4">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
			                  <select name="cat_id" id="" class="form-control">
			                  	<option >Select Category</option>

			                  	@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $category )
			                  		<option value="{{ $category->id }}">{{ $category->name }}</option>

			                  		@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$category->id)->get() as $categorychild )
			                  			<option value="{{ $categorychild->id }}">-{{ $categorychild->name }}</option>
			                  		
			                  			@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$categorychild->id)->get() as $childchild )
			                  				<option value="{{ $childchild->id }}">--{{ $childchild->name }}</option>
			                  			@endforeach
			                  		@endforeach
			                  	@endforeach

			                  </select>
			                </div>
			              </div>
			              <div class="col-lg-4">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
			                  <select name="brand_id" id="" class="form-control">
			                  	<option >Select Brand</option>
			                  	@foreach( $brand as $brand )
			                  	<option value="{{ $brand->id }}">{{ $brand->name }}</option>
			                  	@endforeach
			                  </select>
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Price:<span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="reguler_price" placeholder="Product Reguler Price ">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Offer Price:</label>
			                  <input class="form-control" type="text" name="offer_price" placeholder="Product Offer Price ">
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Quantity:<span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="quantity" placeholder="Product Quantity">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Sku:</label>
			                  <input class="form-control" type="text" name="sku_code" placeholder="Product SKU Code ">
			                </div>
			              </div>
			             
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Featured: <span class="tx-danger">*</span></label>
			                  <select name="is_featured" id="" class="form-control">
			                  	<option >Is_Featured</option>
			                  	<option value="0">Normal</option>
			                  	<option value="1">Featured</option>
			                  </select>
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
			                  <select name="status" id="" class="form-control">
			                  	<option >Select Status</option>
			                  	<option value="1">Active</option>
			                  	<option value="2">Inactive</option>
			                  	<option value="0">Pending</option>
			                  </select>
			                </div>
			              </div>
			             

			              <div class="col-lg-6 ">
			                <div class="form-group ">
			                  <label class="form-control-label">Tags:</label>
			                  <input class="form-control" type="text" name="tags" placeholder="Type Tag and Press Enter "  data-role="tagsinput">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Primary Image: <span class="tx-danger">*</span></label>
				              <div class="custom-file">
				                <input type="file" class="custom-file-input" id="customFile" name="image">
				                <label class="custom-file-label" for="customFile">Choose file</label>
				              </div>
			                </div>
			              </div>


			            </div><!-- row -->

			            <div class="form-layout-footer">
			              <button class="btn btn-info" type="submit">Submit New Peoduct</button>
			            </div><!-- form-layout-footer -->  
			        </div>
				</form>
			</div>
  		</div>
    </div>
  </div>
</div>


@endsection