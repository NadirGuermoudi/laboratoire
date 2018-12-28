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


        return view('front/articles/articlesDetails')->with([
            'article' => $article,
            'labo'=>$labo,
            'membres'=>$membres
        ]);;
    } 

	

}




?>