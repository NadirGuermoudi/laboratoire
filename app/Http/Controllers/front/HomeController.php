<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Actualite;
use App\User;
use App\Parametre;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $labo =  Parametre::find('1');
        $actualites = Actualite::latest()->paginate(3);
        return view('front/index')->with([
            'labo'=>$labo,
            'actualites'=>$actualites
        ]);
    }

    public function action($last_id)
    {
        // $request->validate([
        //                 'last_id' => 'required'
        //             ]); 

        // return view('front/projets/projets');


        $actualites = DB::select('SELECT * 
            FROM actualites  
            WHERE id < ' . $last_id . ' ORDER BY id DESC LIMIT 0,8 ');
            // DD($actualites);

        foreach ($actualites as $actualite) {
            echo '<div class="row post" id="' .$actualite->id. '">

                <div class="col-md-3 ">
                 
                   <img src="'.$actualite->image. '" class="card-img-top " alt="image" style="width:300px; height:200px;">
                </div>

                <div class="card col-md-8 " style="margin: 0px 0px 30px 60px; height:200px;" >
                    
                    <div class="card-body">
                        <h5 class="card-title"> 
                            '.$actualite->titre.'
                        </h5>
                        <p class="card-text">
                            '.$actualite->resume.'
                        </p>
                        <small class="text-muted" style="bottom:105px;">
                            Last updated '.$actualite->created_at.'  <br/> <br/>
                        </small>

                        <a href="actu/'.$actualite->id.'" class="btn btn-primary"  >
                         Lire plus 
                        </a>
                        

                    </div>

                </div>
            </a>
        </div>';
        
        }



    }

    /**
     * Show the form for creating a new resource.
     *public function action()
     {
    
     }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labo = Parametre::find('1');
        $actualite = Actualite::find($id);

        return view('front.details')->with([
            'labo'=>$labo,
            'actualite'=>$actualite
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}