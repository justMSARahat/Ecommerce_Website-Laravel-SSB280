@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Manage Brands</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
</div>

<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-12 col-xl-12">
        <div class="br-section-wrapper">
			<h6 class="br-section-label ">Edit Brand</h6>

			<div class="bd rounded table-responsive">
				<form action="{{ route('brand.update', $brand->id ) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-layout form-layout-1">
			            <div class="row mg-b-25">
			             
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="name" placeholder="Enter Brand Name" value="{{ $brand->name }}">
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Featured: <span class="tx-danger">*</span></label>
			                  <select name="is_featured" id="" class="form-control">
			                  	<option value="0" @if( $brand->is_featured ==0 ) selected @endif>Normal</option>
			                  	<option value="1" @if( $brand->is_featured ==1 ) selected @endif>Featured</option>
			                  </select>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
			                  <textarea name="description" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Short Description">{{ $brand->description }}</textarea>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
			                  <select name="status" id="" class="form-control">
			                  	<option value="1" @if ( $brand->status ==1 ) selected @endif >Active</option>
			                  	<option value="2" @if ( $brand->status ==2 ) selected @endif >Inactive</option>
			                  	<option value="0" @if ( $brand->status ==0 ) selected @endif >Pending</option>
			                  </select>
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Image / Logo: <span class="tx-danger">*</span></label>
				              <div class="custom-file">
				              	@if( !is_null($brand->image) )
				              		<img src="{{ asset('Backend/img/brand/') }}{{ $brand->image }}" alt="">
				              	@else
				              		No Image found
				              	@endif
				                <input type="file" class="custom-file-input" id="customFile" name="image">
				                <label class="custom-file-label" for="customFile">Choose file</label>
				              </div>
			                </div>
			              </div>


			            </div><!-- row -->

			            <div class="form-layout-footer">
			              <button class="btn btn-info">Update Brand</button>
			            </div><!-- form-layout-footer -->  
			        </div>
				</form>
			</div>
  		</div>
    </div>
  </div>
</div>


@endsection