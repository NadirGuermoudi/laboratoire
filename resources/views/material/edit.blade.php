@extends('layouts.master', ['active' => 'materials'])

@section('title','LRI | Modifier un matériel')

@section('header_page')
	<h1>Matériels</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><a href="{{route('materials.create')}}">Matériels</a></li>
		<li class="active"><a href="{{route('materials.edit', $mat->id)}}">Modifier</a></li>
	</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
	<div class="box col-xs-12">
	  <div class="container">
		  <div class="row">
				<div class="box-header col-xs-12">
					<h3 class="box-title">Liste des matériaux</h3>
				</div>
		  </div>

		  <div class="btn-group col-md-12" role="group" aria-label="Basic example">
		  	<a href="{{ route('materials.index') }}" class="btn btn-primary btn-sm"><b>Liste des matériaux</b></a>
		  	<a href="{{ route('materials.borrowed') }}" class="btn btn-primary btn-sm"><b>Liste des matériaux empruntés</b></a>
		  	@if(Auth::user()->role->nom == 'admin')
		  	<a href="{{ route('materials.borrow') }}" class="btn btn-primary btn-sm"><b>Emprunter un matériel</b></a>
		  	<a href="{{route('materials.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Matériel</b></a>
		  	<a href="{{route('materials.category')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Categorie</b></a>
	  		@endif
		  </div>

		  <div class="col-md-12">
		  <form action="{{ route('materials.update', $mat) }}" method="POST">
				@csrf
				@method('PUT')

				<fieldset>
					<legend><center><h2><b>Modifier le matériel N : {{ $mat->id }}</b></h2></center></legend><br>

					<div class="form-group ">
						<label class="col-xs-3 control-label">Libelé (*)</label>
						<div class="col-xs-9 inputGroupContainer @if($errors->get('category')) has-error @endif">
							<div style="width: 70%">
								<select name="category" class="form-control select2" value="{{ old('category') ?? $mat->category }}">
									@foreach($MaterialCategories as $categorie)
										<option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<br/>

					<div class="form-group">
					<label class="col-xs-3 control-label">Numéro (*)</label>  
						<div class="col-xs-9 inputGroupContainer @if($errors->get('numero')) has-error @endif">
							<div style="width: 70%">
								<input  name="numero" class="form-control" placeholder="Numéro" type="text" value="{{ old('numero') ?? $mat->numero }}">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-3 control-label">empruntable ?</label>
						<label class="col-xs-9 control-label" title="empruntable?">
							<input name="empruntable" type="checkbox" class="flat-red" @if($mat->empruntable) checked @endif>
						</label>
					</div>

					<div class="form-group">
					<label class="col-xs-3 control-label">Prix</label>  
						<div class="col-xs-9 inputGroupContainer @if($errors->get('prix')) has-error @endif">
							<div style="width: 70%">
								<input  name="prix" class="form-control" placeholder="Prix en DA" type="number" value="{{old('prix') ?? $mat->prix }}">
							</div>
						</div>
					</div>

				</fieldset>

				<div class="row" style="padding-top: 30px; margin-left: 35%;">
					<a href="{{route('materials.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
					<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
				</div>
			</form>
			</div>

	  </div>
		
		<!-- /.box-header -->
		
		<!-- /.box-body -->
	  </div>
  </div>
</div>
@endsection