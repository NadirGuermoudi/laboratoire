<?php

/* paying attention when typing the namespace. The name of the application is that's one named in the command by artisan */
namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Parametre;
use App\Links;
use App\User;

class ArticlesController extends Controller
{

	public function index()
	{
		$articles = Article::all();
		$labo =  Parametre::find('1');

		return view('front/articles/articles')->with([
            'labo'=>$labo,
            'articles' => $articles
        ]);
	}

	public function details($id)
    {
        $labo =  Parametre::find('1');
        $article = Article::find($id);
        $membres = Article::find($id)->users()->orderBy('name')->get();
        $contacts = Article::find($id)->contacts()->orderBy('nom')->get();


        return view('front/articles/articlesDetails')->with([
            'article' => $article,
            'labo'=>$labo,
            'contacts'=>$contacts,
            'membres'=>$membres
        ]);;
    }

    function action(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = Article::where('titre','LIKE','%'.$query.'%')
                    ->orWhere('resume','LIKE','%'.$query.'%')
                    ->orWhere('type','LIKE','%'.$query.'%')
                    ->get();

            } else {
                $data = Article::all();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $article) {
                    $output .= '<div class="col-md-4 fadeInLeft animated">
                    <div class="card bg-light border-secondary "
                         style="height:15rem; width:23rem; margin: 0px 0px 20px 0px;">
                        <div class="card-header bg-light border-secondary" style="height:5rem;">
                            <h6> '. $article->titre.' </h6>
                        </div>
                        <div class="card-body text-success border-secondary ">
                            <h6 class="card-title">
                                Type: '.$article->type.' </h6>
                            <p class="card-text">
                                année: '. $article->annee .'
                            </p>

                        </div>

                        <div class="card-footer bg-transparent border-success">

                            <a href="'.url("/front/articles/".$article->id."/details").'" class="btn btn-primary ">
                                Lire plus </a>

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




