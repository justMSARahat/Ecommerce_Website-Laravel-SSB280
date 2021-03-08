@extends ('frontend.layout.template-no-sidebar')
@section('body')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('homepage') }}">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-xs">
    <div class="container">

        <div class="row">
            <div class="shopping-cart checkout">
                <div class="col-md-12">
                    <h3><b>CheckOut</b></h3>
                </div>
                {{-- Check Out Information and Cart Porduct Information --}}
                <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="row">
                        {{-- Billing Info --}}
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="name" required id="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="text" class="form-control" name="email" required id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone" required id="phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Shipping Address</label>
                                    <input type="text" class="form-control" name="shipping_address" required >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Division</label>
                                    <select name="division_id" id="" class="form-control">
                                        <option selected>Select Shipping Division</option>
                                        @foreach ( App\Models\Backend\Division::orderBy('name','asc')->get() as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">District</label>
                                    <select name="district_id" id="" class="form-control">
                                        <option selected>Select Shipping District</option>
                                        @foreach ( App\Models\Backend\District::orderBy('name','asc')->get() as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Post Code / Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code" required placeholder="Zip Code">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Additional Message</label>
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            {{-- Payment Method --}}
                            <div class="payment-option">
                                <h4>Please Select the Payment Method</h4>
                                @foreach( App\Models\Backend\Payment::orderBy('name','asc')->get() as $method )
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_id" id="{{ $method->slug }}" value="{{ $method->id }}">
                                        <label class="form-check-label" for="{{ $method->slug }}">
                                            {{ $method->name }}
                                        </label>
                                    </div>

                                    @if ( $method->slug =='Bkash' )
                                        <div class="option_gateway hide {{ $method->slug }}">
                                            <h5>Please Send Money to this <strong>{{ $method->number}}</strong> & Insert the Transaction ID Below</h5>
                                            <div class="form-group">
                                                <input type="text" name="btransaction_id" class="form-control" placeholder="Transaction ID">
                                            </div>
                                        </div>
                                    @elseif ( $method->slug =='Rocket' )
                                        <div class="option_gateway hide {{ $method->slug }}">
                                            <h5>Please Send Money to this <strong>{{ $method->number}}</strong> & Insert the Transaction ID Below</h5>
                                            <div class="form-group">
                                                <input type="text" name="rtransaction_id" class="form-control" placeholder="Transaction ID">
                                            </div>
                                        </div>
                                    @elseif ( $method->slug =='nagad' )
                                        <div class="option_gateway hide {{ $method->slug }}">
                                            <h5>Please Send Money to this <strong>{{ $method->number}}</strong> & Insert the Transaction ID Below</h5>
                                            <div class="form-group">
                                                <input type="text" name="ntransaction_id" class="form-control" placeholder="Transaction ID">
                                            </div>
                                        </div>
                                    @else
                                        <div class="option_gateway hide {{ $method->slug }}">
                                            <h5>Please Complete the Order.Once You Receive the Product You Have to Pay than!</h5>
                                            <input type="hidden" name="ctransaction_id" value="COD">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- Cart Information --}}
                        <div class="col-md-4">
                            {{-- Cart Items Show --}}
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ( App\Models\Frontend\cart::totalCarts() as $item )
                                        <tr>
                                            <td>
                                                <img src="{{ asset('Backend/img/Product_Primary_image') .'/'. $item->product->image  }}" alt="" width="40px">
                                            </td>
                                            <td>{{ $item->product->title }}</td>
                                            <td>
                                                @if( !is_null( $item->product->offer_price ) )
                                                    $ {{ $item->product->offer_price }} BDT
                                                @else
                                                    $ {{ $item->product->reguler_price }} BDT
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Cart Pricing --}}
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                    <th>Sub Total</th>
                                    <td>৳ {{ App\Models\Frontend\cart::totalPrice() }} BDT</td>
                                    </tr>
                                    <tr>
                                    <th>Grand Total</th>
                                    <td>৳ {{ App\Models\Frontend\cart::totalPrice() }} BDT</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="amount" id="amount" value="{{ App\Models\Frontend\cart::totalPrice() }}">
                        <input type="hidden" name="pricewithcoupon" value="{{ App\Models\Frontend\cart::totalPrice() }}">
                        <input type="hidden" name="is_paid" value="0">

                        <div class="container form-group">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection





