<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\These;
use App\Parametre;
use App\User;
use App\Http\Requests\theseRequest;
use App\Http\Controllers\Controller;

class TheseController extends Controller
{
    public function index()
    {
        $theses = These::all();
        $labo = Parametre::find('1');

        return view('front.theses.these' , ['theses' => $theses] , ['labo'=>$labo]);
    }

    public function details($id)
    {
        $these = These::find($id);
        $labo = Parametre::find('1');

        return view('front.theses.theseDetails', ['these' => $these], ['labo'=>$labo]);
    }

}
