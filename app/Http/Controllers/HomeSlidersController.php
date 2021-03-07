<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use App\Models\HomeSliders;
use Illuminate\Support\Str;
use Image;
use File;

class HomeSlidersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.home-slider.ecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Slider = new HomeSliders();
        $Slider->name               = $request->name;
        $Slider->slide_type         = 2;

        //Image Preparation
        if ($request->image) {
            $image = $request->file('image');
            $img   = rand().'-'.'2nd_row_Image_slider'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/slider/' .$img);
            Image::make($image)->save($location);
            $Slider->image = $img;
        }
        $Slider->save();
        return redirect()->route('slider.manage');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $slider = HomeSliders::find($id);
         if ( !is_null($slider) ) {
            return view('backend.pages.home-slider.eedit', compact('slider'));
        }
        else{
            return redirect()->route('slider.manage');
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
        $Slider = HomeSliders::find($id);
        $Slider->name               = $request->name;
        $Slider->slide_type         = 2;

        //Image Preparation
        if ($request->image) {

            if ( file::exists('Backend/img/slider/' . $Slider->image) ) {
                file::delete('Backend/img/slider/' . $Slider->image);
             }

            $image = $request->file('image');
            $img   = rand().'-'.'2nd_row_Image_slider'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/slider/' .$img);
            Image::make($image)->save($location);
            $Slider->image = $img;
        }
        $Slider->save();
        return redirect()->route('slider.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = HomeSliders::find($id);
        if ( !is_null($id) ) {

            if ( file::exists('Backend/img/slider/' . $id->image) ) {
               file::delete('Backend/img/slider/' . $id->image);
            }
            $id->delete();
            return redirect()->route('slider.manage');
        }
        else{
            return redirect()->route('slider.manage');
        }
    }
}
