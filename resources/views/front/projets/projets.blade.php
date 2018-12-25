@extends('../../layouts.front.master')

@section('title','LRI | Liste des projets')

@section('header_page')

      <h1>
        Projets
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('projets')}}">Projets</a></li>
      </ol>

@endsection

@section('content')

<br/> <br/> 

<div class="container">

{{-- 
	
	Tasks: 
	1- Lire plus link must send to pages without loging in
	2- clicking on members must send to pages aswell without logging in

 --}}

	<div class="card-deck">
		<!-- Later, I must treat the case where we have only one projet existing in DB,
		so the display gonna be a litte annoying when showing one projet that take the space
		of all the page -->
			@foreach($projets as $projet)
			  	<div class="card bg-light mb-3 border-secondary" style="max-width: 18rem;">
					<div class="card-header bg-light border-secondary"> <h6> {{ $projet->intitule }} </h6> </div>
					<div class="card-body text-success border-secondary ">
					    <h6 class="card-title"> Chef: {{ $projet->chef->name }} {{ $projet->chef->prenom }} </h6>
					    <p class="card-text">
					    	type: {{ $projet->type }}
					    	membres:
					    	@foreach ($projet->users as $user)
						    	<ul>
						    		<li> <a href="{{ url('/front/membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }} </a>
						    		</li>
						    	</ul>
					    	@endforeach
					    </p>
					    
					</div>
					
					{{-- The following code is for the modal class (the window that show up
						in the same page) --}}
					 <div class="card-footer bg-transparent border-success">
					 		
					 		<a href="{{ url('/front/projets/'.$projet->id.'/details')}}" class="btn btn-primary "> Lire plus </a>
					 		
					</div>

					 </div>
					
					 @endforeach


						

					</div>
	

	</div>


@endsection