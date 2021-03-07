@extends('backend.layout.template')
@section('body')
<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
		<h4>Manage Districts</h4>
		<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
	</div>
</div>
<div class="br-pagebody">
	<div class="row row-sm">
		<div class="col-sm-12 col-xl-12">
			<div class="br-section-wrapper">
				<h6 class="br-section-label ">Add New District</h6>
				<div class="bd rounded table-responsive">
					<form action="{{ route('district.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-layout form-layout-1">
							<div class="row mg-b-25">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-control-label">District Name: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="name" placeholder="Enter District Name" autocomplete="off">
									</div>
								</div>
								<!-- col-4 -->
								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-control-label">Division Name: <span class="tx-danger">*</span></label>
										<select class="form-control select2" data-placeholder="Please Select the Division Name" name="divisions_id">
											<option>Please Select the Division Name</option>
											@foreach( $division as $division )
												<option value="{{ $division->id }}">{{ $division->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<!-- col-4 -->
							</div>
							<!-- row -->
							<div class="form-layout-footer">
								<button class="btn btn-info" type="submit">Add New District</button>
							</div>
							<!-- form-layout-footer -->  
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection