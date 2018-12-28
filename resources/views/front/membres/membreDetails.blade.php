@extends('../../layouts.front.master', ['active' => 'membres'])

@section('title','LRI | details des membres')

@section('header')

@stop
@section('content')

    <section class="our-team white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 sm-mb-30">
                    <img style="height: 200px;width: 200px;" class="img-responsive rounded-circle"
                         src="{{asset($membre->photo)}}" alt="">
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="team-details">
                        <div class="clearfix">
                            <div class="title float-left mb-20">
                                <h3 class=""><a>{{$membre->name}} {{$membre->prenom}}</a></h3>
                                <span class="">Grade : {{$membre->grade}}</span>
                            </div>
                            <div class="social-icons border color-hover float-right mt-10">
                                <ul>
                                    <li class="social-linkedin"><a href="{{$membre->lien_linkedin}}"><i
                                                    class="fa fa-linkedin"></i> </a></li>
                                </ul>
                            </div>
                        </div>

                        <ul class="nav nav-tabs">
                            <li class="active nav-item"><a href="#activity" data-toggle="tab" class="nav-link">A
                                    propos</a>
                            </li>
                            <li class="nav-item"><a href="#timeline" data-toggle="tab" class="nav-link">Articles</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="box-body">
                                    @if($membre->date_naissance && ( $membre->autorisation_public_date_naiss== $membre->id))
                                        <div class="row">
                                            <div class="col-md-3">
                                                <strong>Date de naissance</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membre->date_naissance}}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                    @if($membre->num_tel && ( $membre->autorisation_public_date_naiss == $membre->id))
                                        <div class="row" style="margin-top: 10px">
                                            <div class="col-md-3">
                                                <strong>N° de télépone</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <p class="text-muted">
                                                    {{$membre->num_tel}}
                                                </p>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-3">
                                            <strong><i class="fa fa-group  margin-r-5"></i>Equipe</strong>
                                        </div>
                                        <div class="col-md-9">
                                            @if(!is_null($membre->equipe_id))
                                                <a href="{{ url('/front/equipes/'.$membre->equipe->id.'/details')}}">{{$membre->equipe->intitule}}</a>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-3" style="padding-top: 10px">
                                            <strong><i class="fa fa-envelope margin-r-5"></i>Email</strong>
                                        </div>
                                        <div class="col-md-9" style="padding-top: 10px">
                                            {{$membre->email}}
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top: 10px">
                                        @if($membre->these)
                                            <div class="col-3" style="margin-top: 10px">
                                                <strong><i class="fa fa-graduation-cap margin-r-5"></i> Thèse </strong>
                                            </div>
                                            <div class="col-9" style="padding-top:10px">
                                                <p class="text-muted">
                                                    <strong> Titre : </strong> {{$membre->these->titre}}
                                                </p>
                                                <p class="text-muted">

                                                    <strong>Résumé :</strong> {{$membre->these->sujet}}
                                                </p>
                                                <p class="text-muted">
                                                    <strong>Encadreur
                                                        :</strong> {{$membre->these->encadreur_int}}{{$membre->these->encadreur_ext}}
                                                </p>
                                                <p class="text-muted">
                                                    <strong>Coencadreur
                                                        :</strong> {{$membre->these->coencadreur_int}}{{$membre->these->coencadreur_ext}}
                                                </p>

                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>


                            <div class="tab-pane" id="timeline">
                                <div class="box-body" style="padding-top: 30px;">


                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Titre</th>
                                            <th>Année</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($membre->articles as $article)
                                            <tr>
                                                <td>{{$article->type}}</td>
                                                <td>{{$article->titre}}</td>
                                                <td>{{$article->annee}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop