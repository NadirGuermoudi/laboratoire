@extends('../../layouts.front.master')

@section('title','LRI | Informations sur l\'article')

@section('header_page')

      <h1>
        Projets
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('projets')}}">Projets</a></li>
      </ol>

@endsection

@section('content')
  
  <br/>

	<div class="col-12" style="padding-bottom: 30px">
      <h2 class="theme-color text-center "> Informations sur l'article </h2>
  </div>


<div class="container">



          <div class="card" style="margin: 0px 0px 60px 0px;">
              <div class="card-header">
                Informations:
              </div>
              <div class="card-body">
                <h5 class="card-title"> 
                  {{$article->titre}}
                </h5>

                <p class="card-text">
                  <div class="row" style="margin:10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> Type: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->type}}
                      </p>

                    </div>
                  </div>
                </p>


                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> Résumé: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->resume}}
                      </p>

                    </div>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr class="border border-outline-secondary">


                  <div class="row" style="margin: 18px 0px 25px 0px;" >

                    <div class="col-md-3">
                      <strong>
                        <i class="fa fa-group  margin-r-5"></i> Membres internes: 
                      </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        @foreach($membres as $membre)
                        <ul>
                            <li><a href="{{url('front/membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                        </ul>
                        @endforeach
                      </p>

                    </div>
                  </div>


                  <strong><i class="margin-r-5"></i></strong>
                  <hr class="border border-outline-secondary">



                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> Nom de la conférence: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->conference}}
                      </p>

                    </div>
                  </div>


                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> Nom du journal: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->journal}}
                      </p>

                    </div>
                  </div>


                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> ISSN: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->ISSN}}
                      </p>

                    </div>
                  </div>


                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> ISBN: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->ISBN}}
                      </p>

                    </div>
                  </div>


                  <strong><i class="margin-r-5"></i></strong>
                  <hr class="border border-outline-secondary">


                  <div class="row" style="margin: 10px 0px 5px 0px;" >

                    <div class="col-md-3">
                      <strong> <i class="fa fa-map-marker  margin-r-5"></i> Lieu: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->lieu_ville}}, {{$article->lieu_pays}}
                      </p>

                    </div>
                  </div>

                  <strong><i class="margin-r-5"></i></strong>
                  <hr class="border border-outline-secondary">


                  <div class="row" style="margin: 18px 0px 25px 0px;" >

                    <div class="col-md-3">
                      <strong> <i class="fa fa-calendar margin-r-5"></i> Date: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->date}}
                      </p>

                    </div>
                  </div>


                  <strong><i class="margin-r-5"></i></strong>
                  <hr class="border border-outline-secondary">



                  <div class="row" style="margin: 18px 0px 25px 0px;" >

                    <div class="col-md-3">
                      <strong> <i class="fa  fa-link  margin-r-5"></i> DOI: </strong>
                    </div>

                    <div class="col-md-9">
                      <p class="text-muted">
                        {{$article->doi}}
                      </p>

                    </div>
                  </div>




                  <a href="{{ route('articles-front') }}" class="btn btn-primary">
                   Voir autres articles 
                  </a>

              </div>
          </div>




@endsection