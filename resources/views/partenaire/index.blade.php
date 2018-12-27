@extends('layouts.master', ['active' => 'partenaires'])

@section('title','LRI | Liste des partenaires')

@section('header_page')
	<h1>Partenaires</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active">Partenaires</li>
	</ol>
@endsection

@section('content')
<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title">Liste des Partenaires</h3>
		</div>
	</div>
	
	@include('layouts/partials/_menuPartenaire')

	<!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>Nom</th>
		  <th>Type</th>
		  <th>Pays</th>
		  <th>Ville</th>
		  <th>Actions</th>
		</tr>
		</thead>
		<tbody>
		  @foreach($partenaires as $partenaire)
		  <tr>
			<td>{{$partenaire->name}}</td>
			<td>{{$partenaire->type}}</td>
			<td>{{$partenaire->pays}}</td>
			<td>{{$partenaire->ville}}</td>
			<td>
			  
			  <a href="{{ route('partenaires.show', $partenaire->id)}}" class="btn btn-info btn-sm">
				<i class="fa fa-eye"></i>
			  </a>

			  @if(Auth::user()->role->nom == 'admin')
			  <a href="{{ route('partenaires.edit', $partenaire->id)}}" class="btn btn-default btn-sm">
				<i class="fa fa-edit"></i>
			  </a>

			   <a href="#supprimer{{ $partenaire->id }}Modal" role="button" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa  fa-trash"></i></a>

			  <div class="modal fade" id="supprimer{{ $partenaire->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $partenaire->id }}ModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
						  </div>
						  <div class="modal-body text-center">
							  Vous ete sur de vouloir supprimer ( {{$partenaire->name}} )
						  </div>
						  <div class="modal-footer">
							  <form class="form-inline" action="{{ route('partenaires.destroy', $partenaire->id) }}"  method="POST">
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
			</td>
		  </tr>
		  @endforeach
		 </tbody>
		<tfoot>
		<tr>
		  <th>Nom</th>
		  <th>Type</th>
		  <th>Pays</th>
		  <th>Ville</th>
		  <th>Actions</th>
		</tr>
		</tfoot>
	  </table>
	</div>
	<!-- /.box-body -->

</div>
@endsection