@extends('layouts.front.master')
@section('title','LRI | Recherche Globale')


@section('content')
    <div class="col-12" style="padding-bottom: 30px">
        <h2 class="theme-color text-center">Recherche Globale Sur Le Laboratoire</h2>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-4 col-md-4 col-sm-4 ">
            </div>
            <div class=" col-12 col-sm-7 col-md-7" style="padding-bottom: 30px">

                <form action="{{route("recherche_path")}}" method="get">
                    <input class="border form-control form-control-sm mr-3 w-75"
                           value="{{$q}}" type="text"
                           id="search"
                           name="search" placeholder="Rechercher"
                           aria-label="Search">
                    <div class="mr-3 w-75" style="padding-top: 10px"></div>
                    <div class="border form-control form-control-sm mr-3 w-75 text-center" id="ravi">
                        <input style="" type="checkbox" id="ra" autocomplete="off">
                        <span style="padding-right: 15px">recherche Avancee</span>
                    </div>
                    <div class="border form-control form-control-sm mr-3 w-75" id="rAD" style="display: none">
                        <input style="" type="checkbox" name="actualite">
                        <span style="padding-right: 15px">actualite</span>
                        <input type="checkbox" name="membres">
                        <span style="padding-right: 15px">membres</span>
                        <input type="checkbox" name="theses">
                        <span style="padding-right: 15px">theses</span>
                        <input type="checkbox" name="articles">
                        <span style="padding-right: 15px">articles</span>
                        <input type="checkbox" name="projets" >
                        <span style="padding-right: 15px">projets</span>
                        <input type="checkbox" name="equipes">
                        <span style="padding-right: 15px">equipes</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<div class="col-12" style="padding-left: 90px">--}}
    {{--<h6>Recherche avancee</h6>--}}
    {{--</div>--}}

    {{--<div class="col-12 text-center">--}}
    {{--<form method="" action="">--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>actualite</span>--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>membres</span>--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>theses</span>--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>articles</span>--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>projets</span>--}}
    {{--<input type="checkbox" id="membres">--}}
    {{--<span>equipes</span>--}}
    {{--<input type="submit" value="recherche">--}}
    {{--</form>--}}
    {{--</div>--}}
    @if($nbrResultatTrouver == 0)
        <div class="col-12 text-center" style="padding-bottom: 30px">
            <h5>Aucun Resultat Trouver Pour ' {{$q}} '</h5>
        </div>
    @else
        <div class="col-12 text-center" style="padding-bottom: 30px">
            <h4>{{$nbrResultatTrouver}} Resultas Trouver Pour ' {{$q}} '</h4>
        </div>
    @endif


    @if(count($membres) > 0)
        @if(isset($membres))
            <div class="col-12" style="padding-bottom: 30px">
                <h4 class="theme-color">{{count($membres)}} Membres:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px"
                   class="table table-bordered table-striped col-10 text-center">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Grade</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>
                @foreach($membres  as $membre)
                    <tr>
                        <td>{{$membre->name}}</td>
                        <td>{{$membre->prenom}}</td>
                        <td>{{$membre->email}}</td>
                        <td>{{$membre->grade}}</td>
                        <td>
                            <div class="btn-group">

                                <form action="{{ url('front/membres/'.$membre->id)}}" method="post">

                                    <a href="{{ url('front/membres/'.$membre->id.'/details')}}"
                                       class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif

    @if(count($actu) > 0)
        @if(isset($actu))
            <div class="col-12" style="padding-bottom: 30px">
                <h4 class="theme-color">{{count($actu)}} Actualités:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px"
                   class="table table-bordered table-striped col-10 text-center">
                <thead>
                <tr>
                    <th>titre</th>
                    <th>Resume</th>
                    <th>created at</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actu  as $a)
                    <tr>
                        <td>{{$a->titre}}</td>
                        <td>{{$a->resume}}</td>
                        <td>{{$a->created_at}}</td>
                        <td>
                            <div class="btn-group">

                                <form method="post">

                                    <a href="{{ url('actu/'.$a->id)}}"
                                       class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif

    @if(count($theses) > 0)
        @if(isset($theses))
            <div class="col-12" style="padding-top: 30px">
                <h4 class="theme-color">{{count($theses)}} Theses:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px" class="table table-bordered  table-striped col-10">
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Sujet</th>
                    <th>Doctorant</th>
                    <th>Encadreur</th>
                    <th>CoEncadreur</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>
                @foreach($theses as $these)
                    <tr>
                        <td>{{$these->titre}}</td>
                        <td>{{$these->sujet}}</td>
                        <td>{{$these->user->name}} {{$these->user->prenom}}</td>
                        <td>{{$these->encadreur_int}}{{$these->encadreur_ext}}</td>
                        <td>{{$these->coencadreur_int}}{{$these->coencadreur_ext}}</td>
                        <td>
                            <a href="{{ url('front/theses/'.$these->id.'/details')}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif

    @if(count($articles) > 0)
        @if(isset($articles))
            <div class="col-12" style="padding-top: 30px">
                <h4 class="theme-color">{{count($articles)}} Articles:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px" class="table table-bordered table-striped col-10">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{$article->type}}</td>
                        <td>{{$article->titre}}</td>
                        <td>{{$article->annee}}</td>
                        <td>
                            <div class="btn-group">

                                <a href="{{ url('front/articles/'.$article->id.'/details')}}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif

    @if(count($projets) > 0)
        @if(isset($projets))
            <div class="col-12" style="padding-top: 30px">
                <h4 class="theme-color">{{count($projets)}} Projets:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px" class="table table-bordered table-striped col-10">
                <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Type</th>
                    <th>Partenaires</th>
                    <th>Chef</th>
                    <th>Membres</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>

                @foreach($projets as $projet)
                    <tr>
                        <td>{{ $projet->intitule }}</td>
                        <td>{{ $projet->type }}</td>
                        <td>{{ $projet->partenaires }}</td>
                        <td>
                            <a href="{{url('membres/'.$projet->chef_id.'/details')}}">{{ $projet->chef->name}} {{ $projet->chef->prenom}}</a>
                        </td>
                        <td>
                            @foreach ($projet->users as $user)
                                <ul>
                                    <li>
                                        <a href="{{url('membres/'.$user->id.'/details')}}">{{ $user->name }} {{ $user->prenom }}</a>
                                    </li>
                                </ul>
                            @endforeach

                        </td>
                        <td>


                            <form action="{{ url('projets/'.$projet->id)}}" method="post">

                                {{csrf_field()}}
                                <a href="{{ url('projets/'.$projet->id.'/details')}} " class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif
    @if(count($equipes) > 0)
        @if(isset($equipes))
            <div class="col-12" style="padding-top: 30px">
                <h4 class="theme-color">{{count($equipes)}} Equipes:</h4>
            </div>
            <table align="center" style="padding-bottom: 30px" class="table table-bordered table-striped col-10">
                <thead>
                <tr>
                    <th>Achronyme</th>
                    <th>inttitulé</th>
                    <th>Chef</th>
                    <th>voir plus</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipes  as $equipe)
                    <tr>
                        <td>{{$equipe->achronymes}}</td>
                        <td>{{$equipe->intitule}}</td>
                        <td>
                            <a href="{{url('front/membres/'.$equipe->chef_id.'/details')}}">{{$equipe->chef->name}} {{$equipe->chef->prenom}}</a>
                        </td>
                        <td>
                            <div class="btn-group">

                                <a href="{{ url('front/equipes/'.$equipe->id.'/details')}}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @endif
    @endif
@stop

@section('script')
    <script type="text/javascript">
        $('#ra').change(function() {
            $('#ravi').hide();
            $('#rAD').show();
        });
    </script>
@stop