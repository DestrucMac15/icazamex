<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){

        return view('web.contacto');

    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $correo = new ContactanosMailable($request->all());

        Mail::to('contacto@whizzer.com.mx')->send($correo);
        
        return redirect()->route('web.contacto')->with('info','Mensaje enviado');

    }
}
