<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('welcome');
    }
    public function sendEmail(Request $request)
    {
        $details =[
    'name' =>$request->name,
    'email' =>$request->email,
    'msg'=>$request->msg,
        ];
        Mail::to('contacto@armyprolife.com')->send(new ContactMail($details));
        return back()->with('Mensaje Enviado', 'Tu mensaje se envio con exito!');
    }
}
