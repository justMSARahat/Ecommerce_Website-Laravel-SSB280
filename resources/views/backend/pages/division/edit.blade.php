@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Manage Divisions</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
</div>

<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-12 col-xl-12">
        <div class="br-section-wrapper">
			<h6 class="br-section-label ">Edit Division</h6>

			<div class="bd rounded table-responsive">
				<form action="{{ route('division.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-layout form-layout-1">
			            <div class="row mg-b-25">
			             
			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="text" name="name" placeholder="Enter Division Name" autocomplete="off" value="{{ $division->name }}">
			                </div>
			              </div><!-- col-4 -->

			              <div class="col-lg-12">
			                <div class="form-group">
			                  <label class="form-control-label">Division Priority: <span class="tx-danger">*</span></label>
			                  <input class="form-control" type="number" name="priority" placeholder="Enter Priority" value="{{ $division->priority }}" >
			                </div>
			              </div><!-- col-4 -->

			            </div><!-- row -->

			            <div class="form-layout-footer">
			              <button class="btn btn-info" type="submit">Update Division</button>
			            </div><!-- form-layout-footer -->  
			        </div>
				</form>
			</div>
  		</div>
    </div>
  </div>
</div>


@endsection