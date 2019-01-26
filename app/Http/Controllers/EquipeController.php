<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\equipeRequest;
use App\Parametre;
use App\Equipe;
use App\User;
use Auth;

class EquipeController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index()
	{
		$labo = Parametre::find('1');
		$equipes = Equipe::all();
		// $nbr = DB::table('users')
		//            ->groupBy('equipe_id')
		//            ->count('equipe_id');

		$nbr = DB::table('users')
			->select(DB::raw('count(*) as total,equipe_id'))
			->groupBy('equipe_id')
			->get();

		return view('equipe.index')->with([
			'equipes' => $equipes,
			'nbr' => $nbr,
			'labo' => $labo,
		]);;
	}

	public function create()
	{
		$labo = Parametre::find('1');
		if (Auth::user()->role->nom == 'admin') {
			$membres = User::all();
			return view('equipe.create', ['membres' => $membres], ['labo' => $labo]);
		} else {
			return view('errors.403', ['labo' => $labo]);
		}
	}

	public function details($id)
	{
		$labo = Parametre::find('1');
		$equipe = Equipe::find($id);
		$membres = User::where('equipe_id', $id)->get();
		$articles = $this->articles(date('Y'), $id);
		$theses = $this->theses(date('Y'), $id);

		// dd($articles);

		return view('equipe.details')->with([
			'equipe' => $equipe,
			'membres' => $membres,
			'labo' => $labo,
			'articles' => $articles,
			'thesesThesard' => $theses
		]);
	}

	public function store(equipeRequest $request)
	{
		$labo = Parametre::find('1');
		$equipe = new equipe();

		if ($request->hasFile('img')) {
			$file = $request->file('img');
			$file_name = time() . '.' . $file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'), $file_name);


		}
		else {
			$file_name = "photoEquipe.png";
		}

		$equipe->intitule = $request->input('intitule');
		$equipe->resume = $request->input('resume');
		$equipe->achronymes = $request->input('achronymes');
		$equipe->axes_recherche = $request->input('axes_recherche');
		$equipe->chef_id = $request->input('chef_id');
		$equipe->photo = 'uploads/photo/' . $file_name;


		$equipe->save();

		return redirect('equipes');

	}

	public function update(equipeRequest $request, $id)
	{
		$labo = Parametre::find('1');
		$equipe = Equipe::find($id);

		if (Auth::user()->role->nom == 'admin') {
			if ($request->hasFile('img')) {
				$file = $request->file('img');
				$file_name = time() . '.' . $file->getClientOriginalExtension();
				$file->move(public_path('/uploads/photo'), $file_name);

			}

			$equipe->intitule = $request->input('intitule');
			$equipe->resume = $request->input('resume');
			$equipe->achronymes = $request->input('achronymes');
			$equipe->axes_recherche = $request->input('axes_recherche');
			$equipe->chef_id = $request->input('chef_id');
			$equipe->photo = 'uploads/photo/' . $file_name;

			$equipe->save();

			return redirect('equipes/' . $id . '/details');
		} else {
			return view('errors.403', ['labo' => $labo]);
		}

	}

	public function destroy($id)
	{
		if (Auth::user()->role->nom == 'admin') {
			$equipe = Equipe::find($id);
			$equipe->delete();
			return redirect('equipes');
		}
	}

	public function articles($year = null, $equipe){
		if(!isset($year))
			$year = date('Y');

		$tmp=$year-9;
		for($i=0;$i<10;$i++){
			$t1[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Article court' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t2[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Article long' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t3[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Brevet' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t4[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Chapitre d\'un livre' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t5[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Livre' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t6[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Poster' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$t7[$i] = count(DB::select("SELECT id FROM articles WHERE annee = $tmp AND type = 'Publication(Revue)' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
			$tmp++;
		}

		$ta1 = count(DB::select("SELECT id FROM articles WHERE type = 'Article court' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta2 = count(DB::select("SELECT id FROM articles WHERE type = 'Article long' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta3 = count(DB::select("SELECT id FROM articles WHERE type = 'Brevet' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta4 = count(DB::select("SELECT id FROM articles WHERE type = 'Chapitre d\'un livre' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta5 = count(DB::select("SELECT id FROM articles WHERE type = 'Livre' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta6 = count(DB::select("SELECT id FROM articles WHERE type = 'Poster' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));
		$ta7 = count(DB::select("SELECT id FROM articles WHERE type = 'Publication(Revue)' AND id IN (SELECT article_id FROM article_user au, users u WHERE au.user_id = u.id AND u.equipe_id = $equipe)"));

		$articles = [
			'years' => [$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,$year-8,$year-9],
			'types' => [$t1,$t2,$t3,$t4,$t5,$t6,$t7],
			'typesAll' => [$ta1,$ta2,$ta3,$ta4,$ta5,$ta6,$ta7]
		];

		return json_encode($articles);
	}

	public function theses($year = null, $equipe){
		if(!isset($year))
			$year = date('Y');
		
		$b1 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b2 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-1 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b3 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-2 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b4 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-3 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b5 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-4 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b6 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-5 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b7 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-6 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b8 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-7 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b9 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-8 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));
		$b10 = count(DB::select("SELECT id FROM theses WHERE DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y') = $year-9 AND user_id IN (SELECT u.id FROM users u, equipes e WHERE u.equipe_id = $equipe)"));

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

		$thesesThesard = [
			'years' => [$year,$year-1,$year-2,$year-3,$year-4,$year-5,$year-6,$year-7,$year-8,$year-9],
			'theses' => [$b1,$b2,$b3,$b4,$b5,$b6,$b7,$b8,$b9,$b10],
			'thesards' => [$c1,$c2,$c3,$c4,$c5,$c6,$c7,$c8,$c9,$c10]
		];

		return json_encode($thesesThesard);
	}
}
