@extends('layouts.front.master')
@section('title','LRI | Theses')


@section('content')
    <div class="col-12">
        <div class="col-12">
            <h2 class="theme-color text-center" style="padding-bottom: 20px;">Liste Des Theses Du Laboratoire</h2>
        </div>
        <div class="col-12">
            <div class="container">
                <div class="row">
                    @foreach($theses as $these)

                        <div class="col-md-6" style="padding-bottom: 30px">
                            <div class="card-content">
                                <div class="card-desc card">
                                    <a href="{{ url('front/theses/'.$these->id.'/details')}}"><h5 class="card-header text-center theme-bg text-white">{{$these->titre}}</h5></a>
                                    <div class="row" style="padding-top: 10px">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span> <strong> These portant sur :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            {{$these->sujet}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Doctorant :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{url('front/membres/'.$these->user_id.'/details')}}">{{$these->user->name}} {{$these->user->prenom}}</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Encadreur de la these :</strong></span>
                                        </div>
                                        <div class="col-6">
                                           <span>{{$these->encadreur_int}}{{$these->encadreur_ext}}</span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Co-encadreur de la these :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            <span>{{$these->encadreur_int}}{{$these->encadreur_ext}}</span>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 10px;">
                                        <div class="col-1"></div>
                                        <div class="col-5">
                                            <span><strong>Date de soutenance :</strong></span>
                                        </div>
                                        <div class="col-6">
                                            @if($these->date_soutenance)
                                                <span>{{$these->date_soutenance}}</span>
                                            @else
                                                <span>Pas Encore Fixer</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>


    </div>
@stop