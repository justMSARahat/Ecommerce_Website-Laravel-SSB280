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
                <h6 class="br-section-label">Manage Home Slider</h6>
                <div class="bd rounded table-responsive">
                    <table class="table table-bordered table-hover mg-b-0 text-center">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Top Text</th>
                                <th>Subtitle</th>
                                <th>Button</th>
                                <th>Button Url</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php $sl = 1; @endphp
                        	@foreach( $slider as $slider )
                        	<tr>
                        		<td>{{ $sl++ }}</td>
                        		<td>
                        			@if( !is_null( $slider->image ) )
                        				<img src="{{ asset('Backend/img/slider') }}/{{ $slider->image }}" alt="" width="80px">
                        			@else
                        				<b>No Image Found</b>
                        			@endif
                        		</td>
                        		<td>{{ $slider->title }}</td>
                        		<td>{{ $slider->top_text }}</td>
                        		<td>{{ $slider->subtitle }}</td>
                        		<td>{{ $slider->button_text }}</td>
                        		<td>{{ $slider->button_text_url }}</td>
	                            <td>
	                                <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
	                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $slider->id }}"><i class="fa fa-trash"></i></a>
	                                <!-- Modal Start-->
	                                <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	                                    <div class="modal-dialog modal-dialog-centered" role="document">
	                                        <div class="modal-content">
	                                            <div class="modal-header">
	                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
	                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                                <span aria-hidden="true">&times;</span>
	                                                </button>
	                                            </div>
	                                            <div class="modal-body">
	                                                <h6 class="text-left">Are You Sure To Delete This slider!</h6>
	                                            </div>
	                                            <div class="modal-footer">
	                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
	                                                <a href="{{ route('slider.delete', $slider->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                                <!-- Modal End -->
	                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding: 15px 0px 0px 0px;">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Create Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Home Bottom Banner</h6>
                <div class="bd rounded table-responsive">
                    <table class="table table-bordered table-hover mg-b-0 text-center">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Top Text</th>
                                <th>Subtitle</th>
                                <th>Button</th>
                                <th>Button Url</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach( $sub_slide as $slider )
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>
                                    @if( !is_null( $slider->image ) )
                                        <img src="{{ asset('Backend/img/slider') }}/{{ $slider->image }}" alt="" width="80px">
                                    @else
                                        <b>No Image Found</b>
                                    @endif
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->top_text }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>{{ $slider->button_text }}</td>
                                <td>{{ $slider->button_text_url }}</td>
                                <td>
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $slider->id }}"><i class="fa fa-trash"></i></a>
                                    <!-- Modal Start-->
                                    <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="text-left">Are You Sure To Delete This slider!</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                    <a href="{{ route('slider.delete', $slider->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding: 15px 0px 0px 0px;">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Create Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-sm-12 col-xl-12">
            <div class="br-section-wrapper">
                <h6 class="br-section-label">Manage Image Slider</h6>
                <div class="bd rounded table-responsive">
                    <table class="table table-bordered table-hover mg-b-0 text-center">
                        <thead class="thead-colored thead-dark">
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1; @endphp
                            @foreach( $home_slider as $slider )
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>
                                    @if( !is_null( $slider->image ) )
                                        <img src="{{ asset('Backend/img/slider') }}/{{ $slider->image }}" alt="" width="80px">
                                    @else
                                        <b>No Image Found</b>
                                    @endif
                                </td>
                                <td>{{ $slider->name }}</td>
                                <td>
                                    <a href="{{ route('mslider.edit', $slider->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $slider->id }}"><i class="fa fa-trash"></i></a>
                                    <!-- Modal Start-->
                                    <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="text-left">Are You Sure To Delete This slider!</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                    <a href="{{ route('mslider.delete', $slider->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="padding: 15px 0px 0px 0px;">
                    <a href="{{ route('mslider.create') }}" class="btn btn-primary">Create Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
