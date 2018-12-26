<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\These;
use App\Parametre;
use App\User;
use App\Http\Requests\theseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TheseController extends Controller
{
    public function index()
    {
        $theses = These::all();
        $labo =  Parametre::find('1');
        $q = Input::get ( 'search' );

        return view('front.theses.these', compact('theses', 'labo' , 'q'));
    }

    public function details($id)
    {
        $these = These::find($id);
        $labo = Parametre::find('1');

        return view('front.theses.theseDetails', compact('these', 'labo'));
    }

    public function search()
    {
        $labo =  Parametre::find('1');
        $q = Input::get('search');
        $theses = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->orWhere('date_soutenance', 'LIKE', '%' . $q . '%')->get();
        $nbrResultatTrouver = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->orWhere('date_soutenance', 'LIKE', '%' . $q . '%')->get()->count();

        return view('front.theses.these', compact('theses', 'labo' , 'q' ,'nbrResultatTrouver','l'));
    }

}
