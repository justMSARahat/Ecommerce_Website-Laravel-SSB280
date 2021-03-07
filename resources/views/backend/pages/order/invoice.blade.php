@extends('backend.layout.template')
@section('body')
<div class="">
    <div class="br-pageheader">
      <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Bracket</a>
        <a class="breadcrumb-item" href="index.html">Pages</a>
        <span class="breadcrumb-item active">Page Invoice</span>
      </nav>
    </div><!-- br-pageheader -->
    <div class="br-pagetitle">
      <i class="icon icon ion-ios-paper-outline"></i>
      <div>
        <h4>Page Invoice</h4>
        <p class="mg-b-0">Introducing Bracket Plus admin template, the most handsome admin template of all time.</p>
      </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

      <div class="card bd-0 shadow-base">
        <div class="card-body pd-30 pd-md-60">
          <div class="d-md-flex justify-content-between flex-row-reverse">
            <h1 class="mg-b-0 tx-uppercase tx-gray-400 tx-mont tx-bold">Invoice</h1>
            <div class="mg-t-25 mg-md-t-0">
              <h6 class="tx-primary">ThemePixels, Inc.</h6>
              <p class="lh-7">{{ $invoice->address }}<br>
              Mobile No: {{ $invoice->phone }}<br>
              Email: {{ $invoice->email }}</p>
            </div>
          </div><!-- d-flex -->

          <div class="row mg-t-20">
            <div class="col-md">
              <label class="tx-uppercase tx-13 tx-bold mg-b-20">Shipping Address</label>
              <h6 class="tx-inverse">{{ $invoice->name }} {{ $invoice->last_name }}</h6>
              <p class="lh-7">{{ $invoice->address }}<br>
                Dvision: {{ $invoice->division_id }}<br>
                District: {{ $invoice->district_id }}<br>
                Postal Code: {{ $invoice->zip_code }}<br>
                Mobile No: {{ $invoice->phone }}<br>
                Email: {{ $invoice->email }}</p>
            </div><!-- col -->
            <div class="col-md">
              <label class="tx-uppercase tx-13 tx-bold mg-b-20">Invoice Information</label>
              <p class="d-flex justify-content-between mg-b-5">
                <span>Invoice No</span>
                <span>{{ $invoice->invoice }}</span>
              </p>
              <p class="d-flex justify-content-between mg-b-5">
                <span>Order Date</span>
                <span>{{ $invoice->created_at }}</span>
              </p>
              <p class="d-flex justify-content-between mg-b-5">
                <span>Transection ID:</span>
                <span>{{ $invoice->transaction_id }}</span>
              </p>
              <p class="d-flex justify-content-between mg-b-5">
                <span>Estimated Delivery:</span>
                <span>November 30, 2017</span>
              </p>
            </div><!-- col -->
          </div><!-- row -->

          <div class="table-responsive mg-t-40">
            <table class="table">
              <thead>'
                  <tr>
                      <th class="wd-20p">SL</th>
                      <th class="wd-40p">Title</th>
                      <th class="tx-center">QNTY</th>
                      <th class="tx-right">Unit Price</th>
                      <th class="tx-right">Amount</th>
                    </tr>
                    
                </thead>
                <tbody>
                  @php $i=1; @endphp
                @foreach ( $order as $item)
                    <tr>
                    <td>{{ $i++ }}</td>
                    <td class="tx-12">{{ $item->product->title }}</td>
                    <td class="tx-right">{{ $item->product_quantity }}</td>
                    <td class="tx-right">
                      @if(!is_null($item->product->offer_price))
                        {{ $item->product->offer_price }} BDT
                      @else
                        {{ $item->product->reguler_price }} BDT
                      @endif
                    </td>
                    <td class="tx-right">
                        @if(!is_null($item->product->offer_price))
                          {{ $item->product->offer_price * $item->product_quantity}} BDT
                        @else
                          {{ $item->product->reguler_price * $item->product_quantity}} BDT
                        @endif
                    </td>
                    </tr>
                @endforeach
                <tr>
                  <td colspan="2" rowspan="4" class="valign-middle">
                    <div class="mg-r-20">
                      <label class="tx-uppercase tx-13 tx-bold mg-b-10">Notes</label>
                      <p class="tx-13">{{ $invoice->message }}</p>
                    </div>
                  </td>
                  <td class="tx-right">Sub-Total</td>
                  <td colspan="2" class="tx-right">{{$invoice->amount}} BDT</td>
                </tr>
                <tr>
                  <td class="tx-right">Discount</td>
                  <td colspan="2" class="tx-right">0</td>
                </tr>
                <tr>
                  @if ($invoice->status == 'Pending')
                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
                    <td colspan="2" class="tx-right"><h4 class="tx-teal tx-bold tx-lato">{{$invoice->amount}} BDT</h4></td>
                    @else
                    <td class="tx-right tx-uppercase tx-bold tx-inverse">Total Paid</td>
                    <td colspan="2" class="tx-right"><h4 class="tx-teal tx-bold tx-lato">{{$invoice->amount}} BDT</h4></td>
                  @endif

                </tr>
              </tbody>
            </table>
          </div><!-- table-responsive -->

          <hr class="mg-b-60">

          @if ($invoice->status == 'Pending')
            <a href="" class="btn btn-info btn-block">Pay Now</a>
          @else
            <a href="" class="btn btn-info btn-block">Paid</a>
          @endif


        </div><!-- card-body -->
      </div><!-- card -->

    </div><!-- br-pagebody -->
  </div>
@endsection