@extends('backend.layout.template')
@section('body')
<div class="br-pagetitle">
	<i class="icon ion-ios-home-outline"></i>
	<div>
		<h4>Manage Slider</h4>
		<p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
	</div>
</div>
<div class="br-pagebody">
	<div class="row row-sm">
		<div class="col-sm-12 col-xl-12">
			<div class="br-section-wrapper">
				<h6 class="br-section-label ">Edit Slider</h6>
				<div class="bd rounded table-responsive">
					<form action="{{ route('mslider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-layout form-layout-1">

							<div class="row mg-b-15">

								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="name" placeholder="Enter Slider Title" autocomplete="off" value="{{ $slider->name }}">
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="image">
											<label class="custom-file-label" for="customFile">
												@if( !is_null( $slider->image ) )
													Banner Found! Name: <b>{{$slider->image}}</b>
												@else
													No Banner Found!
												@endif
											</label>
										</div>
									</div>
								</div>

							</div>

							<!-- row -->
							<div class="form-layout-footer">
								<button class="btn btn-info" type="submit">Update Slider</button>
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
