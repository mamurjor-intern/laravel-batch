<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Cart;


class FrontController extends Controller
{
    public function index(){
        $data['trendingProducts'] = DB::table('products')->where('is_approved','=',1)
            ->select('id','name','slug','feature_image','price')->get();
        $data['categories'] = DB::table('categories')->limit(6)->where('status','=','1')->get();
        $this->setPageTitle('Home','Home','Home');
        return view('frontend.pages.index', compact('data'));
    }

}
