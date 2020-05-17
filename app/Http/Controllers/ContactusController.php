<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;


class ContactusController extends Controller
{
    public function SendEmail(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required',
            'subject' =>  'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'email'      =>  $request->email,
            'subject'      =>  $request->subject,
            'message'   =>   $request->message
        );
        // dd($data);

        Mail::to('samanehrazmi93@gmail.com')->send(new SendEmail($data));
        return view('contactus')->with('success','پیام شما با موفقیت ارسال شد!');
    }
}
