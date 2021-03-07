@extends('backend.layout.template')
@section('body')

<div class="br-pagetitle">
  <i class="icon ion-ios-home-outline"></i>
  <div>
    <h4>Manage Division</h4>
    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
  </div>
</div>

<div class="br-pagebody">
  <div class="row row-sm">
    <div class="col-sm-12 col-xl-12">
        <div class="br-section-wrapper">
			<h6 class="br-section-label">Manage Division</h6>

			<div class="bd rounded table-responsive">
				<table class="table table-bordered table-hover mg-b-0 text-center">
				  <thead class="thead-colored thead-dark">
				    <tr>
				      <th>SL</th>
				      <th>NAME</th>
				      <th>PRIORITY</th>
				      <th>ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php $i=1; @endphp
				  	@foreach ( $division as $division )
					    <tr>
					      <td>{{ $i }}</td>
					      <td>{{ $division->name }}</td>
					      <td>{{ $division->priority }}</td>
					      <td>
						      	<a href="{{ route('division.edit', $division->id ) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
						      	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#deletebrand{{ $division->id }}"><i class="fa fa-trash"></i></a>
						      	
						      	<!-- Modal Start-->
								<div class="modal fade" id="deletebrand{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<h6 class="text-left">Are You Sure To Delete This Brand!</h6>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
								      	<a href="{{ route('division.destroy', $division->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
								        
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal End -->
					      </td>
					    </tr>

					@php $i++; @endphp    
				    @endforeach
				  </tbody>
				</table>

			</div>
  		</div>
    </div>
  </div>
</div>


@endsection