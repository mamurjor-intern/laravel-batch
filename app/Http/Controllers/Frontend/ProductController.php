<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Cart;
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


    public function addToCartModal(Request $request){
        if ($request->ajax()) {
            $product = Product::findOrFail($request->product_id);

            $cart = Cart::add(
                $product->id,
                $product->name,
                $product->price,
                $request->qty,
                array(
                    'size'          => $request->size,
                    'color'         => $request->color,
                    'discountPrice' => $product->discount_price,
                    'image'         => $product->feature_image,
                    'product_stock' => $product->qty
                )
            );

            if ($cart == true) {
                $output = ['status'=>'success','message'=>'Product add to cart successfully.'];
            }
            else{
                $output = ['status'=>'error','message'=>'Product add to cart somting wrong!'];
            }

            return response()->json($output);

        }
    }
}
