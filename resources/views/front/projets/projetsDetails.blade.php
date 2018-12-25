@extends('../../layouts.front.master')

@section('title','LRI | Liste des projets')

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

	<div class="card border-dark mb-3" style="max-width: 18rem;">
 		<div class="card-header">Header</div>
 		<div class="card-body text-dark">
    	<h5 class="card-title">Dark card title</h5>
    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  		</div>
	</div>


	</div>

@endsection