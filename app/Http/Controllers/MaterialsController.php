<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Material;
use App\MaterialCategorie;
use Illuminate\Http\Request;
use App\Parametre;
use Auth;
// use App\
// use App\User;
// use App\Equipe;

class MaterialsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function category(){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			return view('material/category', compact('labo'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	public function addCategory(Request $request){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, ['category' => 'required|min:2']);
			$category = new MaterialCategorie(['name' => $request->category]);
			$category->save();
			return redirect(route('materials.create'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	public function borrowed(){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$materials = DB::select("
				SELECT m.id AS id, category, numero, CONCAT(u.name, ' ',u.prenom) AS par, DATE_FORMAT(date_rendre, '%d/%m/%Y') date_rendre, DATEDIFF(date_rendre, NOW()) AS jours_restants
				FROM materials m, users u, user_material um
				WHERE um.date_rendement IS NULL AND u.id = um.user_id AND m.id = um.material_id
				UNION 
				SELECT m.id AS id, category, numero, e.achronymes AS par, DATE_FORMAT(date_rendre, '%d/%m/%Y') date_rendre, DATEDIFF(date_rendre, NOW()) AS jours_restants
				FROM materials m, equipes e, equipe_material em 
				WHERE em.date_rendement IS NULL AND e.id = em.equipe_id AND m.id = em.material_id
				");

			return view('material/borrowed', compact('labo', 'materials'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	public function borrow(){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$users = DB::select("SELECT id, CONCAT(name,' ', prenom) name FROM users");
			$equipes = DB::select("SELECT id, achronymes FROM equipes");
			$materials = DB::select("
				SELECT m.id id, CONCAT(category,' | ', numero) AS name
				FROM materials m
				WHERE empruntable = 1 AND  m.id NOT IN (
					SELECT material_id FROM equipe_material WHERE date_rendement IS NULL
					UNION
					SELECT material_id FROM user_material WHERE date_rendement IS NULL )
				");
			return view('material/borrow', compact('labo', 'materials', 'users', 'equipes'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	public function borrowing(Request $request){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, [
				'borrower' => 'required', 
				'material' => 'required',
				'date_rendre' => 'required'
			]);
			if($request->borrower == 'equipe'){
				$this->validate($request, [
					'equipe' => 'required',
				]);
				DB::insert("
					INSERT INTO equipe_material(material_id,equipe_id,date_emprunt,date_rendre) VALUES(:material,:equipe,NOW(),:rendre)",[
						'material' => $request->material,
						'equipe' => $request->equipe,
						'rendre' => date('Y-m-d',strtotime(str_replace('/', '-', $request->date_rendre))),
					]);
				return redirect(route('materials.borrowed'));
			}

			if($request->borrower == 'user'){
				$this->validate($request, [
					'user' => 'required',
				]);
				DB::insert("
					INSERT INTO user_material(material_id,user_id,date_emprunt,date_rendre) VALUES(:material,:user,NOW(),:rendre)",[
						'material' => $request->material,
						'user' => $request->user,
						'rendre' => date('Y-m-d',strtotime(str_replace('/', '-', $request->date_rendre))),
					]);
				return redirect(route('materials.borrowed'));
			}
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	public function history($id){
		$labo = Parametre::find('1');
		$material = Material::find($id)->first();
		$history = DB::select("
			SELECT CONCAT(u.name, ' ', u.prenom) AS par, DATE_FORMAT(date_emprunt, '%d/%m/%Y') date_emprunt, DATE_FORMAT(date_rendre, '%d/%m/%Y') date_rendre, DATE_FORMAT(date_rendement, '%d/%m/%Y') date_rendement
			FROM users u, user_material um 
			WHERE u.id = um.user_id AND um.material_id = $id
			UNION
			SELECT e.achronymes AS par, DATE_FORMAT(date_emprunt, '%d/%m/%Y') date_emprunt, DATE_FORMAT(date_rendre, '%d/%m/%Y') date_rendre, DATE_FORMAT(date_rendement, '%d/%m/%Y') date_rendement
			FROM equipes e, equipe_material em
			WHERE e.id = em.equipe_id AND em.material_id = $id
			");
		return view('material/history', compact('labo', 'material', 'history'));
	}

	public function return($id){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$materialTmp = DB::table('user_material')
													->whereMaterialId($id)
													->whereDateRendement(null)
													->update(['date_rendement' => date('Y-m-d H:i:s', time())]);
			
			$materialTmp2 = DB::table('equipe_material')
													->whereMaterialId($id)
													->whereDateRendement(null)
													->update(['date_rendement' => date('Y-m-d H:i:s', time())]);

			return redirect(route('materials.borrowed'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$labo = Parametre::find('1');
		$materials = Material::all();
		return view('material/index', compact('labo','materials'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$MaterialCategories = MaterialCategorie::all();
			return view('material/create', compact('labo','MaterialCategories'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, [
				'category' => 'required|min:2',
				'numero' => 'required|min:2',
				'prix' => 'numeric',
			]);

			Material::create([
				'category' => $request->category,
				'numero' => $request->numero,
				'empruntable' => isset($request->empruntable) ? true : false,
				'prix' => intval($request->prix),
			]);

			return redirect(route('materials.index'));
			// return redirect()->route('materials.index');
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Material  $material
	 * @return \Illuminate\Http\Response
	 */
	public function show(Material $material)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Material  $material
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Material $material)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$mat = Material::findOrFail($material)->first();
			$MaterialCategories = MaterialCategorie::all();
			return view('material/edit', compact('labo', 'mat', 'MaterialCategories'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Material  $material
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Material $material)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, [
				'category' => 'required|min:2',
				'numero' => 'required|min:2',
				'prix' => 'numeric',
			]);

			$materialTmp = Material::findOrFail($material)->first();

			$materialTmp->update([
				'category' => $request->category, 
				'numero' => $request->numero,
				'empruntable' => isset($request->empruntable) ? true : false,
				'prix' => intval($request->prix),
			]);

			return redirect(route('materials.index'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Material  $material
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Material $material)
	{
		if(Auth::user()->role->nom == 'admin'){
			Material::destroy($material->id);
			return redirect()->route('materials.index');
		}
	}
}
