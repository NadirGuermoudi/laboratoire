<?php
use App\User;
use App\These;
use App\Projet;
use App\Article;
use App\Equipe;
use App\Parametre;
use Illuminate\Support\Facades\Input;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontoffice
// nadir
Route::get('front/apropos', 'front\AproposController@index')->name('front.apropos');
//fin nadir
/* routes faits par ibrahim sebbane */

Route::get('/front/projets', [

    'as' => 'projets-front'	,
    'uses' => 'front\ProjetController@index'

]);

Route::get('front/recherche','front\RechercheController@index')->name('recherche_path');
Route::get('front/projets/search','front\ProjetController@action')->name('projet_search_path');

/* routes faits par ibrahim */
Route::get('front/projets/{id}/details','front\ProjetController@details');

/* routes faits par ibrahim */

Route::get('/front/articles',[

	'as' => 'articles-front' , 
	'uses' => 'front\ArticlesController@index'

]);


Route::get('front/articles/search', 'front\ArticlesController@action')->name('article_search_path');

Route::get('front/articles/{id}/details', 'front\ArticlesController@details');


//route faites par hz
/* Ibrahim: I modified the route home_path, to associate with it a controller */

Route::get('/', 'front\HomeController@index')->name('home_path');


Route::get('/front/contact', 'front\ContactController@index')->name('contact_path');
Route::post('/front/contact', 'front\ContactController@store')->name('contact_store');

Route::get('/front/membres','front\MembreController@index')->name('membres_path');
Route::get('/front/membres/search','front\MembreController@action')->name('membres_search_path');

Route::get('/front/membres/{id}/details','front\MembreController@details');

Route::get('/front/equipes','front\EquipeController@index')->name('equipes_path');
Route::get('/front/equipes/search','front\EquipeController@action')->name('equipes_search_path');
Route::get('/front/equipes/{id}/details','front\EquipeController@details');

Route::get('/front/theses','front\TheseController@index')->name('these_path');
Route::get('/front/theses/search','front\TheseController@action')->name('these_search_path');
Route::get('/front/theses/{id}/details','front\TheseController@details');


//backoffice

Route::get('/login', function () {
    return view('auth/login');
});

//nouv

Route::get('apropos', 'ParametreController@apropos')->name('parametre.apropos');
Route::post('apropos', 'ParametreController@storeApropos');

Route::get('home', 'StatistiqueController@index')->name('home');

Route::resource('actualites', 'ActualitesController');
Route::resource('actu', 'front\HomeController');
// Route::get('/{id}', 'front/HomeController@action');
Route::get('/getMoreActualites/{id}', 'front\HomeController@action');

Route::resource('partenaires', 'PartenaireController');
Route::resource('contacts', 'ContactController');

Route::get('materials/category', 'MaterialsController@category')->name('materials.category');
Route::post('materials/category', 'MaterialsController@addCategory')->name('materials.addCategory');
Route::get('materials/borrow', 'MaterialsController@borrow')->name('materials.borrow');
Route::post('materials/borrow', 'MaterialsController@borrowing')->name('materials.borrowing');
Route::get('materials/borrowed', 'MaterialsController@borrowed')->name('materials.borrowed');
Route::get('materials/history/{id}', 'MaterialsController@history')->name('materials.history');
Route::put('materials/return/{id}', 'MaterialsController@return')->name('materials.return');
Route::resource('materials', 'MaterialsController');

Route::resource('message', 'MessageController');
//fin nouv
Route::get('dashboard','dashController@index')->name('dashboard');
Route::get('parametre','ParametreController@index')->name('parametre.index');
Route::post('parametre','ParametreController@store');

Route::get('theses','TheseController@index');
Route::get('theses/create','TheseController@create');
Route::post('theses','TheseController@store')->middleware('thesecond');
Route::get('theses/{id}/details','TheseController@details');
Route::get('theses/{id}/edit','TheseController@edit');
Route::put('theses/{id}','TheseController@update');
Route::delete('theses/{id}','TheseController@destroy');

Route::get('articles','ArticleController@index');
Route::get('articles/create','ArticleController@create');
Route::post('articles','ArticleController@store');
Route::get('articles/{id}/details','ArticleController@details');
Route::get('articles/{id}/edit','ArticleController@edit');
Route::put('articles/{id}','ArticleController@update');
Route::delete('articles/{id}','ArticleController@destroy');

Route::get('membres','UserController@index');
Route::get('membres/create','UserController@create');
Route::post('membres','UserController@store');
Route::get('membres/{id}/details','UserController@details');
Route::get('trombinoscope','UserController@trombi');
Route::get('membres/{id}/edit','UserController@edit');
Route::put('membres/{id}','UserController@update');
Route::delete('membres/{id}','UserController@destroy');


Route::get('test','EquipeController@index');

Route::get('equipes','EquipeController@index');
Route::get('equipes/create','EquipeController@create');
Route::post('equipes','EquipeController@store');
Route::get('equipes/{id}/details','EquipeController@details');
Route::put('equipes/{id}','EquipeController@update');
Route::delete('equipes/{id}','EquipeController@destroy');

Route::get('projets','ProjetController@index');
Route::get('projets/create','ProjetController@create');
Route::post('projets','ProjetController@store');
Route::get('projets/{id}/details','ProjetController@details');
Route::get('projets/{id}/edit','ProjetController@edit');
Route::put('projets/{id}','ProjetController@update');
Route::delete('projets/{id}','ProjetController@destroy');

Auth::routes();

Route::get('/statistics',function(){

	$year = date('Y');
	 $a1 = DB::table('articles')->distinct('id')->where('annee',$year)->count();
	 $a2 = DB::table('articles')->distinct('id')->where('annee',$year-1)->count();
	 $a3 = DB::table('articles')->distinct('id')->where('annee',$year-2)->count();
	 $a4 = DB::table('articles')->distinct('id')->where('annee',$year-3)->count();
	 $a5 = DB::table('articles')->distinct('id')->where('annee',$year-4)->count();
	 $a6 = DB::table('articles')->distinct('id')->where('annee',$year-5)->count();
	 $a7 = DB::table('articles')->distinct('id')->where('annee',$year-6)->count();

	 $b1 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year)->count();
	 $b2 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-1)->count();
	 $b3 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-2)->count();
	 $b4 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-3)->count();
	 $b5 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-4)->count();
	 $b6 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-5)->count();
	 $b7 = DB::table('theses')->where(DB::raw("DATE_FORMAT(STR_TO_DATE(date_debut,'%m/%d/%Y'),'%Y')"),$year-6)->count();

	 //$date = new Carbon( $these->date_debut );  

	 //$t1 = DB::table('theses')->distinct('id')->where(,$year)->count();

    $annee = [$year-6,$year-5,$year-4,$year-3,$year-2,$year-1,$year];
    $article = [$a7, $a6, $a5,$a4,$a3,$a2,$a1];
    $these = [$b7, $b6, $b5,$b4,$b3,$b2,$b1];
  
	return response()->json(["annee"=>$annee,
							 "article"=> $article,
							 "these"=> $these
							]);
});

Route::any('/search',function(){

	$labo = Parametre::find('1'); 
    $q = Input::get ( 'q' );
    $membres = User::where('name','LIKE','%'.$q.'%')->orWhere('prenom','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    $theses = These::where('titre','LIKE','%'.$q.'%')->orWhere('sujet','LIKE','%'.$q.'%')->get();
    $articles = Article::where('titre','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $projets = Projet::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('type','LIKE','%'.$q.'%')->get();
    $equipes = Equipe::where('intitule','LIKE','%'.$q.'%')->orWhere('resume','LIKE','%'.$q.'%')->orWhere('achronymes','LIKE','%'.$q.'%')->get();

        // return view('search')->withDetails($user)->withQuery ( $q );
        return view('search')->with([
            'membres' => $membres,
            'theses' => $theses,
            'articles' => $articles,
            'projets' => $projets,
            'equipes' => $equipes,
            'labo'=> $labo,
            'active' => '',
        ]);
});


