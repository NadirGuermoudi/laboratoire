@extends('../../layouts.front.master')

@section('title','LRI | Informations sur le projet')

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

	<br/> <br/>


<div class="container">

    <div class="card" style="margin: 0px 0px 60px 0px;">
        <div class="card-header">
          Informations:
        </div>
        <div class="card-body">
          <h5 class="card-title"> {{$projet->intitule}}
          </h5>

          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong> Titre: </strong>
              </div>

              <div class="col-md-9">
                <p class="text-muted">
                  {{$projet->intitule}}
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
                  {{$projet->resume}}
                </p>

              </div>
            </div>
          </p>

          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong> Type: </strong>
              </div>

              <div class="col-md-9">
                <p class="text-muted">
                  {{$projet->type}}
                </p>

              </div>
            </div>
          </p>

          <strong><i class="margin-r-5"></i></strong>
          <hr class="border border-outline-secondary">

          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong><i class="fa fa-group  margin-r-5"></i> Partenaires: </strong>
              </div>

              <div class="col-md-9">
                <p class="text-muted">
                  {{$projet->partenaires}}
                </p>

              </div>
            </div>
          </p>

          <strong><i class="margin-r-5"></i></strong>
          <hr class="border border-outline-secondary">

          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong> <i class="fa fa-user  margin-r-5"></i> Chef du projet: </strong>
              </div>

              <div class="col-md-9">
                  <a href="{{url('front/membres/'.$projet->chef_id.'/details')}}">{{$projet->chef->name}} {{$projet->chef->prenom}}</a>

              </div>
            </div>
          </p>

          <strong><i class="margin-r-5"></i></strong>
          <hr class="border border-outline-secondary ">

          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong> <i class="fa fa-group  margin-r-5"></i> Membres du projet: </strong>
              </div>

              <div class="col-md-9">
                  @foreach($membres as $membre)
                  <ul>
                      <li><a href="{{url('front/membres/'.$membre->id.'/details')}}">{{ $membre->name }} {{ $membre->prenom }}</a></li>
                  </ul>
                  @endforeach
              </div>

            </div>
          </p>


          <strong><i class="margin-r-5"></i></strong>
          <hr class="border border-outline-secondary">


          <p class="card-text">
            <div class="row">

              <div class="col-md-3">
                <strong> Lien: </strong>
              </div>

              <div class="col-md-9">
                  <a href="#"> {{ $projet->lien }} </a>
              </div>
            </div>
          </p>

          @if($projet->detail)
          <p class="card-text">
          <div class="row">
          <div class="col-md-3">
            <strong><i class="fa fa-link  margin-r-5"></i>Details</strong>                
           </div>
            <div class="col-md-9">q
              <a href="{{asset($projet->detail)}}">Lien fichier</a>
            </div> 
          </div>
          </p> 
          @endif



          <a href="{{ route('projets-front') }}" class="btn btn-primary"> Voir autres projets </a>
        </div>
    </div>

</div>
 

@endsection