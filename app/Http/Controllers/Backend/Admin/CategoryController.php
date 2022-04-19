<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $this->setPageTitle('Categories');
        $category = Category::all();
        return view('backend.pages.categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('New Category');
        return view('backend.pages.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // validate rules
        $request->validated();

        // image upload
        $imageName = $this->imageUpload($request->file('category_icon'),'media/category/');

        // new category store DB
        Category::create([
            'name'   => $request->category_name,
            'slug'   => Str::slug($request->category_name),
            'image'  => $imageName,
            'status' => $request->status
        ]);

        Session::flash('success','message');

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->setPageTitle('Edit');
        return view('backend.pages.categories.form',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        // validate rules
        $request->validated();

        // image upload
        $fileName = $request->file('category_icon');
        $imageName = uniqid(rand().time()).'.'.$fileName->getClientOriginalExtension();
        $fileName->move('media/category/',$imageName);

        // new category store DB
        $category->update([
            'name'   => $request->category_name,
            'slug'   => Str::slug($request->category_name),
            'image'  => $imageName,
            'status' => $request->status
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}
