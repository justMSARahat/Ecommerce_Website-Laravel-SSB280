<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::orderBy('name','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage', compact('category') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Please Insert The Category Name'
        ]);

        $category = new category();
        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->is_parent   = $request->is_parent;
        $category->description = $request->description;
        $category->status      = $request->status;

        if ($request->image) {
            $image = $request->file('image');
            $img   = rand().'-'.'category'.'-'.'logo'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/category/' .$img);
            Image::make($image)->save($location);
            $category->image   = $img;
        }

        $category->save();

        return redirect()->route('category.manage');
        
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
        $category = category::find($id);
        if (!is_null($category)) {
            return view('Backend.pages.category.edit',compact('category'));
        }else{
            return redirect()->route('category.manage');
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
        $request->validate([
            'name' => 'required|max:255',
        ],[
            'name.required' => 'Please Insert The Category Name'
        ]);

        $category = category::find($id);
        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->is_parent   = $request->is_parent;
        $category->description = $request->description;
        $category->status      = $request->status;

        if ($request->image) {

            if (File::exists('Backend/img/category/' . $category->image) ){
                File::delete('Backend/img/category/' . $category->image);
            }

            $image = $request->file('image');
            $img   = rand().'-'.'category'.'-'.'logo'.'.'.$image->getClientOriginalExtension();
            $location = public_path('Backend/img/category/' .$img);
            Image::make($image)->save($location);
            $category->image   = $img;
        }

        $category->save();

        return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = category::find($id);
       if (!is_null($category)) {
            if (File::exists('Backend/img/category/' . $category->image) ){
                File::delete('Backend/img/category/' . $category->image);
            }
            $category->delete();
            return redirect()->route('category.manage');

       }else{
            return redirect()->route('category.manage');
       }
    }
}
