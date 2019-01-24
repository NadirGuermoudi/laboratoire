@extends('layouts.front.master')
@section('title','LRI | Home')



@section('content')


	<br/>
    <div class="col-12 " style="padding-bottom: 30px">
        <h2 class="theme-color text-center "> home </h2>
    </div>

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



    				      <p class="card-text">
    				      	{{-- <small class="text-muted">Last updated 3 mins ago</small></p> --}}
    				       	<small class="text-muted" style="bottom:105px;">
    				            Last updated {{$actualite->created_at}} 
							</small>


    				</div>

    			</div>

    	</div>

    	@endforeach

    </div>

    	


@stop