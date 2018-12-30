<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projet;
use App\Parametre;
use App\User;

use App\Links;

class ProjetController extends Controller
{

	public function index()
	{
		$projets = Projet::all();
		$membres = User::all();
		$labo =  Parametre::find('1');
        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();
            
		return view('front/projets/projets')->with([
            'labo'=>$labo,
            'projets' => $projets,
            'membres' => $membres,
        ]);
	}

	public function details($id)
    {
        $labo =  Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('front/projets/projetsDetails')->with([
            'projet' => $projet,
            'membres'=>$membres,
            'labo'=>$labo,
        ]);;
    } 

	

}




?>