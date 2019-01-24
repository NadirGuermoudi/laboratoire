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
		$thesesThesard = $this->theses();
		$articles = $this->articles();
		$materials = $this->materials();
		$partenaires = $this->partenaires();
		$projects = $this->projects();

		// dd($articles);
		// dd($thesesThesard);
		// dd($grades);

		return view('statistique/index', compact('labo', 'nombres', 'grades', 'thesesThesard', 'articles', 'materials', 'partenaires', 'projects'));
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

	public function theses($year = null){
		if(!isset($year))
			$year = date('Y');
		
		$b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
		$b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
		$b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
		$b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
		$b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
		$b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
		$b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();
		$b8 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-7)->count();
		$b9 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-8)->count();
		$b10 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-9)->count();

		$c1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count(DB::raw('DISTINCT user_id'));
		$c2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count(DB::raw('DISTINCT user_id'));
		$c3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count(DB::raw('DISTINCT user_id'));
		$c4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count(DB::raw('DISTINCT user_id'));
		$c5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count(DB::raw('DISTINCT user_id'));
		$c6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count(DB::raw('DISTINCT user_id'));
		$c7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count(DB::raw('DISTINCT user_id'));
		$c8 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-7)->count(DB::raw('DISTINCT user_id'));
		$c9 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-8)->count(DB::raw('DISTINCT user_id'));
		$c10 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-9)->count(DB::raw('DISTINCT user_id'));

		// $theses = [
		// 	$year => [$b1,$c1],
		// 	$year-1 => [$b2,$c2],
		// 	$year-2 => [$b3,$c3],
		// 	$year-3 => [$b4,$c4],
		// 	$year-4 => [$b5,$c5],
		// 	$year-5 => [$b6,$c6],
		// 	$year-6 => [$b7,$c7],
		// 	$year-7 => [$b8,$c8],
		// 	$year-8 => [$b9,$c9],
		// 	$year-9 => [$b10,$c10]
		// ];

		$thesesThesard = [
			'years' => [$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,$year-8,$year-9],
			'theses' => [$b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8,$b9,$b10],
			'thesards' => [$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10]
		];

		return json_encode($thesesThesard);
	}

	public function articles($year = null){
		if(!isset($year))
			$year = date('Y');

		$tmp=$year-9;
		for($i=0;$i<10;$i++){
			$t1[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Article court')->count();
			$t2[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Article long')->count();
			$t3[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Brevet')->count();
			$t4[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Chapitre d\'un livre')->count();
			$t5[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Livre')->count();
			$t6[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Poster')->count();
			$t7[$i] = DB::table('articles')->where('annee',$tmp)->where('type','Publication(Revue)')->count();

			$tmp++;
		}

		// $e1 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year GROUP BY type ORDER BY type");
		// $e2 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-1 GROUP BY type ORDER BY type");
		// $e3 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-2 GROUP BY type ORDER BY type");
		// $e4 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-3 GROUP BY type ORDER BY type");
		// $e5 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-4 GROUP BY type ORDER BY type");
		// $e6 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-5 GROUP BY type ORDER BY type");
		// $e7 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-6 GROUP BY type ORDER BY type");
		// $e8 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-7 GROUP BY type ORDER BY type");
		// $e9 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-8 GROUP BY type ORDER BY type");
		// $e10 = DB::select("SELECT type, count(id) FROM articles WHERE annee = $year-9 GROUP BY type ORDER BY type");

		$ta1 = DB::table('articles')->where('type','Article court')->count();
		$ta2 = DB::table('articles')->where('type','Article long')->count();
		$ta3 = DB::table('articles')->where('type','Brevet')->count();
		$ta4 = DB::table('articles')->where('type','Chapitre d\'un livre')->count();
		$ta5 = DB::table('articles')->where('type','Livre')->count();
		$ta6 = DB::table('articles')->where('type','Poster')->count();
		$ta7 = DB::table('articles')->where('type','Publication(Revue)')->count();

		$articles = [
			'years' => [$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,$year-8,$year-9],
			'types' => [$t1,$t2,$t3,$t4,$t5,$t6,$t7],
			'typesAll' => [$ta1,$ta2,$ta3,$ta4,$ta5,$ta6,$ta7]
		];

		return json_encode($articles);
	}

	public function projects($year = null){
		if(!isset($year))
			$year = date('Y');

		$equipes = DB::table('equipes')->select('id', 'achronymes')->get();
		// $listeEquipes = array();
		$lesEquipes = array();
		$i = 0;
		$color = ['rgba(0,137,123 ,0.8)',
		'rgba(192,202,51 ,0.8)',
		'rgba(244,81,30 ,0.8)',
		'rgba(117,117,117 ,0.8)',
		'rgba(94,53,177 ,0.8)',
		'rgba(57,73,171 ,0.8)'];
		
		$c = 0;
		foreach ($equipes as $key => $value) {
			// array_push($listeEquipes, $value->achronymes);
			$tmp=$year-9;
			for($i=0;$i<10;$i++){
				$e[$i] = DB::select("SELECT count(DISTINCT p.id) as total 
					FROM projet_user pu, users u, projets p
					WHERE p.id = pu.projet_id AND pu.user_id = u.id AND u.equipe_id = $value->id AND YEAR(p.created_at) = $tmp")[0]->total;
				$tmp++;
			}
			$equipe = [
				'label' => $value->achronymes,
				'data' => $e,
				'backgroundColor' => $color[$c]
			];
			
			if($c == 10) $c = 0; else $c++;

			array_push($lesEquipes, str_replace("'backgroundColor'" ,'backgroundColor',str_replace('\'data\'','data',str_replace("'label'",'label',str_replace('"','\'',json_encode($equipe))))));
		}

		$projects = [
			'years' => [$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,$year-8,$year-9],
			// 'equipesNames' => $listeEquipes,
			'equipes' => str_replace('"','',json_encode($lesEquipes))
			// 'equipes' => json_encode($lesEquipes)
		];

		// dd(json_encode($projects));

		return str_replace('"','',json_encode($projects));
		// return json_encode($projects);
	}

	public function materials(){
		$materialsAll = DB::table('materials')->count();
		$materialsEmpruntable = DB::table('materials')->where('empruntable', 1)->count();
		$materialsNonEmpruntable = $materialsAll - $materialsEmpruntable;

		$materialsNonDisponible = 0;
		$materialsNonDisponible += DB::table('user_material')->where('date_rendement', null)->count();
		$materialsNonDisponible += DB::table('equipe_material')->where('date_rendement', null)->count();

		$materialsDisponible = $materialsAll - $materialsNonDisponible;

		$materials = [
			'empruntable' => $materialsEmpruntable,
			'nonEmpruntable' => $materialsNonEmpruntable,
			'disponible' => $materialsDisponible,
			'nonDisponible' => $materialsNonDisponible
		];

		return json_encode($materials);
	}

	public function partenaires(){
		$contactsEncadreur = DB::table('theses')->whereNotNull('encadreur_ext')->count();
		$contactsCoEncadreur = DB::table('theses')->whereNotNull('coencadreur_ext')->count();
		$contactsArticles = DB::table('article_contact')->count();
		$contactsProject = DB::table('project_contact')->count();

		$partenaires = [
			'encadreurs' => $contactsEncadreur,
			'coencadreurs' => $contactsCoEncadreur,
			'articles' => $contactsArticles,
			'projects' => $contactsProject
		];

		return json_encode($partenaires);
	}
}
