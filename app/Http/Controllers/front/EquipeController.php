<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\equipeRequest;
use Illuminate\Support\Facades\DB;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::all();
        $q = Input::get ( 'search' );
        $labo =  Parametre::find('1');

        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();

        return view('front.equipe.equipe', compact('labo','equipes',  'nbr' ,'q','l'));
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();

        return view('front.equipe.equipeDetails')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo' => $labo,
        ]);
    }

    public function search()
    {
        $labo =  Parametre::find('1');

        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();

        $q = Input::get('search');

        $equipes = Equipe::where('intitule', 'LIKE', '%' . $q . '%')
            ->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get();

        $nbrResultatTrouver = Equipe::where('intitule', 'LIKE', '%' . $q . '%')
            ->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get()->count();
        return view('front.equipe.equipe', compact('labo', 'equipes', 'nbr', 'q' , 'nbrResultatTrouver','l'));

    }
}
