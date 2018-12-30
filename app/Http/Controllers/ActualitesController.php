<?php

namespace App\Http\Controllers;

use App\Actualite;
use App\Parametre;
use Auth;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$labo = Parametre::find('1');

		$actualites = Actualite::latest()->paginate(5);
					return view('parametre.actualite.index', compact('actualites','labo'))->with('i', (request()->input('page',1)-1)*5);

		return view('parametre/actualite/index', compact('labo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('parametre.actualite.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		
		// var_dump($request->except('_token')); die;

		$request->validate([
						'titre' => 'required',
						'image' => 'required',
						'resume' => 'required'
					]); 
					
					Actualite::create($request->except('_token'));
					return redirect()->route('actualites.index')-> with('success', 'l\' actualité a été créé avec succès ');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function show(Actualite $actualite)
	{
					return view('article.detail', compact('actualite'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Actualite $actualite)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Actualite $actualite)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Actualite $actualite)
	{

					if(Auth::user()->role->nom == 'admin'){
						Actualite::destroy($actualite->id);
						return redirect()->route('actualites.index')->with('success', 'Vous avez supprimé une actualité');
					}
	}
}


