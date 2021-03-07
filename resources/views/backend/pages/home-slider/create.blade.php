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
				<h6 class="br-section-label ">Add New Slider</h6>
				<div class="bd rounded table-responsive">
					<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-layout form-layout-1">

							<div class="row mg-b-15">

								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="title" placeholder="Enter Slider Title" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Slider Top Text: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="top_text" placeholder="Enter Slider Top Text" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-12">
									<div class="form-group">
										<label class="form-control-label">Slider Description: <span class="tx-danger">*</span></label>
										<textarea class="form-control" name="subtitle" id="" cols="30" rows="2" placeholder="Slider Description"></textarea>
									</div>
								</div>


								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Button Text: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="button_text" placeholder="Enter Slider Button Text" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label class="form-control-label">Button URL/Link: <span class="tx-danger">*</span></label>
										<input class="form-control" type="text" name="button_text_url" placeholder="Enter Slider Button URL" autocomplete="off">
									</div>
								</div>

								<div class="col-lg-8">
									<div class="form-group mg-b-10-force">
										<label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="customFile" name="image">
											<label class="custom-file-label" for="customFile">Upload Image</label>
										</div>
									</div>
								</div>

                                <div class="col-lg-4">
									<div class="form-group">
										<label class="form-control-label">Slide Type: <span class="tx-danger">*</span></label>
										<select name="slide_type" id="" class="form-control">
                                            <option value="null">Select Type</option>
                                            <option value="1">Home Main Slider</option>
                                            <option value="3">Home Bottom Banner</option>
                                        </select>
									</div>
								</div>

							</div>

							<!-- row -->
							<div class="form-layout-footer">
								<button class="btn btn-info" type="submit">Create Slider</button>
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
