<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Parametre;

class AproposController extends Controller
{
	public function index()
	{
		$labo = Parametre::find('1');
		return view('front/apropos', compact('labo'));
	}
}
