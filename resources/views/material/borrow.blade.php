@extends('layouts.master', ['active' => 'materials'])

@section('title','LRI | Liste des matériels')

@section('header_page')
	<h1>Matériels</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><a href="{{route('materials.index')}}">Matériels</a></li>
		<li class="active"><a href="{{route('materials.borrowed')}}">Emprunter</a></li>
	</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
	<div class="box col-xs-12">
	  <div class="container">
		  <div class="row">
				<div class="box-header col-xs-12">
					<h3 class="box-title">Emprunter un matériel</h3>
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
		  <br>
		  <hr>
		  <div class="col-md-12">
			<form action="{{ route('materials.borrowing') }}" method="POST">
					@csrf

					<fieldset>
						<div class="form-group">
							<div class="col-xs-12 inputGroupContainer @if($errors->get('numero')) has-error @endif">
								<div style="width: 70%">
									<center>
									<input  name="borrower" class="flat-red" placeholder="" type="radio" value="user" checked>
									<label for="equipe">Membre</label>
									<input  name="borrower" class="flat-red" placeholder="Numéro" type="radio" value="equipe">
									<label for="equipe">Equipe</label>
									</center>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group ">
							<label class="col-xs-3 control-label">Material (*)</label>
							<div class="col-xs-9 inputGroupContainer @if($errors->get('material')) has-error @endif">
								<div style="width: 70%">
									<select name="material" class="form-control select2" value="{{old('material')}}">
									<option></option>
										@foreach($materials as $material)
											<option value="{{ $material->id }}">{{ $material->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group ">
							<label class="col-xs-3 control-label">Membre (*)</label>
							<div class="col-xs-9 inputGroupContainer @if($errors->get('user')) has-error @endif">
								<div style="width: 70%">
									<select name="user" class="form-control select2" value="{{old('user')}}">
									<option></option>
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group ">
							<label class="col-xs-3 control-label">Equipe (*)</label>
							<div class="col-xs-9 inputGroupContainer @if($errors->get('equipe')) has-error @endif">
								<div style="width: 70%">
									<select name="equipe" class="form-control select2" value="{{old('equipe')}}">
									<option></option>
										@foreach($equipes as $equipe)
											<option value="{{ $equipe->id }}">{{ $equipe->achronymes }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label class="col-md-3 control-label">Date De Rendre (*)</label>  
							<div class="col-md-9 inputGroupContainer input-group Date">
								<div style="width: 70%">
							  <input name="date_rendre" type="text" class="form-control pull-right" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datepicker" value="{{old('date_rendre')}}">
								</div>
							</div>
					  </div>
					</fieldset>

					<div class="row" style="padding-top: 30px; margin-left: 35%;">
						<a href="{{route('materials.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
						<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Emprunter</button><br><br>
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