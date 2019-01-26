@extends('layouts.front.master')
@section('title','LRI | Home')



@section('content')


	<br/>
  

    <div class="container " id="actualites">

    	@foreach($actualites as $actualite)
    	
    	<div class="row post fadeInUp animated" id="{{$actualite->id}}">

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
    <div id="loader" style="display:none;"> <img src="/uploads/photo/loading.gif" style="margin-left: 600px; height:40px; width:80px;" /> 
    </div>

@stop

@section('script')
    
    <script>
        $(window).scroll(function(){
            if( $(window).scrollTop() == $(document).height() - $(window).height() )
            {
                // alert('{{url('/getMoreActualites/')}}' + '/' +$(".post:last").attr('id'));

                $.ajax({
                    url: '{{url('/getMoreActualites/')}}' + '/' + $(".post:last").attr('id'),
                    beforeSend: function(){$("#loader").show();},
                    success: function(html){
                        if(html)
                        {
                            $("#actualites").append(html);
                            $("#loader").hide();
                        }
                        else
                        {
                            $("#loader").hide();
                        }
                    }
                });

            }
        });
    </script>

@endsection