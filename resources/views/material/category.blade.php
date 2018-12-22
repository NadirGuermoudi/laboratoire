@extends('layouts.master', ['active' => 'materials'])

@section('title','LRI | Liste des matériels')

@section('header_page')
	<h1>Matériels</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('materials.index')}}">Matériels</a></li>
		<li class="active"><a href="{{route('materials.category')}}">Catégorie</a></li>
	</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
	<div class="box col-xs-12">
	  <div class="container">
		  <div class="row">
				<div class="box-header col-xs-12">
					<h3 class="box-title">Catégorie</h3>
				</div>
		  </div>

		  <div class="btn-group col-md-12" role="group" aria-label="Basic example">
		  	<a href="{{ route('materials.index') }}" class="btn btn-primary btn-sm"><b>Liste des matériaux</b></a>
		  	<a href="{{ route('materials.borrowed') }}" class="btn btn-primary btn-sm"><b>Liste des matériaux empruntés</b></a>
		  	@if(Auth::user()->role->nom == 'admin')
		  	<a href="{{ route('materials.borrow') }}" class="btn btn-primary btn-sm"><b>Emprunter un matériel</b></a>
		  	<a href="{{route('materials.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Matériel</b></a>
		  	<a href="{{route('materials.category')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Catégorie</b></a>
	  		@endif
		  </div>

		  <br>
		  <hr>
		  <div class="col-md-12">
			<form action="{{ route('materials.addCategory') }}" method="POST">
					@csrf

					<fieldset>
						<div class="form-group">
							<label class="col-md-3 control-label">Categorie (*)</label>  
							<div class="col-md-9 inputGroupContainer input-group Date">
								<div style="width: 70%">
							  <input name="category" type="text" class="form-control pull-right" value="{{old('category')}}">
								</div>
							</div>
					  </div>
					</fieldset>

					<div class="row" style="padding-top: 30px; margin-left: 35%;">
						<a href="{{route('materials.create')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
						<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Ajouter</button><br><br>
					</div>
				</form>		  
	  		</div>

	  </div>
		
	</div>
  </div>
</div>
@endsection