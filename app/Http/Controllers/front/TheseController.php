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
        $labo = Parametre::find('1');
        $q = Input::get('search');

        return view('front.theses.these', compact('theses', 'labo', 'q'));
    }

    public function details($id)
    {
        $these = These::find($id);
        $labo = Parametre::find('1');

        return view('front.theses.theseDetails', compact('these', 'labo'));
    }

    /*public function search()
    {
        $labo = Parametre::find('1');
        $q = Input::get('search');
        $theses = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->orWhere('date_soutenance', 'LIKE', '%' . $q . '%')->get();
        $nbrResultatTrouver = These::where('titre', 'LIKE', '%' . $q . '%')->orWhere('sujet', 'LIKE', '%' . $q . '%')->orWhere('date_soutenance', 'LIKE', '%' . $q . '%')->get()->count();

        return view('front.theses.these', compact('theses', 'labo', 'q', 'nbrResultatTrouver', 'l'));
    }*/

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query != '') {
                $data = These::where('titre', 'LIKE', '%' . $query . '%')
                    ->orWhere('sujet', 'LIKE', '%' . $query . '%')
                    ->orWhere('date_soutenance', 'LIKE', '%' . $query . '%')
                    ->get();;

            } else {
                $data = These::all();
            }

            $total_row = $data->count();

            if ($total_row > 0) {
                foreach ($data as $these) {
                    $output .= '<div class="col-md-6" style="padding-bottom: 30px">
                            <div class="card-content">
                                <div class="card-desc card">
                                    <a href="'.url("front/theses/".$these->id."/details").'"><h5
                                                class="card-header text-center theme-bg text-white">'.$these->titre.'</h5>
                                    </a>
                                    <div class="row" style="padding-top: 10px">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span> <strong> These portant sur :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            '.$these->sujet.'
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Doctorant :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <a href="'.url("front/membres/".$these->user_id."/details").'">'.$these->user->name.' '.$these->user->prenom.'</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Encadreur de la these :</strong></span>
                                        </div>
                                        <div class="col-6">
                                           
                                                <span style="display: block;">'. $these->encadreur_int.'</span>
                                                <span>'.$these->encadreur_ext.'</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Co-encadreur de la these :</strong></span>
                                        </div>
                                        <div class="col-6">
                                                <span style="display: block;">'.$these->coencadreur_int.'</span>
                                                <span>'.$these->coencadreur_ext.'</span>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 10px;">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Date de soutenance :</strong></span>
                                        </div>
                                        <div class="col-6">
                                                <span>'.$these->date_soutenance.'</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
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
