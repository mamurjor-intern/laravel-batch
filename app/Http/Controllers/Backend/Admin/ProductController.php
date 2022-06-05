<?php

namespace App\Http\Controllers\Backend\Admin;

use Image;
use DataTables;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Products');
        return view('backend.pages.products.index');
    }

    public function productGetData(Request $request){
        if ($request->ajax()) {
            $getData = DB::table('products')->latest('id')
                ->select('id','name','sku','qty','price','feature_image','is_approved');

            return DataTables::queryBuilder($getData)
                ->addIndexColumn()
                ->addColumn('feature_image', function($product){
                    return '<img src="'.asset($product->feature_image).'" width="100" height="100" alt="'.$product->name.'">';
                })
                ->addColumn('approved', function($product){
                    if ($product->is_approved == 1) {
                        $approved = '<span class="badge badge-sm bg-success">Approved</span>';
                    }
                    else{
                        $approved = '<span class="badge badge-sm bg-danger">Pending</span>';
                    }

                    return $approved;
                })
                ->addColumn('action', function($product){
                    if($product->is_approved == 1){
                        $class = 'pending-btn';
                        $label = 'Pending';
                    }
                    else{
                        $class = 'approved-btn';
                        $label = 'Approved';
                    }

                    $action = '
                    <div class="btn-group">
                        <button type="button" class="dropdown-toggle border-0 bg-white hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="'.route('admin.products.edit',$product->id).'" class="dropdown-item border-0">Edit</a></li>

                            <li><button type="button" class="dropdown-item border-0 delete-btn" data-id="'.$product->id.'">Delete</button></li>
                            <li><button type="button" class="dropdown-item border-0 view-btn" data-id="'.$product->id.'">Show</button></li>

                            <li><button type="button" data-id="'.$product->id.'" data-status="'.$label.'" class="dropdown-item border-0 '.$class.'">'.$label.'</button></li>
                        </ul>
                    </div>
                    ';

                    return $action;
                })
                ->rawColumns(['feature_image','approved','action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childCategory')->where(['status'=>'1','parent_id'=>0])->get();
        $this->setPageTitle('New Product Create');
        return view('backend.pages.products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = explode(',',$request->color);
        $size = explode(',',$request->size);

        // feature image
        $featureImage = $this->imageUpload($request->file('feature_image'),'media/product/',300,340);

        // gallery image
        if ($request->hasFile('gallery_image')) {
            foreach ($request->file('gallery_image') as  $file) {
                $imageEx = $file->getClientOriginalExtension();
                $imageName = uniqid(time().rand()).'.'.$imageEx;
                $imagePath = 'media/product/gallery/'.$imageName;
                Image::make($file)->resize(300, 340)->save('media/product/gallery/'.$imageName);
                $imageArray[] = $imagePath;
            }
        }
        else{
            $imageArray[] = NULL;
        }

        // gallery image json format
        $galleryImage = json_encode($imageArray);
        $categories = json_encode($request->category); // categories

        Product::create([
            'category_id'    => $categories,
            'name'           => $request->product_name,
            'slug'           => Str::slug($request->product_name),
            'sku'            => $request->sku,
            'short_desc'     => $request->short_description,
            'long_desc'      => $request->long_description,
            'feature_image'  => $featureImage,
            'gallery_image'  => $galleryImage,
            'qty'            => $request->quantity,
            'price'          => $request->price,
            'discount_price' => $request->discount_price,
            'color'          => json_encode($color),
            'size'           => json_encode($size),
            'is_approved'    => $request->approved
        ]);

        toastr()->success('Product has been saved.');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
