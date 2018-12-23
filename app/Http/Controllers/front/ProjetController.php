<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Links;

class ProjetController extends Controller
{

	public function index()
	{
		return view('front/projets/projets');
	}

	
	public function validLink(Request $request)
	{
		
	}

	

}




?>