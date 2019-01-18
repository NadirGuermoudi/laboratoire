@extends('layouts.front.master')

@section('title',"LRI | Details de l'equipe")

@section('header')

@stop

@section('content')
    <div class="col-12">
        <div class="container">
            <div class="row">


                <div class="col-12">
                    <h3 class="theme-color text-center">Details {{$equipe->intitule}}</h3>
                </div>

                @if($equipe->photo != ' ')
                <div class="col-12" style="height:30px;"></div>

                <div class="col-12 col-sm-12 text-center">
                    <div class="section-title">
                        <h5 class="title-effect"><a>Photo de l'équipe</a></h5>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <img class="border-dark" src="{{asset($equipe->photo)}}">
                </div>
                @endif
                <div class="col-12" style="height: 50px"></div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-6">
                    <!-- USERS LIST -->


                    <div class="col-12 col-sm-12 text-center">
                        <div class="section-title">
                            <h5 class="title-effect"><a>Membres de l'équipe</a></h5>
                        </div>
                    </div>

                    <div class="team-3">
                        <div class="row">


                            @foreach($membres as $membre)
                                @if($membre->name != 'Admin' || is_null($membre->equipe_id))
                                    <div class="col-6 col-sm-6 col-md-4">
                                        <div class="team team-round ">

                                            <div class="team-photo">
                                                <img style="height: 80px; width: 80px;"
                                                     class="img-responsive center-block"
                                                     src="{{asset($membre->photo)}}" alt="">
                                            </div>

                                            <div class="team-description">

                                                <div class="team-info">
                                                    <a href="{{url('front/membres/'.$membre->id.'/details')}}">{{$membre->name}}</a><br>
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
                </div>

                <div class="col-12 col-md-6">

                    <div class="col-12">
                        <h5><a>Chef d'équipe</a></h5>
                        <div class="description-block">
                <span class="description-text theme-color"><a
                            href="{{url('/front/membres/'.$equipe->chef_id.'/details')}}">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</a></span>
                        </div>
                        <br>
                    </div>


                    <div class="col-12">

                        <h5 class="timeline-header"><a>Résumé</a></h5>

                        <div class="timeline-body text-justify">
                            {{$equipe->resume}}

                        </div>
                    </div>


                    <div class="col-12" style="padding-top: 20px;">

                        <h5 class="timeline-header"><a>Projet de l'equipe</a></h5>
                        @if($projet != '[]')
                            @foreach($projet as $pj)
                                <div class="timeline-body text-justify card">
                                    <div style="padding-top: 10px;padding-left: 10px">
                                        <strong> intitule du projet : </strong>
                                        {{$pj->intitule}}
                                    </div>

                                    <div style="padding-top: 10px;padding-left: 10px">
                                        <strong> Resume du projet : </strong>
                                        {{$pj->resume}}
                                    </div>

                                    <div style="padding-top: 10px; padding-left: 10px;padding-bottom: 10px"><strong>
                                            Type du projet : </strong>
                                        {{$pj->type}}
                                    </div>
                                    <div class="text-center" style="padding-bottom: 10px;">
                                        <a href="{{url('/front/projets/' . $pj->id . '/details')}}"
                                           class="btn btn-primary text-center"
                                           style="width: 100px;"> Lire
                                            plus </a>
                                    </div>


                                </div>
                            @endforeach
                        @else
                            <div style="padding-top: 10px">
                                <strong>Aucun Projet</strong>
                            </div>
                        @endif
                    </div>


                </div>

                <!--/.box -->
            </div>
        </div>
    </div>


    <!-- timeLine start -->
@endsection