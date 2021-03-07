@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Manage Category</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
</div>

<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-12 col-xl-12">
        <div class="br-section-wrapper">
			<h6 class="br-section-label ">Create New Category</h6>

			<div class="bd rounded table-responsive">
				<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-layout form-layout-1">
			            <div class="row mg-b-25">
			             
			              <div class="col-lg-6">
			                <div class="form-group">
			                  <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="name" placeholder="Enter Category Name">
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Is Parent: <span class="tx-danger">*</span></label>
			                  <select name="is_parent" id="" class="form-control">
			                  	<option>Select Option</option>
			                  	<option value="0">Parent</option>
			                  	@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent',0)->get() as $parentcat )
			                  		<option value="{{ $parentcat->id }}">{{ $parentcat->name }}</option>
			                  		@foreach( App\Models\Backend\category::orderBy('name','asc')->where('is_parent', $parentcat->id)->get() as $childcat )
			                  			<option value="{{ $childcat->id }}">- {{ $childcat->name }}</option>
			                  		@endforeach
			                  	@endforeach
			                  </select>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
			                  <textarea name="description" id="" cols="30" rows="3" class="form-control" type="text" placeholder="Enter Short Description"></textarea>
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
			                  <select name="status" id="" class="form-control">
			                  	<option >Select Status</option>
			                  	<option value="1">Active</option>
			                  	<option value="2">Inactive</option>
			                  	<option value="3">Pending</option>
			                  </select>
			                </div>
			              </div>

			              <div class="col-lg-6">
			                <div class="form-group mg-b-10-force">
			                  <label class="form-control-label">Image / Logo: <span class="tx-danger">*</span></label>
				              <div class="custom-file">
				                <input type="file" class="custom-file-input" id="customFile" name="image">
				                <label class="custom-file-label" for="customFile">Choose file</label>
				              </div>
			                </div>
			              </div>


			            </div><!-- row -->

			            <div class="form-layout-footer">
			              <button class="btn btn-info" type="submit">Create New Category</button>
			            </div><!-- form-layout-footer -->  
			        </div>
				</form>
			</div>
  		</div>
    </div>
  </div>
</div>


@endsection