<div class="btn-group col-md-12" role="group" aria-label="Basic example">
	<a href="{{route('contacts.index')}}" class="btn btn-primary btn-sm"><b>Liste des contacts</b></a>
	<a href="{{route('partenaires.index')}}" class="btn btn-primary btn-sm"><b>Liste des partenaires</b></a>
	@if(Auth::user()->role->nom == 'admin')
	<a href="{{route('partenaires.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Partenaire</b></a>
	<a href="{{route('contacts.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><b> Contact</b></a>
	@endif
</div>
<br>
<hr>