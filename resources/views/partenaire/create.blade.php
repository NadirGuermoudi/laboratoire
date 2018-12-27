@extends('layouts.master', ['active' => 'partenaires'])

@section('title','LRI | Liste des partenaires')

@section('header_page')
	<h1>Partenaires</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('partenaires.index')}}">Partenaires</a></li>
		<li class="active">Nouveau</li>
	</ol>
@endsection

@section('content')
	<div class="row">
	<div class="col-xs-12">
	<div class="box">
	<div class="container col-xs-12">

		<div class="row">
			<div class="box-header col-xs-12">
				<h3 class="box-title">Nouveau Partenaire</h3>
			</div>
	  </div>

		@include('layouts/partials/_menuPartenaire')

		<form class="well form-horizontal" method="POST" action="{{route('partenaires.store')}}" id="contact_form" enctype="multipart/form-data">
			@csrf
			<fieldset>
			<!-- Nom du Partenaire -->
			<div class="form-group ">
				<label class="col-md-3 control-label">Nom *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('name')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
						<input  name="name" placeholder="Nom" class="form-control"  type="text" value="{{old('name')}}">
					</div>
				</div>
			</div>

			<div class="form-group"> 
			<label class="col-md-3 control-label">Type *</label>
				<div class="col-md-9 selectContainer @if($errors->get('type')) has-error @endif">
					<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-bars"></i></span>
						<select name="type" class="form-control selectpicker">
							<option>{{old('type')}}</option>
							<option>laboratoire</option>
							<option>entreprise</option>
							<option>administration</option>
							<option>organisme</option>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Pays *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('pays')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="pays" placeholder="Pays" class="form-control"  type="text" value="{{old('pays')}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Ville *</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('ville')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="ville" placeholder="Ville" class="form-control"  type="text" value="{{old('ville')}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Adresse</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('adresse')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
						<input  name="adresse" placeholder="Adresse" class="form-control"  type="text" value="{{old('adresse')}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Email</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('email')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input  name="email" placeholder="Email" class="form-control"  type="text" value="{{old('email')}}">
					</div>
				</div>
			</div>

			<div class="form-group ">
				<label class="col-md-3 control-label">Telephone</label>  
				<div class="col-md-9 inputGroupContainer @if($errors->get('telephone')) has-error @endif">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						<input  name="telephone" placeholder="Telephone" class="form-control"  type="tel" value="{{old('telephone')}}">
					</div>
				</div>
			</div>

			</fieldset>

			<div style="padding-top: 30px; margin-left: 35%;">
				<a href="{{route('partenaires.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
				<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Ajouter</button> 
			</div>

		</form>
	</div>
	</div>
	</div>
	</div>
@endsection