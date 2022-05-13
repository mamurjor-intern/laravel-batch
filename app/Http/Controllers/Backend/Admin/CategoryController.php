<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use DataTables;

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


    public function categoryData(Request $request){
        if ($request->ajax()) {
            $getData = DB::table('categories')->select('id','name','slug','status');
            return DataTables::queryBuilder($getData)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $action = '
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle border-0 bg-white hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><button type="button" class="dropdown-item border-0 delete-btn" data-id="'.$row->id.'">Delete</button></li>

                            <li><button type="button" data-id="'.$row->id.'" class="dropdown-item border-0 edit-btn">Edit</button></li>

                            <li><button type="button" data-id="'.$row->id.'" class="dropdown-item border-0 status-btn">Published</button></li>
                        </ul>
                    </div>
                    ';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->ajax()) {

            $request->validated();
            // image upload
            $imageName = $this->imageUpload($request->file('category_icon'),'media/category/',null,null);

            // new category store DB
            Category::create([
                'name'      => $request->category_name,
                'parent_id' => $request->parent_category,
                'slug'      => Str::slug($request->category_name),
                'image'     => $imageName,
                'status'    => $request->status
            ]);

            $output = ['status'=>'success','message'=>'Category has been saved.'];

            return response()->json($output);
        }

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
    public function delete(Request $request)
    {
        if($request->ajax()){
            $category = Category::find($request->data);
            $this->imagedelete($category->image);

            $category->delete();

            $output = ['status'=>'success','message'=>'Category has been deleted!'];
            return response()->json($output);
        }

    }
}
