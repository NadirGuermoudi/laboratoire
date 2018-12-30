@extends('layouts.master', ['active' => 'partenaires'])

@section('title','LRI | Liste des contacts')

@section('header_page')
	<h1>Partenaires</h1>

	<ol class="breadcrumb">
		<li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="{{route('partenaires.index')}}">Partenaires</a></li>
		<li>Details</li>
	</ol>
@endsection

@section('content')
	<div class="container box">
	<div class="row">
		<div class="box-header col-xs-12">
			<h3 class="box-title">Détails ( {{$par->name}} )</h3>
		</div>
	</div>
	
	@include('layouts/partials/_menuPartenaire')

	<div class="row" style="float: none; margin: 0 auto;">
	<div class="col-md-6">
	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="glyphicon glyphicon-briefcase margin-r-5"></i>Nom</strong>
		</div>
		<div class="col-md-9">
			{{$par->name}}
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="fa fa-bars margin-r-5"></i>Type</strong>
		</div>
		<div class="col-md-9">
			{{$par->type}}
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Pays</strong>
		</div>
		<div class="col-md-9">
			{{$par->pays}}
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Ville</strong>
		</div>
		<div class="col-md-9">
			{{$par->ville}}
		</div>
	</div>
	</div>

	<div class="col-md-6">
	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Adresse</strong>
		</div>
		<div class="col-md-9">
			{{$par->adresse}}
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
		</div>
		<div class="col-md-9">
			{{$par->email}}
		</div>
	</div>

	<div class="row" style="margin-top: 10px">
		<div class="col-md-3">
			<strong><i class="glyphicon glyphicon-earphone margin-r-5"></i>Telephone</strong>
		</div>
		<div class="col-md-9">
			{{$par->telephone}}
		</div>
	</div>
	</div>
	
	</div>
	<hr>

	<h3>Contacts liste :</h3>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
		  <th>Nom</th>
		  <th>Prenom</th>
		  <th>Partenaire</th>
		  <th>Pays</th>
		  <th>Actions</th>
		</tr>
		</thead>
		<tbody>
		  @foreach($par->contacts as $contact)
		  <tr>
			<td>{{$contact->nom}}</td>
			<td>{{$contact->prenom}}</td>
			<td><a href="{{route('partenaires.show', $contact->partenaire->id)}}">{{ $contact->partenaire->name }}</a></td>
			<td>{{ $contact->pays }}</td>
			<td>
			  
			  <a href="#show{{$contact->id}}Modal" role="button" class="btn btn-info btn-sm" data-toggle="modal">
				<i class="fa fa-eye"></i>
			  </a>

			  <div class="modal fade" id="show{{ $contact->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="show{{ $contact->id }}ModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
						  </div>
						  <div class="modal-body text-center">

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-user margin-r-5"></i>Nom</strong>
									</div>
									<div class="col-md-9">
										{{$contact->nom}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-user margin-r-5"></i>Prenom</strong>
									</div>
									<div class="col-md-9">
										{{$contact->prenom}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="fa fa-briefcase margin-r-5"></i>Partenaire</strong>
									</div>
									<div class="col-md-9">
										<a href="{{route('partenaires.show', $contact->partenaire->id)}}">{{$contact->partenaire->name}}</a>
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="fa fa-briefcase margin-r-5"></i>Fonction</strong>
									</div>
									<div class="col-md-9">
										{{$contact->fonction}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Pays</strong>
									</div>
									<div class="col-md-9">
										{{$contact->pays}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Ville</strong>
									</div>
									<div class="col-md-9">
										{{$contact->ville}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-globe margin-r-5"></i>Adresse</strong>
									</div>
									<div class="col-md-9">
										{{$contact->adresse}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
									</div>
									<div class="col-md-9">
										{{$contact->email}}
									</div>
								</div>

								<div class="row" style="margin-top: 10px">
									<div class="col-md-3">
										<strong><i class="glyphicon glyphicon-earphone margin-r-5"></i>Telephone</strong>
									</div>
									<div class="col-md-9">
										{{$contact->telephone}}
									</div>
								</div>

						  </div>
					  </div>
				  </div>
			  </div>

			  @if(Auth::user()->role->nom == 'admin')
			  <a href="{{ route('contacts.edit', $contact->id)}}" class="btn btn-default btn-sm">
				<i class="fa fa-edit"></i>
			  </a>

			   <a href="#supprimer{{ $contact->id }}Modal" role="button" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fa  fa-trash"></i></a>

			  <div class="modal fade" id="supprimer{{ $contact->id }}Modal" tabindex="-1" role="dialog" aria-labelledby="supprimer{{ $contact->id }}ModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
							  </button>
						  </div>
						  <div class="modal-body text-center">
							  Vous ete sur de vouloir supprimer ( {{$contact->nom}} | {{$contact->prenom}} )
						  </div>
						  <div class="modal-footer">
							  <form class="form-inline" action="{{ route('contacts.destroy', $contact->id) }}"  method="POST">
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
		  <th>Prenom</th>
		  <th>Partenaire</th>
		  <th>Pays</th>
		  <th>Actions</th>
		</tr>
		</tfoot>
	  </table>
	</div>
	<!-- /.box-body -->

</div>
@endsection