<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Frontend\cart;
use App\Models\Backend\Product;
use App\Models\Backend\Category;
use App\Models\Backend\order;
use App\Models\Backend\Brand;
use App\Models\Users;
use Auth;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_item = cart::orderBy('id','desc')->where('order_id',Null)->get();
        $cart       = cart::totalPrice();
        if( !is_null($total_item) ){
            if( $cart != 0 ){
                return view('frontend.pages.checkout',compact('total_item') );
            }
            else{
                return redirect()->route('cart.manage');
            }
        }
        else{
            return redirect()->route('cart.manage');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name'        => 'required',
                'email'             => 'required',
                'phone'             => 'required',
                'shipping_address'  => 'required',
            ],
            [
                'first_name.required'        => 'Please Make Sure First Name is not Empty',
                'email.required'             => 'Please Make Sure The Email is not Empty',
                'phone.required'             => 'Please Make Sure The Phone Number is not Empty',
                'shipping_address.required'  => 'Please Make Sure The Address is not Empty',
            ]);

            $order = new order();

            if( Auth::check() ){
                $cart = Cart::where('user_id', Auth::id() )->where('product_id',$request->product_id)->first();
            }
            else{
                $cart = Cart::where('user_id' , $request->ip() )->where('product_id',$request->product_id)->first();
            }

            if( Auth::check() ){
                $order->user_id = Auth::id();
            }
            else{
                $order->ip_address = $request->ip();
            }

            $order->name             = $request->name;
            $order->last_name        = $request->last_name;
            $order->email            = $request->email;
            $order->phone            = $request->phone;
            $order->address          = $request->address;
            $order->division_id      = $request->division_id;
            $order->district_id      = $request->district_id;
            $order->zip_code         = $request->zip_code;
            $order->message          = $request->message;
            $order->amount           = $request->amount;
            $order->pricewithcoupon  = $request->pricewithcoupon;
            $order->is_paid          = $request->is_paid;
            $order->payment_id       = $request->payment_id;
            if( $order->payment_id == 1 ){
                $order->transaction_id   = $request->btransaction_id;
            }
            elseif( $order->payment_id == 3 ){
                $order->transaction_id   = $request->rtransaction_id;
            }
            elseif( $order->payment_id == 4 ){
                $order->transaction_id   = $request->ntransaction_id;
            }
            else{
                $order->transaction_id   = $request->ctransaction_id;
            }

            $order->save();

            foreach( cart::totalCarts() as $cart ){
                $cart->order_id = $order->id;

                if( Auth::check() ){
                    $cart->user_id = Auth::id();
                }
                else{
                    $cart->ip_address = $request->ip();
                }

                $cart->save();
            }


            $nofty =array(
                'message' => 'Congratulation! Order Placed!',
                'alert-type' => 'success'
            );

            return redirect()->route('homepage')->with($nofty);






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
