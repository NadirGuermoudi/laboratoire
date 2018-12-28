@extends('layouts.master', ['active' => 'parametre'])

@section('title','LRI | Paramètres')

@section('header_page')
	<h1>Paramètres</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('parametre.index')}}"></i> Paramètres</a></li>
		<li class="active"><a href="{{route('parametre.index')}}">Informations du Laboratoire</a></li>
	</ol>
@endsection

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title">Informations du Laboratoire</h3>
		</div>
	</div>
	
	@include('layouts/partials/_menuParametre')

<div class="container col-xs-12">

	<form class="well form-horizontal" action=" {{url('parametre')}}" method="post"  id="contact_form" enctype="multipart/form-data">
	{{ csrf_field() }}
	<fieldset>

		<!-- Form Name -->
		<legend><center><h2><b>Informations du Laboratoire</b></h2></center></legend><br>
		<div class="form-group ">
			<label class="col-xs-4 control-label">Nom du labo</label>  
			<div class="col-xs-8 inputGroupContainer">
				<div style="width: 50%">
					<input  name="nom" class="form-control" placeholder="Le nom" type="text">
				</div>
			</div>
		</div>  

		<div class="form-group" style="padding-top: 20px">
			<label class="col-md-4 control-label">Logo</label>  
			<div class="col-md-8 inputGroupContainer">
				<input name="logo" type="file" accept="image/*">
			</div>
		</div>
	</fieldset>

	<div style="padding-top: 30px; margin-left: 35%;">
		<a href="{{url('parametre')}}" class=" btn btn-lg btn-default"><i class="fa  fa-mail-reply"></i> &nbsp;Annuler</a>
		<button type="submit" class=" btn btn-lg btn-primary"><i class="fa fa-check"></i> Modifier</button> 
	</div>
	</form>
</div><!-- /.container -->

</div>
@endsection