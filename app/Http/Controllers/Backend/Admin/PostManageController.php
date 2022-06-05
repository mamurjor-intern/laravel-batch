<?php

namespace App\Http\Controllers\Backend\Admin;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostManageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryIndex()
    {
        $this->setPageTitle('Categories');
        $categoryPosts = CategoryPost::latest('id')->get();
        return view('backend.pages.blogs.category.index',compact('categoryPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryCreate()
    {
        $this->setPageTitle('New Create Category');
        return view('backend.pages.blogs.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function categoryStore(Request $request)
    {
        CategoryPost::create([
            'name'             => $request->category_name,
            'slug'             => Str::slug($request->category_name),
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status'           => $request->status
        ]);

        toastr()->success('Category has been saved.');
        return redirect()->route('admin.blogs.categories.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function categoryEdit($id)
    {
        $categoryPost = CategoryPost::findOrFail($id);
        $this->setPageTitle('Edit Category');
        return view('backend.pages.blogs.category.form', compact('categoryPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function categoryUpdate(Request $request, $id)
    {
        $categoryPost = CategoryPost::findOrFail($id);

        $categoryPost->update([
            'name'             => $request->category_name,
            'slug'             => Str::slug($request->category_name),
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'status'           => $request->status
        ]);

        toastr()->success('Category has been updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function categoryDestroy($id)
    {
        //
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->get();
        $this->setPageTitle('Posts');
        return view('backend.pages.blogs.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Categories');
        $categoryPosts = CategoryPost::with('user','category')->where('status','=',1)->orderBy('name','ASC')->get();
        return view('backend.pages.blogs.posts.form',compact('categoryPosts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
