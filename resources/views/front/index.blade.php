@extends('layouts.front.master')
@section('title','LRI | Home')



@section('content')


	<br/>
  

    <div class="container">

    	@foreach($actualites as $actualite)
    	
    	<div class="row">

    			<div class="col-md-3 ">
    			   {{-- <img src="/uploads/1523790108.png" class="card-img-top " alt="image" style="width:300px; height:200px;"> --}}
    			   <img src="{{$actualite->image}}" class="card-img-top " alt="image" style="width:300px; height:200px;">
    			</div>

    			<div class="card col-md-8 " style="margin: 0px 0px 30px 60px; height:200px;" >
    			    
    				<div class="card-body">
    				    <h5 class="card-title">  
    				    	{{$actualite->titre}}
    				    </h5>
    				    <p class="card-text">
    				      	{{$actualite->resume}}
    				    </p>
    				      	{{-- <small class="text-muted">Last updated 3 mins ago</small></p> --}}
    				    <small class="text-muted" style="bottom:105px;">
    				        Last updated {{$actualite->created_at}} <br/> <br/>
						</small>

						<a href="{{route("actu.show", $actualite)}}" class="btn btn-primary"  >
						 Lire plus 
						</a>

    				</div>

    			</div>
    		</a>
    	</div>
    	
    	@endforeach

    </div>

    	


@stop