<div class="box-body">
    {{-- Je dois ajouter le message de succes pour traiter le cas de redirection --}}

                    <table id="example1" class="table table-bordered table-striped " style="width:2000px;">
                        <thead>
                        <tr>
                            <th> Titre </th>
                            <th> resume </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actualites as $actualite)
                            <tr>
                                <td>{{$actualite->titre}}</td>
                                <td>{{$actualite->resume}}</td>
                                
                                <td>

                                    <a href="{{ route('actualites.show', $actualite) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    @if(Auth::user()->role->nom == 'admin')
                                        <a href="{{ route('actualites.edit', $actualite)}}"
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
                    <th>Libellé</th>
                    <th>Numéro</th>
                    <th>Disponible</th>
                    <th>Emprunté par</th>
                    <th>Disponible le</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                </table>
</div>