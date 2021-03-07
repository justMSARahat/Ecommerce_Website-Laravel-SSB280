<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use App\Models\HomeSliders;
use Illuminate\Support\Str;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_slider = HomeSliders::orderBy('id','asc')->get();
        $slider      = Slider::orderBy('id','asc')->where('slide_type','1')->get();
        $sub_slide   = Slider::orderBy('id','asc')->where('slide_type','3')->get();
        return view('backend.pages.home-slider.manage', compact('slider','home_slider','sub_slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.home-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Slider = new Slider();
        $Slider->title            = $request->title;
        $Slider->top_text         = $request->top_text;
        $Slider->subtitle         = $request->subtitle;
        $Slider->button_text      = $request->button_text;
        $Slider->button_text_url  = $request->button_text_url;
        $Slider->slide_type       = $request->slide_type;

        //Image Preparation
        if ($request->image) {

            $image = $request->file('image');
            $img   = rand().'-'.'Home_Main_Slider_Image'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/slider/' .$img);
            Image::make($image)->save($location);
            $Slider->image = $img;
        }
        $Slider->save();
        return redirect()->route('slider.manage');

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
         $slider = Slider::find($id);
         if ( !is_null($slider) ) {
            return view('backend.pages.home-slider.edit', compact('slider'));
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
        $Slider = Slider::find($id);
        $Slider->title            = $request->title;
        $Slider->top_text         = $request->top_text;
        $Slider->subtitle         = $request->subtitle;
        $Slider->button_text      = $request->button_text;
        $Slider->slide_type       = $request->slide_type;
        $Slider->button_text_url  = $request->button_text_url;

        //Image Preparation
        if ($request->image) {

            if ( file::exists('Backend/img/slider/' . $Slider->image) ) {
               file::delete('Backend/img/slider/' . $Slider->image);
            }

            $image = $request->file('image');
            $img   = rand().'-'.'Home_Main_Slider_Image'.'.'.$image->getClientOriginalExtension();
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
        $id = Slider::find($id);
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
