@extends('layouts.front.master')
@section('title','LRI | Home')



@section('content')


	  <br/>

    <div class="col-12" style="padding-bottom: 30px">
        <h2 class="theme-color text-center "> Détails sur l'actualité </h2>
    </div>


  <div class="container">

      <div class="card" style="margin: 0px 0px 60px 0px;">
          <img src="{{$actualite->image}}" class="card-img-top" style="height:400px;" />
          <div class="card-body">

            <p class="card-text">
              <div class="row">

                <div class="col-md-3">
                  <strong> Titre: </strong>
                </div>

                <div class="col-md-9">
                  <p class="text-muted">
                    {{$actualite->titre}}
                  </p>

                </div>
              </div>
            </p>

            <p class="card-text">
              <div class="row">

                <div class="col-md-3">
                  <strong> Résumé: </strong>
                </div>

                <div class="col-md-9">
                  <p class="text-muted">
                    {{$actualite->resume}}
                  </p>

                </div>
              </div>
            </p>

            <p class="card-text">
              <div class="row">

                <div class="col-md-3">
                  <strong> Contenu: </strong>
                </div>

                <div class="col-md-9">
                  <p class="text-muted">
                    {{$actualite->contenu}}
                  </p>

                </div>
              </div>
            </p>



            <strong><i class="margin-r-5"></i></strong>
            <hr class="border border-outline-secondary">

            <p>
            <a href="{{ route('actu.index') }}" class="btn btn-primary" style="margin-top:20px;">
              Voir d'autres actualites 
            </a>
            </p>

          </div>
      </div>

  </div>
   

  @endsection