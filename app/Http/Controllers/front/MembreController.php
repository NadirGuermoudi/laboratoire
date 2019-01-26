<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Parametre;
use App\Equipe;
use App\Role;
use Illuminate\Support\Facades\Input;

class MembreController extends Controller
{
    public function index()
    {
        $labo = Parametre::find('1');
        $q = Input::get('search');
        $membres = User::all();
        return view('front/membres/membre', compact('membres', 'q', 'labo'));
    }

    public function details($id)
    {
        $membre = User::find($id);
        $equipes = Equipe::all();
        $roles = Role::all();
        $labo = Parametre::find('1');

        return view('front.membres.membreDetails', compact('membre', 'equipes', 'roles', 'labo'));
    }

    /*public function search()
    {

        $q = Input::get('search');
        $labo = Parametre::find('1');

        $membres = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('prenom', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->orWhere('grade', 'LIKE', '%' . $q . '%')->get();
        $nbrResultatTrouver = User::where('name', 'LIKE', '%' . $q . '%')->orWhere('prenom', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->orWhere('grade', 'LIKE', '%' . $q . '%')->get()->count();
        return view('front/membres/membre', compact('membres', 'q', 'nbrResultatTrouver', 'labo'));

    }*/

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = User::where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('prenom', 'LIKE', '%' . $query . '%')
                    ->orWhere('email', 'LIKE', '%' . $query . '%')
                    ->orWhere('grade', 'LIKE', '%' . $query . '%')
                    ->get();

            } else {
                $data = User::all();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                               
                            <div class="col-lg-3 col-md-3 col-sm-6 sm-mb-30 fadeInLeft animated" style="padding-bottom: 20px">
                                    <div class="team team-round-shadow border">
                                    <div class="team-photo">
                                    <img style="height: 100px; width: 100px;" class="img-fluid center-block"
                                         src="' . asset($row->photo) . '" alt="">
                                </div>
                                <div class="team-description">
                                    <div class="team-info">
                                        <h6>
                                            <a href="'.url("/front/membres/".$row->id."/details").'">  ' . $row->name . '</a>
                                        </h6>
                                        <span>' . $row->grade . '</span>
                                    </div>
                                    <div class="team-contact">
                                        <span class="email">' . $row->email . '</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                                ';
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
