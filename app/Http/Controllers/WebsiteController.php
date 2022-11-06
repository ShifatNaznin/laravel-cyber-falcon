<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
class WebsiteController extends Controller
{

    public function index()
    {
        return view('layouts.website');
    }
    public function contact_msg(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = new ContactMessage();
        $data->name = $request->name;
        $data->email = $request->email;

        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->subject = $request->subject;

        $data->save();

        $send_email = 'shifatnaznin11@gmail.com';
        // $send_email = ['bizdev@cyberfalcon4u.com', 'mcrezek@cloudfectiv.com'];
        Mail::to($send_email)->send(new ContactMail($data));
        Session::flash(
            'success',
            'Thank you for Subscribing',
            'Thank you for Subscribing'
        );

        if ($data) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
    }
}
