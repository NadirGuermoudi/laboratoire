<?php

namespace App\Http\Controllers;

use App\Actualite;
use App\Parametre;
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
		return view('parametre/actualite/index', compact('labo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Actualite  $actualite
	 * @return \Illuminate\Http\Response
	 */
	public function show(Actualite $actualite)
	{
		//
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
		//
	}
}
