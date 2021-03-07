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
			<h6 class="br-section-label">Manage Product</h6>

			<div class="bd rounded table-responsive">
				<table class="table table-bordered table-hover mg-b-0 text-center">
				  <thead class="thead-colored thead-dark">
				    <tr>
				      <th>SL</th>
				      <th>IMAGE</th>
				      <th>TITLE</th>
				      <th>PRICE</th>
				      <th>OFFER_PRICE</th>
				      <th>QUANTITY</th>
				      <th>BRAND</th>
				      <th>CATEGORY</th>
				      <th>FEATURED</th>
				      <th>STATUS</th>
				      <th>ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php $i=1 @endphp
				  	@foreach ( $product as $product )
					   
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>
					      	@if( !is_null($product->image) )
					      		<img src="{{ asset('Backend/img/Product_Primary_image') }}/{{ $product->image }}" alt="" width="30px">
					      	@else
					      		No Image Found!
					      	@endif</td>
					      <td>{{ $product->title }}</td>
					      <td>{{ $product->reguler_price }} BDT</td>
					      <td>{{ $product->offer_price }} BDT</td>
					      <td>{{ $product->quantity }} PC</td>
					      <td>{{ $product->brand->name }}</td>
					      <td>
					      	{{ $product->category->name}}
					      </td>
					      <td>
							@if($product->is_featured==1)
								<span class="badge badge-success">Featured</span>
							@else
								<span class="badge badge-warning">Normal</span>
							@endif
					      </td>
					      <td>
							@if($product->status==1)
								<span class="badge badge-success">Active</span>
							@elseif($product->status==2)
								<span class="badge badge-primary">Inactive</span>
							@else
								<span class="badge badge-warning">Pending</span>
							@endif
					      </td>
					      <td>
						      	<a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
						      	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $product->id }}"><i class="fa fa-trash"></i></a>
						      	
						      	<!-- Modal Start-->
								<div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<h6 class="text-left">Are You Sure To Delete This product!</h6>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
								      	<a href="{{ route('product.delete', $product->id ) }}"><button type="button" class="btn btn-danger">Delete</button></a>
								        
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
  		</div>
    </div>
  </div>
</div>


@endsection