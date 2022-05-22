<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn(){
        // breadcrumb
        $breadcrumb = ['Signin'=>''];

        // view share
        $this->setPageTitle('Signin','Signin','Signin');
        return view('auth.login', compact('breadcrumb'));
    }

    public function signUp(){
        // breadcrumb
        $breadcrumb = ['Signup'=>''];

        // view share
        $this->setPageTitle('Signup','Signup','Signup');
        return view('auth.register', compact('breadcrumb'));
    }
}
