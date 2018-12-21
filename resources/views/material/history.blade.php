@extends('layouts.master', ['active' => 'materials'])

@section('title','LRI | Liste des matériels')

@section('header_page')
	<h1>Matériels</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><a href="{{route('materials.index')}}">Matériels</a></li>
		<li class="active"><a href="{{route('materials.borrowed')}}">Empruntés</a></li>
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
		  	<a href="{{route('materials.category')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Catégorie</b></a>
	  		@endif
		  </div>
		  

	  </div>
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>Emprunté par</th>
			  <th>Date d'emprunt</th>
			  <th>Date de rendre</th>
			  <th>Rendu le</th>
			</tr>
			</thead>
			<tbody>
			  @foreach($history as $material)
			  <tr>
				<td>{{ $material->par }}</td>
				<td>{{ $material->date_emprunt }}</td>
				<td>{{ $material->date_rendre }}</td>
				<td>{{ $material->date_rendement }}</td>
			  </tr>
			  @endforeach
			 </tbody>
			<tfoot>
			<tr>
			  <th>Emprunté par</th>
			  <th>Date d'emprunt</th>
			  <th>Date de rendre</th>
			  <th>Rendu le</th>
			</tr>
			</tfoot>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
  </div>
</div>
@endsection