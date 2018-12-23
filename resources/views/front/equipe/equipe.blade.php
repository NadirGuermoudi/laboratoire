@extends('layouts.front.master')
@section('title')
    Equipes
@stop

@section('header')

@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="box col-12">
                <div class="container" style="padding-top: 30px ">
                    <div class="row">
                        <h2 class="theme-color text-center">Liste des equipes du laboratoire</h2>

                    </div>
                </div>

                <div class="col-12" style="height:50px;"></div>

                <!-- /.box-header -->
                <div class="box-header">


                    <div class="row">
                        @foreach($equipes as $equipe)
                        <div class="col-12 col-md-6">



                                <div class="col-12 col-md-12" style="padding-right: 30px;padding-bottom: 30px;">
                                    <div class="box box-widget widget-user ">
                                        <div class="row panel panel-success">
                                            <div class="col-12 text-center panel-heading">
                                                <div class="widget-user-header bg-dark text-center">
                                                    <a class="users-list-name1"
                                                       href="{{ url('/front/equipes/'.$equipe->id.'/details')}}"><h5
                                                                class="widget-user-username timeline-header">{{$equipe->intitule}} ({{$equipe->achronymes}})</h5>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-12" style="height: 20px;"></div>

                                            <div class="col-12" align="center">
                                                <h5 class="description-header">Chef d'équipe</h5>
                                                <div class="widget-user-image text-center">
                                                    <img style="height: 80px;width: 80px;"
                                                         class="img-circle img-responsive border-form center-block"
                                                         src="{{asset($equipe->chef->photo)}}"
                                                         alt="User Avatar">
                                                </div>
                                                <br>
                                                <div class="description-block">

                                                    <span class="description-text"><a
                                                                href="{{url('/front/membres/'.$equipe->chef_id.'/details')}}"
                                                                style="color: black">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</a></span>
                                                </div>


                                            </div>
                                            @foreach($nbr as $nbrs)
                                                @if($nbrs->equipe_id == $equipe->id)
                                                    <div class="col-9 pull-right">
                                                        <div class="description-block text-center pull-right ">
                                                            <h5 class="description-header">

                                                                {{$nbrs->total}}

                                                            </h5>
                                                            <span class="description-text">Membres</span>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach


                                        </div>


                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>


@stop