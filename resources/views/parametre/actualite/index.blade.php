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
	
	@include('layouts/partials/_menuParametre')


	@if($message=Session::get('success'))
	<div class="p-3 mb-2 bg-info text-dark">
				<p class="text-center"> {{ $message }} </p> 
	</div>
	@endif
	
	<div class="nav-tabs-custom col-md-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#Actualites" data-toggle="tab">Actualités</a></li>
			<li><a href="#ajouter" data-toggle="tab">Ajouter</a></li>
		</ul>

		<div class="tab-content">
			<div class="active tab-pane" id="Actualites">
				@include('parametre/actualite/actualites')
			</div>

			@if(Auth::user()->role->nom == 'admin')
			<div class="tab-pane" id="ajouter">
				@include('parametre/actualite/create')
			</div>
			@endif

		</div><!-- /.tab-content -->

	</div><!-- fin nav-tabs-custom -->
</div>
@endsection