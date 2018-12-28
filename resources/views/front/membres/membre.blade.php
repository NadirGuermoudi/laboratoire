@extends('../layouts.front.master', ['active' => 'membres'])

@section('title','LRI | Liste des memebres')

@section('content')
<br/>
    <div class="col-12" style="padding-bottom: 30px">
        <h2 class="theme-color text-center">Liste Des Membres Du Laboratoire</h2>
    </div>

    <!-- Search form -->
    <div class="col-12" style="">
        <div class="row">
            <div class="col-8 col-md-8 col-sm-6">
            </div>
            <form class="form-inline col-12 col-sm-6 col-md-4" action="{{route('membres_search_path')}}"
                  method="GET" style="padding-bottom: 30px">
                {{csrf_field()}}
                <input class="form-control form-control-sm mr-3 w-75 " value="@if($q != '' && $nbrResultatTrouver >= 0){{$q}}@endif" type="text" name="search" placeholder="Rechercher"
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



    <div class="col-12">

        <div class="container">
            <div class="row">


               



                @foreach($membres as $membre)
                    @if($membre->name != 'Admin' || is_null($membre->equipe_id))

                        <div class="col-lg-3 col-md-3 col-sm-6 sm-mb-30" style="padding-bottom: 20px">
                            <div class="team team-round-shadow border">
                                <div class="team-photo">
                                    <img style="height: 100px; width: 100px;" class="img-fluid center-block"
                                         src="{{asset($membre->photo)}}" alt="">
                                </div>
                                <div class="team-description">
                                    <div class="team-info">
                                        <h6>
                                            <a href="{{ url('/front/membres/'.$membre->id.'/details')}}">{{$membre->name}}</a>
                                        </h6>
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

@stop
