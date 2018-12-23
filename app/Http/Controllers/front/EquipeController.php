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

class EquipeController extends Controller
{
    public function index()
    {
        $labo = Parametre::find('1');
        $equipes = Equipe::all();
        // $nbr = DB::table('users')
        //            ->groupBy('equipe_id')
        //            ->count('equipe_id');

        $nbr = DB::table('users')
            ->select( DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();

        return view('front.equipe.equipe')->with([
            'equipes' => $equipes,
            'nbr' => $nbr,
            'labo'=>$labo,
        ]);
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();

        return view('front.equipe.equipeDetails')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo'=>$labo,
        ]);
    }
}
