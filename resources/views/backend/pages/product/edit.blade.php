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
			<h6 class="br-section-label ">Edit Product</h6>

			<div class="bd rounded table-responsive">
				<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-layout form-layout-1">
			            <div class="row mg-b-25">
			             
			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Product Title: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="title" value="{{ $product->title }}">
			                </div>
			              </div>

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Display Description:</label>
			                  <textarea name="short_desc" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Short Description">{{ $product->short_desc }}</textarea>
			                </div>
			              </div>

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Product Desciption:</label>
			                  <textarea name="desc" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Product Description">{{ $product->desc }}</textarea>
			                </div>
			              </div>

			              <div class="col-lg-4">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Product Type: <span class="tx-danger">*</span></label>
			                  <select name="product_type" id="" class="form-control">
			                  	<option value="0" @if( $product->product_type==0) selected @endif >NEW</option>
			                  	<option value="1" @if( $product->product_type==1) selected @endif >USED</option>
			                  </select>
			                </div>
			              </div>
			              <div class="col-lg-4">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
			                  <select name="cat_id" id="" class="form-control">

			                  	@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $category )
			                  		<option value="{{ $category->id }}" @if( $product->cat_id==$category->id) selected @endif>{{ $category->name }}</option>

			                  		@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$category->id)->get() as $categorychild )
			                  			<option value="{{ $categorychild->id }}" @if( $product->cat_id==$categorychild->id) selected @endif >-{{ $categorychild->name }}</option>
			                  		
			                  			@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',$categorychild->id)->get() as $childchild )
			                  				<option value="{{ $childchild->id }}" @if( $product->cat_id==$childchild->id) selected @endif >--{{ $childchild->name }}</option>
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
			                  	@foreach( $brand as $brand )
			                  	<option value="{{ $brand->id }}" @if( $product->brand_id==$brand->id) selected @endif >{{ $brand->name }}</option>
			                  	@endforeach
			                  </select>
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Price:<span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="reguler_price" placeholder="Product Reguler Price " value="{{ $product->reguler_price }}">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Offer Price:</label>
			                  <input class="form-control" type="text" name="offer_price" placeholder="Product Offer Price " value="{{ $product->offer_price }}">
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Quantity:<span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Sku:</label>
			                  <input class="form-control" type="text" name="sku_code" placeholder="Product SKU Code " value="{{ $product->sku_code }}">
			                </div>
			              </div>
			             
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Featured: <span class="tx-danger">*</span></label>
			                  <select name="is_featured" id="" class="form-control">
			                  	<option value="0" @if( $product->is_featured==0) selected @endif >Normal</option>
			                  	<option value="1" @if( $product->is_featured==1) selected @endif >Featured</option>
			                  </select>
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
			                  <select name="status" id="" class="form-control">
			                  	<option value="1" @if( $product->status==1) selected @endif >Active</option>
			                  	<option value="2" @if( $product->status==2 ) selected @endif >Inactive</option>
			                  	<option value="0" @if( $product->status==0 ) selected @endif >Pending</option>
			                  </select>
			                </div>
			              </div>
			             

			              <div class="col-lg-6 ">
			                <div class="form-group ">
			                  <label class="form-control-label">Tags:</label>
			                  <input class="form-control" type="text" name="tags" placeholder="Type Tag and Press Enter "  data-role="tagsinput" value="{{ $product->tags }}">
			                </div>
			              </div>
			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Primary Image: <span class="tx-danger">*</span></label>
				              <div class="custom-file">
				                <input type="file" class="custom-file-input" id="customFile" name="image">
				                @if( !is_null($product->image) )
				                <label class="custom-file-label" for="customFile">Image Found! {{ $product->image }} </label>
				                @else
				                <label class="custom-file-label" for="customFile">No Image Found!</label>
				                @endif
				              </div>
			                </div>
			              </div>


			            </div>

			            <div class="form-layout-footer">
			              <button class="btn btn-info" type="submit">Submit New Peoduct</button>
			            </div>
			        </div>
				</form>
			</div>
  		</div>
    </div>
  </div>
</div>


@endsection