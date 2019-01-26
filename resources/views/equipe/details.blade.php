@extends('layouts.master', ['active' => 'equipes'])

 @section('title','LRI | Détails equipe')

@section('header_page')

       <h1>
        Equipes
        <small>Détails</small>
      </h1>
        <ol class="breadcrumb">
          <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="{{url('equipes')}}">Equipes</a></li>
          <li class="active">Détails</li>
        </ol>

@endsection

@section('content')
	<div class="row">

    <div class="col-md-8">
      <div class="nav-tabs-custom">
       <ul class="nav nav-tabs">
          <li class="active"><a href="#apropos" data-toggle="tab">A propos</a></li>
          @if(Auth::user()->role->nom == 'admin' )
          <li><a href="#modifier" data-toggle="tab">Modifier</a></li>
          @endif
          <li><a href="#statistique" data-toggle="tab" onclick="createBarPieArticles();createBarThesesThesard();">Statistiques</a></li>
        </ul>

      <div class="tab-content">
        <div class="active tab-pane" id="apropos">
          @include('equipe/apropos')
        </div>

        <div class="tab-pane" id="modifier">
          @if(Auth::user()->role->nom == 'admin')
          @include('equipe/modifier')
          @endif
        </div>

        <div class="tab-pane" id="statistique">
          @include('equipe/statistique')
        </div>

      </div>
      </div>
    </div>

    <div class="col-md-4">
      <!-- USERS LIST -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Membres de l'équipe</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            @foreach($membres as $membre)
            <li>
              <img src="{{asset($membre->photo)}}" alt="User Image">
              <a class="users-list-name" href="{{url('membres/'.$membre->id.'/details')}}">{{$membre->name}}</a>
              <span class="users-list-date">{{$membre->prenom}}</span>
            </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
      </div>
      <!--/.box -->
    </div>

    <!-- timeLine start -->

    </div>
@endsection