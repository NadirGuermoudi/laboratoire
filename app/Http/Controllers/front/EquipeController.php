<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\equipeRequest;
use Illuminate\Support\Facades\DB;
use App\Parametre;
use App\Equipe;
use App\User;
use App\Projet;
use Auth;
use Illuminate\Support\Facades\Input;

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::all();
        $q = Input::get('search');
        $labo = Parametre::find('1');

        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();

        return view('front.equipe.equipe', compact('labo'));
    }

    public function details($id)
    {
        $labo = Parametre::find('1');
        $equipe = Equipe::find($id);
        $membres = User::where('equipe_id', $id)->get();
        $projet = Projet::where('chef_id',$equipe->chef->id)->get();

        return view('front.equipe.equipeDetails')->with([
            'equipe' => $equipe,
            'membres' => $membres,
            'labo' => $labo,
            'projet' => $projet,

        ]);
    }

    public function search()
    {
        $labo = Parametre::find('1');

        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();

        $q = Input::get('search');

        $equipes = Equipe::where('intitule', 'LIKE', '%' . $q . '%')
            ->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get();

        $nbrResultatTrouver = Equipe::where('intitule', 'LIKE', '%' . $q . '%')
            ->orWhere('achronymes', 'LIKE', '%' . $q . '%')->get()->count();
        return view('front.equipe.equipe', compact('labo', 'equipes', 'nbr', 'q', 'nbrResultatTrouver', 'l'));

    }

    function action(Request $request)
    {
        $nbr = DB::table('users')
            ->select(DB::raw('count(*) as total,equipe_id'))
            ->groupBy('equipe_id')
            ->get();
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Equipe::where('intitule', 'LIKE', '%' . $query . '%')
                    ->orWhere('achronymes', 'LIKE', '%' . $query . '%')->get();

            } else {
                $data = Equipe::all();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $equipe) {
                    foreach ($nbr as $nbrs) {
                        if ($nbrs->equipe_id == $equipe->id) {

                            $output .= '<div class="col-12 col-md-6">


                                <div class="col-12 col-md-12" style="padding-right: 30px;padding-bottom: 30px;">
                                    <div class="box box-widget widget-user ">
                                        <div class="row card ">
                                            <div class="col-12 text-center card-header "
                                                 style="background-color: #dff0d8;">
                                                <div class="widget-user-header text-center">
                                                    <a class="users-list-name1 "
                                                       href="'.url("/front/equipes/".$equipe->id."/details").'"><h5
                                                                class="widget-user-username timeline-header">' . $equipe->intitule . '
                                                            ( ' . $equipe->achronymes . ' ) </h5 >
                                                    </a >
                                                </div >
                                            </div >


                                            <div class="col-12" style = "padding-top: padding-bottom: 30px;"
                                                 align = "center" >
                                                <h5 class="description-header" style = "padding-top: 15px" > Chef
                                                    d\'équipe</h5>
                                                <div class="widget-user-image ">
                                                    <img style="height: 80px;width: 80px;"
                                                         class="rounded-circle img-responsive border-form center-block"
                                                         src="' . asset($equipe->chef->photo) . '"
                                                         alt="User Avatar">
                                                </div>
                                                <br>
                                                <div class="description-block">

                                                    <span class="description-text"><a
                                                                href="' . url("/front/membres/" . $equipe->chef_id . "/details") . '" style="color: black"> ' . $equipe->chef->name . ' ' . $equipe->chef->prenom . '</a></span>
                                                </div>


                                            </div>
                                            
                                                    <div class="col-12 text-right float-right">
                                                        <div class="description-block text-center float-right">
                                                            <h5 class="description-header">

                                                                ' . $nbrs->total . '

                                                            </h5>
                                                            <span class="description-text">Membres</span>
                                                        </div>
                                                    </div>
                                             


                                        </div>


                                    </div>
                                    <!-- /.widget-user -->
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
