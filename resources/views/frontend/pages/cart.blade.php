@extends ('frontend.layout.template-no-sidebar')
@section('body')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Shopping Cart</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>



<div class="shopping-cart">
    <div class="shopping-cart-table ">
        <div class="table-responsive">
            @if( App\Models\Frontend\cart::totalItems() > 0 )
                <table class="table">
                <thead>
                    <tr>
                        <th class="cart-romove item">Remove</th>
                        <th class="cart-description item">Image</th>
                        <th class="cart-product-name item">Product Name</th>
                        <th class="cart-edit item">Edit</th>
                        <th class="cart-qty item">Quantity</th>
                        <th class="cart-sub-total item">Unit Price</th>
                        <th class="cart-total last-item">Grandtotal</th>
                    </tr>
                </thead>
                <!-- /thead -->
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="shopping-cart-btn">
                                <span class="">
                                <a href="{{ route('homepage') }}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
                                </span>
                            </div>
                            <!-- /.shopping-cart-btn -->
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    @php $i=0; @endphp
                    @php $total_price=0; @endphp

                    @foreach( $total_item as $value)
                        <tr>
                            <td class="romove-item">
                                <form action="{{route('cart.destroy',$value->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>
                            </td>
                            <td class="cart-image">
                                <a class="entry-thumbnail" href="detail.html">
                                    <img src="{{ asset('Backend/img/Product_Primary_image') .'/'. $value->product->image  }}" alt="">
                                </a>
                            </td>
                            <td class="cart-product-name-info">
                                <h4 class='cart-product-description'>{{$value->product->title}}</h4>
                            </td>
                            {{-- Product Cart Update With Quantity --}}
                            <form action=" {{ route('cart.update', $value->id) }} " method="POST">
                                @csrf
                                <td class="cart-product-edit">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                </td>
                                <td class="cart-product-quantity">
                                    <div class="quant-input">
                                        <input type="number" name="quantity" class="form-control" value="{{ $value->product_quantity }}">
                                    </div>
                                </td>
                            </form>

                            {{--Per Unit Price--}}
                            <td class="cart-product-sub-total">
                                <span class="cart-sub-total-price">
                                    @if( !is_null( $value->product->offer_price ) )
                                        $ {{ $value->product->offer_price }} BDT
                                    @else
                                        $ {{ $value->product->reguler_price }} BDT
                                    @endif
                                </span>
                            </td>
                            <td class="cart-product-grand-total">
                                <span class="cart-grand-total-price">
                                    @if( !is_null( $value->product->offer_price ) )
                                        $ {{ $value->product->offer_price * $value->product_quantity }} BDT
                                    @else
                                        $ {{ $value->product->reguler_price * $value->product_quantity }} BDT
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

                <!-- /tbody -->
            </table>
            @else
                <div class="alert alert-warning" ><b>No Item Added to Cart!</b></div>
            @endif
        </div>
    </div>
    <!-- /.shopping-cart-table -->
    <div class="col-md-4 col-sm-12 estimate-ship-tax">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <span class="estimate-title">Estimate shipping and tax</span>
                        <p>Enter your destination to get shipping and tax.</p>
                    </th>
                </tr>
            </thead>
            <!-- /thead -->
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label class="info-title control-label">Country <span>*</span></label>
                            <select class="form-control unicase-form-control selectpicker">
                                <option>--Select options--</option>
                                <option>India</option>
                                <option>SriLanka</option>
                                <option>united kingdom</option>
                                <option>saudi arabia</option>
                                <option>united arab emirates</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title control-label">State/Province <span>*</span></label>
                            <select class="form-control unicase-form-control selectpicker">
                                <option>--Select options--</option>
                                <option>TamilNadu</option>
                                <option>Kerala</option>
                                <option>Andhra Pradesh</option>
                                <option>Karnataka</option>
                                <option>Madhya Pradesh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="info-title control-label">Zip/Postal Code</label>
                            <input type="text" class="form-control unicase-form-control text-input" placeholder="">
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn-upper btn btn-primary">GET A QOUTE</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.estimate-ship-tax -->
    <div class="col-md-4 col-sm-12 estimate-ship-tax">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <span class="estimate-title">Discount Code</span>
                        <p>Enter your coupon code if you have one..</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon..">
                        </div>
                        <div class="clearfix pull-right">
                            <button type="submit" class="btn-upper btn btn-primary">APPLY COUPON</button>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!-- /tbody -->
        </table>
        <!-- /table -->
    </div>
    <!-- /.estimate-ship-tax -->
    <div class="col-md-4 col-sm-12 cart-shopping-total">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$ {{ App\Models\Frontend\cart::totalPrice() }} BDT</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$ {{ App\Models\Frontend\cart::totalPrice() }} BDT</span>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- /thead -->
            <tbody>
                <tr>
                    <td>
                        <div class="cart-checkout-btn pull-right">
                            {{--<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>--}}
                            <a href="{{ route('checkout.page') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!-- /tbody -->
        </table>
        <!-- /table -->
    </div>
    <!-- /.cart-shopping-total -->
</div>



@endsection
