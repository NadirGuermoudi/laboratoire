<div class="box-body">
    {{-- Je dois ajouter le message de succes pour traiter le cas de redirection --}}

                    <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th> Titre </th>
                            <th> Résumé </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actualites as $actualite)
                            <tr>
                                <td>{{$actualite->titre}}</td>
                                <td>{{$actualite->resume}}</td>
                                
                                <td>

                                   {{--  show example 1 - showing details by sending 
                                    us to details view 
                                    <a href="{{ route('actualites.show', $actualite) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                     --}}

                                     {{-- show example 2 - showing details using a modal --}}
                                    <a href="#show{{ $actualite->id }}Modal" role="button"
                                       class="btn btn-info btn-sm" data-toggle="modal"><i
                                                class="fa fa-eye"></i>
                                    </a>

                                    <div class="modal fade" id="show{{ $actualite->id }}Modal" tabindex="-1"
                                         role="dialog" aria-labelledby="show{{ $actualite->id }}ModalLabel"
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
                                                   <div class="row">
                                                       <div class="col-sm-12">
                                                           <div class="card">
                                                                <img src="{{$actualite->image}}" class="card-img-top" style="width:500px;height:300px;">
                                                                 <div class="card-body">
                                                                       
                                                                       {{-- <h3 class="card-title">
                                                                            {{$actualite->titre}}
                                                                       </h3> --}}

                                                                        <div class="row" style="margin-top:10px;">
                                                                             <div class="col-md-3">
                                                                                 <strong>
                                                                                     <p class="text-left" style="margin-left:30px;">
                                                                                         Titre:
                                                                                     </p>
                                                                                 </strong>
                                                                             </div>
                                                                             <div class="col-md-9">
                                                                                 <p class="text-left" style="margin-left:20rem;">
                                                                                     {{$actualite->titre}}
                                                                                 </p>
                                                                             </div>
                                                                        </div>

                                                                       <div class="row" >
                                                                            <div class="col-md-3">
                                                                                <strong>
                                                                                    <p class="text-left" style="margin-left:30px;">
                                                                                        Résumé:
                                                                                    </p>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p class="text-left" style="margin-left:20rem;">
                                                                                    {{$actualite->resume}}
                                                                                </p>
                                                                            </div>
                                                                       </div>

                                                                       <div class="row">
                                                                            <div class="col-md-3">
                                                                                <strong>
                                                                                    <p class="text-left" style="margin-left:30px;">
                                                                                        Contenu:
                                                                                    </p>
                                                                                </strong>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p class="text-left" style="margin-left:20rem;">
                                                                                    {{$actualite->contenu}}
                                                                                </p>
                                                                            </div>
                                                                       </div>

                                                                 </div>
                                                            </div>
                                                         </div>
                                                     </div>
                                                    

                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                                data-dismiss="modal"> Ok
                                                        </button>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    @if(Auth::user()->role->nom == 'admin')
                                        <a href="{{ route('actualites.edit', $actualite->id)}}"
                                           class="btn btn-default btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="#supprimer{{ $actualite->id }}Modal" role="button"
                                           class="btn btn-danger btn-sm" data-toggle="modal"><i
                                                    class="fa fa-trash-o"></i></a>

                                        <div class="modal fade" id="supprimer{{ $actualite->id }}Modal" tabindex="-1"
                                             role="dialog" aria-labelledby="supprimer{{ $actualite->id }}ModalLabel"
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
                                                        ( {{$actualite->titre}} ) ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form class="form-inline"
                                                              action="{{ route('actualites.destroy', $actualite->id) }}"
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
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Titre</th>
                    <th>Résumé</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                </table>
</div>