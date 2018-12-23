@extends('../layouts.front.master', ['active' => 'membres'])

@section('header')
@stop

@section('contenu')
@section('content')


    <legend>
        <center><h2><b>Listes des membres</b></h2></center>
    </legend><br>
    <div class="row">
        <div class="col-md-12">
            <div style="padding-top: 30px">

                @foreach($membres as $membre)
                    <div class="col-md-2 col-sm-4 col-xs-6" style="padding-top: 30px;">

                        <a href="{{url('membres/'.$membre->id.'/details')}}">
                            <img style="height: 150px width:159px; " class="img-thumbnail "
                                 src="{{asset($membre->photo)}}" alt="User profile picture"
                                 title="{{($membre->name)}} {{($membre->prenom)}}"></a>

                    </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
@stop