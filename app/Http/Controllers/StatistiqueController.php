<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
  public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
		$labo = Parametre::find('1');

		$membres = DB::table('users')->distinct('id')->count();
    $equipes = DB::table('equipes')->distinct('id')->count();
    $theses = DB::table('theses')->distinct('id')->where('date_soutenance',null)->count();
    $articles = DB::table('articles')->distinct('id')->count();
    $materials = DB::table('materials')->distinct('id')->count();
    $partenaires = DB::table('partenaires')->distinct('id')->count();
    $contacts = DB::table('contacts')->distinct('id')->count();

		$nombres = [
			'membres' => $membres,
			'equipes' => $equipes,
			'theses' => $theses,
			'articles' => $articles,
			'materials' => $materials,
			'partenaires' => $partenaires,
			'contacts' => $contacts,
		];
		return view('statistique/index', compact('labo', 'nombres'));
	}
}
