<?php

namespace App\Http\Controllers;

use App\Actualite;
use App\Parametre;
use Auth;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
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

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		if(Auth::user()->role->nom == 'admin'){
			return view('parametre.actualite.create');
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
		
		// var_dump($request->except('_token')); die;
		if(Auth::user()->role->nom == 'admin'){
			$request->validate([
							'titre' => 'required',
							'image' => 'required',
							'resume' => 'required'
						]); 

			if($request->hasFile('image')){
			    $file = $request->file('image');
			    $file_name = time().'.'.$file->getClientOriginalExtension();
			    $file->move(public_path('/uploads/photo'),$file_name);

			}
			else{
			    $file_name="userDefault.png";
			}
						
			// Actualite::create($request->except('_token'));

			$actualite = new Actualite();
			$actualite->titre = $request->input('titre');
			$actualite->resume = $request->input('resume');
			$actualite->contenu = $request->input('contenu');
			/* ibrahim: the following line is fixed, i wrote /uploads.. instead 
			of uploads/... and now I can find the photo without a problem  */
			$actualite->image = '/uploads/photo/'.$file_name;
			$actualite->save();
			
			return redirect()->route('actualites.index')-> with('success', 'l\' actualité a été créé avec succès ');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function show(Actualite $actualite)
	{
			/* Note, in my methods, I */
					$labo = Parametre::find('1');
					return view('parametre.actualite.details', compact('actualite','labo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Actualite $actualite)
	{
		if(Auth::user()->role->nom == 'admin'){
			$labo = Parametre::find('1');
			return view('parametre.actualite.edit', compact('actualite', 'labo') );
		}
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
		if(Auth::user()->role->nom == 'admin'){
			$request->validate([
				'titre' => 'required',
				'image' => 'required',
				'resume' => 'required',
			]);

			/* This test is kind off useless because we put image required in the request */
			if($request->hasFile('image')){
				/* this code is for giving a unique name to the image, and putting this image
				in the specified directory */
			    $file = $request->file('image');
			    $file_name = time().'.'.$file->getClientOriginalExtension();
			    $file->move(public_path('/uploads/photo'),$file_name);

			}
			else{
			    $file_name="userDefault.png";
			}
			// $actualite = Actualite::find($id);
			$actualite->titre = $request->get('titre');
			$actualite->resume = $request->get('resume');
			$actualite->contenu = $request->get('contenu');
			$actualite->image = '/uploads/photo/'.$file_name;
			$actualite->save();

			return redirect()->route('actualites.index')-> with('success', 'l\' actualité a été mise à jour ');
		}
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


