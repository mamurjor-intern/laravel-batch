<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function miniCartGet(Request $request){
        if($request->ajax()){
            $cartData = Cart::getContent();

            $output = '';
            if (!$cartData->isEmpty()) {
                foreach ($cartData as $value) {
                    $output .= '
                    <div class="tt-item">
                        <a href="">
                            <div class="tt-item-img">
                                <img src="'.asset($value->attributes->image).'" alt="">
                            </div>
                            <div class="tt-item-descriptions">
                                <h2 class="tt-title">'.$value->name.'</h2>
                                <ul class="tt-add-info">
                                    <li>'.$value->attributes->color.', '.$value->attributes->size.'</li>
                                </ul>
                                <div class="tt-quantity">'.$value->quantity.' X</div> <div class="tt-price">'.$value->price.'</div>
                            </div>
                        </a>
                        <div class="tt-item-close">
                            <a href="javascript:" class="tt-btn-close product-remove" data-id="'.$value->id.'"></a>
                        </div>
                    </div>
                    ';
                }

            }
            else{
                $output .= '<h2 class="tt-cart-empty mb-0">
                    <i class="icon-f-39"></i>
                    <p>No Products in the Cart</p>
                </h2>';
            }

            $data = ['cartCount'=>$cartData->count(),'cart'=>$output,'subTotal'=>Cart::getSubTotal()];
            return response()->json($data);
        }
    }

    public function cartIndex(){
        $breadcrumb = ['Cart'=>''];
        $this->setPageTitle('Cart','Cart','Cart');

        return view('frontend.pages.cart', compact('breadcrumb'));
    }

    public function productCartRemove(Request $request){
        if ($request->ajax()) {
            Cart::remove($request->product_id);

            $output = ['status'=>'success','message'=>'Product cart from remove'];
            return response()->json($output);
        }
    }

    public function cartProducts(Request $request){
        if($request->ajax()){
            $cartProducts = Cart::getContent();

            return response()->json($cartProducts);
        }
    }
}
