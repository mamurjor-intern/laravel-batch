<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $breadcrumb = ['Contact'=>''];
        $this->setPageTitle('Contact','Contact','Contact');

        return view('frontend.pages.contact', compact('breadcrumb'));
    }

    public function storeMail(Request $request){

        $mailData = ['email'=>$request->email,'subject'=>$request->subject,'message'=>$request->message];

        Mail::to($request->email)->send(new ContactMail($mailData));

        toastr()->success('Send a mail');
        return back();
    }
}
