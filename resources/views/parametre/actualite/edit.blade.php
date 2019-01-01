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
			<h3 class="box-title"> Modifier une actualité </h3>
		</div>
	</div>
	
	@include('layouts/partials/_menuParametre')




	<div class="box-body">

	<div class="col-md-12" style="padding-top: 10px;">
					<form action="{{ route( 'actualites.update', $actualite->id ) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<fieldset>
							<div class="form-group ">
								<label class="col-xs-3 control-label"> Titre (*) </label>
								<div class="col-xs-9 inputGroupContainer">
									<div style="width: 70%">
										<input name="titre" class="form-control" value="{{$actualite->titre}}" type="text" />
									</div>
								</div>
							</div>

							<div class="form-group">
							    <label class="col-md-3 control-label"> Image: </label>
							    <div class="col-md-9 inputGroupContainer">
							      <div style="width: 70%">
							        <input name="image" type="file" />
							      </div>
							    </div>
							</div>

							<div class="form-group ">
								<label class="col-xs-3 control-label"> Résumé (*) </label>
								<div class="col-xs-9 inputGroupContainer">
									<div style="width: 70%">
										<input name="resume" class="form-control" value=" {{$actualite->resume}} " type="text" />
									</div>
								</div>
							</div>

							<div class="form-group ">
								<label class="col-xs-3 control-label"> Contenu (*) </label>
								<div class="col-xs-9 inputGroupContainer">
									<div style="width: 70%">
										<input name="contenu" class="form-control" value=" {{$actualite->contenu}} " type="text" />
									</div>
								</div>
							</div>

							
						</fieldset>

						<div class="row" style="padding-top: 30px; margin-left: 35%;">
							<a href="{{route('actualites.index')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp; Annuler </a>
							<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Mettre à jour </button><br><br>
						</div>
					</form>
	</div>

	</div>

</div>



@endsection