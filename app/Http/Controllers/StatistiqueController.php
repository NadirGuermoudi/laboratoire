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

		$grades = $this->membres();
		// dd($grades);

		return view('statistique/index', compact('labo', 'nombres', 'grades'));
	}

	public function membres(){
		$labo = Parametre::find('1');

		$MAA = DB::table('users')->where('grade', 'MAA')->count();
		$MAB = DB::table('users')->where('grade', 'MAB')->count();
		$MCA = DB::table('users')->where('grade', 'MCA')->count();
		$MCB = DB::table('users')->where('grade', 'MCB')->count();
		$Doctorant = DB::table('users')->where('grade', 'Doctorant')->count();
		$Professeur = DB::table('users')->where('grade', 'Professeur')->count();

		$grades = [
			'MAA' => $MAA,
			'MAB' => $MAB,
			'MCA' => $MCA,
			'MCB' => $MCB,
			'Doctorant' => $Doctorant,
			'Professeur' => $Professeur
		];

		// return $grades;
		return json_encode($grades);
	}
}
