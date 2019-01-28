<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $labo = Parametre::find('1');
        $nbr = DB::table('projet_user')
            ->select(DB::raw('count(*) as total,projet_id'))
            ->groupBy('projet_id')
            ->get();
        return view('front/projets/projets')->with([
            'labo' => $labo,
            'projets' => $projets,
            'membres' => $membres,
        ]);
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $projet = Projet::find($id);
        $membres = Projet::find($id)->users()->orderBy('name')->get();

        return view('front/projets/projetsDetails')->with([
            'projet' => $projet,
            'membres' => $membres,
            'labo' => $labo,
        ]);;
    }

    function action(Request $request)
    {
        $nbr = DB::table('projet_user')
            ->select(DB::raw('count(*) as total,projet_id'))
            ->groupBy('projet_id')
            ->get();
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Projet::where('intitule','LIKE','%'.$query.'%')->
                orWhere('resume','LIKE','%'.$query.'%')
                    ->orWhere('type','LIKE','%'.$query.'%')
                    ->orWhere('partenaires','LIKE','%'.$query.'%')
                    ->get();

            } else {
                $data = Projet::all();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $projet) {
                    foreach ($nbr as $nbrs) {
                        if ($nbrs->projet_id == $projet->id) {

                            $output .= '<div class="col-md-4">
                    <div class="card bg-light border-secondary fadeInLeft animated" data-wow-duration="4s" style="margin: 0px 0px 20px 0px; height: 16rem;">
                        <div class="card-header bg-light border-secondary">
                            <h6 class="text-center"> ' . $projet->intitule . ' </h6>
                            
                        </div>
                        <div class="card-body text-success border-secondary ">
                            <h6 class="card-title">
                                Chef: ' . $projet->chef->name . ' ' . $projet->chef->prenom . ' </h6>
                            <p class="card-text text">
                                <strong>type:</strong> ' . $projet->type . '
                                <br>
                                        <span class="text-center"><strong>Nombre de Membres :</strong></span>
                                        <span class="text-center">' . $nbrs->total . '</span><br>
                                        
                                        
                                    
                                </p>
                                
                          </div>
                           <div class="card-footer bg-transparent border-success text-center">

                            <a href="' . url("/front/projets/" . $projet->id . "/details") . '" class="btn btn-primary "> Lire
                                plus </a>

                        </div>

                        </div>

                       

                    </div>
                </div>';
                        }
                    }
                }
            } else {
                $output = '
        <div class="col-12">
        <h4 class="text-center" >Aucun Resultat Trouver !</h4>
        </div>
       ';
            }
            $data = array(
                'table_data' => $output,
                'total_data' => $total_row
            );

            echo json_encode($data);
        }
    }

}

