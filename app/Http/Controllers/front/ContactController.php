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
        $labo = Parametre::find('1');
        $this->validate($request, [
            'nom' => 'required|min:3',
            'email' => 'required|email',
            'telephone' => 'required',
            'message' => 'required|min:10'
        ]);
         Message::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'numero_de_tel' => $request->telephone,
            'message' => $request->message
        ]);

        return redirect()->back()->with('message', 'Votre message a ete bien envoyer!');
    }
}
