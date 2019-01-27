<?php

namespace App\Http\Controllers\front;

use App\Actualite;
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
        $actu = [];
        $articles = [];
        $membres = [];
        $theses = [];
        $projets = [];
        $equipes = [];
        $a = Input::get('articles');
        $m = Input::get('membres');
        $t = Input::get('theses');
        $p = Input::get('projets');
        $e = Input::get('actualite');
        $ac = Input::get('actualite');
        $nbrResultatTrouver = 0;

        if ($a == true or $m == true or $t == true or $p == true or $e == true or $ac == true)
            $to = true;
        //dd($to);
        else
            $to = null;

        if ($to != null) {

            if ($ac != null) {
                $actu = Actualite::where('titre', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('contenu', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver += $actu->count();
            }
            if ($a != null) {
                $articles = Article::where('titre', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver +=  $articles->count();
            }
            if ($m != null) {
                $membres = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('prenom', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver += $membres->count();
            }
            if ($t != null) {
                $theses = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver += $theses->count();
            }
            if ($p != null) {
                $projets = Projet::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver += $projets->count();
            }
            if ($e != null) {
                $equipes = Equipe::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get();
                $nbrResultatTrouver += $equipes->count();
            }
        } else {
            $actu = Actualite::where('titre', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('contenu', 'LIKE', '%' . $q . '%')->get();
            $theses = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->get();
            $projets = Projet::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
            $equipes = Equipe::where('intitule', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get();
            $membres = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('prenom', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
            $articles = Article::where('titre', 'LIKE', '%' . $q . '%')->orWhere('resume', 'LIKE', '%' . $q . '%')->orWhere('type', 'LIKE', '%' . $q . '%')->get();
            $nbrResultatTrouver = $membres->count() + $theses->count() + $articles->count() + $projets->count() + $equipes->count();
        }




        return view('front.recherche', compact('labo', 'actu', 'membres', 'theses', 'articles'
            , 'projets', 'equipes', 'nbr', 'q', 'nbrResultatTrouver', 'l'));

    }
}
