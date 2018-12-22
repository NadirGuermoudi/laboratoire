<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Parametre;
use App\Equipe;
use App\Role;

class MembreController extends Controller
{
    public function index()
    {
        $membres = User::all();

        return view('front/membres/membre' , ['membres' => $membres]);
    }
    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');


        return view('front.membres.membreDetails')->with([
            'membre' => $membre,
            'equipes' => $equipes,
            'roles' => $roles,
            'labo'=>$labo,

        ]);;
    }
}
