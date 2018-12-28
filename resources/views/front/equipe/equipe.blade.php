@extends('layouts.front.master')

@section('title','LRI | Liste des equipes')

@section('header')

@stop

@section('content')
<br/>
    <div class="row">
        <div class="col-12">
            <div class="col-12 ">
                <div class="col-12" style="padding-bottom: 30px">
                    <h2 class="theme-color text-center">Liste Des Equipes Du Laboratoire</h2>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-8 col-md-8 col-sm-6"></div>
                        <form class="form-inline pull-right col-12 col-sm-6 col-md-4"
                              action="{{route('equipes_search_path')}}"
                              method="GET" style="padding-bottom: 30px">

                            {{csrf_field()}}

                            <input class="form-control form-control-sm mr-3 w-75"
                                   value="@if($q != '' && $nbrResultatTrouver >= 0){{$q}}@endif" type="text"
                                   name="search" placeholder="Rechercher"
                                   aria-label="Search">

                            <i class="fa fa-search" aria-hidden="true"></i>
                        </form>
                    </div>
                </div>

                @if($q != '' && $nbrResultatTrouver > 0)
                    <div class="col-12 text-center" style="padding-bottom: 20px">
                        <h6 class="text-center">Resultat de recherche de : "{{$q}}"</h6>
                    </div>
                @elseif($q != '' && $nbrResultatTrouver == 0)
                    <div class="col-12 text-center">
                        <div class="col-12 text-center" style="padding-bottom: 20px">
                            <h6 class="text-center">Resultat de recherche de : "{{$q}}"</h6>
                        </div>
                        <h5 class="text-center">Aucun Resultat trouver !</h5>
                    </div>
            @endif

            <!-- /.box-header -->
                <div class="box-header" style="padding-bottom: 20px">


                    <div class="row">
                        @foreach($equipes as $equipe)
                            <div class="col-12 col-md-6">


                                <div class="col-12 col-md-12" style="padding-right: 30px;padding-bottom: 30px;">
                                    <div class="box box-widget widget-user ">
                                        <div class="row card ">
                                            <div class="col-12 text-center card-header "
                                                 style="background-color: #dff0d8;">
                                                <div class="widget-user-header text-center">
                                                    <a class="users-list-name1 "
                                                       href="{{ url('/front/equipes/'.$equipe->id.'/details')}}"><h5
                                                                class="widget-user-username timeline-header">{{$equipe->intitule}}
                                                            ({{$equipe->achronymes}})</h5>
                                                    </a>
                                                </div>
                                            </div>


                                            <div class="col-12" style="padding-top: padding-bottom: 30px;"
                                                 align="center">
                                                <h5 class="description-header" style="padding-top: 15px">Chef
                                                    d'équipe</h5>
                                                <div class="widget-user-image ">
                                                    <img style="height: 80px;width: 80px;"
                                                         class="rounded-circle img-responsive border-form center-block"
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
                                                    <div class="col-12 text-right float-right">
                                                        <div class="description-block text-center float-right">
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