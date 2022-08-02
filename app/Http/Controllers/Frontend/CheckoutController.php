<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $breadcrumb = ['Checkout'=>''];
        $this->setPageTitle('Checkout','Checkout','Checkout');

        $cartProductCount = Cart::isEmpty();
        if (!Auth::check()) {
            toastr()->error('Login here','Error');
            if (Cart::isEmpty()) {
                toastr()->error('Your cart is empty','Error');
            }

            return redirect()->route('frontend.cart.index');
        }


        $cartProducts = Cart::getContent();
        return view('frontend.pages.checkout', compact('breadcrumb','cartProducts'));
    }

    public function checkoutStore(Request $request){
        $shippingId = Shipping::create([
            'user_id'     => Auth::id(),
            'name'        => $request->full_name,
            'email'       => $request->email,
            'address'     => $request->address,
            'phone'       => $request->phone_number,
            'state'       => $request->state,
            'city'        => $request->city,
            'postal_code' => $request->postal_code
        ]);

        $paymentid = Payment::create([
            'method'           => $request->payment_method,
            'transaction_id'   => rand(1111,9999),
            'currency'         => 'USD',
            'amount'           => $request->total_amount,
            'payment_date'     => Carbon::now()->format('Y-m-d h:i')
        ]);

        $orderId = Order::create([
            'order_no'    => 'M'.rand(0000,9999),
            'shipping_id' => $shippingId->id,
            'payment_id'  => $paymentid->id
        ]);

        foreach(Cart::getContent() as $value){
            OrderDetail::create([
                'order_id'   => $orderId->id,
                'product_id' => $value->id,
                'qty'        => $value->quantity,
                'color'      => $value->attributes->color,
                'size'       => $value->attributes->size,
            ]);
        }

        Cart::clear();

        toastr()->success('Your order successfully.');
        return redirect()->route('user.dashboard');

    }
}
