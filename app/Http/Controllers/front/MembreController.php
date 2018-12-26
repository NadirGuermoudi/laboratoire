<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Parametre;
use App\Equipe;
use App\Role;
use Illuminate\Support\Facades\Input;

class MembreController extends Controller
{
    public function index()
    {
        $q = Input::get ( 'search' );
        $membres = User::all();
        return view('front/membres/membre', compact('membres' , 'q'));

    }

    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');

        return view('front.membres.membreDetails', compact('membre', 'equipes', 'roles', 'labo'));
    }

    public function search()
    {

        $q = Input::get ( 'search' );
        $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('grade','LIKE','%'.$q.'%')->get();
        $nbrResultatTrouver = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('grade','LIKE','%'.$q.'%')->get() ->count();
        return view('front/membres/membre', compact('membres', 'q' , 'nbrResultatTrouver'));

    }
}
