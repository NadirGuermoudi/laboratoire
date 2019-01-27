<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parametre;
use Auth;

class ParametreController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$labo =  Parametre::find('1');
		if(Auth::user()->role->nom == 'admin')
			{
				return view('parametre/index',['labo'=>$labo]);
			}
			else{
				return view('errors.403',['labo'=>$labo]);
			}
	}

	public function apropos(){
		$labo = Parametre::find('1');
		if(Auth::user()->role->nom == 'admin'){
			return view('parametre/apropos/index', compact('labo'));
		}else{
			return view('errors.403',['labo'=>$labo]);
		}
	}

	public function storeApropos(Request $request){
		$labo = Parametre::find('1');

		if($request->hasFile('image1')){
			$file = $request->file('image1');
			$file_name = time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'), $file_name);
			$labo->photo1 = '/uploads/photo/' . $file_name;
		}

		if($request->hasFile('image2')){
			$file = $request->file('image2');
			$file_name = time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'), $file_name);
			$labo->photo2 = '/uploads/photo/' . $file_name;
		}

		if($request->hasFile('image3')){
			$file = $request->file('image3');
			$file_name = time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'), $file_name);
			$labo->photo3 = '/uploads/photo/' . $file_name;
		}

		$labo->apropos = $request->input('contenu');

		$labo->save();

		return redirect(route('parametre.index'));
	}

	public function store(Request $request)
	{
		// $labo = new Parametre();
		$labo =  Parametre::findOrNew('1');

		if($request->hasFile('logo')){
			$file = $request->file('logo');
			$file_name = time().'.'.$file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'),$file_name);
			$labo->logo = '/uploads/photo/'.$file_name;
		}
		$labo->nom = $request->input('nom');
		$labo->telephone = $request->input('telephone');
		$labo->adress = $request->input('adress');
		$labo->email = $request->input('email');
		$labo->facebook = $request->input('facebook');
		$labo->google = $request->input('google');
		$labo->twitter = $request->input('twitter');
		$labo->youtube = $request->input('youtube');

		$labo->save();

		return redirect(route('parametre.index'));
	}
}
