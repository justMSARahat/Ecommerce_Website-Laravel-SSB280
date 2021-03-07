<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('title','asc')->get();
        return view('backend.pages.product.manage', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::orderBy('name','asc')->where('status',1)->get();
        $category = Category::orderBy('name','asc')->where('status',1)->get();
        return view('backend.pages.product.create',compact('brand','category'));
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
            'title' => 'required|max:255',
        ],
        [
            'title.required' => 'Please Insert Product Name'
        ]);

        $Product = new Product();

        $Product->title          = $request->title; 
        $Product->slug           = Str::slug($request->title);
        $Product->short_desc     = $request->short_desc;      
        $Product->desc           = $request->desc;
        $Product->tags           = $request->tags;
        $Product->quantity       = $request->quantity;    
        $Product->reguler_price  = $request->reguler_price;         
        $Product->offer_price    = $request->offer_price;       
        $Product->sku_code       = $request->sku_code;    
        $Product->product_type   = $request->product_type;        
        $Product->cat_id         = $request->cat_id;  
        $Product->brand_id       = $request->brand_id;    
        $Product->is_featured    = $request->is_featured;       
        $Product->status         = $request->status;  

        
        if ($request->image) {
            //Image Prepare
            $image = $request->file('image');
            $img   = rand().'_'.'Shop_Product_Primary_Image'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/Product_Primary_image/' .$img);
            Image::make($image)->save($location);
            $Product->image          = $img;
        }

        $Product->save();
        return redirect()->route('product.manage');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) {
            $brand = Brand::orderBy('name','asc')->where('status',1)->get();
            $category = Category::orderBy('name','asc')->where('status',1)->get();
            return view('backend.pages.product.edit',compact('product','brand','category'));
        }
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
        $request->validate(
        [
            'title' => 'required|max:255',
        ],
        [
            'title.required' => 'Please Insert Product Name'
        ]);

        $product = Product::find($id);

        if ( $request->image ) {
            if ( file::exists('Backend/img/Product_Primary_image/' .$product->image) ) {
                file::delete('Backend/img/Product_Primary_image/' .$product->image);
            }
            
            //Image Prepare
            $image = $request->file('image');
            $img   = rand().'_'.'Shop_Product_Primary_Image'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/Product_Primary_image/' .$img);
            Image::make($image)->save($location);
            $product->image          = $img;
        }

        $product->title          = $request->title; 
        $product->slug           = Str::slug($request->title);
        $product->short_desc     = $request->short_desc;      
        $product->desc           = $request->desc;
        $product->tags           = $request->tags;
        $product->quantity       = $request->quantity;    
        $product->reguler_price  = $request->reguler_price;         
        $product->offer_price    = $request->offer_price;       
        $product->sku_code       = $request->sku_code;    
        $product->product_type   = $request->product_type;        
        $product->cat_id         = $request->cat_id;  
        $product->brand_id       = $request->brand_id;    
        $product->is_featured    = $request->is_featured;       
        $product->status         = $request->status;  


        $product->save();
        return redirect()->route('product.manage');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ( !is_null($product->image) ) {
            if ( file::exists('Backend/img/Product_Primary_image/' .$product->image) ) {
                file::delete('Backend/img/Product_Primary_image/' .$product->image);
            }
            $product->delete();
            return redirect()->route('product.manage');
        }
        else{
            return redirect()->route('product.manage');
        }
    }

}
