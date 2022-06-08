<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function quickView(Request $request){
        if ($request->ajax()) {
            $product = Product::findOrFail($request->product_id);
            if ($product) {
                return response()->json([
                    'color'   => json_decode($product->color),
                    'size'    => json_decode($product->size),
                    'gallery' => json_decode($product->gallery_image),
                    'product' => $product
                ]);
            }
        }
    }
}
