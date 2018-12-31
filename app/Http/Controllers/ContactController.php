<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Parametre;
use Auth;

class ContactController extends Controller
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
		$contacts = Contact::all();

		return view('contact/index', compact('labo','contacts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$labo = Parametre::find('1');
		$partenaires = Partenaire::all();
		if(Auth::user()->role->nom == 'admin'){
			return view('contact/create', compact('labo', 'partenaires'));
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
				'nom' => 'required|min:2',
				'prenom' => 'required|min:2',
				'partenaire' => 'required',
				'fonction' => 'required|min:2',
				'pays' => 'required|min:2',
				'ville' => 'required|min:2',
				'email' => 'email',
			]);

			Contact::create([
				'nom' => $request->nom,
				'prenom' => $request->prenom,
				'partenaire_id' => $request->partenaire,
				'fonction' => $request->fonction,
				'pays' => $request->pays,
				'ville' => $request->ville,
				'adresse' => $request->adresse,
				'email' => $request->email,
				'telephone' => $request->telephone,
			]);

			return redirect(route('contacts.index'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contact $contact)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contact $contact)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$partenaires = Partenaire::all();
			$con = Contact::findOrFail($contact)->first();
			return view('contact/edit', compact('labo', 'con', 'partenaires'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Contact $contact)
	{
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			$this->validate($request, [
				'nom' => 'required|min:2',
				'prenom' => 'required|min:2',
				'partenaire' => 'required',
				'fonction' => 'required|min:2',
				'pays' => 'required|min:2',
				'ville' => 'required|min:2',
				'email' => 'email',
			]);

			$contactTmp = Contact::findOrFail($contact)->first();

			$contactTmp->update([
				'nom' => $request->nom,
				'prenom' => $request->prenom,
				'partenaire_id' => $request->partenaire,
				'fonction' => $request->fonction,
				'pays' => $request->pays,
				'ville' => $request->ville,
				'adresse' => $request->adresse,
				'email' => $request->email,
				'telephone' => $request->telephone,
			]);

			return redirect(route('contacts.index'));
		}else{
			return view('errors.403' ,compact('labo'));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Contact  $contact
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contact $contact)
	{
		if(Auth::user()->role->nom == 'admin'){
			Contact::destroy($contact->id);
			return redirect()->route('contacts.index');
		}
	}
}
