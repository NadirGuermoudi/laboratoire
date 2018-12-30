<?php

namespace App\Http\Controllers;

use App\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parametre;
use Auth;

class PartenaireController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$labo = Parametre::find('1');
		$partenaires = Partenaire::all();
		return view('partenaire/index', compact('labo','partenaires'));
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
			return view('partenaire/create', compact('labo'));
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
				'name' => 'required|min:2',
				'type' => 'required|min:4',
				'pays' => 'required|min:2',
				'ville' => 'required|min:2',
				'email' => 'email',
			]);

			Partenaire::create([
				'name' => $request->name,
				'type' => $request->type,
				'pays' => $request->pays,
				'ville' => $request->ville,
				'adresse' => $request->adresse,
				'email' => $request->email,
				'telephone' => $request->telephone,
			]);

			return redirect(route('partenaires.index'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Partenaire  $partenaire
	 * @return \Illuminate\Http\Response
	 */
	public function show(Partenaire $partenaire)
	{
		$labo = Parametre::find('1');
		$par = Partenaire::findOrFail($partenaire)->first();

		return view('partenaire/show', compact('labo', 'par'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Partenaire  $partenaire
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Partenaire $partenaire)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$par = Partenaire::findOrFail($partenaire)->first();
			return view('partenaire/edit', compact('labo', 'par'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Partenaire  $partenaire
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Partenaire $partenaire)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, [
				'name' => 'required|min:2',
				'type' => 'required|min:4',
				'pays' => 'required|min:2',
				'ville' => 'required|min:2',
				'email' => 'email',
			]);

			$partenaireTmp = Partenaire::findOrFail($partenaire)->first();

			$partenaireTmp->update([
				'name' => $request->name,
				'type' => $request->type,
				'pays' => $request->pays,
				'ville' => $request->ville,
				'adresse' => $request->adresse,
				'email' => $request->email,
				'telephone' => $request->telephone,
			]);

			return redirect(route('partenaires.index'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Partenaire  $partenaire
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Partenaire $partenaire)
	{
		if(Auth::user()->role->nom == 'admin'){
			Partenaire::destroy($partenaire->id);
			return redirect()->route('partenaires.index');
		}
	}
}
