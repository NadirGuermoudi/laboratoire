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


	<div class="row">
	      <div class="col-md-12">
	           <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title"> Informations sur l'actualité </h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	            </div>





</div>