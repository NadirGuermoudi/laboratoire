@extends('../layouts.front.master', ['active' => 'membres'])

@section('title')
    Membres
@stop

@section('header')
    <style>

    </style>

@stop
@section('content')
    <div class="col-lg-8 col-md-8 col-md-offset-2" style="padding-top: 50px">
        <div class="section-title text-center">
            <h2 class="theme-color">Liste des membres du laboratoire</h2>
        </div>
    </div>
    <div class="col-xs-12" style="height: 50px">

    </div>


    <div class="container">
        <div class="row">


            @foreach($membres as $membre)
                @if($membre->name != 'Admin' || is_null($membre->equipe_id))

                    <div class="col-lg-3 col-md-3 col-sm-6 sm-mb-30">
                        <div class="team team-round-shadow ">
                            <div class="team-photo">
                                <img style="height: 100px; width: 100px;" class="img-fluid center-block"
                                     src="{{asset($membre->photo)}}" alt="">
                            </div>
                            <div class="team-description">
                                <div class="team-info">
                                    <h6><a href="{{ url('/front/membres/'.$membre->id.'/details')}}">{{$membre->name}}</a></h6>
                                    <span>{{$membre->grade}}</span>
                                </div>
                                <div class="team-contact">
                                    <span class="email">{{$membre->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endforeach
        </div>
    </div>

@stop
