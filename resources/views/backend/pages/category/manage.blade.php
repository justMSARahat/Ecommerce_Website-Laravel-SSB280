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
			<h6 class="br-section-label">Manage Brands</h6>

			<div class="bd rounded table-responsive">
				<table class="table table-bordered table-hover mg-b-0 text-center">
				  <thead class="thead-colored thead-dark">
				    <tr>
				      <th>SL</th>
				      <th>IMAGE</th>
				      <th>NAME</th>
				      <th>SLUG</th>
				      <th>PARENT</th>
				      <th>STATUS</th>
				      <th>ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php $i=1 @endphp
				  	@foreach ( $category as $cat )
					   
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>
					      	@if( !is_null($cat->image) )
					      		<img src="{{ asset('Backend/img/category') }}/{{ $cat->image }}" alt="" width="30px">
					      	@else
					      		No Image Found!
					      	@endif

					      </td>
					      <td>{{ $cat->name }}</td>
					      <td>{{ $cat->slug }}</td>
					   
					      <td>
					      	@if($cat->is_parent==0)
					      		<span class="badge badge-success">Parent Category</span>
					      	@else
					      		<span class="badge badge-danger">{{ $cat->parent->name }}</span>
					      	@endif
					      </td>
					      <td>
					      	@if($cat->status==1)
					      		<span class="badge badge-success">Active</span>
					      	@elseif($cat->status==2)
					      		<span class="badge badge-primary">Inactive</span>
					      	@else
					      		<span class="badge badge-warning">Pending</span>
					      	@endif
					      </td>
					      <td>
						      	<a href="{{ route('category.edit', $cat->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
						      	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $cat->id }}"><i class="fa fa-trash"></i></a>
						      	
						      	<!-- Modal Start-->
								<div class="modal fade" id="delete{{ $cat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<h6 class="text-left">Are You Sure To Delete This Category!</h6>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
								      	<a href="{{ route('category.delete', $cat->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
								        
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal End -->
					      </td>
					    </tr>

					    @foreach ( App\Models\Backend\category::orderBy('name','asc')->where('is_parent', $cat->id )->get() as $childcat )
					   
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>
					      	@if( !is_null($childcat->image) )
					      		<img src="{{ asset('Backend/img/category') }}/{{ $childcat->image }}" alt="" width="30px">
					      	@else
					      		No Image Found!
					      	@endif

					      </td>
					      <td>{{ $childcat->name }}</td>
					      <td>{{ $childcat->slug }}</td>
					      <td>
					      	@if($childcat->is_parent==0)
					      		<span class="badge badge-success">Parent Category</span>
					      	@elseif( $childcat->is_parent!=$cat->id )
					      		<span class="badge badge-danger">Parent Not Found</span>
					      	@else
					      		<span class="badge badge-danger">{{ $childcat->parent->name }}</span>
					      	@endif
					      </td>
					      <td>
					      	@if($childcat->status==1)
					      		<span class="badge badge-success">Active</span>
					      	@elseif($childcat->status==2)
					      		<span class="badge badge-primary">Inactive</span>
					      	@else
					      		<span class="badge badge-warning">Pending</span>
					      	@endif
					      </td>
					      <td>
						      	<a href="{{ route('category.edit', $childcat->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
						      	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $childcat->id }}"><i class="fa fa-trash"></i></a>
						      	<!-- Modal Start-->
								<div class="modal fade" id="delete{{ $childcat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<h6 class="text-left">Are You Sure To Delete This Category!</h6>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
								      	<a href="{{ route('category.delete', $childcat->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
								        
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal End -->
					      </td>
					    </tr>

					    @foreach ( App\Models\Backend\category::orderBy('name','asc')->where('is_parent', $childcat->id )->get() as $childchildcat )
					   
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>
					      	@if( !is_null($childchildcat->image) )
					      		<img src="{{ asset('Backend/img/category') }}/{{ $childchildcat->image }}" alt="" width="30px">
					      	@else
					      		No Image Found!
					      	@endif

					      </td>
					      <td>{{ $childchildcat->name }}</td>
					      <td>{{ $childchildcat->slug }}</td>
					      <td>
					      	@if($childchildcat->is_parent==0)
					      		<span class="badge badge-success">Parent Category</span>
					      	@else
					      		<span class="badge badge-danger">{{ $childchildcat->parent->name }}</span>
					      	@endif
					      </td>
					      <td>
					      	@if($childchildcat->status==1)
					      		<span class="badge badge-success">Active</span>
					      	@elseif($childchildcat->status==2)
					      		<span class="badge badge-primary">Inactive</span>
					      	@else
					      		<span class="badge badge-warning">Pending</span>
					      	@endif
					      </td>
					      <td>
						      	<a href="{{ route('category.edit', $childchildcat->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
						      	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $childchildcat->id }}"><i class="fa fa-trash"></i></a>
						      	<!-- Modal Start-->
								<div class="modal fade" id="delete{{ $childchildcat->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<h6 class="text-left">Are You Sure To Delete This Category!</h6>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
								      	<a href="{{ route('category.delete', $childchildcat->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
								        
								      </div>
								    </div>
								  </div>
								</div>
								<!-- Modal End -->
					      </td>
					    </tr>
					    @endforeach
					    
					    @endforeach
  
				  	@endforeach
				  </tbody>
				</table>

			</div>
  		</div>
    </div>
  </div>
</div>


@endsection