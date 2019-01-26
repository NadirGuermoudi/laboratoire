@extends('layouts.master', ['active' => 'parametre'])

@section('title','LRI | Messages')

@section('header_page')
    <h1>Paramètres</h1>

    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('parametre.index')}}"></i> Paramètres</a></li>
        <li class="active"><a href="{{route('parametre.index')}}">Informations du Laboratoire</a></li>
    </ol>
@endsection

@section('content')
    <div class="container box">
        <div class="row">
            <div class="box-header col-xs-12">
                <h3 class="box-title">Messages</h3>
            </div>
        </div>

        @include('layouts/partials/_menuParametre')
        <div class="col-12">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>nom</th>
                    <th>email</th>
                    <th>numero</th>
                    <th>message</th>
                </tr>
                </thead>
                <tbody>


                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->nom }}</td>
                        <td>{{$message->email}}</td>
                        <td>{{ $message->numero_de_tel }}</td>
                        <td>{{ $message->message }}</td>
                        <td>

                            @if(Auth::user()->role->nom == 'admin')

                                <a href="#supprimer{{ $message->id}}Modal" role="button"
                                   class="btn btn-danger btn-sm" data-toggle="modal"><i
                                            class="fa fa-trash-o"></i></a>

                                <div class="modal fade" id="supprimer{{ $message->id}}Modal" tabindex="-1"
                                     role="dialog" aria-labelledby="supprimer{{ $message->id}}ModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                Voulez-vous vraiment effectuer la suppression de
                                                ({{$message->nom}} {{$message->email}} ?
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-inline"
                                                      action="{{ route('message.destroy', $message) }}"
                                                      method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="button" class="btn btn-light"
                                                            data-dismiss="modal">Non
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Oui</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        </td>
                    </tr>
                @endforeach


                </tbody>

                <tfoot>
                <tr>
                    <th>nom</th>
                    <td>email</td>
                    <th>numero</th>
                    <th>message</th>
                </tr>
                </tfoot>
            </table>

        </div>

@stop