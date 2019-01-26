@extends('layouts.master', ['active' => 'parametre'])

@section('title','LRI | Paramètres')

@section('header_page')
	<h1>Paramètres</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('parametre.index')}}"></i> Paramètres </a></li>
		<li class="active"><a href="{{route('parametre.index')}}">Informations du Laboratoire</a></li>
	</ol>
@endsection

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title"> Actualités </h3>
		</div>
	</div>


	<div class="row">
	      <div class="col-md-12">
	           <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"> Informations sur l'actualité </h3>
	            </div>
	            {{-- box-header  --}}
	            <div class="box-body">

	            	

	            	  <div class="row">
	            	    <div class="col-md-3">
	            	      <strong>Image</strong>
	            	    </div>
	            	    <div class="col-md-9">
	            	        <img src="{{$actualite->image}}" style="width:100px; height:100px;"class="img-fluid" alt="Responsive image img-thumbnail"> 
	            	    </div>
	            	    </div>

	            	    <div class="row">
	            	      <div class="col-md-3">
	            	        <strong>Résumé</strong>
	            	      </div>
	            	      <div class="col-md-9">
	            	        <p class="text-muted">
	            	          {{$actualite->resume}}
	            	        </p>
	            	      </div>
	            	      </div>

	            	      <div class="row">
	            	        <div class="col-md-3">
	            	          <strong>contenu</strong>
	            	        </div>
	            	        <div class="col-md-9">
	            	          <p class="text-muted">
	            	            {{$actualite->contenu}}
	            	          </p>
	            	        </div>
	            	        </div>

	            	        <div class="row">
	            	          <div class="col-md-3">
	            	            <strong>Créé le</strong>
	            	          </div>
	            	          <div class="col-md-9">
	            	            <p class="text-muted">
	            	              {{$actualite->created_at}}
	            	            </p>
	            	          </div>
	            	          </div>

	            	          <div class="row">
	            	            <div class="col-md-3">
	            	              <strong>Mis à jour le</strong>
	            	            </div>
	            	            <div class="col-md-9">
	            	              <p class="text-muted">
	            	                {{$actualite->updated_at}}
	            	              </p>
	            	            </div>
	            	            </div>




	            </div>


	        </div>
	    </div>
	</div>

</div>

@endsection
