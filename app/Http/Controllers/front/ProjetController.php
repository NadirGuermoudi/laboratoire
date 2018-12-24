<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projet;
use App\Parametre;
use App\User;

use App\Links;

class ProjetController extends Controller
{

	public function index()
	{
		$projets = Projet::all();
		$membres = User::all();
		$labo =  Parametre::find('1');
		return view('front/projets/projets', ['projets'=>$projets], ['labo', $labo], ['membres'=>$membres]);
	}

	
	public function validLink(Request $request)
	{
		
	}

	

}




?>