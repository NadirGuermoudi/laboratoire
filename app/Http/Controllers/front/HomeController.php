<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actualite;
use App\Parametre;
use App\User;

use App\Links;

class HomeController extends Controller
{

    public function index()
    {
        $labo =  Parametre::find('1');
        $actualites = Actualite::all();

        return view('front/index')->with([
            'labo'=>$labo,
            'actualites'=>$actualites
        ]);
    }

    

}



?>