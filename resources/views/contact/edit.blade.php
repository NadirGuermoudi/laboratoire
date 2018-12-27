@extends('layouts.master', ['active' => 'partenaires'])

@section('title','LRI | Ajouter un contact')

@section('header_page')
	<h1>Partenaires</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('partenaires.index')}}">Partenaires</a></li>
		<li><a href="{{route('contacts.index')}}">Contacts</a></li>
		<li class="active">Modifier</li>
	</ol>
@endsection

@section('content')
	<div class="row">
	<div class="col-xs-12">
	<div class="box">
	<div class="container col-xs-12">

		<div class="row">
			<div class="box-header col-xs-12">
				<h3 class="box-title">Modifier le Contact N : {{$con->id}}</h3>
			</div>
	  </div>

		@include('layouts/partials/_menuPartenaire')

		<form class="well form-horizontal" method="POST" action="{{route('contacts.update', $con)}}" id="contact_form" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<fieldset>
			<!-- Nom du Contact -->
			<div class="form-group ">
				<label class="col-md-3 control-label">Nom *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('nom')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  name="nom" placeholder="Nom" class="form-control"  type="text" value="{{old('nom') ?? $con->nom}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Prenom *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('prenom')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input  name="prenom" placeholder="Prenom" class="form-control"  type="text" value="{{old('prenom') ?? $con->prenom}}">
					</div>
				</div>
			</div>

			<div class="form-group"> 
			<label class="col-md-3 control-label">Partenaire *</label>
				<div class="col-md-9 selectContainer @if($errors->get('partenaire')) has-error @endif">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-bars"></i></span>
						<select name="partenaire" class="form-control select2" value="{{old('partenaire') ?? $con->partenaire->name}}">
							@foreach($partenaires as $partenaire)
								<option value="{{ $partenaire->id }}">{{ $partenaire->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Fonction *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('fonction')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<input  name="fonction" placeholder="Fonction" class="form-control"  type="text" value="{{old('fonction') ?? $con->fonction}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Pays *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('pays')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="pays" placeholder="Pays" class="form-control"  type="text" value="{{old('pays') ?? $con->pays}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Ville *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('ville')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="ville" placeholder="Ville" class="form-control"  type="text" value="{{old('ville') ?? $con->ville}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Adresse</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('adresse')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="adresse" placeholder="Adresse" class="form-control"  type="text" value="{{old('adresse') ?? $con->adresse}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Email</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input  name="email" placeholder="Email" class="form-control"  type="text" value="{{old('email') ?? $con->email}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Telephone</label>
				<div class="col-md-9 inputGroupContainer @if($errors->get('telephone')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						<input  name="telephone" placeholder="Telephone" class="form-control"  type="tel" value="{{old('telephone') ?? $con->telephone}}">
					</div>
				</div>
			</div>

			</fieldset>

			<div style="padding-top: 30px; margin-left: 35%;">
				<a href="{{route('contacts.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
				<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
			</div>

		</form>
	</div>
	</div>
	</div>
	</div>
@endsection