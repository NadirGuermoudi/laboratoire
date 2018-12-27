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
		  	<a href="{{route('materials.category')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Categorie</b></a>
	  		@endif
		  </div>

	  </div>
		
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>matériel</th>
			  <th>Emprunté par</th>
			  <th>Disponible le</th>
			  <th>Jours restants</th>
			  <th>Actions</th>
			</tr>
			</thead>
			<tbody>
			  @foreach($materials as $material)
			  <tr>
				<td>{{$material->category}} | {{$material->numero}}</td>
				<td>{{$material->par}}</td>
				<td>{{ $material->date_rendre }}</td>
				<td>{{ $material->jours_restants }}</td>
				<td>
				  
				  <a href="{{ route('materials.history', $material->id)}}" class="btn btn-default btn-sm">
					<i class="fa fa-archive"></i>
				  </a>

				  @if(Auth::user()->role->nom == 'admin')
				  <a href="{{ route('materials.edit', $material->id)}}" class="btn btn-default btn-sm">
					<i class="fa fa-edit"></i>
				  </a>

				   <a href="#supprimer{{ $material->id }}Modal" role="button" class="btn btn-default btn-sm" data-toggle="modal"><i class="fa fa-sign-language"></i></a>

				  <div class="modal fade" id="supprimer{{ $material->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $material->id }}ModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						  <div class="modal-content">
							  <div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
								  </button>
							  </div>
							  <div class="modal-body text-center">
								  Vous ete sur de vouloir rendre ( {{$material->category}} | {{$material->numero}} )
							  </div>
							  <div class="modal-footer">
								  <form class="form-inline" action="{{ route('materials.return', $material->id) }}"  method="POST">
									  @method('PUT')
									  @csrf
								  	<button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
									  <button type="submit" class="btn btn-warning">Oui</button>
								  </form>
							  </div>
						  </div>
					  </div>
				  </div>
				  @endif
				</td>
			  </tr>
			  @endforeach
			 </tbody>
			<tfoot>
			<tr>
			  <th>matériel</th>
			  <th>Emprunté par</th>
			  <th>Disponible le</th>
			  <th>Jours restants</th>
			  <th>Actions</th>
			</tr>
			</tfoot>
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
  </div>
</div>
@endsection