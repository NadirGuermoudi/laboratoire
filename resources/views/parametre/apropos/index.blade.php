@extends('layouts.master', ['active' => 'parametre'])

@section('title','LRI | Paramètres')

@section('header_page')
	<h1>Paramètres</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('parametre.index')}}"></i> Paramètres </a></li>
		<li class="active"><a href="{{route('parametre.index')}}">A propos</a></li>
	</ol>
@endsection

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title"> A Propos </h3>
		</div>
	</div>
	
	@include('layouts/partials/_menuParametre')

	<div class="row">
		<form class="well form-horizontal" action=" {{url('apropos')}}" method="post"  id="contact_form" enctype="multipart/form-data">
			@csrf
			<fieldset>
				<div class="form-group" style="padding-top: 20px">
					<label class="col-md-4 control-label">Image 1</label>  
					<div class="col-md-8 inputGroupContainer">
						<input name="image1" type="file" accept="image/*">
					</div>
				</div>

				<div class="form-group" style="padding-top: 20px">
					<label class="col-md-4 control-label">Image 2</label>  
					<div class="col-md-8 inputGroupContainer">
						<input name="image2" type="file" accept="image/*">
					</div>
				</div>

				<div class="form-group" style="padding-top: 20px">
					<label class="col-md-4 control-label">Image 3</label>  
					<div class="col-md-8 inputGroupContainer">
						<input name="image3" type="file" accept="image/*">
					</div>
				</div>

				<div class="form-group" style="padding-top: 20px">
					<label class="col-md-4 control-label">Contenu (HTML):</label>
					<div class="col-md-8 inputGroupContainer">
						<textarea name="contenu" class="form-control" rows="10" type="text">{{$labo->apropos}}</textarea>
					</div>
				</div>				

			</fieldset>

			<div style="padding-top: 30px; margin-left: 35%;">
				<a href="{{url('parametre')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
				<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
			</div>
		</form>
	</div>

</div>
@endsection