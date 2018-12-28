@extends('../../layouts.front.master')

@section('title','LRI | Liste des articles')

@section('header_page')
      <h1>
        articles
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><a href="{{url('articles')}}">articles</a></li>
      </ol>

@endsection

@section('content')

<br/>
<div class="col-12" style="padding-bottom: 30px">
    <h2 class="theme-color text-center">Liste Des Articles Du Laboratoire</h2>
</div> 

<div class="container">

	
			<div class="row ">
			@foreach($articles as $article)
			<div class="col-md-4">
			  	<div class="card bg-light border-secondary " style="height:15rem; width:23rem; margin: 0px 0px 20px 0px;" >
					<div class="card-header bg-light border-secondary"> 
						<h6> {{ $article->titre }} </h6>
					</div>
					<div class="card-body text-success border-secondary ">
					    <h6 class="card-title">
					     Type: {{ $article->type }} </h6>
					    <p class="card-text">
					    	année: {{ $article->annee }}
					    </p>
					    
					</div>
					
					 <div class="card-footer bg-transparent border-success">
					 		
					 		<a href="{{ url('/front/articles/'.$article->id.'/details')}}" class="btn btn-primary "> Lire plus </a>
					 		
					</div>

					 </div>
					</div> {{-- colmd --}}
					
					 @endforeach


						</div>

				{{-- 	</div> card deck
				</div> {{ row }} --}}
	</div> <!-- container -->




@endsection