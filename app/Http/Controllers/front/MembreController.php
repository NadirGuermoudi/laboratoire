<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class MembreController extends Controller
{
    public function index()
    {
        $membres = User::all();

        return view('front/membre' , ['membres' => $membres]);
    }
}
