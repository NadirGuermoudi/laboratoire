<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Equipe;
use App\Article;
use App\Projet;
use App\These;
use App\Parametre;
use Illuminate\Support\Facades\Input;

class RechercheController extends Controller
{
    public function index()
    {


        $labo = Parametre::find('1');


        $q = Input::get('search');
        $nbrResultatTrouver = 0;

        $membres = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('prenom', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        $theses = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->get();
        $articles = Article::where('titre', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
        $projets = Projet::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
        $equipes = Equipe::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get();
        $nbrResultatTrouver = $membres->count() + $theses->count() + $articles->count() + $projets->count() +$equipes->count();
        return view('front.recherche', compact('labo', 'membres', 'theses', 'articles'
            , 'projets','equipes', 'nbr', 'q', 'nbrResultatTrouver', 'l'));

    }
}
