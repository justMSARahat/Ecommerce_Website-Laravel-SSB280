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
				      <th>Invoice</th>
				      <th>Email</th>
				      <th>PRICE</th>
				      <th>Transaction ID</th>
				      <th>Status</th>
				      <th>ACTION</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@php $i=1 @endphp
				  	@foreach ( $order as $order )
					   
					    <tr>
					      <th scope="row">{{ $i++ }}</th>
					      <td>#{{ $order->invoice }}</td>
					      <td>{{ $order->email }}</td>
					      <td>{{ $order->amount }} BDT</td>
					      <td>{{ $order->transaction_id}}</td>
					      <td>{{ $order->status}}</td>
					      <td>
							<a href="{{ route('order.invoice', $order->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
							<a href="{{ route('order.orderdetails', $order->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
							<a href="" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $order->id }}"><i class="fa fa-trash"></i></a>
							
							<!-- Modal Start-->
							<div class="modal fade" id="delete{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div class="modal-body">
									<h6 class="text-left">Are You Sure To Cancel This order!</h6>
									</div>
									<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
									<a href="{{ route('order.delete', $order->id ) }}"><button type="button" class="btn btn-danger">Confirm</button></a>
									
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