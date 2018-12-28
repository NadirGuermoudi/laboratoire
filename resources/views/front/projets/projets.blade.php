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
<br/>
<div class="col-12" style="padding-bottom: 30px">
    <h2 class="theme-color text-center"> Liste Des Projets Du Laboratoire </h2>
</div>
 

<div class="container">

{{-- 
	
	Tasks: 
	1- Lire plus link must send to pages without loging in
	2- clicking on members must send to pages aswell without logging in

 --}}

{{--  <div class="row">
 		
		<div class="card-deck col-md-12"> --}}

		<!-- Later, I must treat the case where we have only one projet existing in DB,
		so the display gonna be a litte annoying when showing one projet that take the space
		of all the page -->
			<div class="row ">
			@foreach($projets as $projet)
			<div class="col-md-4">
			  	<div class="card bg-light border-secondary " style="height:23rem; width:23rem; margin: 0px 0px 20px 0px;" >
					<div class="card-header bg-light border-secondary"> <h6> {{ $projet->intitule }} </h6>
					</div>
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
					</div> {{-- colmd --}}
					
					 @endforeach


						</div>

				{{-- 	</div> card deck
				</div> {{ row }} --}}
	</div> <!-- container -->


@endsection