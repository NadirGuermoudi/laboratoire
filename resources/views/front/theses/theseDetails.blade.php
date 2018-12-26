@extends('layouts.front.master')
@section('title','LRI | Details de Theses')


@section('content')
    <div class="col-12">
        <div class="col-12">
            <h3 class="theme-color text-center" style="padding-bottom: 30px;">Details De La These</h3>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-12 text-center" style="padding-bottom: 30px">
                <div class="row">
                    <div class="col-12">
                        <h5><strong>Doctorant</strong></h5>
                    </div>
                    <div class="col-12" style="padding-bottom: 20px">
                        <img style="height: 120px;width: 120px;" class="img-responsive rounded-circle border"
                             src="{{asset($these->user->photo)}}" alt="">
                    </div>
                    <div class="col-12">
                        <a href="{{url('front/membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-9 col-md-9  float_right">
                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Titre de la These  :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                <h6>{{$these->titre}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>

                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>These portant sur :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                <h6>{{$these->sujet}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>


                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Encadreur de la these :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                @if($these->encadreur_int != '' || $these->encadreur_ext != '')
                                    <h6>{{$these->encadreur_int}}</h6>
                                    <h6>{{ $these->encadreur_ext }}</h6>
                                @else
                                    <span class="text-center">/</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>


                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Co-encadreur de la these :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                @if($these->coencadreur_int != '' || $these->coencadreur_ext != '')
                                    <h6>{{ $these->coencadreur_int }}</h6>
                                    <h6>{{ $these->coencadreur_ext }}</h6>
                                @else
                                    <h6>/</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>

                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Date d'inscription :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                <h6>{{$these->date_debut}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>

                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Date de soutenance :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                @if($these->date_soutenance)
                                    <h6>{{$these->date_soutenance}}</h6>
                                @else
                                    <h6>Pas Encore Fixer</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>

                <div class="row" style="padding-bottom: 20px">
                    <div class="col-11 col-md-8">
                        <div class="row">
                            <div class="col-6 text-left">
                                <span> <strong>Détails :</strong></span>
                            </div>
                            <div class="col-6 text-left">
                                <span><a href="{{asset( $these->detail)}}">Lien fichier</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-1 col-1"></div>
                </div>



            </div>
        </div>
    </div>


@stop