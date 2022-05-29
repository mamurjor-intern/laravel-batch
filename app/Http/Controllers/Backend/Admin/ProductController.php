<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DataTables;

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
        if ($request->ajax) {
            $getData = DB::table('products')->latest('id')
                ->select('id','name','sku','qty','price','feature_image','is_approved');
            return DataTables::queryBuilder($getData)
                ->addIndexColumn()
                ->addColumn('feature_image', function($product){
                    return '<img src="'.$product->feature_image.'" width="100" height="100" alt="'.$product->name.'">';
                })
                ->addColumn('approved', function($product){
                    if ($product->is_approved == 1) {
                        $approved = '<span class="badge badge-sm badge-success">Approved</span>';
                    }
                    else{
                        $approved = '<span class="badge badge-sm badge-success">Pending</span>';
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
        $this->setPageTitle('New Product Create');
        return view('backend.pages.products.form');
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
