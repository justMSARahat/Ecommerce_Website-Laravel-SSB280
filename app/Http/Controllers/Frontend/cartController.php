<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Frontend\cart;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\Brand;
use App\Models\Users;
use Auth;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_item = cart::orderBy('id','desc')->where('order_id',Null)->get();
        return view('frontend.pages.cart',compact('total_item') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required',
        ],
        [
            'product_id.required' => 'Please Select A Product',
        ]);

        if ( Auth::check() ) {
            $cart = cart::Where('user_id', Auth()->guard('customer')->user()->id )->Where( 'product_id' , $request->product_id )->first();
        }
        else{
            $cart = cart::Where('ip_address', request()->ip() )->Where( 'product_id' , $request->product_id )->first();
        }

        if( !is_null( $cart ) ){
            $cart->increment('product_quantity');

            $notification = array(
                'message' => 'Product Added',
                'alert-type' => 'success'
            );
            return back()->with( $notification );
        }
        else{
            $cart = new cart();

            if ( Auth::guard('customer')->check() ) {
                $cart->user_id = Auth()->guard('customer')->user()->id;
            }
            $cart->ip_address       = $request->ip();
            $cart->product_id       = $request->product_id;
            $cart->product_quantity = $request->product_quantity;


            // dd($cart); exit();

            $cart->save();

            $notification = array(
                'message' => 'Product Added Successfully to the Cart',
                'alert-type' => 'success'
            );
        }
        return back()->with( $notification );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = cart::find($id);
        if ( !is_null( $cart ) ){
            $cart->product_quantity = $request->quantity;
            $cart->save();

            $notification = array(
                'message' => 'Cart Update Success',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);
        }
        else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = cart::find($id);
        if( !is_null( $cart ) ){
            $cart->delete();

            $notification = array(
                'message' => 'Cart Product Remove Success',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);


        }
        else{
            return redirect()->back();
        }
    }
}
