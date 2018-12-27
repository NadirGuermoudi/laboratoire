<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametre;
use App\Message;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function index()
    {
        $labo = Parametre::find('1');
        return view('front.contact.contact', compact('labo'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'nom' => 'required',
            'email' => 'required|email',
            'num' => 'required',
            'message' => 'required'
        ]);
        Message::create(['nom' => $request->nom,
            'email' => $request->email,
            'num_de_tel' => $request->num_de_tel,
            'message' => $request->message
        ]);

        return view('front.index');
    }
}
