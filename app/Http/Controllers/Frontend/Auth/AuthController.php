<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function signIn(){
        if(Auth::check()){
            return redirect()->route('login');
        }
        else{
            // breadcrumb
            $breadcrumb = ['Signin'=>''];

            // view share
            $this->setPageTitle('Signin','Signin','Signin');
            return view('auth.login', compact('breadcrumb'));
        }
    }

    public function signInStore(Request $request){
        // validate rules
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // signin user
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
            toastr()->success('Signin Successfully.');
            return redirect()->intended(route('login'));
        }
        else{
            if(Auth::attempt(['username'=>$request->email,'password'=>$request->password],$request->remember)){
                toastr()->success('Signin Successfully.');
                return redirect()->intended(route('login'));
            }
            else{
                toastr()->error('Email or Password Invalid!');
                return back();
            }
        }
    }

    public function signUp(){
        // breadcrumb
        $breadcrumb = ['Signup'=>''];

        // view share
        $this->setPageTitle('Signup','Signup','Signup');
        return view('auth.register', compact('breadcrumb'));
    }

    public function signUpStore(Request $request){
        // validate rules
        $request->validate([
            'full_name'=> 'required|string|max:70',
            'username' => 'required|string|unique:users,username',
            'email'    => 'required|string|unique:users,email',
            'password' => 'required|min:8|max:16'
        ]);

        // new user
        $user = User::create([
            'name'     => $request->full_name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // login
        Auth::login($user);

        toastr()->success('Register Successfully.');
        return redirect()->route('user.dashboard');

    }

    public function logOut(){
        Auth::logout();

        toastr()->success('Logout Successfully.');
        return redirect('/');
    }
}
