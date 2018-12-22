@extends('layouts.master', ['active' => 'materials'])

@section('title','LRI | Liste des matériels')

@section('header_page')
	<h1>Matériels</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><a href="{{route('materials.index')}}">Matériels</a></li>
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
			  <th>Libellé</th>
			  <th>Numéro</th>
			  <th>Disponible</th>
			  <th>Emprunté par</th>
			  <th>Disponible le</th>
			  <th>Actions</th>
			</tr>
			</thead>
			<tbody>
			  @foreach($materials as $material)
			  <tr>
				<td>{{$material->category}}</td>
				<td>{{$material->numero}}</td>
				<td>@if($material->isDisponible()['disponible']) Oui @else Non @endif</td>
				<td>{{ $material->isDisponible()['emprunter_par'] }}</td>
				<td>{{ $material->isDisponible()['disponibleLe'] }}</td>
				<td>
				  
				  <a href="{{ route('materials.history', $material->id)}}" class="btn btn-default btn-sm">
					<i class="fa fa-archive"></i>
				  </a>

				  @if(Auth::user()->role->nom == 'admin')
				  <a href="{{ route('materials.edit', $material)}}" class="btn btn-default btn-sm">
					<i class="fa fa-edit"></i>
				  </a>

				   <a href="#supprimer{{ $material->id }}Modal" role="button" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa fa-trash-o"></i></a>

				  <div class="modal fade" id="supprimer{{ $material->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $material->id }}ModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						  <div class="modal-content">
							  <div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
								  </button>
							  </div>
							  <div class="modal-body text-center">
								  Voulez-vous vraiment effectuer la suppression de ({{$material->category}} | {{$material->numero}})  ? 
							  </div>
							  <div class="modal-footer">
								  <form class="form-inline" action="{{ route('materials.destroy', $material) }}"  method="POST">
									  @method('DELETE')
									  @csrf
								  <button type="button" class="btn btn-light" data-dismiss="modal">Non</button>
									  <button type="submit" class="btn btn-danger">Oui</button>
								  </form>
							  </div>
						  </div>
					  </div>
				  </div>

				  @endif
				</div>
				</td>
			  </tr>
			  @endforeach
			 </tbody>
			<tfoot>
			<tr>
			  <th>Libellé</th>
			  <th>Numéro</th>
			  <th>Disponible</th>
			  <th>Emprunté par</th>
			  <th>Disponible le</th>
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